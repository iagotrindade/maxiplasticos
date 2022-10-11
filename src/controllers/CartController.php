<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\CartHandler;
use src\handlers\CategorieHandler;
use src\handlers\ProductHandler;

class CartController extends Controller {

    public function index () {
        $categorieFab = CategorieHandler::getCategorieByName('Fabricação');
        $categorieEsc = CategorieHandler::getCategorieByName('Escritório');
        $categorieEscol = CategorieHandler::getCategorieByName('Escolar');

        $cartProducts = CartHandler::getCartProducts();

        if(empty($cartProducts)) {
            $cartProducts = array();
        }


        $this->render('cart', [
            'categorieFab' => $categorieFab,
            'categorieEsc' => $categorieEsc,
            'categorieEscol' => $categorieEscol,
            'cartProducts' => $cartProducts
        ]);
    }

    public function addProduct() {
        $categorieFab = CategorieHandler::getCategorieByName('Fabricação');
        $categorieEsc = CategorieHandler::getCategorieByName('Escritório');
        $categorieEscol = CategorieHandler::getCategorieByName('Escolar');

        $cartProducts = CartHandler::getCartProducts();

        if(!empty($_POST['productId'])) {
            $id = filter_input(INPUT_POST, 'productId');
            $qt = filter_input(INPUT_POST, 'qt');

            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();   
            }

            if(isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] += $qt;
            }

            else {
                $_SESSION['cart'][$id] = $qt;
            }
        }

        $this->redirect('/cart', [
            'categorieFab' => $categorieFab,
            'categorieEsc' => $categorieEsc,
            'categorieEscol' => $categorieEscol,
            'cartProducts' => $cartProducts
        ]);
    }

    public function updateCart() {

        $id = intval(filter_input(INPUT_POST, 'id_product'));
        $qt = intval(filter_input(INPUT_POST, 'qt_product'));

        $somar = $_POST['+'];
        $subtrair = $_POST['-'];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['cart'][$id])) {
            if ($somar) {
                $_SESSION['cart'][$id] += 1;
            } elseif ($subtrair) {
                if ($_SESSION['cart'][$id] >= 2) {
                    $_SESSION['cart'][$id] -= 1;
                }
            }
        } else {
            $_SESSION['cart'][$id] = $qt;
        }

        $this->redirect('/cart');
    }

    public function delItem ($id) {

        
        if(!empty($id)) {
            unset($_SESSION['cart'][$id['id']]);
        }

        $this->redirect("/cart");
    }

    public function clearCart() {
        if(isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();   
        }

        $this->redirect("/cart");
    }

    public function sendBudget() {

        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $cnpj = filter_input(INPUT_POST, 'cnpj');
        $msg = filter_input(INPUT_POST, 'msg');

        if($name && $email && $phone && $cnpj) {

            $_SESSION['cart'];

            $para  = "iagost1@hotmail.com"; 
            $assunto  = 'Solicitação de Orçamento de '.$name.'!';

            $cartProducts = CartHandler::getCartProducts();

            $corpoProdutos = '';

            foreach($cartProducts as $item) {
                $corpoProdutos .= "<tr class='x_order_item'>
                <td class='x_td' style='color:#737373; border:1px solid #e4e4e4; padding:12px; text-align:left; vertical-align:middle; font-family: 'Montserrat', sans-serif; word-wrap:break-word'>
                    <div style='margin-bottom:5px'>
                        <img data-imagetype='External' src='https://www.plasticoslider.com.br/wp-content/uploads/2016/04/ArquivoExibir-6-150x150.jpeg?wooctrl_product_image' alt='Product Image' height='h' width='s' style='border:none; display:inline-block; font-size:14px; font-weight:bold; height:auto; outline:none; text-decoration:none; text-transform:capitalize; vertical-align:middle; margin-right:10px; max-width:100%'>
                    </div>".$item['name']."
                </td>
                
                <td class='x_td' style='color:#737373; border:1px solid #e4e4e4; padding:12px; text-align:center; vertical-align:middle; font-family: 'Montserrat', sans-serif;'>".$item['qt']."</td>
            </tr>";}

            

            
            
            $corpo = "<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' min-scale='0.9352159468438538' style='transform: scale(0.935216, 0.935216); transform-origin: left top;'>
            <tbody>
                <tr>
                    <td align='center' valign='top'>
                        <div id='x_template_header_image' style = 'width: 100%; background-color: #000; padding: 10px 0;'>
                            
                            <img data-imagetype='External' src='/home2/maxiplas/images/old-logo-maxi.png' alt='Plásticos Líder' style='border:none; display:inline-block; width:100px; height:80px; font-weight:bold;  outline:none; text-decoration:none; text-transform:capitalize; vertical-align:middle; margin-left:0; margin-right:0'>
                            <p style='color: #fff; font-family: 'Montserrat', sans-serif; font-weight: 600'>MaxiPlásticos</p>
                        </div>
                        
                        <table border='0' cellpadding='0' cellspacing='0' width='100%' id='x_template_container' style='background-color:#f30000; border-radius:3px'>
                            <tbody>
                                <tr>
                                    <td align='center' valign='top'>
                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' id='x_template_header' style='background-color:#f30000; color:#fff; border-bottom:0; font-weight:bold; line-height:100%; vertical-align:middle;  font-family: 'Montserrat', sans-serif; border-radius:3px 3px 0 0'>
                                            <tbody>
                                                <tr>
                                                    <td id='x_header_wrapper' style='padding:36px 48px; display:block'>
                                                        <h1 style='font-family: 'Montserrat', sans-serif;font-size:24px; font-weight:300; line-height:150%; margin:0; text-align:left; color:#fff; background-color:inherit'>
                                                            Nova solicitação de orçamento!
                                                        </h1>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align='center' valign='top'>
                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' id='x_template_body'>
                                            <tbody>
                                                <tr>
                                                    <td valign='top' id='x_body_content' style='background-color:#fff'>
                                                        <table border='0' cellpadding='20' cellspacing='0' width='100%'>
                                                            <tbody>
                                                                <tr>
                                                                    <td valign='top' style='padding:48px 48px 32px'>
                                                                        <div id='x_body_content_inner' style='color:#737373; font-family: 'Montserrat', sans-serif; font-size:16px; line-height:150%; text-align:left'>
                                                                            <p style='margin:0 0 16px'>Você recebeu uma solicitação de orçamento de ".$name." contendo os itens abaixo:
                                                                            </p>
        
                                                                            <h2 style='color:#f30000; display:block; font-family: 'Montserrat', sans-serif; font-size:18px; font-weight:bold; line-height:130%; margin:0 0 18px; text-align:left'>
                                                                                Orçamento solicitado em ".date("d/m/Y \à\s H:i")."
                                                                            </h2>
                                                                        <div style='margin-bottom:40px'>
                                                                        
                                                                        <table class='x_td' cellspacing='0' cellpadding='6' border='1' style='color:#737373; border:1px solid #e4e4e4; vertical-align:middle; width:100%; font-family: 'Montserrat', sans-serif;'>
                                                                            <thead>
                                                                                <tr style = 'width: 100%';>
                                                                                    <th class='x_td' scope='col' style='color:#737373; border:1px solid #e4e4e4; vertical-align:middle; padding:12px; text-align:left'>Produto
                                                                                    </th>
                                                                                    
                                                                                    <th class='x_td' scope='col' style='color:#737373; border:1px solid #e4e4e4; vertical-align:middle; padding:12px; text-align:left'>Quantidade
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            
                                                                            <tbody>
                                                                                
                                                                                ".$corpoProdutos."
                                                                               
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    
                                                                    <table id='x_addresses' cellspacing='0' cellpadding='0' border='0' style='width:100%; vertical-align:top; margin-bottom:40px; padding:0'>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td valign='top' width='50%' style='text-align:left; font-family: 'Montserrat', sans-serif; border:0; padding:0'>
                                                                                    <h2 style='color:#f30000; display:block; font-family: 'Montserrat', sans-serif; font-size:18px; font-weight:bold; line-height:130%; margin:0 0 18px; text-align:left'>Informações do cliente
                                                                                    </h2>
                                                                                    
                                                                                    <address class='x_address' style='padding:12px; color:#737373; border:1px solid #e4e4e4'>Nome: ".$name."<br 
                                                                                    
                                                                                    <a href='tel:".$phone."' target='_blank' rel='noopener noreferrer' data-auth='NotApplicable' style='color:#737373; font-weight:normal; text-decoration:underline' data-linkindex='1'>Telefone: ".$phone."</a> <br aria-hidden='true'>E-mail: ".$email." <br
                                                                                    aria-hidden='true'>Cnpj: ".$cnpj." <br
                                                                                    aria-hidden='true'>Mensagem: ".$msg." <br
                                                                                </address>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        
        <tr>
            
        <td align='center' valign='top'>
            <table border='0' cellpadding='10' cellspacing='0' width='100%' id='x_template_footer'>
                <tbody>
                    <tr>
                        <td valign='top' style='padding:0; border-radius:6px'>
                            <table border='0' cellpadding='10' cellspacing='0' width='100%'>
                                <tbody>
                                    <tr>
                                        <td colspan='2' valign='middle' id='x_credit' style='border-radius:6px; border:0; color:#969696; font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif; font-size:12px; line-height:150%; text-align:center; padding:24px 0'>
                                            <p style='margin:0 0 16px'>Plásticos Líder<br aria-hidden='true'>Rua dos Pampas, 700 – Bairro Prado – Cep 30410-580 – Belo Horizonte . MG<br aria-hidden='true'>Telefone: (31) 3372-7898<br aria-hidden='true'>Email: pedidos@plasticoslider.com.br
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
        </tr>
        </tbody>
        </table>";

            $headers = 'From: iagost1@hotmail.com' . "\r\n" .
                        'Reply-To: iagost1@hotmail.com' . "\r\n" .
                        'Content-type: text/html; charset=utf8' . "\r\n" .
                        
                        'X-Mailer: PHP/' . phpversion();
            mail($para, $assunto, $corpo, $headers);

            unset($_SESSION['cart']);

            $this->redirect('/cart');
        }

        else {

            $_SESSION['flash'] = "Ocorreu um erro ao enviar seu pedido, tente novamente";
            $this->redirect('/cart');
        }
    }
}   