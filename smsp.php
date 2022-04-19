<?php
require_once 'vendor/autoload.php';
$messagebird = new MessageBird\Client('plYu4RmMW1PGknUwC7GtC4lm0');
$message = new MessageBird\Objects\Message;
$message->originator = '+917004557615';
$message->recipients = [ '+917004557615' ];
$message->body = 'Hi! This is oloi';
$response = $messagebird->messages->create($message);
//var_dump($response);
//print_r(json_encode($response));