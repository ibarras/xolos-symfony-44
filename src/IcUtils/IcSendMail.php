<?php


namespace App\IcUtils;

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use App\IcUtils;

class IcSendMail
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    static function send(MailerInterface $mailer, $array): bool
    {
        try {
            $email = (new TemplatedEmail())
                ->from(IcConfig::NOREPLY_USER)
                ->to($array['to'])
                ->subject($array['subject'])
                // path of the Twig template to render
                ->htmlTemplate('frontend/emails/register.html.twig')
                ->context([
                    'data_to_templat' => 'data',
                    'username' => 'foo',
                ]);

            $mailer ->send($email);
            return true;
        } catch (TransportExceptionInterface $efe) {
            return false;
        }
    }
}