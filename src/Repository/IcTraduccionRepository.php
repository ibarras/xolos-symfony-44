<?php

namespace App\Repository;

use App\Entity\IcTraduccion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class IcTraduccionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IcTraduccion::class);
    }


    /**
     * Metodo para obtener todas las noticias, opcional <categoria> <limite>
     *
     * @param integer $categoria
     * @param integer $limite
     * @return Array object
     */

    public function getNoticias($idioma = null)
    {
        $em = $this->getEntityManager();
        $q = $em->createQueryBuilder();
        $q->select('n,nt')
            ->from('App\Entity\IcTraduccion', 'nt')
           ->join('nt.idNoticia', 'n')
            ->where('nt.idLocale = :idioma')
            ->orderBy('nt.id', 'desc')
            ->setParameter('idioma', $idioma);

        return $q->getQuery()->getResult();

    }

    public function getNoticiaIdioma($noticia = null, $idioma = null)
    {

        $em = $this->getEntityManager();
        $q = $em->createQuery('
            SELECT nt, l
            FROM FrontendBundle:IcTraduccion nt
            JOIN nt.idLocale l
            WHERE nt.id = :noticia
            AND   nt.idLocale = :idioma
        ')->setParameter('noticia', $noticia)->setParameter('idioma', $idioma);

        return $q->getOneOrNullResult();

    }


}