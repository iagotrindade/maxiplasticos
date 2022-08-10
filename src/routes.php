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

$router->get('/{id}/del_user', 'UserController@delete');

$router->get('/sobre/{nome}', 'HomeController@sobreP');