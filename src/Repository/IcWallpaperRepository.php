<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\IcWallpaper;


class IcWallpaperRepository extends EntityRepository {
	

	public function getWallpaperDesc()
	{	
			$em = $this->getEntityManager();
				
				$query = $em->createQuery('
					SELECT w FROM FrontendBundle:IcWallpaper w
					ORDER BY w.id DESC
					');
		
			return $query->getResult();
	}

	public function getWallpaper()
	{	
			$em = $this->getEntityManager();
				
				$query = $em->createQuery('
					SELECT w FROM FrontendBundle:IcWallpaper w
					ORDER BY w.id DESC')->setMaxResults(1);
		
			return $query->getOneOrNullResult();
	}	
	
}
