<?php
namespace src\handlers;

use \src\models\User;

class ProfileHandler {
        
    public static function updateUser ($id, $name, $avatarName, $phone, $ramal, $email, $password) {
        $user = User::select()->where('id', $id)->one();

        if (password_verify($password, $user['password'])) {
            User::update()
                ->set('name', $name)
                ->set('image', $avatarName)
                ->set('phone', $phone)
                ->set('ramal', $ramal)
                ->set('email', $email)
                ->where('id', $id)
            ->execute();

            return true;
        }

        else {
            return false;
        }
    }
}