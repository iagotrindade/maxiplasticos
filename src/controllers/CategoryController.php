<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;

class CategoryController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = LoginHandler::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/adm-login');
        }
    }
    
    public function index () {
        $this->render('categories', [
            'loggedUser' => $this->loggedUser
        ]);
    }

}