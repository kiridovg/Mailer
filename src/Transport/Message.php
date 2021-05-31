<?php

namespace App\Transport;

use Swift_Message;

class Message
{
    public $message;
    public $body;

    public function __construct($subject, $body,  $to, $from, $contents)
    {
        $this->body = file_get_contents($body, true);
        $this->render($contents);
        $this->message = (new Swift_Message($subject))
            ->setFrom($from)
            ->setTo($to)
            ->setBody($this->body, 'text/html');
    }

    public function render($contents)
    {
        foreach ($contents as $key => $val) $this->body = str_replace($key, $val, $this->body);
    }
}