<?php
//a day ago
function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

//send mail

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendEmail(string $address,string $subject,string $htmlBody)
{
    $mail = new PhpMailer();
    try {
        $mail->isSMTP();
        $mail->SMTPKeepAlive = true;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        
        $mail->Port = 587;
        $mail->Host = "smtp.gmail.com";

        //Your email
        $mail->Username = "";
        //Your email password
        $mail->Password = "";



        //Recipients
        $mail->setFrom('info@blog.com',"blog.com");
        $mail->addAddress($address);    
 
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $htmlBody;

        $mail->send();
        return 'Mail has been sent.Check your email';
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
