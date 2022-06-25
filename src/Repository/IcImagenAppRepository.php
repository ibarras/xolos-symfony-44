<?php

namespace App\Repository;

use App\Entity\IcImagenApp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * IcAccionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class IcImagenAppRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IcImagenApp::class);
    }
  /**
	 * Metodo para obtener las acciones de un <partido> en particular
	 * @param integer $partido
	 * @return object
	 */
   public function getImages($tipo, $active = null)
   {
       $em = $this->getEntityManager();
       $query = $em->createQuery('
       		
         SELECT i FROM FrontendBundle:IcImagenApp i
       		
         WHERE  i.esActivo = :active
       	AND 		i.idTipoImagen = :tipo
       		
       		')
           ->setParameter('active', $active)
           ->setParameter('tipo', $tipo);

       return $query->getResult();
   }

    /**
     * Retorna la Campaña Activa o Null
     * si no hay campaña activa
     * @param $tipo
     * @param bool $active
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getCampania($tipo, $active = true)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
       SELECT i FROM FrontendBundle:IcImagenApp i
       WHERE i.esActivo =:active
       AND i.idTipoImagen =:tipo
       AND i.fechaFin >= :hoy
       ORDER BY i.fechaFin ASC')
            ->setParameter('active', $active)
            ->setParameter('tipo', $tipo)
            ->setParameter('hoy', new \DateTime('today'))
            ->setMaxResults(1);
        return $query->getOneOrNullResult();
    }

    
}
