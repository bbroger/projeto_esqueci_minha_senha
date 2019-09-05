<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'assets/libs/php-mailer/PHPMailer.php';
require_once 'assets/libs/php-mailer/Exception.php';
require_once 'assets/libs/php-mailer/SMTP.php';

class Email
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->CharSet = "UTF-8";
        // $this->mail->SMTPDebug = 2;
        $this->mail->isSMTP();
        $this->mail->Host = 'email-ssl.com.br';
        $this->mail->Username = 'naoresponder@laboratoriounilab.com.br';
        $this->mail->Password = 'respostaunilab';
        $this->mail->SMTPAuth = true;
        $this->mail->Port = 465;
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->setFrom('naoresponder@laboratoriounilab.com.br', 'postmaster');
        $this->mail->isHTML(true);
    }

    public function addAddress($address)
    {
        $this->mail->addAddress($address);
    }

    public function setMessage($subject, $message)
    {
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->AltBody = strip_tags($message);
    }

    public function sendMessage()
    {
        if ($this->mail->send()) {
            return true;
        } else {
            return false;
        }
    }
}
