<?php

namespace App\Controller\Frontend;

use App\Entity\IcTraduccion;
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

    /**
     * @Route("/show/{post}", name="frontend_show")
     */

    public function showPost(IcTraduccionRepository $repository, Request $request): Response
    {

        $traduccion = $repository->find($request->get('post'));

        if (!$traduccion)
            return $this->createNotFoundException('Noticia no encontrada.');

        return $this->render('frontend/home/show.html.twig',
            [
                'noticia' => $traduccion,
            ]
        );

    }


}
