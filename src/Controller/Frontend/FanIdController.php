<?php

namespace App\Controller\Frontend;

use App\Entity\IcFan;
use App\Form\IcFanType;
use App\IcUtils\IcConfig;
use App\IcUtils\IcSendMail;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Endroid\QrCode\Builder\BuilderInterface;
use Endroid\QrCodeBundle\Response\QrCodeResponse;


class FanIdController extends AbstractController
{

    /**
     * @Route("/storePost", name="post.store")
     * @param Request $request
     */
    public function new(Request $request, EntityManagerInterface $em, MailerInterface $mailer): Response
    {
        $em->beginTransaction();
        try{
            $fan = new IcFan();
            $form = $this->createForm(IcFanType::class, $fan);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $fan->setToken(sha1(IcConfig::FAN_ID_SECRET .  $form->get('email')->getData() ));
                $em->persist($fan);
                $em->flush($fan);
                $em->commit();

                $array = [
                    'to'        => $form->get('email')->getData(),
                    'subject'   => 'Bienvenido Registro Xoloitzcuintle',
                    'token'     => $fan->getToken()
                ];
                $return = IcSendMail::send($mailer, $array);

                if ($return == false)
                    return $this->json(['message' => 'Ocurrio un error intentelo más tarde -1']);

                return $this->json('Se ha enviado un correo de confirmación, verifique su correo electronico.', 5000);
            }

            return $this->render('frontend/fan/register.html.twig', [
                'form' => $form,
            ]);

        }catch (\Exception $eme){
            $em->rollback();
            return $this->json(['message' => 'Ocurrio un error intentelo más tarde -2', 'error' => $eme->getTrace()]);
        }
    }

    /**
     * @Route("/valida/fanid/{token}", name="fanid.validatet.oken")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param MailerInterface $mailer
     * @param BuilderInterface $builder
     * @return bool
     */
    public function validateToken(Request $request, EntityManagerInterface $em, MailerInterface $mailer ): bool
    {
//        try{
//            $token = $request->get('token');
//            $t = $em->getRepository(IcFan::class)->findOneBy(['token' => $token]);
//
//            if(!$t)
//                throw $this->createNotFoundException('Token invalido, verifique su correo electronico');
//
//            $t->setIsValid(true);
//            $t->setUpdateAt(new \DateTime('now'));
//            $t->setQrImage($token . '.png');
//            $em->persist($t);
//            $em->flush();
//
//            //generate the qr code and send an email
//            $qr_code = $this->generateQrCode($builder, $t->getQrImage());
//
//            if($qr_code == false)
//                return $this->json(['message' => 'Ocurrio un error al generar su QR -3']);
//
//            $array = ['to' => $t->getEmail(), 'subject' => 'Codigo QR de Acceso.', 'codigo_qr' => $t->getQrImage()];
//            //send email
//            $return = IcSendMail::send($mailer, $array);
//
//            if($return == false)
//                return $this->json(['message' => 'Ocurrio un error al generar su QR']);
//
//            return $this->json(['message' => 'Validación exitosa, en breve recibira un correo con su codigo QR']);
//
//        }catch (Exception $e){
//            return false;
//        }

        return true;
    }

//    public function generateQrCode(BuilderInterface $customQrCodeBuilder, $qr_name)
//    {
//        try{
//            $result = $customQrCodeBuilder
//                ->size(300)
//                ->margin(10)
//                ->data($qr_name)
//                ->build();
//            $result->saveToFile( $this->getParameter('kernel.project_dir') . '/public/images/fanid/' . $qr_name);
//        }catch (\Exception $e){
//            return false;
//        }
//    }

    /**
     * @Route("/postform", name="post.form")
     */
    public function renderizado(){
        $form = $this->createForm(IcFanType::class);

        $view = $this->renderView('frontend/fan/form.html.twig', [
            'form' => $form->createView(),
        ]);

        return $this->json([
            'form' => $view,
            'title' => 'Registro FanID'
        ]);
    }
}
