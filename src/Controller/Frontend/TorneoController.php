<?php

namespace App\Controller\Frontend;

use App\Entity\IcTraduccion;
use App\Repository\IcCalendarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TorneoController extends AbstractController
{
  
    public function listScheduleByCategory(Request $request, IcCalendarioRepository $calendarioRepository, $torneo ): Response
    {

        $type     = $request->get('Torneo');
        $torneo   = $calendarioRepository->getCalendarioPorTorneo($type);

        if(!$torneo)
            throw $this->createNotFoundException('No hay torneo activo.');

        $schedule = $calendarioRepository->getCalendarioPorTorneo($torneo->getId());

        if(!$schedule)
            throw $this->createNotFoundException('No hay calendario activo.');


        if (!$this->isGranted('MANAGE', $article)) {

            return $this->render('backend/admin/index.html.twig', [
                'controller_name' => 'AdminController',
            ]);

        }
    }
}
