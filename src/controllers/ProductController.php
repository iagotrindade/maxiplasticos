<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;
use src\handlers\ProductHandler;
use src\handlers\CategorieHandler;

class ProductController extends Controller {
    private $loggedUser;

    public function __construct() {
        $this->loggedUser = LoginHandler::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/adm-login');
        }
    }

    public function index() {

        $products = ProductHandler::getProducts();

        $this->render('products', [
            'loggedUser' => $this->loggedUser,
            'products' => $products
        ]);
    }

    public function add () {
        $categories = CategorieHandler::getCategories();
        
        $this->render('add_product', [
            'loggedUser' => $this->loggedUser,
            'categories' => $categories
        ]);
    }

    public function addAction() {
        $name = filter_input(INPUT_POST, 'name');
        $desc = filter_input(INPUT_POST, 'desc');
        $category = [];
        $code = filter_input(INPUT_POST, 'code');
        $color = filter_input(INPUT_POST, 'color');
        $format = filter_input(INPUT_POST, 'format');
        $amount = filter_input(INPUT_POST, 'amount');
        $composition = filter_input(INPUT_POST, 'composition');
        $details = filter_input(INPUT_POST, 'details');

        date_default_timezone_set("America/Sao_Paulo");

        $date = date("Y-m-d H:i:s");

        if (isset($_POST['category'])) {
            $category = $_POST['category'];

            $category = implode(",",$category);
        }

        if($name && $desc && $category && $code && $color && $format && $amount && $composition && $details) {
            $folderCode = md5(time().rand(1, 99));

            $path = "assets/images/products/".$folderCode."";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            };

            if(isset($_FILES['main-image']) && !empty($_FILES['main-image']['tmp_name'])) {
                $newImageP = $_FILES['main-image'];

                if(in_array($newImageP['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
                    
                    $imageName = $this->cutImage($newImageP, 400, 400, $path);
                }

                else {
                    $_SESSION['flash'] = 'Imagem não compatível com os formatos .JPEG, .JPG, .PNG!';
                    $this->redirect('/add_product', [
                        'flash' => $_SESSION['flash']
                    ]);
                }
            }

            else {
                $imageName = "assets/images/products/default_product_image.jpeg";
            }

            $status = ProductHandler::addProduct(
                $name, $desc,
                $category, $code,
                $color, $format,
                $amount, $composition,
                $details, $imageName,
                $path, $date
            );
    
            if(isset($_FILES['images']) && !empty($_FILES['images']['tmp_name'])) {
                $newImageS = $_FILES['images'];

                for ($i = 0; $i < count($newImageS['name']); $i++) {
                    if(in_array($newImageS['type'][$i], ['image/jpeg', 'image/jpg', 'image/png'])) {
                        $destino = $path."/".$newImageS['name'][$i];

                        if(move_uploaded_file($newImageS['tmp_name'][$i], $destino)) {

                            $newName = $path."/".md5(time().rand(1,999)).'.jpeg';
                            rename($destino, $newName);

                            ProductHandler::uploadImages($path, $newName);  
                        }         
                    }
                              
                }

                $_SESSION['flash'] = 'Produto adicionado com sucesso!';
                $this->redirect('/add_product', [
                    'flash' => $_SESSION['flash']
                ]);
            }

            else {
                $defaultImage = "assets/images/products/default_product_image.jpeg";

                ProductHandler::uploadImages($path, $defaultImage);

                $_SESSION['flash'] = 'Produto adicionado com sucesso!';

                $this->render('add_product', [
                    'flash' => $_SESSION['flash']
                ]);
            }
        }

        else {
            $_SESSION['flash'] = 'Preencha todas informações!';
            $this->redirect('/add_product', [
                'flash' => $_SESSION['flash']
            ]);
        }
    }

    public function delAction ($id) {
        $status = ProductHandler::delProduct($id);

        if($status) {
            $_SESSION['flash'] = 'Produto excluído com sucesso!';
            $this->redirect('/products', [
                'flash' => $_SESSION['flash']
            ]);
        }
    }


















    private function cutImage($file, $w, $h, $folder) {
        list($widthOrig, $heightOrig) = getimagesize($file['tmp_name']);
        $ratio = $widthOrig / $heightOrig;

        $newWidth = $w;
        $newHeight = $newWidth / $ratio;

        if($newHeight < $h) {
            $newHeight = $h;
            $newWidth = $newHeight * $ratio;
        }

        $x = $w - $newWidth;
        $y = $h - $newHeight;
        $x = $x < 0 ? $x / 2 : $x;
        $y = $y < 0 ? $y / 2 : $y;

        $finalImage = imagecreatetruecolor($w, $h);
        switch($file['type']) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($file['tmp_name']);
            break;
            case 'image/png':
                $image = imagecreatefrompng($file['tmp_name']);
            break;
        }

        imagecopyresampled(
            $finalImage, $image,
            $x, $y, 0, 0,
            $newWidth, $newHeight, $widthOrig, $heightOrig
        );

        $fileName = md5(time().rand(0,9999)).'.jpg';

        imagejpeg($finalImage, $folder.'/'.$fileName);

        return $folder.'/'.$fileName;
    }
}