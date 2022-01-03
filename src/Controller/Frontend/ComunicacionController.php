<?php

namespace App\Controller\Frontend;

use App\Entity\IcTraduccion;
use App\IcUtils\IcConfig;
use App\Repository\IcTraduccionRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComunicacionController extends AbstractController
{

    /**
     * @Route("/list/{category}", name="frontend_list")
     */

    public function listPostByCategory(IcTraduccionRepository $traduccionRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $category = $request->get('category');
        
        if(empty($category))
            return $this->createNotFoundException(
                'La Categoria que busca no existe.'
            );

        $news = $traduccionRepository->getNewsByCategory($category, $locale = 'es', $limit = 50);

        if(empty($news))
            return $this->createNotFoundException(
                'No hay elementos en esa categoria.'
            );

        $all = $paginator->paginate(
            $news, $request->query->getInt('page', 1), constant('App\\IcUtils\\IcConfig::LIMITE_NOTICIAS_PAGINADO')
        );

        return $this->render('frontend/home/list.html.twig', ['pagination' => $all]);
    }

    
    public function showPost(IcTraduccionRepository $repository, Request $request)
    {

        $traduccion = $repository->find($request->get('post'));

        if (!$traduccion)
            return $this->createNotFoundException('Noticia no encontrada.');

        $relacion   = $repository->getNews($this->get('session')->get('_locale'), null, IcConfig::LIMITE_NOTICIAS_PORTADA);

        return $this->render('frontend/home/show.html.twig',
            [
                'noticia'  =>  $traduccion,
                'relacion' => $relacion,
            ]
        );

    }

    public function historia(){

        return $this->render('frontend/comunicacion/historia.html.twig');

    }

    public function estadio(){

        return $this->render('frontend/comunicacion/estadio.html.twig');

    }

    public function eventos(){

        return $this->render('frontend/comunicacion/eventos.html.twig');

    }

    public function reglamento(){

        return $this->render('frontend/comunicacion/reglamento.html.twig');

    }

    public function directiva(){

        return $this->render('frontend/comunicacion/directiva.html.twig');

    }

    public function palcos(){

        return $this->render('frontend/comunicacion/palcos.html.twig');

    }

    public function estadioContacto(){

        return $this->render('frontend/comunicacion/estadioContacto.html.twig');

    }

    public function xoloshopEstadio(){

        return $this->render('frontend/comunicacion/xoloshopEstadio.html.twig');

    }

    public function contactoPresidencia(){

        return $this->render('frontend/comunicacion/contactoPresidencia.html.twig');

    }

    public function contactoEstadio(){

        return $this->render('frontend/comunicacion/contactoEstadio.html.twig');

    }

    public function contactoResponsabilidadSocial(){

        return $this->render('frontend/comunicacion/contactoResponsabilidadSocial.html.twig');

    }

    public function contactoComercializacion(){

        return $this->render('frontend/comunicacion/contactoComercializacion.html.twig');

    }

    public function contactoFuerzasBasicas(){

        return $this->render('frontend/comunicacion/contactoFuerzasBasicas.html.twig');

    }

    public function xolopass(){

        return $this->render('frontend/comunicacion/xolopass.html.twig');

    }

}
