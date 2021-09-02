<?php

namespace App\EventSubscriber;

use App\IcUtils\IcConfig;
use App\Repository\IcTraduccionRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Twig\Environment;


class TwigEventSubscriber implements EventSubscriberInterface
{

    private $twig;
    private $repository;
    private $session;


    public function __construct(Environment $twig , IcTraduccionRepository $repository, SessionInterface $session)
    {
        $this->twig         = $twig;
        $this->repository   = $repository;
        $this->session      = $session;

    }
    public function onKernelController(ControllerEvent $event)
    {
        $this->twig->addGlobal('lastNews',
                $this->repository->getNewsByCategory(1, $this->session->get('_locale', 'es'), IcConfig::LIMITE_NOTICIAS_PORTADA));

    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.controller' => 'onKernelController',
        ];
    }
}
