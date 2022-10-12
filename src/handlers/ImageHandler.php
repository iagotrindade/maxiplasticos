<?php
namespace src\handlers;

use \src\models\Image;
use \src\models\Product;

class ImageHandler {
    public static function addImages($id, $secImgName, $path) {

        Image::insert([
            'product_id' => $id,
            'image' => $secImgName,
            'folder_path' => $path,
        ])->execute();
    }

    public static function addMainImage($id) {

        $images = ImageHandler::getImages($id);

        if(!empty($images)) {
            $mainImage = $images[0]->img;
        }

        else {
            $mainImage = 'default_product_image.jpeg';
        }

        Product::update()
            ->set('main_image', $mainImage)
            ->where('id', $id)
        ->execute();
    }

    public static function updateImages($productId, $img, $path) {

        Image::insert([
            'product_id' => $productId,
            'image' => $img,
            'folder_path' => $path,
        ])->execute();
    }

    public static function getImages($id) {
        if($id) {
            $imgList = Image::select()->where('product_id', $id)->get();
            
            $images = [];
        
            foreach($imgList as $img) {
                $newImg = new Image();
                $newImg->id = $img['id'];
                $newImg->img = $img['image']; 
                $newImg->path = $img['folder_path']; 
        
                $images[] = $newImg;
            }
            
            return $images;
        }
        
    }

    public static function delProductImg($id) {
        if($id) {
            Image::delete()->where('product_id', $id)->execute();
        }

    }
}