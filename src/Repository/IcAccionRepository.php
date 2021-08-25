<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * IcAccionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class IcAccionRepository extends \Doctrine\ORM\EntityRepository
{
  /**
	 * Metodo para obtener las acciones de un <partido> en particular
	 * @param integer $partido
	 * @return object
	 */
	public function getAccionesDelPartido($id_jornada, $_locale)
	{
		$em = $this->getEntityManager();
		$query = $em->createQuery('
				SELECT a FROM FrontendBundle:IcAccion a
					WHERE a.idJornada = :id
					AND   a.idLocale  = :locale
					ORDER BY a.id DESC')->setParameter('id', $id_jornada)->setParameter('locale', $_locale);

		return $query->getResult();
	}
}
