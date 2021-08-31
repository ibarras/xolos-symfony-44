<?php

namespace App\EventSubscriber;

use App\Repository\IcTraduccionRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Twig\Environment;


class TwigEventSubscriber implements EventSubscriberInterface
{


    private $twig;
    private $repository;

    public function __construct(Environment $twig , IcTraduccionRepository $repository)
    {
        $this->twig = $twig;
        $this->repository = $repository;

    }
    public function onKernelController(ControllerEvent $event)
    {
        $this->twig->addGlobal('conferences', $this->repository->getNewsByLocale(1299));

    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.controller' => 'onKernelController',
        ];
    }
}
