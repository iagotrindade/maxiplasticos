<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\ProductPageHandler;
use src\handlers\ProductHandler;
use src\handlers\CategorieHandler;
use src\handlers\ImageHandler;

class ProductPageController extends Controller {

    public function productPage($id) {
        $product = ProductHandler::getProductById($id);

        $categorieFab = CategorieHandler::getCategorieByName('Fabricação');
        $categorieEsc = CategorieHandler::getCategorieByName('Escritório');
        $categorieEscol = CategorieHandler::getCategorieByName('Escolar');

        $categorie = CategorieHandler::getCategorieByName($product->category);

        $images = ImageHandler::getImages($id);

        $products = ProductHandler::getRelatedProducts($product->category);

        if(!empty($product)) {
            $this->render('product', [ 
                'product' => $product,
                'products' =>$products,
                'images' => $images,
                'categorie' => $categorie,
                'categorieFab' => $categorieFab,
                'categorieEsc' => $categorieEsc,
                'categorieEscol' => $categorieEscol
            ]);
        }
    }
}