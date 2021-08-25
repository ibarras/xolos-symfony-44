<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;


class IcTipoImagenAppRepository extends EntityRepository {
	
	/**
	 * Metodo para obtener los tipos que pueden recibir las imagenes
	 * 
	 */
    public function getTipos()
    {
        $em = $this->getEntityManager();
		$query = $em->createQuery('
			SELECT it FROM FrontendBundle:IcTipoImagenApp it ORDER BY it.id');

        return $query->getResult();

    }
}


