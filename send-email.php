<?php

require_once './vendor/autoload.php';

$username = 'USERNAME';
$password = 'PASSWORD';
$sentTo = 'SENDTO@gmail.com';

$phone = $_POST['phone'];
$email = $_POST['email'];

$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername($username)
  ->setPassword($password);

$mailer = new Swift_Mailer($transport);

$message = (new Swift_Message('Письмо'))
  ->setFrom($username)
  ->setTo($sentTo)
  ->setBody('Телефон: ' . $phone . '. Email: ' . $email);

$result = $mailer->send($message);

header('Location: /');