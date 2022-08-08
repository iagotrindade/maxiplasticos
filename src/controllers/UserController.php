<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;

class UserController extends Controller {
    private $loggedUser;

    public function __construct() {
        $this->loggedUser = LoginHandler::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/adm-login');
        }
    }
    
    public function index() {
        $this->render('users', [
            'loggedUser' => $this->loggedUser
        ]);
    }

}