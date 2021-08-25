<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\IcRevista;


class IcRevistaRepository extends EntityRepository {


	public function getRevistaDesc($revista = false)
	{
			$em = $this->getEntityManager();

				$query = $em->createQuery('
					SELECT r FROM FrontendBundle:IcRevista r
					ORDER BY r.id DESC
					');

				
		if($revista) {
            $query->setMaxResults(1);
            return $query->getOneOrNullResult();
        }
			
			return $query->getResult();
	}



}
