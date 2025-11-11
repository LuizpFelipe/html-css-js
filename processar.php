<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP();
    $mail->Host       = 'mail.renatoangelo.com.br';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'send@renatoangelo.com.br';
    $mail->Password   = '@BiancaNicole1234*';
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('send@renatoangelo.com.br', 'Projeto Ronronar');
    $mail->addAddress('bianca.236642-2024@aluno.unicv.edu.br', 'Contato ONG Ronronar');

    $mail->isHTML(true);
    $mail->Subject = 'Novo contato pelo site';
    $mail->Body    = "
        <h3>Nova mensagem recebida pelo site:</h3>
        <p><b>Nome:</b> {$nome}</p>
        <p><b>E-mail:</b> {$email}</p>
        <p><b>Telefone:</b> {$telefone}</p>
        <p><b>Mensagem:</b><br>{$mensagem}</p>
    ";

    $mail->AltBody = "Nova mensagem recebida pelo site:\n
    Nome: {$nome}\n
    E-mail: {$email}\n
    Telefone: {$telefone}\n
    Mensagem:\n{$mensagem}";

    if ($mail->send()) {
        header("Location: https://ronronar.renatoangelo.com.br/?msg=1#formulario");
    } else {
        echo 'Erro ao enviar: ' . $mail->ErrorInfo;
    }
}
