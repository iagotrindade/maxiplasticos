<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\ProductHandler;
use src\handlers\CategorieHandler;

class HomeController extends Controller {

    public function index() {
        $fabricProducts = ProductHandler::getProductByCategory('Fabricação');

        $categorieFab = CategorieHandler::getCategorieByName('Fabricação');
        $categorieEsc = CategorieHandler::getCategorieByName('Escritório');
        $categorieEscol = CategorieHandler::getCategorieByName('Escolar');

        $recentProducts = ProductHandler::getRecentProducts();
        
        $this->render('home', [
            'fabricProducts' => $fabricProducts,
            'recentProducts' => $recentProducts,
            'categorieFab' => $categorieFab,
            'categorieEsc' => $categorieEsc,
            'categorieEscol' => $categorieEscol
        ]);

    }
}