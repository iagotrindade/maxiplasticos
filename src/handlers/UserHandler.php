<?php
namespace src\handlers;

use \src\models\User;

class UserHandler {
    public static function getUsers() {
        $userList = User::select()->orderBy('inclusion_date', 'desc')->get();
            
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

    public static function getUser($id) {
        if($id) {
            $data = User::select()->where('id', $id)->one();

            $user = new User();
            $user->id = ($data['id']);
            $user->img = ($data['image']);
            $user->name =($data['name']);
            $user->phone =($data['phone']);
            $user->email = ($data['email']);
            $user->ramal = ($data['ramal']);
                    
            return $user;
        }
        
        else {
            return false;
        }
    }

    public static function getLastDate() {
        $data = User::select()->last('inclusion_date');
        
        return $data['inclusion_date'];
    }

    public static function addUser ($name, $avatarName, $phone, $ramal, $email, $password, $date) {

        if ($name) {
            
            $hash = password_hash($password, PASSWORD_DEFAULT);
            
            User::insert([
                'image' => $avatarName,
                'name' => $name,
                'phone' => $phone,
                'ramal' => $ramal,
                'email' => $email,
                'password' => $hash,
                'token' => '',
                'inclusion_date' => $date
            ])->execute();

            return true;
        }

        else {
            return false;
        }
    }

    public static function updateUser ($id, $name, $avatarName, $phone, $ramal, $email, $password, $date) {
        $user = User::select()->where('id', $id)->one();

        if (password_verify($password, $user['password'])) {

            User::update()
                ->set('name', $name)
                ->set('image', $avatarName)
                ->set('phone', $phone)
                ->set('ramal', $ramal)
                ->set('email', $email)
                ->set('inclusion_date', $date)
                ->where('id', $id)
            ->execute();

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