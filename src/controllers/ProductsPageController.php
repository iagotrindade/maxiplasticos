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

            $categories = CategorieHandler::getCategories();

            $categorieFab = CategorieHandler::getCategorieByName('Fabricação');
            $categorieEsc = CategorieHandler::getCategorieByName('Escritório');
            $categorieEscol = CategorieHandler::getCategorieByName('Escolar');

            if(in_array('recentes', $id)) {
                
                $products = ProductHandler::getRecentProducts();

                $_SESSION['flash'] = 'Exbindo os produtos mais recentes';

                $this->render('products_page', [
                    'products' => $products,
                    'categories' => $categories,
                    'categorieFab' => $categorieFab,
                    'categorieEsc' => $categorieEsc,
                    'categorieEscol' => $categorieEscol
                ]);
            }

            else {
                $categorie = CategorieHandler::getCategorieById($id);
    
                $products = ProductHandler::getRelatedProducts($categorie->name);

                $_SESSION['flash'] = 'Exbindo produtos da categoria "'.$categorie->name.'"';

                $this->render('products_page', [
                    'products' => $products,
                    'categories' => $categories,
                    'categorieFab' => $categorieFab,
                    'categorieEsc' => $categorieEsc,
                    'categorieEscol' => $categorieEscol
                ]);
            }
        }   
    }
}