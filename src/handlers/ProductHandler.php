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

        $id = Product::select()->last();

        $id = $id['id'];

        return $id;
    }

    public static function getProducts () {
        $productList = Product::select()->get();
            
        $products = [];

        foreach($productList as $product) {
            $category = explode(',' ,$product['category']);

            if(count($category) > 2) {
                $category = explode(',' ,$product['category'], -1);
            }

            $newProduct = new Product();
            $newProduct->id = $product['id']; 
            $newProduct->main_image  = $product['main_image'];
            $newProduct->name = $product['name']; 
            $newProduct->code = $product['code'];

            $newProduct->category = $category; 

            $newProduct->category = $category; 

            $newProduct->date = $product['inclusion_date']; 
    
            $products [] = $newProduct;
        }

        return $products;
    }

    public static function getProductById ($id) {
        if($id) {
            $data = Product::select()->where('id', $id)->one();

            $product = new Product();
            $product->id = ($data['id']);
            $product->code = ($data['code']);
            $product->name =($data['name']);
            $product->category =($data['category']);
            $product->desc = ($data['description']);
            $product->comp = ($data['composition']);
            $product->color = ($data['color']);
            $product->format = ($data['format']);
            $product->amount = ($data['amount']);
            $product->details = ($data['details']);
            $product->mainI = ($data['main_image']);
            $product->folder = ($data['folder_path']);
                    
            return $product;
        }
        
        else {
            return false;
        }
    }

    public static function delProduct ($id) {

        $data = Product::select()->where('id', $id)->one();

        $folderPath = $data['folder_path'];

        if (is_dir($folderPath)) {

            $files = scandir($folderPath);

            foreach ($files as $file) {
                if ($file!= "." && $file!="..") {
                    unlink($folderPath. DIRECTORY_SEPARATOR . $file);
                }
            }

            reset($files);
            rmdir($folderPath);
        }

        if($id) {
            Product::delete()->where('id', $id)->execute();
            return true;
        }

        else {
            return false;
        }
    }
}