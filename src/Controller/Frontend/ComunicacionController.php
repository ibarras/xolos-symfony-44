<?php

namespace App\Controller\Frontend;


use App\Form\ContactoType;
use App\IcUtils\IcConfig;
use App\Repository\IcBeneficioRepository;
use App\Repository\IcImagenAppRepository;
use App\Repository\IcInformacionRepository;
use App\Repository\IcTraduccionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
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

        //Cambio de funcion a getNewsByCategory para que las notas relacionadas sean por categoria
        $relacion = $repository->getNewsByCategory($traduccion->getIdCategoria(), $locale = 'es', IcConfig::LIMITE_NOTICIAS_PORTADA);
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

    public function estadioContacto(Request $request, MailerInterface $mailer){

        $form = $this->createForm(ContactoType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            /*$email = (new Email())
                ->from('julio.flores@xolos.com.mx')
                ->to('fekems@gmail.com')
                ->subject($form->getData()['asunto'])
                ->html('<p>' . $form->getData()['nombre'] . '</p>'.
                    '<p>' . $form->getData()['telefono'] . '</p>'.
                    '<p>' . $form->getData()['correo'] . '</p>'.
                    '<p>' . $form->getData()['mensaje'] . '</p>'.
                    '<p>Este correo fue enviado desde la pagina de contacto del sitio: <a href="https://xolos.com.mx" target="_blank">xolos.com.mx</a></p>'
                );
            $mailer->send($email);
            $this->addFlash('success', 'Tu correo ha sido enviado, pronto nos pondremos en contacto contigo.');
            return $this->redirect($this->generateUrl('frontend_estadioContacto'));*/
        }

        return $this->render('frontend/comunicacion/estadioContacto.html.twig', array(
            'form' => $form->createView()
        ));

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

    public function xolopass(IcInformacionRepository $repository, IcBeneficioRepository $beneficioRepository)
    {
        //Retorna la informacion en base al campo titulo = "Xolopass"
        $informacion = $repository->findOneBy(['titulo' => IcConfig::IC_INFORMACION]);
        if (!$informacion)
            $informacion = null;
        //Retorna todos los beneficios registrados
        $beneficios = $beneficioRepository->findAll();
        if (!$beneficios)
            $beneficios = null;
        return $this->render('frontend/comunicacion/xolopass.html.twig',
            [
                'informacion'=>$informacion,
                'beneficios' =>$beneficios
            ]);

    }

    public function cix(){

        return $this->render('frontend/comunicacion/cix.html.twig');

    }

    public function fut7(){

        return $this->render('frontend/comunicacion/fut7.html.twig');

    }

    public function rooms(){

        return $this->render('frontend/comunicacion/rooms.html.twig');

    }

    public function boletos(IcImagenAppRepository $repository){
        $boleto = $repository->findOneBy(['idTipoImagen' => IcConfig::IC_IMAGE_BOLETOS]);
        if (!$boleto)
            $boleto = null;
        $xolopass = $repository->findOneBy(['idTipoImagen' => IcConfig::IC_IMAGE_XOLOPASS]);
        if (!$xolopass)
            $xolopass = null;
        $mapa = $repository->findOneBy(['idTipoImagen' => IcConfig::IC_IMAGE_SECCION_MAPA]);
        if (!$mapa)
            $mapa = null;
        $contacto = $repository->findOneBy(['idTipoImagen' => IcConfig::IC_IMAGE_CONTACTANOS]);
        if (!$contacto)
            $contacto = null;
        return $this->render('frontend/comunicacion/boletos.html.twig',[
            'boleto' => $boleto,
            'xolopass' => $xolopass,
            'mapa' => $mapa,
            'contacto' => $contacto
        ]);
    }

    public function mapa(IcImagenAppRepository $repository){
        $mapa = $repository->findOneBy(['idTipoImagen' => IcConfig::IC_IMAGE_MAPA]);
        return $this->render('frontend/comunicacion/mapa.html.twig', [
            'mapa' => $mapa
        ]);
    }
}
