<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;
use src\handlers\ProfileHandler;
use src\models\User;

class ProfileController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = LoginHandler::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/adm-login');
        }
    }

    public function index() {
        $this->render('profile', [
            'loggedUser' => $this->loggedUser
        ]);
    }
    
    public function updateAction () {
        $name = filter_input(INPUT_POST, 'name');
        $phone = filter_input(INPUT_POST, 'phone');
        $ramal = filter_input(INPUT_POST, 'ramal');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if($name && $email && $password) {
            
            if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name'])) {
                $newAvatar = $_FILES['avatar'];

                if(in_array($newAvatar['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
                    $avatarName = $this->cutImage($newAvatar, 110, 110, 'assets/images/avatars');

                    unlink('assets/images/avatars/'.$this->loggedUser->img);
                }
            }
                
            elseif($_FILES['avatar']['tmp_name'] == '') {
                $avatarName = $this->loggedUser->img;
            }
 
            $status = ProfileHandler::updateUser($this->loggedUser->id, $name, $avatarName, $phone, $ramal, $email, $password);
            
            if($status) {
                $_SESSION['flash'] = 'Perfil atualizado com sucesso!';
                $this->redirect('/profile', [
                    'flash' => $_SESSION['flash']
                ]);
            }

            else {
                $_SESSION['flash'] = 'A senha informada esta incorreta!';
                $this->redirect('/profile', [
                    'flash' => $_SESSION['flash']
                ]);
            }
        }

        else {
            $_SESSION['flash'] = 'Preencha todas informações!';
            $this->redirect('/profile', [
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

        return $fileName;
    }
}