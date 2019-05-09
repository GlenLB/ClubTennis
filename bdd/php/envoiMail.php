<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

$rootDir = getenv("TENNISROOTDIR");
require $rootDir . '/bdd/php/PHPMailer/src/Exception.php';
require $rootDir . '/bdd/php/PHPMailer/src/PHPMailer.php';
require $rootDir . '/bdd/php/PHPMailer/src/SMTP.php';

// Définition du type MIME du fichier pour retour AJAX
header("Content-type: text/plain");

// Récupération de l'adresse email de l'utilisateur
$emailUtilisateur = $_POST["email"];
$message = $_POST["message"];
if (strlen(email) < 5 || strlen($message) <= 10) {
    echo ("Adresse email ou message incorrect");
    exit();
}

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$sender = "lebaill.glen@gmail.com";
$pass = getenv("GMAIL_PASS");

try {
//Server settings
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = $sender; // SMTP username
    $mail->Password = $pass; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

//Recipients
    $mail->setFrom($emailUtilisateur, 'Mailer');
//Set who the message is to be sent to
    $mail->addAddress('lebaill.glen@gmail.com');

// Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Email envoyé depuis Earthloader';
    $mail->Body = $message;
    $mail->AltBody = $message;

    $mail->send();
    echo 'Message envoyé';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
