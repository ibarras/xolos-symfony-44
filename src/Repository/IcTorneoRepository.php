<?php
/**
 * Created by PhpStorm.
 * User: julio flores
 * Date: 25/10/16
 * Time: 2:08 PM
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class IcTorneoRepository extends EntityRepository
{
    /**
     * Metodo para obtener el ID del torneo <LIGA> / <ALTERNO>
     *
     * @param string $tipo
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getTipoTorneo($tipo = null)
    {
        $em = $this->getEntityManager();
        $q = $em->createQuery('
        SELECT t FROM FrontendBundle:IcTorneo t WHERE t.tipo = :tipo')->setParameter('tipo', $tipo);
        return $q->getOneOrNullResult();

    }

    /**
     * Obtiene el torneo por nombre de torneo
     * @param $nombre
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getTorneoNombre($nombre = null)
    {
        $em = $this->getEntityManager();
        $q = $em->createQuery('SELECT t FROM FrontendBundle:IcTorneo t WHERE t.nombre = :nombre')->setParameter('nombre', $nombre);
        return $q->getOneOrNullResult();
    }
    /**
     * Obtiene los torneos activos(LIGA, ALTERNO, FEMENIL)
     */
    public function getTorneosActivos($dif = '.')
    {
        $em = $this->getEntityManager();
        $q = $em->createQueryBuilder();
        $q->select('t')
            ->from('FrontendBundle:IcTorneo','t')
            ->where('t.tipo != :dif')
            ->orderBy('t.tipo', 'ASC')
            ->setParameter('dif', $dif);
        return $q->getQuery()->getResult();
    }


}