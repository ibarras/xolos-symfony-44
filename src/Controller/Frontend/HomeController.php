<?php

namespace App\Controller\Frontend;

use App\IcUtils\IcConfig;
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

        $noticias = $noticiaRepository->getNews(1, null, IcConfig::LIMITE_NOTICIAS_PORTADA);

        return $this->render('frontend/home/index.html.twig', [
            'controller_name' => 'HomeController',
            ['noticias' => $noticias]
        ]);
    }
}
