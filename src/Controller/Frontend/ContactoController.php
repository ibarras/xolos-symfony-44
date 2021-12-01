<?php

namespace App\Controller\Frontend;

use App\Entity\IcContacto;
use App\Security\MyEntityUserProvider;
use App\Entity\IcRegistroUsuarios;
use HWI\Bundle\OAuthBundle\Connect\AccountConnectorInterface;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\EntityUserProvider;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;

class ContactoController{

    /**
     * @Route('/contacto', name='contacto')
     */
    public function index(){

        $article = new IcContacto();

        if (!$this->isGranted('SOCIAL', $article)) {

        }

    }

}