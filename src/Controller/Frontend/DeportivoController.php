<?php

namespace App\Controller\Frontend;

use App\Entity\IcCategoria;
use App\Entity\IcTraduccion;
use App\IcUtils\IcConfig;
use App\Repository\IcCalendarioRepository;
use App\Repository\IcImagenAppRepository;
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

    public function listPlayersByCategory(IcJugadoresRepository $jugadoresRepository, Request $request, IcImagenAppRepository $imagenAppRepository): Response
    {

        $category = $request->get('category');
        if ($category == 1)
            $background = $imagenAppRepository->findOneBy(['idTipoImagen' => IcConfig::IC_BG_PLANTEL_VARONIL]);
        else
            $background = $imagenAppRepository->findOneBy(['idTipoImagen' => IcConfig::IC_BG_PLANTEL_FEMENIL]);

        $players = $jugadoresRepository->getPlayers(true,$category);

        if(!$players)
            throw $this->createNotFoundException('No hay jugadores en la categoria solicitada');

        return $this->render('frontend/deportivo/players.html.twig', [
            'jugadores' => $players,
            'background' => $background
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


    public function palmares(){

        return $this->render('frontend/deportivo/palmares.html.twig');

    }

}
