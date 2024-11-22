<?php

namespace App\Service;

class EmailService
{
    public function send($email, $message)
    {
        return (bool) random_int(0, 1);
    }
}
