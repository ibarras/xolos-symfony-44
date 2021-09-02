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

        $l = new IcLocaleController();
        $l->setEnAction($request);
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

        return $this->render('frontend/home/index.html.twig',
            [
                'noticias'      => $noticias,
                'galerias'      => $galery,
                'tabla'         => $tabla,
                'calendario'    => $calendario,
                'jugadores'     => $jugadores,
            ]);
    }

    /**
     * @Route("/show", name="frontend_show")
     */

    public function showPost(IcTraduccionRepository $repository, Request $request): Response
    {
        $traduccion = $repository->find($request->get('parameter'));

        if(!$traduccion)
            return $this->createNotFoundException('Noticia no encontrada.');

            return $this->render('frontend/home/show.html.twig',
                    [
                        'noticia'      => $traduccion,
                    ]
                );
    }

    /**
     * @Route("/list", name="frontend_list")
     */

    public function listPostByCategory(IcTraduccionRepository $traduccionRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $category = $request->get('category');

        if(empty($category))
            return $this->createNotFoundException(
                'La Categoria que busca no existe.'
            );

        $news = $traduccionRepository->getNewsByCategory($category, $locale = 'es', $limit = 10);

        if(empty($news))
            return $this->createNotFoundException(
                'No hay elementos en esa categoria.'
            );

        $all = $paginator->paginate(
            $news, $request->query->getInt('page', 1), 10
        );

        return $this->render('frontend/home/list.html.twig', ['pagination' => $all]);
    }
}
