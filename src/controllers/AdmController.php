<?php
namespace src\controllers;

use \core\Controller;

class AdmController extends Controller {
    

    public function index() {
        $this->render('adm-painel');
    }

}