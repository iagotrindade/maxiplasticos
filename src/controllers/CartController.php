<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\CartHandler;
use src\handlers\CategorieHandler;
use src\handlers\ProductHandler;

class CartController extends Controller {

    public function index () {
        $categorieFab = CategorieHandler::getCategorieByName('Fabricação');
        $categorieEsc = CategorieHandler::getCategorieByName('Escritório');
        $categorieEscol = CategorieHandler::getCategorieByName('Escolar');

        $cartProducts = CartHandler::getCartProducts();

        $this->render('cart', [
            'categorieFab' => $categorieFab,
            'categorieEsc' => $categorieEsc,
            'categorieEscol' => $categorieEscol,
            'cartProducts' => $cartProducts
        ]);
    }

    public function addProduct() {
        $categorieFab = CategorieHandler::getCategorieByName('Fabricação');
        $categorieEsc = CategorieHandler::getCategorieByName('Escritório');
        $categorieEscol = CategorieHandler::getCategorieByName('Escolar');

        $cartProducts = CartHandler::getCartProducts();

        if(!empty($_POST['productId'])) {
            $id = filter_input(INPUT_POST, 'productId');
            $qt = filter_input(INPUT_POST, 'qt');

            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();   
            }

            if(isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] += $qt;
            }

            else {
                $_SESSION['cart'][$id] = $qt;
            }
        }

        $this->redirect('/cart', [
            'categorieFab' => $categorieFab,
            'categorieEsc' => $categorieEsc,
            'categorieEscol' => $categorieEscol,
            'cartProducts' => $cartProducts
        ]);
    }

    public function clearCart() {
        if(isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();   
        }

        $this->redirect("/cart");
    }
}   