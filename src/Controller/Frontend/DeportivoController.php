<?php

namespace App\Controller\Frontend;

use App\Entity\IcCategoria;
use App\Entity\IcTraduccion;
use App\Repository\IcJugadoresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function PHPUnit\Framework\throwException;

class DeportivoController extends AbstractController
{


    public function listPlayersByCategory(IcJugadoresRepository $jugadoresRepository, $category ): Response
    {

        $players = $jugadoresRepository->getPlayers($category);

        if(!$players)
            throw $this->createNotFoundException('No hay jugadores en la categoria solicitada');

            return $this->render('frontend/comunicacion/players.html.twig', [
                'players' => $players,
            ]);
    }

    public function getPlayer(IcJugadoresRepository  $jugadoresRepository, $player )
    {
        $player = $jugadoresRepository->getJugador($player);

        if(!$player)
            throw $this->createNotFoundException('Jugador inexistente');


        return $this->render('frontend/comunicacion/player.html.twig', [
            'player' => $player,
        ]);
    }
}
