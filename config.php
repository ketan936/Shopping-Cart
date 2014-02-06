<?php
require_once('phpmailer/class.phpmailer.php');
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "elmagnefico";
$dbdatabase = "blogtastic";
$verifyurl = "http://172.37.3.156/views/verify.php";

// Add your blog name below
$config_blogname = "Funny old world";

// Add your name below
$config_author = "Jono Bacon";

// Add the location of your blog below
$config_basedir = "http://172.37.3.156/views";
$config_basedir1 = "172.37.3.156/views/";

$mail             = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth   = true;
$mail->SMTPSecure = "tls";
$mail->Username   = "ketan936@gmail.com";
$mail->Password   = "9110031674";          
$mail->Host       = "smtp.gmail.com";
$mail->Port       = 587;           

$mail->SetFrom('ketan936@gmail.com', 'Ketan');
$mail->Subject    = "User Verification";


    

?>

