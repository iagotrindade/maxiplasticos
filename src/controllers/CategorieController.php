<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;
use src\handlers\CategorieHandler;

class CategorieController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = LoginHandler::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/adm-login');
        }
    }
    
    public function index () {

        $categories = CategorieHandler::getCategories();

        $this->render('categories', [
            'loggedUser' => $this->loggedUser,
            'categories' => $categories
        ]);
    }


    public function addAction () {
        $name = filter_input(INPUT_POST, 'name');
        $desc = filter_input(INPUT_POST, 'desc');

        if($name && $desc) {
            $status = CategorieHandler::addCategorie($name, $desc);
    
            if($status) {
                $_SESSION['flash'] = 'Categoria adicionado com sucesso!';
                $this->redirect('/categories', [
                    'flash' => $_SESSION['flash']
                ]);
            }
    
            else {
                $_SESSION['flash'] = 'Ops, ocorreu algum problema no cadastro, tente novamente!';
                $this->redirect('/categories', [
                    'flash' => $_SESSION['flashError']
                ]);
            }
        }

        else {
            $_SESSION['flash'] = 'Informe os campos de NOME e DESCRIÇÃO!';
    
            $this->redirect('/categories', [
                "flash" => $_SESSION['flash']
            ]);
        }
    }
}