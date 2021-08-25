<?php
/**
 * Created by PhpStorm.
 * User: julio flores
 * Date: 31/10/16
 * Time: 5:31 PM
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
class IcCategoriaRepository extends EntityRepository
{
    /**
     * Funcion para obtener el id de las cotegorias para las preguntas frecuentes
     **/
    public function getTipoCategoria($nombre = null)
    {
        $em = $this->getEntityManager();
        $q = $em->createQuery('
        SELECT c FROM FrontendBundle:IcCategoria c WHERE c.nombre = :nombre')->setParameter('nombre', $nombre);
        return $q->getOneOrNullResult();

    }
}