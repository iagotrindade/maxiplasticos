<?php
namespace src\handlers;

use \src\models\User;

class LoginHandler {
        
    public static function checkLogin() {
        if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();
            if($data) {

                $loggedUser = new User();
                $loggedUser->id = ($data['id']);
                $loggedUser->img = ($data['image']);
                $loggedUser->name =($data['name']);
                $loggedUser->phone =($data['phone']);
                $loggedUser->email = ($data['email']);
                $loggedUser->ramal = ($data['ramal']);
                $loggedUser->privilege = ($data['privilege']);
                
                return $loggedUser;
            }
        }
        return false;
    }

    public static function verifyLogin($email, $password) {
        $user = User::select()->where('email', $email)->one();

        if($user) {
            if(password_verify($password, $user['password'])) {
                $token = md5(time().rand(0,9999).time());

                User::update()->set('token', $token)->where('email', $email)->execute();

                return $token;
            }
        }

        else {
            return false;
        }
    }

    public static function emailExists($email) {
        $user = User::select()->where('email', $email)->one();
        return $user ? true : false;
    }

    public static function recoverPassword ($email, $token) {
        if($email && $token) {
            User::update()->set('token', $token)->where('email', $email)->execute();

            $data = User::select()->where('email', $email)->one();

            if(count($data) > 0) {

                $user = new User();
                $user->id = ($data['id']);
                $user->name =($data['name']);
                
            }

            $recoverLink = '192.168.1.64/maxiplasticos/public/token='.$token.'/recover';


            $para  = $email; 
            $assunto  = 'Recuperação de senha!';
            $corpo = "Olá ".$user->name.'.'."\r\n".
            "Parece que você esqueceu sua senha de acesso do Sistema de Controle de Saída de Alunos. Mas não tem problema!<br>".
            "Clique no link abaixo para recuperar seu acesso :)"."<br><br>".
            "<a href = " . $recoverLink . '>Recupere sua senha clicando aqui!</a></br></br>' .
            "Caso não tenha sido você que solicitou essa troca de senha, pode desconsiderar esse E-mail :)<br>
            Atenciosamente, Iago Trindade - Desenvolvedor<br>
            Contato: (51) 991657516";

            $headers = 'From: iagost1@hotmail.com' . "\r\n" .
                        'Reply-To: iagost1@hotmail.com' . "\r\n" .
                        'Content-type: text/html; charset=utf8' . "\r\n" .
                        
                        'X-Mailer: PHP/' . phpversion();
            mail($para, $assunto, $corpo, $headers);
        }
    }

    public static function tokenVerify($token) {
        $token = User::select()->where('token', $token)->one();
        return $token ? true : false;
    }

    public static function updatePass ($newPassword, $token) {
        if ($newPassword && $token) {

            $hash = password_hash($newPassword, PASSWORD_DEFAULT);

            User::update()->set('password', $hash)->where('token', $token)->execute();

            $data = User::select()->where('token', $token)->one();

            if(count($data) > 0) {

                $user = new User();
                $user->id = ($data['id']);
                $user->name =($data['name']);
                $user->email =($data['email']);
                
            }

            $para  = $user->email; 
            $assunto  = 'Alteração de senha!';
            $corpo = "Olá ".$user->name.'.'."\r\n".
            "Vim te avisar que sua senha do Sistema de Controle de Saída de Alunos foi alterada!<br>
            Caso não tenha sido você, altere sua senha imediatamente ou entre em contato comigo!<br><br>
            Mas se foi você pode desconsiderar esse E-mail viu :)</br></br>
            Atenciosamente, Iago Trindade - Desenvolvedor<br>
            Contato: (51) 991657516";

            $headers = 'From: iagost1@hotmail.com' . "\r\n" .
                        'Reply-To: iagost1@hotmail.com' . "\r\n" .
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