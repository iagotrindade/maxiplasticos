<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/procurar', 'SiteSearchController@site');

$router->get('/product/{id}', 'ProductPageController@productPage');

$router->get('/produtos/categoria/{id}', 'ProductsPageController@index');

$router->get('/cart', 'CartController@index');

$router->post('/addToCart', 'CartController@addProduct');

$router->post('/updateCart', 'CartController@updateCart');

$router->get('/delCartItem/{id}', 'CartController@delItem');

$router->get('/clearCart', 'CartController@clearCart');

$router->post('/budgetMail', 'CartController@sendBudget');

$router->get('/thanks', 'CartController@thanks');


$router->get('/about', 'AboutController@aboutP');

$router->post('/contact_email', 'AboutController@contactEmail');


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

$router->get('/edit_product/{id}', 'ProductController@edit');

$router->post('/edit_product', 'ProductController@editAction');

$router->get('/{id}/del_product', 'ProductController@delAction');


$router->get('/categories', 'CategorieController@index');
$router->post('/add_categorie', 'CategorieController@addAction');
$router->get('/{id}/del_categorie', 'CategorieController@delAction');
$router->get('/edit_categorie/{id}', 'CategorieController@editCategorie');
$router->post('/update_categorie', 'CategorieController@updateCategorie');


$router->get('/search', 'SearchController@panel');

$router->get('/filter/{id}', 'FilterController@index');