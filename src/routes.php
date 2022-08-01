<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/adm-login', 'LoginController@signin');

$router->get('/adm-panel', 'PanelController@index');

$router->post('/login', 'LoginController@signinAction');

$router->get('/recover', 'LoginController@recover');

$router->get('/adm-painel', 'AdmController@index');

$router->get('/sobre/{nome}', 'HomeController@sobreP');

$router->get('/sobre', 'HomeController@sobre');