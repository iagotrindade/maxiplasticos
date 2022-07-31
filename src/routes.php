<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/adm-login', 'AdmController@index');

$router->get('/cadastro', 'LoginController@signup');

$router->post('/login', 'LoginController@index');

$router->get('/recover', 'LoginController@recover');

$router->get('/sobre/{nome}', 'HomeController@sobreP');

$router->get('/sobre', 'HomeController@sobre');