<?php

namespace App\Transport;
interface MailTransportInterface{
    public function send(Message $message): bool;
}