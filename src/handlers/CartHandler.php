<?php
namespace src\handlers;
use \src\handlers\ProductHandler;

class CartHandler {
    public static function getCartProducts() {
        
        $array = array();
        if(isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }

        else {
            $cart = array();
        }
        
        foreach($cart as $id => $qt) {
            $productInfo = ProductHandler::getProductById($id);

            $array[] = array(
                'id' => $id,
                'name' => $productInfo->name,
                'qt' => $qt,
                'folder' => $productInfo->path,
                'image' => $productInfo->mainI,
                'description' => $productInfo->desc
            );
        }

        return $array;
    }
}