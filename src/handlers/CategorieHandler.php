<?php
namespace src\handlers;

use \src\models\Categorie;
use \src\models\Product;
use \src\handlers\ProductHandler;

class CategorieHandler {  
    public static function getCategories() {

        $categorieList = Categorie::select()->get();
            
        $categories = [];
    
        foreach($categorieList as $categorie) {
            $newCategorie = new Categorie();

            $countCategorie = Product::select()->where('category', 'like', '%'.$categorie['name'].'%')->get();

            $countCategorie = count($countCategorie);

            $newCategorie->id = $categorie['id'];
            $newCategorie->name = $categorie['name'];
            $newCategorie->products = $countCategorie ;
            $newCategorie->desc = $categorie['description'];
    
            $categories[] = $newCategorie;
        }

        return $categories;
    }

    public static function getCategorieById($id) {
        if($id) {

            $data = Categorie::select()->where('id', $id)->one();

            $categorie = new Categorie();
            $categorie->id = ($data['id']);
            $categorie->name =($data['name']);
            $categorie->desc =($data['description']);
  
            return $categorie;
        }
        
        else {
            return false;
        }

    }

    public static function addCategorie ($name, $desc) {
        if ($name && $desc) {
            
            Categorie::insert([
                'name' => $name,
                'description' => $desc
            ])->execute();

            return true;
        }

        else {
            return false;
        }
    }

    public static function updateAction ($id, $name, $desc) {
        if ($id && $name && $desc) {
            Categorie::update()->set('name', $name)->set('description', $desc)->where('id', $id)->execute();
            return true;
        }

        else {
            return false;
        }
    }

    public static function delUser($id) {
        if($id) {
            Categorie::delete()->where('id', $id)->execute();
            return true;
        }
            
        else {
            return false;
        }
    }
}