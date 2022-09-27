<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\CategorieHandler;

class CartController extends Controller {

    public function index () {
        $categorieFab = CategorieHandler::getCategorieByName('Fabricação');
        $categorieEsc = CategorieHandler::getCategorieByName('Escritório');
        $categorieEscol = CategorieHandler::getCategorieByName('Escolar');

        $this->render('cart', [
            'categorieFab' => $categorieFab,
            'categorieEsc' => $categorieEsc,
            'categorieEscol' => $categorieEscol
        ]);
    }

}