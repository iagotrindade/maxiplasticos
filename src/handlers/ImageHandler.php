<?php
namespace src\handlers;

use \src\models\Image;

class ImageHandler {
    public static function addImages($id, $secImgName, $path) {
        if($id && $secImgName && $path) {
            Image::insert([
                'product_id' => $id,
                'image' => $secImgName,
                'folder_path' => $path,
            ])->execute();
        }
    }

    public static function editImages($c_images, $id) {
        Image::delete()->where('product_id', $id)->execute();
    }

    public static function updateSecImg($productId, $img, $path) {
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

            return true;
        }

        else {
            return false;
        }
    }
}