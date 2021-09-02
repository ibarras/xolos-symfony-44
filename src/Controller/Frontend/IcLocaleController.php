<?php

namespace App\Controller\Frontend;

use App\IcUtils\IcConfig;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class IcLocaleController extends AbstractController
{
    public function setEnAction(SessionInterface $session, Request $request)
    {
        // Checamos si un locale en la sesion.
        $se = new Session();
        $sesion = $request->getSession();

        if($sesion == null){
            $se->set('_locale', 'en');
        }else {
            if($sesion != 'en'){
                $se->set('_locale', 'en');
            }
        }
        return $this->redirect('/index');
    }


    public function setEsAction(Request $request)
    {
        // Checamos si un locale en la sesion.
        $sesion = $this->get('session')->get('_locale');
        if($sesion == null){
            $this->get('session')->set('_locale', IcConfig::IC_LOCALE_ES);
        }else {
            if($sesion != 'es'){
                $this->get('session')->set('_locale',  IcConfig::IC_LOCALE_ES);
            }
        }

        return $this->redirect($request->headers->get('referer'));
    }
}
