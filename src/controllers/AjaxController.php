<?php
namespace src\controllers;

use \core\Controller;

class CartController extends Controller {
    public function index () {
        $this->redner('cart');
    }

}