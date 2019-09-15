<?php
require 'vendor/autoload.php';
require 'mail_data.php';
require 'vars.php';
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom($from, "Cool Guy");
$email->setSubject($subject);
$email->addTo($recipient, "Lluís Camps");
$email->addContent("text/plain", $message);
// $email->addContent(
//     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
// );

$sendgrid = new \SendGrid($email_host_password);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}