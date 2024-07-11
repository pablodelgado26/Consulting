<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['Enviar'])){
$mail = new PHPMailer(true);

    try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'md.spconsultoria@gmail.com';                     
    $mail->Password   = 'Md091104';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 8080;       

    $mail->setFrom('md.spconsultoria@gmail.com', 'Mailer');
    $mail->addAddress('md.spconsultoria@gmail.com', 'Mônica Delgado');    
    $mail->addReplyTo('md.spconsultoria@gmail.com', 'Information');
    $mail->isHTML(true);                                  
    $mail->Subject = 'mensagem site consultoria';

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