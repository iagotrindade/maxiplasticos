<?php
namespace src\handlers;

use \src\models\User;

class LoginHandler {
        
    public static function checkLogin() {
        if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();
            if($data) {

                $loggedUser = new User();
                $loggedUser->id = ($data['id']);
                $loggedUser->name =($data['name']);
                $loggedUser->function =($data['function']);
                $loggedUser->email = ($data['email']);
                $loggedUser->privilege = ($data['privilege']);
                
                return $loggedUser;
            }
        }
        return false;
    }

    public static function verifyLogin($email, $password) {
        $user = User::select()->where('email', $email)->one();

        if($user) {
            if(password_verify($password, $user['password'])) {
                $token = md5(time().rand(0,9999).time());

                User::update()->set('token', $token)->where('email', $email)->execute();

                return $token;
            }
        }

        else {
            return false;
        }
    }
}