<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\ProducPagetHandler;

class ProductPageController extends Controller {

    public function productPage($id) {
        $this->render('product');
    }
}