<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;
use src\handlers\ProductHandler;
use src\handlers\CategorieHandler;
use src\handlers\ImageHandler;

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

            $images = (!empty($_FILES['images'])) ? $_FILES['images']:array();

            $allowedImages = array('image/jpg', 'image/jpeg', 'image/png');

            for($i=0; $i<count($images['name']);$i++) {

                $tmp_name = $images['tmp_name'][$i];
                $type = $images['type'][$i];
                
                if(in_array($type, $allowedImages)) {
                    
                    $secImgName = $this->cutSecImages($tmp_name, $type, $path);

                    ImageHandler::addImages($status, $secImgName, $path);
                }   
            }

            $_SESSION['flash'] = 'Produto adicionado com sucesso!';

            $this->redirect('/add_product', [
                'flash' => $_SESSION['flash']
            ]);
        }

        else {
            $_SESSION['flash'] = 'Preencha todas informações!';
            $this->redirect('/add_product', [
                'flash' => $_SESSION['flash']
            ]);
        }
    }

    public function edit ($id) {
        if ($id) {

            $categories = CategorieHandler::getCategories();
            $product = ProductHandler::getProductById($id);
            $images = ImageHandler::getImages($id);
            
            if($product) {
                $this->render("edit_product", [
                    'loggedUser' => $this->loggedUser,
                    'categories' => $categories,
                    "product" => $product,
                    "images" => $images
                ]);
            }
        } 
    }

    public function editAction () {
        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST, 'name');
        $desc = filter_input(INPUT_POST, 'desc');
        $code = filter_input(INPUT_POST, 'code');
        $color = filter_input(INPUT_POST, 'color');
        $format = filter_input(INPUT_POST, 'format');
        $amount = filter_input(INPUT_POST, 'amount');
        $composition = filter_input(INPUT_POST, 'composition');
        $details = filter_input(INPUT_POST, 'details');
        $path = filter_input(INPUT_POST, 'path');

        date_default_timezone_set("America/Sao_Paulo");

        $date = date("Y-m-d H:i:s");

        $category = [];

        if (isset($_POST['category'])) {
            $category = $_POST['category'];

            $category = implode(",",$category);
        }

        if($id && $name && $desc && $category && $code && $color && $format && $amount && $composition && $details) {
            //Tratamento da imagem principal

            if(isset($_FILES['new-main']) && !empty($_FILES['new-main']['tmp_name'])) {
                $newImageP = $_FILES['new-main'];

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
                $imageName = "default_product_image.jpeg";
            }

            //Cadastro das informações estáticas
            
            $productId = ProductHandler::editProduct(
                $id, $name, $desc,
                $category, $code,
                $color, $format,
                $amount, $composition,
                $details, $imageName,
                $path, $date
            );

            //Tratamento e cadastro das imagens secundarias

            $c_images = (!empty($_POST['c_images'])) ? $_POST['c_images']:array();

            if(is_array($c_images)) {
                foreach($c_images as $ckey => $cimg) {
                    $c_images[$ckey] = strval($cimg);
                }

                $allowedImages = array('image/jpg', 'image/jpeg', 'image/png');

                ImageHandler::editImages($c_images, $productId);

                for($i=0; $i<count($c_images);$i++) {
                    ImageHandler::updateSecImg($productId, $c_images[$i], $path);
                }
            }

            //Tratamento e cadastro das novas imagens secundarias
                     
            $images = (!empty($_FILES['new_photos'])) ? $_FILES['new_photos']:array();

            $allowedImages = array('image/jpg', 'image/jpeg', 'image/png');

            for($i=0; $i<count($images['name']);$i++) {

                $tmp_name = $images['tmp_name'][$i];
                $type = $images['type'][$i];
                
                if(in_array($type, $allowedImages)) {
                    
                    $secImgName = $this->cutSecImages($tmp_name, $type, $path);

                    ImageHandler::addImages($productId, $secImgName, $path);
                }   
            }

            $_SESSION['flash'] = 'Produto atualizado com sucesso!';
            echo(print_r($c_images));
            $this->redirect("/edit_product/$id", [
                'flash' => $_SESSION['flash']
            ]);
        }

        else {
            $_SESSION['flash'] = 'Preencha todas informações!';
            $this->redirect("/edit_product/$id", [
                'flash' => $_SESSION['flash']
            ]);
        }
    }

    public function delAction ($id) {
        $status = ProductHandler::delProduct($id);
        $statusImg = ImageHandler::delProductImg($id);

        if($status && $statusImg) {
            $_SESSION['flash'] = 'Produto excluído com sucesso!';
            $this->redirect('/products', [
                'flash' => $_SESSION['flash']
            ]);
        }

        else {
            $_SESSION['flash'] = 'Ops, ocorreu algum problema na exclusão, tente novamente!';
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



    private function cutSecImages($tmp_name, $type, $folder) {
        if($type == 'image/jpg' || $type == 'image/jpeg') {
            $o_img = imagecreatefromjpeg($tmp_name);
        }

        else {
            if($type == 'image/png') {
                $o_img = imagecreatefrompng($tmp_name);
            }
        }

        if(!empty($o_img)) {
            $width = 400;
            $height = 400;
            $ratio = $width / $height;

            list($o_width, $o_height) = getimagesize($tmp_name);

            $o_ratio = $o_width / $o_height;

            if($ratio > $o_ratio) {
                $img_w = $height * $o_ratio;
                $img_h = $height;
            }

            else {
                $img_h = $width / $o_ratio;
                $img_w = $width;
            }

            if($img_w < $width) {
                $img_w = $width;
                $img_h = $img_w / $o_ratio;
            }

            if($img_h < $height) {
                $img_h = $height;
                $img_w = $img_h * $o_ratio;
            } 

            $px = 0;
            $py = 0;

            if ($img_w > $width) {
                $px = ($img_w - $width) / 2;  
            }

            if($img_h > $height) {
                $py = ($img_h - $height) / 2;
            }

            $img = imagecreatetruecolor($width, $height);
            imagecopyresampled(
                $img, $o_img, -$px,-$py,0,0,
                $img_w, $img_h, $o_width, $o_height
            );

            $fileName = md5(time().rand(0, 999)).'.jpg';
            imagejpeg($img, $folder.'/'.$fileName,);

            return $fileName;
        }
    }
}