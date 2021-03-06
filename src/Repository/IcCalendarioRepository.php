<?php
/**
 * Created by PhpStorm.
 * User: julio flores
 * Date: 26/10/16
 * Time: 9:16 AM
 */

namespace App\Repository;

use App\Entity\IcCalendario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use App\IcUtils\IcConfig;
use Doctrine\Persistence\ManagerRegistry;

class IcCalendarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IcCalendario::class);
    }

    /**
     * Funcion para obtener el calendario por torneo en especifico
     * @param $torneo
     * @param null $jornada
     * @return array
     */
    public function getCalendarioPorTorneo($torneo, $jornada=null)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT c FROM App\Entity\IcCalendario c
            WHERE c.idTorneo = :torneo
            ORDER BY c.jornada ASC '
            )->setParameter('torneo',$torneo);
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
            ->from('App\Entity\IcCalendario','c')
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
				    SELECT c FROM App\Entity\IcCalendario c
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
        $query = $em->createQuery(
            'SELECT c FROM App\Entity\IcCalendario c
            WHERE c.idTorneo = :torneo
            AND c.esActivo = TRUE
            ORDER BY c.jornada ASC
            ')->setParameter('torneo',$torneo)->setMaxResults(IcConfig::IC_LIMITE_INDEX_PARTIDOS);
        return $query->getResult();
    }

    
    /**
     * Metodo para obtener las acciones de un <partido> en particular
     * @param integer $partido
     * @return object
     */
    public function getAccionesDelPartido($id_jornada, $_locale)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
				SELECT a FROM FrontendBundle:IcAccion a
					WHERE a.idJornada = :id
					AND   a.idLocale  = :locale
					ORDER BY a.id DESC')->setParameter('id', $id_jornada)->setParameter('locale', $_locale);

        return $query->getResult();
    }

}