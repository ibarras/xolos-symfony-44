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
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function storePos(Request $request, EntityManagerInterface $em, MailerInterface $mailer): Response
    {
        $em->beginTransaction();
        try{
            $fan = new IcFan();
            $form = $this->createForm(IcFanType::class, $fan);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $fan->setToken(sha1(IcConfig::FAN_ID_SECRET . $form->getData('email')));
                $em->persist($fan);
                $em->flush($fan);
                $em->commit();

                $array = ['to' => $form->getData('email'), 'subject' => 'Bienvenido Registro Xoloitzcuintle'];
                $return = IcSendMail::send($mailer, $array);

                if ($return == false)
                    return $this->json(['message' => 'Ocurrio un error intentelo más tarde -1']);

                return $this->json(['message' => 'Se ha enviado un correo de confirmación, verifique su correo electronico.']);
            }

            return $this->render('frontend/fan/register.html.twig', [
                'form' => $form,
            ]);

        }catch (\Exception $eme){
            $em->rollback();
            return $this->json(['message' => 'Ocurrio un error intentelo más tarde -2']);
        }
    }

    public function validateToken(Request $request, EntityManagerInterface $em, MailerInterface $mailer, BuilderInterface $builder): bool
    {
        try{
            $token = $request->get('token');
            $t = $em->getRepository(IcFan::class)->findOneBy(['token' => $token]);

            if(!$t)
                throw $this->createNotFoundException('Token invalido, verifique su correo electronico');

            $t->setIsValid(true);
            $t->setUpdateAt(new \DateTime('now'));
            $t->setQrImage($token . '.png');
            $em->persist($t);
            $em->flush();

            //generate qr code and send an email
            $qr_code = $this->generateQrCode($builder,  IcConfig::IC_URL_IMAGE_FANID, $t->getQrImage());

            if($qr_code == false)
                return $this->json(['message' => 'Ocurrio un error al generar su QR -3']);

//            $array = ['to' => $t->getEmail(), 'subject' => 'Codigo QR de Acceso.', 'codigo_qr' => $t->getQrImage()];
//            //send email
//            $return = IcSendMail::send($mailer, $array);
//
//            if($return == false)
//                return $this->json(['message' => 'Ocurrio un error al generar su QR']);

            return $this->json(['message' => 'Validación exitosa, en breve recibira un correo con su codigo QR']);

        }catch (Exception $e){
            return false;
        }

        return true;
    }

    public function generateQrCode(BuilderInterface $customQrCodeBuilder, string $url, $qr_name)
    {
        try{
            $result = $customQrCodeBuilder
                ->size(300)
                ->margin(10)
                ->data($url)
                ->build();
            $result->saveToFile( $this->getParameter('kernel.project_dir') . '/public/images/fanid/' . $qr_name);
        }catch (\Exception $e){
            return false;
        }
    }


}
