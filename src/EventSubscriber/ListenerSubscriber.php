<?php

namespace App\EventSubscriber;

use App\IcUtils\IcConfig;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ListenerSubscriber implements EventSubscriberInterface
{

    private $defaultLocale;

    public function __construct($defaultLocale = 'es')
    {
        $this->defaultLocale = $defaultLocale;
    }

    public function onRequestEvent($event)
    {
        $request = $event->getRequest();
        if (!$request->hasPreviousSession()) {
            return;
        }

        $sesion = $request->getSession(); // ->get('_locale');

        if($sesion != null){
            if($sesion == IcConfig::IC_LOCALE_EN){
                $request->setLocale($this->defaultLocale);
            }elseif($sesion == IcConfig::IC_LOCALE_EN){
                $request->setLocale($this->defaultLocale);
            }
        }else {
            if($sesion == IcConfig::IC_LOCALE_EN){
                $request->setLocale($this->defaultLocale);
            }else {
                //$request->getSession()->set('_locale', $this->defaultLocale);
            }
        }

    }





    public static function getSubscribedEvents()
    {
        return [
            'RequestEvent' => 'onRequestEvent',
        ];
    }
}
