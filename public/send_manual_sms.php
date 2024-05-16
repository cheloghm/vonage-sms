<?php
require '../src/send_sms.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    $name = $_POST['name'];
    $message = $_POST['message'];

    try {
        $result = sendSms($number, $name, $message);
        echo json_encode($result);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => "An error occurred: " . $e->getMessage()]);
    }
    exit;
}
?>
