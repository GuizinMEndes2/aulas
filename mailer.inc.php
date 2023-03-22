<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exeception;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'guilhermemendesm452@gmail.com';
$mail->MSTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port= 578; 