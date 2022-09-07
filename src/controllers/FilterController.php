<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\ProductHandler;
use src\handlers\CategorieHandler;
use src\handlers\LoginHandler;


class FilterController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = LoginHandler::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/adm-login');
        }
    }

    public function index($id) {
        
        $categories = CategorieHandler::getCategories();

        $categorie = CategorieHandler::getCategorieById($id);

        
        if (!empty($products = ProductHandler::getRelatedProducts($categorie->name))) {

            $_SESSION['flash'] = 'Exibindo produtos da categoria '.$categorie->name.'';

            $this->render('filter', [
                'loggedUser' => $this->loggedUser,
                'products' => $products,
                'categories' => $categories
            ]);
        }

        else {
            $_SESSION['flash'] = 'Nenhum produto encontrado na categoria '.$categorie->name.'';

            $this->render('filter', [
                'loggedUser' => $this->loggedUser,
                'products' => $products,
                'categories' => $categories
            ]);
        }
    }
} 