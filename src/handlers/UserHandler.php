<?php
namespace src\handlers;

use \src\models\User;

class UserHandler {
    public static function getUsers() {
        $userList = User::select()->get();
            
        $users = [];
    
        foreach($userList as $user) {
            $newUser = new User();
            $newUser->id = $user['id'];
            $newUser->img = $user['image'];
            $newUser->name = $user['name'];
            $newUser->phone = $user['phone']; 
            $newUser->ramal = $user['ramal']; 
            $newUser->email = $user['email'];  
    
            $users[] = $newUser;
        }

        return $users;
    }

    public static function addUser ($name, $avatarName, $phone, $ramal, $email, $password) {

        if ($name) {
            
            $hash = password_hash($password, PASSWORD_DEFAULT);
            
            User::insert([
                'image' => $avatarName,
                'name' => $name,
                'phone' => $phone,
                'ramal' => $ramal,
                'email' => $email,
                'password' => $hash,
                'token' => ''
            ])->execute();

            return true;
        }

        else {
            return false;
        }
    }

    public static function delUser($id) {
        if($id) {
            User::delete()->where('id', $id)->execute();
        }
    }
}