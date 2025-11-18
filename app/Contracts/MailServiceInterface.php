<?php

namespace App\Contracts;

interface MailServiceInterface
{
    public function send($message);
}