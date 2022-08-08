<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class LoginController extends Controller {

    public function signin() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        
        $this->render('adm' , [
            'flash' => $flash
        ]);
    }

    public function signinAction() {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if($email && $password) {
            $token = LoginHandler::verifyLogin($email, $password);
            if($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/adm-panel');
            }

            else {
                $_SESSION['flash'] = "Usuário e/ou senha não conferem!";
                $this->redirect('/adm-login');
            }
        }

        else {
            $_SESSION['flash'] = 'Digite os campos de Usuário e/ou senha!';
            $this->redirect('/adm-login');
        }
    }

    public function recover() {
        $this->render('recover');
    }
    
    public function recoverAction () {
        $email = filter_input(INPUT_POST, 'email');

        if ($email) {
            if (LoginHandler::emailExists($email)) {

                $token = md5(time().rand(0,9999).time());
                
                $this->user = LoginHandler::recoverPassword($email, $token);

                $_SESSION['flashSuccess'] = 'E-mail enviado!';

                $this->render('/recover', [
                    'email' => $email,
                    'warningSuccess' => $_SESSION['flashSuccess'],
                    'user' => $this->user
                ]);

                $_SESSION['flashSuccess'] = '';
            }

            else {
                $_SESSION['flash'] = 'E-mail não cadastrado';
                
                $this->redirect('/recover', [
                    'flash' => $_SESSION['flash']
                ]);

                $_SESSION['flash'] = '';
            }
        }
    }

    public function passwordChange ($token) {

        if (LoginHandler::tokenVerify($token) === true) {
            $_SESSION['token'] = $token;

            $this->render('change_password', [
                'token' => $_SESSION['token']
            ]);
        }

        else {
            $_SESSION['flash'] = 'Token de acesso inválido, tente outra vez!';
                
                $this->redirect('/recover', [
                    'flash' => $_SESSION['flash']
                ]);

                $_SESSION['flash'] = '';
        }
    }

    public function updatePassword () {

        $newPass = filter_input(INPUT_POST, 'password');
        $token = filter_input(INPUT_POST, 'token');

        if (!empty($newPass)) {

            if(LoginHandler::updatePass($newPass, $token) === true)  {
                $_SESSION['flashSuccess'] = 'Senha alterada com sucesso!';

                $this->render('signin', [
                    'flashSuccess' =>  $_SESSION['flashSuccess']
                ]);

                $_SESSION['flashSuccess'] = '';
            };
        }   
    }
    
    public function signup() {
        $this->render('signup');
    }

}