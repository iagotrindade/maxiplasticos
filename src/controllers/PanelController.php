<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;
use \src\handlers\UserHandler;
use \src\handlers\ProductHandler;
use \src\handlers\CategorieHandler;

class PanelController extends Controller {
    private $loggedUser;

    public function __construct() {
        $this->loggedUser = LoginHandler::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/adm-login');
        }
    }

    public function index () {  
        $users = UserHandler::getUsers();
        $usersCount = count($users);

        $userD = UserHandler::getLastDate();

        $products = ProductHandler::getProducts();
        $productsCount = count($products);

        $productD = ProductHandler::getLastDate();

        $categories = CategorieHandler::getCategories();
        $categoriesCount = count($categories);

        $categorieD = CategorieHandler::getLastDate();

        
        $this->render('adm-panel', [
            'loggedUser' => $this->loggedUser,

            'usersCount' => $usersCount,
            'userD' => $userD,

            'productsCount' => $productsCount,
            'productD' => $productD,

            'categoriesCount' => $categoriesCount,
            'categorieD' => $categorieD
        ]);
    }
}