<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;
use src\handlers\UserHandler;

class UserController extends Controller {
    private $loggedUser;

    public function __construct() {
        $this->loggedUser = LoginHandler::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/adm-login');
        }
    }
    
    public function index() {

        $users = UserHandler::getUsers();
        $this->render('users', [
            'loggedUser' => $this->loggedUser,
            'users' => $users
        ]);
    }

    public function add () {
        $name = filter_input(INPUT_POST, 'name');
        $phone = filter_input(INPUT_POST, 'phone');
        $ramal = filter_input(INPUT_POST, 'ramal');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $date = date("Y-m-d H:i:s");

        if($name && $email && $password) {
            if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name'])) {
                $newAvatar = $_FILES['avatar'];

                if(in_array($newAvatar['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
                    $avatarName = $this->cutImage($newAvatar, 110, 110, 'assets/images/avatars');
                }

                else {
                    $_SESSION['flash'] = 'O tipo de imagem não é compatível com os formatos .jpeg .jpg ou .png!';
                    $this->redirect("/users", [
                        'flash' => $_SESSION['flash']
                    ]);
                }
            }

            else {
                $avatarName = 'default_avatar.png';
            }

            if(LoginHandler::emailExists($email) === false) {
                $status = UserHandler::addUser($name, $avatarName, $phone, $ramal, $email, $password, $date);
    
                if($status) {
                    $_SESSION['flash'] = 'Usuário adicionado com sucesso!';
                    $this->redirect('/users', [
                        'flash' => $_SESSION['flash']
                    ]);
                }
    
                else {
                    $_SESSION['flash'] = 'Ops, ocorreu algum problema no cadastro, tente novamente!';
                    $this->redirect('/users', [
                        'flash' => $_SESSION['flashError']
                    ]);
                }
            }
    
            else {
                $_SESSION['flash'] = 'Usuário já cadastrado!';
    
                $this->redirect('/users', [
                    "flash" => $_SESSION['flash']
                ]);
            }
        }

        else {
            $_SESSION['flash'] = 'Informe os campos de NOME, E-MAIL e SENHA!';
    
            $this->redirect('/users', [
                "flash" => $_SESSION['flash']
            ]);
        }
        
        
    }

    public function edit($id) {
        if($id) {
            $user = UserHandler::getUser($id);
        }
        

        $this->render('edit_user', [
            'loggedUser' => $this->loggedUser,
            'user' => $user
        ]);
    }

    public function editAction () {
        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST, 'name');
        $userImg = filter_input(INPUT_POST, 'user-image');
        $phone = filter_input(INPUT_POST, 'phone');
        $ramal = filter_input(INPUT_POST, 'ramal');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $date = date("Y-m-d H:i:s");

        if($name && $email && $password) {
            if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name'])) {
                $newAvatar = $_FILES['avatar'];

                if(in_array($newAvatar['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
                    $avatarName = $this->cutImage($newAvatar, 110, 110, 'assets/images/avatars');

                    unlink('assets/images/avatars/'.$userImg);
                }

                else {
                    $_SESSION['flash'] = 'O tipo de imagem não é compatível com os formatos .jpeg .jpg ou .png!';
                    $this->redirect("/edit_user/$id", [
                        'flash' => $_SESSION['flash']
                    ]);
                }
            }

            elseif($_FILES['avatar']['tmp_name'] == '') {
                $avatarName = $userImg;
            }

            if(LoginHandler::emailExists($email) === true) {
                $status = UserHandler::updateUser($id, $name, $avatarName, $phone, $ramal, $email, $password, $date);
                
                if($status) {
                    $_SESSION['flash'] = 'Usuário atualizado com sucesso!';
                    $this->redirect("/edit_user/$id", [
                        'flash' => $_SESSION['flash']
                    ]);
                }
    
                else {
                    $_SESSION['flash'] = 'A senha informada esta incorreta!';
                    $this->redirect("/edit_user/$id", [
                        'flash' => $_SESSION['flash']
                    ]);
                }
            }
        }
        else {
            $_SESSION['flash'] = 'Informe os campos de NOME, E-MAIL e SENHA!';
    
            $this->redirect("/edit_user/$id", [
                "flash" => $_SESSION['flash']
            ]);
        }
    }

    public function delete($id) {
        UserHandler::delUser($id);
        
        $_SESSION['flash'] = 'Usuário excluído com sucesso!';
    
        $this->redirect('/users', [
            "flash" => $_SESSION['flash']
        ]);
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

        return $fileName;
    }
}