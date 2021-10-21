<?php

namespace App\Controller\Frontend;

use App\Entity\IcTraduccion;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComunicacionController extends AbstractController
{

    public function index(): Response
    {
        $article = new IcTraduccion();

        if (!$this->isGranted('MANAGE', $article)) {

            return $this->render('backend/admin/index.html.twig', [
                'controller_name' => 'AdminController',
            ]);

        }
    }
}
