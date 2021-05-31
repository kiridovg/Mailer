//Usage example for your project
<?php declare(strict_types=1);

use App\Transport\MailTransport;
use App\Transport\Message;

require_once 'vendor/autoload.php';

$contents = [
    "{user}" => "Kirill",
    "{teg}" => "748596",
];

$mail = new MailTransport();
$mail->send(new Message('Time', 'Templates/verification-registration.php',['kiridovg@gmail.com' => 'Kirill'], ['kiridovg3@gmail.com' => 'ID'], $contents));