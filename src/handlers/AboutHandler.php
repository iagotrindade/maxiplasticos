<?php
namespace src\handlers;

class AboutHandler {
    public static function sendEmail($name, $email, $phone, $cc, $msg) {
        if($name && $email && $phone && $cc && $msg) {

            $para  = 'iagost1@hotmail.com'; 
            $assunto  = $cc;
            $corpo = $msg;
    
            $headers = 'From: '.$email.'' . "\r\n" .
                        'Reply-To: '.$email.'' . "\r\n" .
                        'Content-type: text/html; charset=utf8' . "\r\n" .
                            
                        'X-Mailer: PHP/' . phpversion();
            mail($para, $assunto, $corpo, $headers);
    
            return true;
        }
        

        else {
            return false;
        }
    }
}