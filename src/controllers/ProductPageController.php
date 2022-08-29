<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\ProducPagetHandler;
use src\handlers\ProductHandler;

class ProductPageController extends Controller {

    public function productPage($id) {
        $product = ProductHandler::getProductById($id);

        $products = ProductHandler::getRelatedProducts($product->category);

        $this->render('product', [
            'product' => $product,
            'products' =>$products
        ]);
    }
}