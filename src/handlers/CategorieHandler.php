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

    public static function getLastDate() {
        $data = Categorie::select()->last('inclusion_date');
        
        return $data['inclusion_date'];
    }

    public static function addCategorie ($name, $desc, $date) {
        if ($name && $desc) {
            
            Categorie::insert([
                'name' => $name,
                'description' => $desc,
                'inclusion_date' => $date
            ])->execute();

            return true;
        }

        else {
            return false;
        }
    }

    public static function updateAction ($id, $name, $desc, $date) {
        if ($id && $name && $desc) {
            Categorie::update()->set('name', $name)->set('description', $desc)->set('inclusion_date', $date)->where('id', $id)->execute();
            return true;
        }

        else {
            return false;
        }
    }

    public static function delCategorie($id) {
        if($id) {

            $categorie = Categorie::select('name')->where('id',$id)->one();

            switch ($categorie['name']) {
                case 'Fabricação':

                    return false;
                    break;

                case 'Escolar':

                    return false;
                    break;

                case 'Escritório':

                    return false;
                    break;
            }

            if($categorie['name'] == 'Escolar') {
                return false;
            }

            else {
                Categorie::delete()->where('id', $id)->execute();
                return true;
            }
            
        }
            
        else {
            return false;
        }
    }
}