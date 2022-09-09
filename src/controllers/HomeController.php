<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\ProductHandler;
use src\handlers\CategorieHandler;

class HomeController extends Controller {

    public function index() {
        $products = ProductHandler::getProducts();

        $categorieFab = CategorieHandler::getCategorieByName('Fabricação');
        $categorieEsc = CategorieHandler::getCategorieByName('Escritório');
        $categorieEscol = CategorieHandler::getCategorieByName('Escolar');

        $recentProducts = ProductHandler::getRecentProducts();

        $this->render('home', [
            'products' => $products,
            'recentProducts' => $recentProducts,
            'categorieFab' => $categorieFab,
            'categorieEsc' => $categorieEsc,
            'categorieEscol' => $categorieEscol
        ]);
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function sobreP($args) {
        print_r($args);
    }
}