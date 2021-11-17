<?php

namespace App\Security;

use App\Entity\IcRegistroUsuarios;
use HWI\Bundle\OAuthBundle\Connect\AccountConnectorInterface;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\EntityUserProvider;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;

class MyEntityUserProvider extends EntityUserProvider implements AccountConnectorInterface {

    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $resourceOwnerName = $response->getResourceOwner()->getName();

        if (!isset($this->properties[$resourceOwnerName])) {
            throw new \RuntimeException(sprintf("No property defined for entity for resource owner '%s'.", $resourceOwnerName));
        }

        // Unique
        $username = $response->getUsername();
        if (null === $user = $this->findUser([$this->properties[$resourceOwnerName] => $username])) {
            //TODO: create the new user
            $user = new IcRegistroUsuarios();

            $user->setCorreo($response->getEmail());
            $user->setIdRedSocial($response->getUsername());
            $user->setSocialName($response->getResourceOwner()->getName());
            $user->setFacebookAccessToken($response->getAccessToken());
            $user->setCreado(new \DateTime('now'));

            $this->em->persist($user);
            $this->em->flush();

            return $user;
        }
        // Just for Facebook
        $user->setFacebookAccessToken($response->getAccessToken());


        return $user;
    }

    public function connect(UserInterface $user, UserResponseInterface $response)
    {
        if (!$user instanceof IcRegistroUsuarios)
        {
            throw new UnsupportedUserException(sprintf('Expected an instance of App\Model\IcRegistroUsuarios, but got "%s".', get_class($user)));
        }

        $property = $this->getProperty($response);
        $username = $response->getUsername();

        if (null !== $previousUser = $this->registry->getRepository(IcRegistroUsuarios::class)->findOneBy(array($property => $username)))
        {
            // disconnect previously connected user
            $this->disconnect($previousUser, $response);
        }

        $serviceName = $response->getResourceOwner()->getName();
        $setter = 'set'.ucfirst($serviceName).'AccessToken';

        $user->$setter($response->getAccessToken());

        $this->updateUser($user, $response);


    }

    protected function getProperty(UserResponseInterface $response)
    {
        $resourceOwnerName = $response->getResourceOwner()->getName();

        if (!isset($this->properties[$resourceOwnerName]))
        {
            throw new \RuntimeException(sprintf("No property defined for entity for resource owner '%s'.", $resourceOwnerName));
        }

        return $this->properties[$resourceOwnerName];
    }

    public function disconnect(UserInterface $user, UserResponseInterface $response)
    {
        $property = $this->getProperty($response);
        $accessor = PropertyAccess::createPropertyAccessor();

        $accessor->setValue($user, $property, null);

        $this->updateUser($user, $response);
    }

    private function updateUser(UserInterface $user, UserResponseInterface $response)
    {
        $user->setEmail($response->getEmail());

        $this->em->persist($user);
        $this->em->flush();
    }
}