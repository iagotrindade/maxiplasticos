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
                $_SESSION['flash'] = 'Categoria adicionada com sucesso!';
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

    public function editCategorie ($id) {
        $categorie = CategorieHandler::getCategorieById($id);

        if ($categorie) {
            $this->render('edit_categorie', [
                'loggedUser' => $this->loggedUser,
                'categorie' => $categorie
            ]);
        }

        else {
            $_SESSION['flash'] = 'Categoria não encontrada!';
    
            $this->redirect('/edit_categories', [
                "flash" => $_SESSION['flash']
            ]);
        }
    }

    public function updateCategorie() {
        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST, 'name');
        $desc = filter_input(INPUT_POST, 'desc');

        if ($id && $name && $desc) {
            $status = CategorieHandler::updateAction($id, $name, $desc);

            if ($status) {
                $_SESSION['flash'] = 'Categoria atualizada com sucesso!';
    
                $this->redirect("/edit_categorie/$id", [
                    "flash" => $_SESSION['flash']
                ]);
            }

            else {
                $_SESSION['flash'] = 'Ops, ocorreu algum problema no cadastro, tente novamente!';
    
                $this->redirect("/edit_categorie/$id", [
                    "flash" => $_SESSION['flash']
                ]);
            }
        }

        else {
            $_SESSION['flash'] = 'Preencha todos os campos!';
    
            $this->redirect("/edit_categorie/$id", [
                "flash" => $_SESSION['flash']
            ]);
        }
    }

    public function delAction ($id) {
        $status = CategorieHandler::delUser($id); 

        if($status) {
            $_SESSION['flash'] = 'Categoria excluída com sucesso!';
    
            $this->redirect('/categories', [
                "flash" => $_SESSION['flash']
            ]);
        }

        $_SESSION['flash'] = 'Tivemos um problema ao excluír a categoria!';
    
        $this->redirect('/categories', [
            "flash" => $_SESSION['flash']
        ]);
    }
}