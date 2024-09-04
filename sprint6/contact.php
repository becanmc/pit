<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/vendor/autoload.php';

$mail = new PHPMailer();


$mail->isSMTP();


$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->Host = 'smtp.gmail.com';

$mail->Port = 587; // ou 587

$mail->SMTPSecure = 'tls';


$mail->SMTPAuth = true;

$mail->Username = 'sofia.fernandesfs4@gmail.com';

$mail->Password = 'ovjl zihd halz bbyc';

if (isset($_POST["send-email"])) {

    $userEmail = $_POST["email"];
    $userMessage = $_POST["mensagem"];
    $userSubject = $_POST["assunto"];
    $userName = $_POST["nome"];



    $message = '<p>' . $userMessage . '</p>';
    $subject = $userSubject;

    $mail->setFrom($userEmail, $userName);
    $mail->addReplyTo($userEmail, $userName);
    
    $mail->addAddress('sofia.fernandesfs4@gmail.com');
    
    $mail->Subject = $subject;
    
    $mail->msgHTML($message);

    if (!$mail->send()) {
        echo 'Erro ao enviar o e-mail: '. $mail->ErrorInfo;
        exit();
    } else {
        echo 'E-mail enviado com sucesso para nossa equipe' ;
        header("Location: login.php?email=emailenviado");
        
    }

} else {
    header("Location: login.php");
    exit();
}
?>

