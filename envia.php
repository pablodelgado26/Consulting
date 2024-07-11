<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include ("includes/config.php");
include ("vendor/autoload.php");

require 'vendor/autoload.php';

if (isset($_POST['Enviar'])){
$mail = new PHPMailer(true);

    try {                     
    $mail->isSMTP();                                            
    $mail->Host       = SMTP_HOST;                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = SMTP_USER;                     
    $mail->Password   = SMTP_PASS;                                         
    $mail->Port       = SMTP_PORT;       

    $mail->setFrom('md.spconsultoria@gmail.com', 'consultoria');
    $mail->addAddress('md.spconsultoria@gmail.com', 'Mônica Delgado');    

    $mail->Subject = 'mensagem site consultoria';
    $mail->isHTML(true);
    $body = "Mensagem enviada através do site, segue informações abaixo: <br><br>
    nome: ". $_POST['nome']."<br>
    email: ". $_POST['email']."<br>
    telefone: ". $_POST['telefone']."<br>
    mensagem: ". $_POST['mensagem'];

    $mail->Body    = $body;

    $mail->send();
    echo 'E-mail enviado com sucesso!';
    } catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
}else{
    echo "Erro ao enviar o e-mail, acesso não foi via formulário: {$mail->ErrorInfo}";
}

?>