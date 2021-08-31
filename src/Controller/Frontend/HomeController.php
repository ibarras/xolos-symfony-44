<?php

namespace App\Controller\Frontend;

use App\Entity\IcTorneo;
use App\IcUtils\IcConfig;
use App\Repository\IcCalendarioRepository;
use App\Repository\IcGaleriasRepository;
use App\Repository\IcJugadoresRepository;
use App\Repository\IcTorneoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\IcTraduccionRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="frontend_home")
     */
    public function index(  IcTraduccionRepository $traduccionRepository, IcGaleriasRepository  $galeryRepository,
                            IcTorneoRepository $torneoRepository, IcCalendarioRepository $calendarioRepository,
                            IcJugadoresRepository $jugadoresRepository): Response
    {

        /**
         * Metodo para obtener las noticias principales.
         */
        $noticias = $traduccionRepository->getNews(1, null, IcConfig::LIMITE_NOTICIAS_PORTADA);

        /**
         * Tabla Genera.
         *
         */
        $liga  = $torneoRepository->getTipoTorneo('LIGA');
        $tabla = $torneoRepository->getTablaLiga($liga->getId());


        /**
         * Proximos partidos
         */
        $calendario = $calendarioRepository->getNextThreeMatches($liga);

        /**
         * Galerias
         */
        $galery = $galeryRepository->getGalerias(5);


        /**
         * Jugadores
         */
        $jugadores = $jugadoresRepository->getPlayers(true, IcConfig::CATEGORIA_NOTICIA_PRIMER_EQUIPO);

        dump($noticias);

        return $this->render('frontend/home/index.html.twig',
            [
                'noticias'      => $noticias,
                'galerias'      => $galery,
                'tabla'         => $tabla,
                'calendario'    => $calendario,
                'jugadores'     => $jugadores,
        ]);
    }
}
