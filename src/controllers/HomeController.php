<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\ProductHandler;

class HomeController extends Controller {

    public function index() {
        $products = ProductHandler::getProducts();

        $recentProducts = ProductHandler::getRecentProducts();

        $this->render('home', [
            'products' => $products,
            'recentProducts' => $recentProducts
        ]);
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function sobreP($args) {
        print_r($args);
    }
}