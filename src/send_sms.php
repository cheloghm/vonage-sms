<?php
require '../vendor/autoload.php';

use Vonage\Client\Credentials\Basic;
use Vonage\Client;

function sendSms($to, $name, $message) {
    $basic = new Basic('5310ab34', 'S0TRwCB13XYpxOds'); #("API_KEY", "API_SECRET")
    $client = new Client($basic);

    try {
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($to, 'VonageAPI', "Hello $name, $message")
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            return ['status' => 'success', 'message' => "Message sent to $name ($to)"];
        } else {
            return ['status' => 'error', 'message' => "Message failed with status: " . $message->getStatus()];
        }
    } catch (\Exception $e) {
        return ['status' => 'error', 'message' => "An error occurred: " . $e->getMessage()];
    }
}
?>
