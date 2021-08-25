<?php
/**
 * Created by PhpStorm.
 * User: julio flores
 * Date: 26/10/16
 * Time: 9:16 AM
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\IcUtils\IcConfig;
use Symfony\Component\Intl\Data\Util\ArrayAccessibleResourceBundle;

class IcCalendarioRepository extends EntityRepository
{
    /**
     * Funcion para obtener el calendario por torneo en especifico
     * @param $torneo
     * @param null $jornada
     * @return array
     */
    public function getCalendarioPorTorneo($torneo, $jornada=null)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT c FROM FrontendBundle:IcCalendario c
        WHERE c.idTorneo = :torneo
        ORDER BY c.jornada ASC ')->setParameter('torneo',$torneo);
        return $query->getResult();
    }

    /**
     * Funcion para obtener el calendario por grupo del torneo en especifico
     * @param $torneo
     * @param null $grupo
     * @return array
     */
    public function getCalendarioPorTorneoGrupo($torneo, $grupo=null)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder()
            ->select('c')
            ->from('FrontendBundle:IcCalendario','c')
            ->where('c.idTorneo = :torneo')
            ->orderBy('c.jornada', 'ASC')
            ->setParameter('torneo', $torneo);

        if ($grupo)
            $query->andWhere('c.grupo = :grupo')->setParameter('grupo', $grupo);

        return $query->getQuery()->getResult();
    }
    
    

    /**
     *
     * Metodo para obtener los datos de un <partido> en particular
     * @param $id
     * @param $torneo
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     */
    public function getFichaDelPartido($id, $torneo)
    {
    	$em = $this->getEntityManager();
    
    	$query = $em->createQuery('
				SELECT c FROM FrontendBundle:IcCalendario c
    
					WHERE c.id = :id
    					AND c.idTorneo = :torneo
    
				')->setParameter('id', $id)->setParameter('torneo', $torneo);
    
    	return $query->getSingleResult();
    }

    /**
     * Metodo para extraer de la tabla de posiciones los ultimos datos de acuerdo al torneo
     * @param $torneo
     * @return Array
     */


    public function getNextThreeMatches($torneo)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT c FROM FrontendBundle:IcCalendario c
        WHERE c.idTorneo = :torneo
        AND c.esActivo = TRUE
        ORDER BY c.jornada ASC
        ')->setParameter('torneo',$torneo)->setMaxResults(IcConfig::IC_LIMITE_INDEX_PARTIDOS);
        return $query->getResult();
    }


    
}