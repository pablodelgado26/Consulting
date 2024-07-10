<?php

    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $telefone = addslashes($_POST['telefone']);
    $mensagem = addslashes($_POST['mensagem']);

    $para = "md.spconsultoria@gmail.com"
    $assunto = "Coleta de dados site consultorias";

    $corpo = "Nome: ".$nome."\n"."E-mail: ".$email."\n"." Telefone: ".$telefone."\n"."Mensagem: ".$mensagem;

    $cabeca = "From: teste@formulario.com"."\r\n"."Reply-To: ".$email."\n"."X-Mailer: PHP/".phpversion();

    if(mail($para, $assunto, $corpo, $cabeca, $mensagem)){
        echo("E-mail enviado com sucesso!");
    }else{
        echo("O e-mail não pode ser enviado");
    }

?>