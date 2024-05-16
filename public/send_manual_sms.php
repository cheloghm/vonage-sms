<?php
require '../src/send_sms.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    $name = $_POST['name'];
    $message = $_POST['message'];

    $result = sendSms($number, $name, $message);
    echo $result;
}
?>
