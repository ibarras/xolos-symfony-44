<?php

namespace App\Repository;

use App\Entity\IcGaleria;
use App\Entity\IcGaleriaFotos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;
use Doctrine\DBAL\Statement;

class IcGaleriasRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IcGaleriaFotos::class);
    }

    public function getGaleriaFotos($idGaleria)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
				SELECT gf FROM App\Entity\IcGaleriaFotos gf
				    JOIN gf.idGaleria g
				    JOIN g.idUsuario u
				    JOIN g.idCategoria c
					WHERE g.id =:idGaleria
				')
            ->setParameter('idGaleria', $idGaleria);
        return $query->getResult();
    }

    public function getFotosGaleriasLocale($locale = "es" )
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
				SELECT gf FROM  App\Entity\IcGaleriaFotos gf
				    JOIN gf.idGaleria g
				    JOIN g.idUsuario u
				    JOIN g.idCategoria c
				    JOIN g.idLocale l
					WHERE l.locale =:locale
				')
            ->setParameter('locale', $locale);
        return $query->getResult();
    }


    /**
     * autor: Juan Becerra
     * mail: juan.becerra@xolos.com.mx
     * fecha: 22 Diciembre, 2014
     * descripcion:
     * Query cual retorna las galerias con una foto.
     *
     */
    public function getGalerias($limite = 0, $locale = "es")
    {
        $em = $this->getEntityManager();
        $connection = $em->getConnection();


        $sql ="SELECT g.id, g.nombre, g.id_categoria,  c.nombre as categoria, g.creado, g.id_locale, (SELECT foto from ic_galeria_fotos
                WHERE g.id = id_galeria limit 1 offset 0) as foto
                FROM ic_galeria g           
                JOIN ic_locale as l
                ON l.id_locale = g.id_locale 
                JOIN ic_categoria as c
                ON c.id = g.id_categoria            
                WHERE l.locale =:locale  
                ORDER BY g.id DESC";

        if($limite != null){
            $sql ="SELECT g.id, g.nombre, g.id_categoria, c.nombre as categoria, g.creado, g.id_locale, (SELECT foto from ic_galeria_fotos
                WHERE g.id = id_galeria limit 1 offset 0) as foto
                FROM ic_galeria g           
                JOIN ic_locale as l
                ON l.id_locale = g.id_locale 
                JOIN ic_categoria as c
                ON c.id = g.id_categoria 
                WHERE l.locale =:locale  
                ORDER BY g.id DESC  LIMIT :limite ";
        }

        $statement = $connection->prepare($sql);


        if ($limite != null) {
            $statement->bindValue('limite', $limite);
        }
        $statement->bindValue('locale', $locale);
       // $statement->executeQuery()->fetchAllAssociative();
        $results =   $statement->executeQuery()->fetchAllAssociative(); 
        return $results;


    }

}