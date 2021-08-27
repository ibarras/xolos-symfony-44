<?php
/**
 * Created by PhpStorm.
 * User: julio flores
 * Date: 25/10/16
 * Time: 2:08 PM
 */

namespace App\Repository;

use App\Entity\IcTorneo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class IcTorneoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IcTorneo::class);
    }

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
            SELECT t FROM App\Entity\IcTorneo t 
            WHERE t.tipo = :tipo'
            )->setParameter('tipo', $tipo);
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
        $q = $em->createQuery(
            'SELECT t FROM App\Entity\IcTorneo t 
            WHERE t.nombre = :nombre'
            )->setParameter('nombre', $nombre);
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
            ->from('App\Entity\IcTorneo','t')
            ->where('t.tipo != :dif')
            ->orderBy('t.tipo', 'ASC')
            ->setParameter('dif', $dif);
        return $q->getQuery()->getResult();
    }

    /**
     * Funcion para para obtener la tabla de posiciones de un torneo
     * @param $torneo
     * @return array
     */

    public function getTablaLiga($torneo)
    {
        $em = $this->getEntityManager();
        $q = $em->createQuery(
            'SELECT t FROM App\Entity\IcTablaPosicion t
            WHERE t.idTemporada = :torneo
            ORDER BY t.pts DESC, t.dif DESC, t.gf DESC, t.jj ASC'
            )->setParameter('torneo',$torneo);
        return $q->getResult();
    }

}