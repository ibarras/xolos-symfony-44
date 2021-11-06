<?php

namespace App\MessageHandler;

use App\Message\IcNotification;

class IcNotificationHandler { 

    public function __invoke(IcNotification $message)
    {
        print_r('Notificacion enviada');
    }

}