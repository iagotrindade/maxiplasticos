<?php
namespace src\handlers;

use \src\models\Categorie;

class CategorieHandler {  
    public static function getCategories() {
        $categorieList = Categorie::select()->get();
            
        $categories = [];
    
        foreach($categorieList as $categorie) {
            $newCategorie = new Categorie();
            $newCategorie->id = $categorie['id'];
            $newCategorie->name = $categorie['name'];
            $newCategorie->desc = $categorie['description'];
    
            $categories[] = $newCategorie;
        }

        return $categories;
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
}