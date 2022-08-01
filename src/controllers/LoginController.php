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

    public function index() {
        
    }

    public function recover() {
        $this->render('recover');
    }

    public function signup() {
        $this->render('signup');
    }

}