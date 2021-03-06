<?php

namespace App\Controller\Frontend;

use App\Entity\IcTorneo;
use App\Entity\IcTraduccion;
use App\IcUtils\IcConfig;
use App\Repository\IcCalendarioRepository;
use App\Repository\IcGaleriasRepository;
use App\Repository\IcJugadoresRepository;
use App\Repository\IcTorneoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\IcTraduccionRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/index", name="frontend_index")
     */
    public function index(  IcTraduccionRepository $traduccionRepository, IcGaleriasRepository  $galeryRepository,
                            IcTorneoRepository $torneoRepository, IcCalendarioRepository $calendarioRepository,
                            IcJugadoresRepository $jugadoresRepository, Request $request): Response
    {


        /**
         * Metodo para obtener las noticias principales.
         */
        $noticias = $traduccionRepository->getNews('es', null, IcConfig::LIMITE_NOTICIAS_PORTADA);

        /**
         * Noticia principla fullscreen
         */
        $noticiaGlobal = $traduccionRepository->findOneBy([
                'esGlobal' => true,
                'idLocale' => 1
        ]);

        /**
         * Tabla Genera.
         *
         */
        $liga  = $torneoRepository->getTipoTorneo('LIGA');
        
        if(empty($liga) || $liga == null )
            $liga = null;


        $tabla = $torneoRepository->getTablaLiga($liga->getId());


        /**
         * Proximos partidos
         */
        $calendario = $calendarioRepository->getNextThreeMatches($liga);

        if(count($calendario) < 3)
            $calendario = null;

        /**
         * Galerias
         */
        $galery = $galeryRepository->getGalerias(IcConfig::IC_LIMITE_GALERIAS_PORTADA);


        /**
         * Jugadores
         */
        $jugadores = $jugadoresRepository->getPlayers(true, IcConfig::CATEGORIA_NOTICIA_PRIMER_EQUIPO);


        return $this->render('frontend/home/index.html.twig',
            [
                'noticias'      => $noticias,
                'galerias'      => $galery,
                'tabla'         => $tabla,
                'calendario'    => $calendario,
                'jugadores'     => $jugadores,
                'noticiaGlobal' => $noticiaGlobal
            ]);
    }


}
