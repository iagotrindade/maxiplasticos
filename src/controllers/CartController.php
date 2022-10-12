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

        if(empty($cartProducts)) {
            $cartProducts = array();
        }


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

    public function updateCart() {

        $id = intval(filter_input(INPUT_POST, 'id_product'));
        $qt = intval(filter_input(INPUT_POST, 'qt_product'));

        $somar = $_POST['+'];
        $subtrair = $_POST['-'];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['cart'][$id])) {
            if ($somar) {
                $_SESSION['cart'][$id] += 1;
            } elseif ($subtrair) {
                if ($_SESSION['cart'][$id] >= 2) {
                    $_SESSION['cart'][$id] -= 1;
                }
            }
        } else {
            $_SESSION['cart'][$id] = $qt;
        }

        $this->redirect('/cart');
    }

    public function delItem ($id) {

        
        if(!empty($id)) {
            unset($_SESSION['cart'][$id['id']]);
        }

        $this->redirect("/cart");
    }

    public function clearCart() {
        if(isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();   
        }

        $this->redirect("/cart");
    }

    public function sendBudget() {

        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $cnpj = filter_input(INPUT_POST, 'cnpj');
        $msg = filter_input(INPUT_POST, 'msg');

        if($name && $email && $phone && $cnpj) {

            CartHandler::sendClientEmail($name, $email, $phone, $cnpj, $msg);
            CartHandler::sendBudget($name, $email, $phone, $cnpj, $msg);

            $this->redirect('/thanks');
        }

        else {

            $_SESSION['flash'] = "Ocorreu um erro ao enviar seu pedido, tente novamente";
            $this->redirect('/cart');
        }
    }

    public function thanks() {
        $categorieFab = CategorieHandler::getCategorieByName('Fabricação');
        $categorieEsc = CategorieHandler::getCategorieByName('Escritório');
        $categorieEscol = CategorieHandler::getCategorieByName('Escolar');

        $this->render('/thanks', [
            'categorieFab' => $categorieFab,
            'categorieEsc' => $categorieEsc,
            'categorieEscol' => $categorieEscol,
        ]);
    }
}   