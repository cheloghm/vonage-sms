<?php
require '../vendor/autoload.php';

use Vonage\Client\Credentials\Basic;
use Vonage\Client;
use Vonage\SMS\Message\SMS;

function sendSms($to, $name, $message) {
    $basic  = new Basic('5310ab34', 'S0TRwCB13XYpxOds');
    $client = new Client($basic);

    $response = $client->sms()->send(
        new SMS($to, 'VonageAPI', "Hello $name, $message")
    );

    $message = $response->current();

    if ($message->getStatus() == 0) {
        return "The message was sent successfully\n";
    } else {
        return "The message failed with status: " . $message->getStatus() . "\n";
    }
}
?>
