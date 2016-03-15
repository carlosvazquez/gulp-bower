<?php
require 'vendor/autoload.php';

if (!isset($_POST["name"]) or  empty($_POST["name"])) {
  header("Location: /");
  exit;
} else {
  $name = htmlspecialchars($_POST["name"]);
}

if (!isset($_POST["email"]) or empty($_POST["email"]) ) {
  header("Location: /");
  exit;
} else {
  $email = htmlspecialchars($_POST["email"]);
}
if (!isset($_POST["subject"]) or empty($_POST["subject"]) ) {
  header("Location: /");
  exit;
} else {
  $subject = htmlspecialchars($_POST["subject"]);
}

if (!isset($_POST["message"]) or empty($_POST["message"]) ) {
  header("Location: /");
  exit;
} else {
  $message = htmlspecialchars($_POST["message"]);
}
//var_dump($message);


$mensaje = "<h2>Nuevo mensaje</h2>";
$mensaje .= "<p>Remitente: <strong>".$name."</strong></p>";
$mensaje .= "<p>correo: ".$email."</p>";
$mensaje .= "<p><br /></p>";
$mensaje .= "<p>Asunto del mensaje: <strong>".$subject."</strong></p>";
$mensaje .= "<p><br /></p>";
$mensaje .= "<p>".$message."</p>";
$mensaje .= "<p>Mensaje enviado desde Armonía Tonal Moderna</p>";

//PHPMailer Object
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
//Enable SMTP debugging.
$mail->SMTPDebug = false;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "mail.playcreativepiano.com";
//Set this to true if SMTP host requires authentication to send email

$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "sys@playcreativepiano.com";
$mail->Password = "LUwZZRLTvLgoc4S45W";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 2525;

//From email address and name
$mail->From = "sys@playcreativepiano.com";
$mail->FromName = "ATM Web";

//To address and name
$mail->addAddress("sys@playcreativepiano.com", "Dirección");
$mail->addAddress("carlosvazquez@outlook.com", "Dev"); //Recipient name is optional
//$mail->addAddress("carlosvazquezmurillo@gmail.com", "Dev"); //Recipient name is optional

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

if(!$mail->send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    header("Location: ../gracias.html");
}
