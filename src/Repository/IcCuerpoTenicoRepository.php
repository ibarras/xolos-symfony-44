<?php

namespace App\Repository;

use App\Entity\IcCuerpoTecnico;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;

class IcCuerpoTecnicoRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IcCuerpoTecnico::class);
    }

    public function getCuerpoTecnico($tipo)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery('
					SELECT ct
					FROM App\Entity\IcCuerpoTecnico ct
					WHERE ct.esActivo = :estatus
					AND ct.idCategoriaJugador = :tipo
					ORDER BY ct.idPosicion ASC
					')->setParameter('estatus', true)->setParameter('tipo', $tipo);

        return $query->getResult();

    }
}