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

$router->get('/adm-panel', 'PanelController@index');

$router->get('/profile', 'ProfileController@index');

$router->post('/update_profile', 'ProfileController@updateAction');

$router->get('/users', 'UserController@index');

$router->get('/sobre/{nome}', 'HomeController@sobreP');