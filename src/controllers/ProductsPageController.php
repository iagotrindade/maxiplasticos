<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\ProductPageHandler;
use src\handlers\ProductHandler;
use src\handlers\ImageHandler;
use src\handlers\CategorieHandler;

class ProductsPageController extends Controller {
    
    public function index($id) {

        if($id) {
            $categorie = CategorieHandler::getCategorieById($id);
            $categories = CategorieHandler::getCategories();

            $products = ProductHandler::getRelatedProducts($categorie->name);

        }

        $this->render('products_page', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}