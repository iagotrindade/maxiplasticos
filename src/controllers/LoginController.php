<?php
namespace src\controllers;

use \core\Controller;

class LoginController extends Controller {

    public function index() {
        
    }

    public function recover() {
        $this->render('recover');
    }

    public function signup() {
        $this->render('signup');
    }

}