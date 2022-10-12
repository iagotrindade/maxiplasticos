<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\SearchHandler;
use src\handlers\ProductHandler;
use src\handlers\CategorieHandler;
use src\handlers\LoginHandler;

class SiteSearchController extends Controller {

    public function site() {
        $term = filter_input(INPUT_GET, 'procurando_por');

        $categories = CategorieHandler::getCategories();

        $categorieFab = CategorieHandler::getCategorieByName('Fabricação');
        $categorieEsc = CategorieHandler::getCategorieByName('Escritório');
        $categorieEscol = CategorieHandler::getCategorieByName('Escolar');

        if (!empty($products = ProductHandler::searchProducts($term))) {

            $_SESSION['flash'] = 'Exibindo os produtos encontrados para '.$term.'';
            
            $this->render('/busca', [
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