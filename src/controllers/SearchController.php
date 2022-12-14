<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\SearchHandler;
use src\handlers\ProductHandler;
use src\handlers\CategorieHandler;
use src\handlers\LoginHandler;

class SearchController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = LoginHandler::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/adm-login');
        }
    }

    public function panel () {

        $term = filter_input(INPUT_GET, 'searching');

        if(empty($term)) {

            $_SESSION['flash'] = 'Ops, você não digitou nada no campo de busca!';

            $this->redirect('/products');
        }

        $categories = CategorieHandler::getCategories();

        if (!empty($products = ProductHandler::searchProducts($term))) {

            $_SESSION['flash'] = 'Exibindo os produtos encontrados para '.$term.'';
            
            $this->render('/search', [
                'loggedUser' => $this->loggedUser,
                'searchTerm' => $term,
                'products' => $products,
                'categories' => $categories
            ]);

        } 

        else {
            $_SESSION['flash'] = 'Nenhum produto encontrado para '.$term.'';

            $this->render('/search', [
                'loggedUser' => $this->loggedUser,
                'searchTerm' => $term,
                'products' => $products,
                'categories' => $categories
            ]);
        }
    }


    public function panelCode () {

        $term = filter_input(INPUT_GET, 'searching');

        if(empty($term)) {

            $_SESSION['flash'] = 'Ops, você não digitou nada no campo de busca!';

            $this->redirect('/products');
        }

        $categories = CategorieHandler::getCategories();

        if (!empty($products = ProductHandler::searchProductsByCode($term))) {

            $_SESSION['flash'] = 'Exibindo os produtos encontrados para '.$term.'';
            
            $this->render('/search', [
                'loggedUser' => $this->loggedUser,
                'searchTerm' => $term,
                'products' => $products,
                'categories' => $categories
            ]);

        } 

        else {
            $_SESSION['flash'] = 'Nenhum produto encontrado para '.$term.'';

            $this->render('/search', [
                'loggedUser' => $this->loggedUser,
                'searchTerm' => $term,
                'products' => $products,
                'categories' => $categories
            ]);
        }
    }

    public function site() {
        $term = filter_input(INPUT_GET, 'procurando_por');

        $categories = CategorieHandler::getCategories();

        $categorieFab = CategorieHandler::getCategorieByName('Fabricação');
        $categorieEsc = CategorieHandler::getCategorieByName('Escritório');
        $categorieEscol = CategorieHandler::getCategorieByName('Escolar');

        if (!empty($products = ProductHandler::searchProducts($term))) {

            $_SESSION['flash'] = 'Exibindo os produtos encontrados para '.$term.'';
            
            $this->render('/busca', [
                'loggedUser' => $this->loggedUser,
                'searchTerm' => $term,
                'products' => $products,
                'categories' => $categories,
                'categorieFab' => $categorieFab,
                'categorieEsc' => $categorieEsc,
                'categorieEscol' => $categorieEscol
            ]);

        } 

        else {
            $_SESSION['flash'] = 'Nenhum produto encontrado para '.$term.'';

            $this->render('/busca', [
                'loggedUser' => $this->loggedUser,
                'searchTerm' => $term,
                'products' => $products,
                'categories' => $categories,
                'categorieFab' => $categorieFab,
                'categorieEsc' => $categorieEsc,
                'categorieEscol' => $categorieEscol
            ]);
        }
    }
}