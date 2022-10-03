<?php
namespace src\handlers;
use \src\handlers\ProductHandler;

class CartHandler {
    public static function getCartProducts() {
        
        $array = array();
        $cart = $_SESSION['cart'];

        foreach($cart as $id => $qt) {
            $productInfo = ProductHandler::getProductById($id);

            $array[] = array(
                'id' => $id,
                'qt' => $qt,
                'folder' => $productInfo->path,
                'image' => $productInfo->mainI,
                'description' => $productInfo->desc
            );
        }

        return $array;
    }
}