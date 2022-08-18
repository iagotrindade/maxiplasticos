<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');


$router->get('/adm-login', 'LoginController@signin');

$router->post('/login', 'LoginController@signinAction');

$router->get('/recover', 'LoginController@recover');

$router->post('/send_mail', 'LoginController@recoverAction');

$router->get('/{token}={token}/recover', 'LoginController@passwordChange');

$router->post('/recover', 'LoginController@updatePassword');

$router->get('/logout', 'LoginController@logout');


$router->get('/adm-panel', 'PanelController@index');


$router->get('/profile', 'ProfileController@index');

$router->post('/update_profile', 'ProfileController@updateAction');


$router->get('/users', 'UserController@index');

$router->post('/add_user', 'UserController@add');

$router->get('/edit_user/{id}', 'UserController@edit');

$router->post('/edit_action', 'UserController@editAction');

$router->get('/{id}/del_user', 'UserController@delete');


$router->get('/products', 'ProductController@index');

$router->get('/add_product', 'ProductController@add');

$router->post('/add_product', 'ProductController@addAction');

$router->get('/{id}/del_product', 'ProductController@delAction');


$router->get('/categories', 'CategorieController@index');
$router->post('/add_categorie', 'CategorieController@addAction');
$router->get('/{id}/del_categorie', 'CategorieController@delAction');
$router->get('/edit_categorie/{id}', 'CategorieController@editCategorie');
$router->post('/update_categorie', 'CategorieController@updateCategorie');

$router->get('/sobre/{nome}', 'HomeController@sobreP');