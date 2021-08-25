<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\IcTraduccionRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="frontend_home")
     */
    public function index(IcTraduccionRepository $noticiaRepository): Response
    {
        //$noticias = $this->getDoctrine()->getRepository(IcTraduccion::class);
        $n = $noticiaRepository->getNoticias(1);

      //  $noticias = $NoticiasRepository->getNoticias('es');
        dd(count($n));

        return $this->render('frontend/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
