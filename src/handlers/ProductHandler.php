<?php
namespace src\handlers;

use \src\models\Product;

class ProductHandler {  
    public static function addProduct($name, $desc, $category, $code, $color, $format, $amount, $composition, $details, $mainImage, $path, $date) {
        if($name && $desc && $category && $code && $color && $format && $amount && $composition && $details && $mainImage && $path && $date) {
            Product::insert([
                'name' => $name,
                'code' => $code,
                'description' => $desc,
                'category' => $category,
                'color' => $color,
                'format' => $format,
                'amount' => $amount,
                'composition' => $composition,
                'details' => $details,
                'main_image' => $mainImage,
                'folder_path' => $path,
                'inclusion_date' => $date
            ])->execute();
        }
    }

    public static function uploadImages($path, $image) {
        if($image) {
            $product = Product::select()->where('folder_path', $path)->one();

            $image = $product['secondary_images'].$image;

            Product::update()
                ->set('secondary_images', $image.',')                      
                ->where('folder_path', $path)
            ->execute();
        }
    }

    public static function getProducts () {
        $productList = Product::select()->get();
            
        $products = [];
    
        foreach($productList as $product) {
            $newProduct = new Product();
            $newProduct->id = $product['id']; 
            $newProduct->main_image  = $product['main_image'];
            $newProduct->name = $product['name']; 
            $newProduct->code = $product['code'];
            $newProduct->category = $product['category']; 
            $newProduct->date = $product['inclusion_date']; 
    
            $products [] = $newProduct;
        }

        return $products;
    }
}