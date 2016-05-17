<?php

require 'vendor/autoload.php';

if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
    // secret key from googl recaptcha
  $secret = '6Lcm_RoTAAAAACmSbMWYaaxFtZPDrRHOKyd_0ZL9';
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
    $arr = json_decode($rsp, true);
    if ($arr['success']) {
        if (!isset($_POST['name']) or  empty($_POST['name'])) {
            header('Location: /');
            exit;
        } else {
            $name = htmlspecialchars($_POST['name']);
        }

        if (!isset($_POST['email']) or empty($_POST['email'])) {
            header('Location: /');
            exit;
        } else {
            $email = htmlspecialchars($_POST['email']);
        }
        if (!isset($_POST['subject']) or empty($_POST['subject'])) {
            header('Location: /');
            exit;
        } else {
            $subject = htmlspecialchars($_POST['subject']);
        }

        if (!isset($_POST['message']) or empty($_POST['message'])) {
            header('Location: /');
            exit;
        } else {
            $message = htmlspecialchars($_POST['message']);
        }
    //var_dump($message);

    $mensaje = '<h2>Nuevo mensaje</h2>';
        $mensaje .= '<p>-------------------------------------------</p>';
        $mensaje .= '<p>Remitente: <strong>'.$name.'</strong></p>';
        $mensaje .= '<p>correo: '.$email.'</p>';
        $mensaje .= '<p><br /></p>';
        $mensaje .= '<p>-------------------------------------------</p>';
        $mensaje .= '<p>Asunto del mensaje: <strong>'.$subject.'</strong></p>';
        $mensaje .= '<p><br /></p>';
        $mensaje .= '<p>-------------------------------------------</p>';
        $mensaje .= '<p>'.$message.'</p>';
        $mensaje .= '<p>-------------------------------------------</p>';
        $mensaje .= '<p>Mensaje enviado desde Armonía Tonal Moderna</p>';

    //PHPMailer Object
    $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
    //Enable SMTP debugging.
    $mail->SMTPDebug = false;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name
    $mail->Host = 'r13-dallas.webserversystems.com';
    //Set this to true if SMTP host requires authentication to send email

    $mail->SMTPAuth = true;
    //Provide username and password
    $mail->Username = 'sys@playcreativepiano.com';
        $mail->Password = 'LUwZZRLTvLgoc4S45W';
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = 'tls';
    //Set TCP port to connect to
    $mail->Port = 2525;

    //From email address and name
    $mail->From = 'sys@playcreativepiano.com';
        $mail->FromName = 'ATM Web';

    //To address and name
    $mail->addAddress('sys@playcreativepiano.com', 'No-Reply');
        $mail->addAddress('carlosvazquez@outlook.com', 'Development'); //Recipient name is optional
    $mail->addAddress('pianocreativ@yahoo.com', 'Piano Creativo'); //Recipient name is optional

    //Address to which recipient will reply
    $mail->addReplyTo($email, $name);

    //CC and BCC
    //$mail->addBCC("carlosvazquez@outlook.com");
    //$mail->addBCC("carlosvazquezmurillo@gmail.com");

    //Send HTML or Plain Text email
    $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body = $mensaje;
        $mail->AltBody = $mensaje;

        if (!$mail->send()) {
            echo 'Mailer Error: '.$mail->ErrorInfo;
        } else {
            header('Location: ../gracias');
        }
    } else {
        header('Location: /');
    }
}
