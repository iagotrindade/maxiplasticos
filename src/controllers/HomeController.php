<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\ProductHandler;

class HomeController extends Controller {

    public function index() {
        $products = ProductHandler::getProducts();

        $this->render('home', [
            'products' => $products
        ]);
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function sobreP($args) {
        print_r($args);
    }

}