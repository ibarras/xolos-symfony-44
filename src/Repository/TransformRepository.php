<?php


namespace App\Repository;


use App\Entity\IcUsuario;

abstract  class TransformRepository
{

    /**
     * @param IcUsuario $user
     * @return array
     */
    public function transform(IcUsuario $user )
    {
        return [
            'Id'                    => $user->getId(),
            'Username'              => $user->getUsername(),
            'Email'                 => $user->getEmail(),
            'Enabled'               => $user->getEnabled(),
        ];

    }

    /**
     * @param $id
     * @return array
     */
    public function transformOne($id)
    {
        $object = $this->find($id);

        $o  = $this->transform($object);

        return $o;
    }

    /**
     * @param null $o
     * @return array
     */
    public function transformAll($o = null)
    {
        $object = $this->findAll();

        $allArray = [];

        if($o)
            $object = $o;

        foreach ($object as $o) {
            $allArray[] = $this->transform($o);
        }

        return $allArray;
    }

}