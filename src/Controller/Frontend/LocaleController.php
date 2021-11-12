<?php

namespace App\Controller\Frontend;

use App\IcUtils\IcConfig;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LocaleController extends AbstractController
{
   public function setEn(SessionInterface $session, Request $request)
   {
       // Checamos si un locale en la sesion.
       //$se = new Session();
       $session = $request->getSession();

       if($session == null){
           $session->set('_locale', 'en');
       }else {
           if($session != 'en'){
               $session->set('_locale', 'en');
           }
       }
       return $this->redirect('/');
   }


   public function setEs(Request $request)
   {
       // Checamos si un locale en la sesion.
       $session = $request->getSession();
      // dd($session->get('_locale')); die; 
      // $sesion = $this->get('session')->get('_locale');
       if($session == null){
           $session->set('_locale', IcConfig::IC_LOCALE_ES);
       }else {
           if($session != 'es'){
               $session->set('_locale',  IcConfig::IC_LOCALE_ES);
           }
       }

       return $this->redirect('/');
   }
}
