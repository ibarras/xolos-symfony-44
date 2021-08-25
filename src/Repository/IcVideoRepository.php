<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;

class IcVideoRepository extends EntityRepository
{


    public function getVideosLocale($locale)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
				SELECT v FROM FrontendBundle:IcVideo v	
				    JOIN v.idLocale l
					WHERE l.locale =:locale
					ORDER BY v.id DESC
				')
            ->setParameter('locale', $locale);
        return $query->getResult();
    }


}