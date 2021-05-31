<?php

namespace App\Transport;
use Swift_Mailer;
use Swift_SmtpTransport;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
class MailTransport implements MailTransportInterface
{
    public function send(Message $message): bool
    {
        $config = parse_ini_file('config/config.ini');
// create a log channel
        $log = new Logger($config['name']);
        $log->pushHandler(new StreamHandler($config['stream'], Logger::WARNING));

        $transport = (new Swift_SmtpTransport($config['host'], $config['port'], $config['encryption']))
            ->setUsername($config['user'])
            ->setPassword($config['password']);

// Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

// Create a message

        $log->warning('Отправлено сообщение');
// Send the message
        return (bool) $mailer->send($message->message);

    }
}