<?php

namespace App\Message;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IcNotification
{
    private $message;
    private $users; 

    public function __construct(string $message, array $users )
    {
        $this->message = $message;
        $this->users    = $users;
    }

    public function getUsers()
    {
        return $this->users;
    }
    public function setUsers(array $users)
    {   
        $this->users = $users;
    }

    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message)
    {
        $this->message = $message;
    }
}
