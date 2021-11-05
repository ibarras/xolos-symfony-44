<?php

namespace App\Controller\Frontend;

use App\Entity\IcCategoria;
use App\Entity\IcTraduccion;
use App\Repository\IcCalendarioRepository;
use App\Repository\IcJugadoresRepository;
use App\Repository\IcTorneoRepository;
use App\Repository\IcCuerpoTecnicoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function PHPUnit\Framework\throwException;

class DeportivoController extends AbstractController
{

    public function listPlayersByCategory(IcJugadoresRepository $jugadoresRepository, Request $request ): Response
    {

        $category = $request->get('category');
        $players = $jugadoresRepository->getPlayers(true,$category);

        if(!$players)
            throw $this->createNotFoundException('No hay jugadores en la categoria solicitada');

        return $this->render('frontend/deportivo/players.html.twig', [
            'jugadores' => $players,
            ]);
    }

    public function getPlayer(Request $request, IcJugadoresRepository  $jugadoresRepository ): Response
    {
        $p      = $request->get('player');
        $player = $jugadoresRepository->getJugador($p);

        if(!$player)
            throw $this->createNotFoundException('Jugador inexistente');


        return $this->render('frontend/deportivo/player.html.twig', [
            'player' => $player,
        ]);
    }

    public function getSchedule(Request $request, IcCalendarioRepository $calendarioRepository,
                                IcTorneoRepository $torneoRepository):Response
    {
        $tipoTorneo = $request->get('calendario');

        $torneo     = $torneoRepository->getTipoTorneo($tipoTorneo);
        if(!$torneo)
            throw $this->createNotFoundException('Calendario no existe');
            
        $current    = $calendarioRepository->getCalendarioPorTorneo($torneo->getId());

        return $this->render('frontend/deportivo/schedule.html.twig', [
                                    'schedule' => $current,
                                    'calendario' => $torneo
        ]);
    }


    public function getCoach(Request $request, IcCuerpoTecnicoRepository $cuerpoTecnicoRepository): Response
    {
        $co = $cuerpoTecnicoRepository->getCuerpoTecnico(1);

        if(!$co)
            throw $this->createNotFoundException('La informacion que busca no existe');

        return $this->render('frontend/deportivo/coach.html.twig', [
            'coach' => $co
        ]);
    }

    public function getJuniorLeague(Request $request, IcJugadoresRepository $repository): Response
    {

        return $this->render('frontend/deportivo/coach.html.twig', [
            'coach' => $co
        ]);
    }

}
