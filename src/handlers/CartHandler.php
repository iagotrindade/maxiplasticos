<?php
namespace src\handlers;
use \src\handlers\ProductHandler;
use \src\models\Budget;

class CartHandler {
    public static function getCartProducts() {
        
        $array = array();
        if(isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }

        else {
            $cart = array();
        }
        
        foreach($cart as $id => $qt) {
            $productInfo = ProductHandler::getProductById($id);

            $array[] = array(
                'id' => $id,
                'name' => $productInfo->name,
                'code' => $productInfo->code,
                'qt' => $qt,
                'folder' => $productInfo->path,
                'image' => $productInfo->mainI,
                'description' => $productInfo->desc
            );
        }

        return $array;
    }

    public static function sendClientEmail($name, $email, $phone, $cnpj, $msg) {
        $para  = $email; 
        $assunto  = 'Solicitação de Orçamento feita na Maxiplasticos!';

        $cartProducts = CartHandler::getCartProducts();

        $corpoProdutos = '';

            foreach($cartProducts as $item) {
                $corpoProdutos .= "<tr class='x_order_item' style = 'width: 600px'>
                <td class='x_td' style='color:#737373; border:1px solid #e4e4e4; padding:12px; text-align:center; vertical-align:middle; font-family: 'Montserrat', sans-serif;'>".$item['name']."</td>
                </td>
                
                <td class='x_td' style='color:#737373; border:1px solid #e4e4e4; padding:12px; text-align:center; vertical-align:middle; font-family: 'Montserrat', sans-serif;'>".$item['qt']."</td>
            </tr>";}

            

            
            
            $corpo = "<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' min-scale='0.9352159468438538' style='transform: scale(0.935216, 0.935216); transform-origin: left top;'>
            <tbody>
                <tr>
                    <td align='center' valign='top'>
                        <div id='x_template_header_image' style = 'width: 100%; background-color: #000; padding: 10px 0;'>
                            
                            <img data-imagetype='External' src='https://i.imgur.com/qOilmUa.png' alt='Plásticos Líder' style='border:none; display:inline-block; font-weight:bold;  outline:none; text-decoration:none; text-transform:capitalize; vertical-align:middle; margin-left:0; margin-right:0'>
                        </div>
                        
                        <table border='0' cellpadding='0' cellspacing='0' width='100%' id='x_template_container' style='background-color:#f30000; border-radius:3px'>
                            <tbody>
                                <tr>
                                    <td align='center' valign='top'>
                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' id='x_template_header' style='background-color:#f30000; color:#fff; border-bottom:0; font-weight:bold; line-height:100%; vertical-align:middle;  font-family: 'Montserrat', sans-serif; border-radius:3px 3px 0 0'>
                                            <tbody>
                                                <tr>
                                                    <td id='x_header_wrapper' style='padding:36px 48px; display:block'>
                                                        <h1 style='font-family: 'Montserrat', sans-serif;font-size:20px; font-weight:300; line-height:150%; margin:0; text-align:left; color:#fff;'>
                                                            <p style = 'color: #fff; font-size 16px'>Agradecemos sua solicitação!</p>
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
                                                                    <td valign='top' style='padding:48px 48px 32px; width: 600px'>
                                                                        <div id='x_body_content_inner' style='color:#737373; font-family: 'Montserrat', sans-serif; font-size:16px; line-height:150%; text-align:left'>
                                                                            <p style='margin:0 0 16px'>Olá ".$name.", seu orçamento foi enviado ao setor responsável e em breve entraremos em contato com você via E-mail ou Telefone, abaixo estão listados os itens selecionados por você.
                                                                            </p>
        
                                                                            <h2 style='color:#f30000; display:block; font-family: 'Montserrat', sans-serif; font-size:18px; font-weight:bold; line-height:130%; margin:0 0 18px; text-align:left'>
                                                                                Orçamento solicitado em ".date("d/m/Y \à\s H:i")."
                                                                            </h2>
                                                                        <div style='margin-bottom:40px'>
                                                                        
                                                                        <table class='x_td' cellspacing='0' cellpadding='6' border='1' style='color:#737373; border:1px solid #e4e4e4; vertical-align:middle; width:100%; font-family: 'Montserrat', sans-serif;'>
                                                                            <thead>
                                                                                <tr style = 'width: 100%';>
                                                                                    <th class='x_td' scope='col' style='color:#737373; border:1px solid #e4e4e4; vertical-align:middle; padding:12px; text-align:center'>Produto
                                                                                    </th>
                                                                                    
                                                                                    <th class='x_td' scope='col' style='color:#737373; border:1px solid #e4e4e4; vertical-align:middle; padding:12px; text-align:center'>Quantidade
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
                                                                                    <p style='color:#f30000; display:block; font-family: 'Montserrat', sans-serif; font-size:18px; font-weight:bold; line-height:130%; margin:0 0 18px; text-align:left'>Nós da Maxiplasticos agracemos pela preferência!<br>
                                                                                    <p style = ''>Há mais de 23 anos fazendo nosso melhor papel! </p>
                                                                                    </p>
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
    }

    public static function sendBudget($name, $email, $phone, $cnpj, $msg) {
        $para  = "iagost1@hotmail.com"; 
            $assunto  = 'Solicitação de Orçamento de '.$name.'!';

            $cartProducts = CartHandler::getCartProducts();

            $corpoProdutos = '';

            foreach($cartProducts as $item) {
                $corpoProdutos .= "<tr class='x_order_item' style = 'width: 600px'>
                <td class='x_td' style='color:#737373; border:1px solid #e4e4e4; padding:12px; text-align:center; vertical-align:middle; font-family: 'Montserrat', sans-serif;'>".$item['name']."</td>
                </td>

                <td class='x_td' style='color:#737373; border:1px solid #e4e4e4; padding:12px; text-align:center; vertical-align:middle; font-family: 'Montserrat', sans-serif;'>".$item['code']."</td>
                </td>
                
                <td class='x_td' style='color:#737373; border:1px solid #e4e4e4; padding:12px; text-align:center; vertical-align:middle; font-family: 'Montserrat', sans-serif;'>".$item['qt']."</td>
            </tr>";}
            

            
            
            $corpo = "<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' min-scale='0.9352159468438538' style='transform: scale(0.935216, 0.935216); transform-origin: left top;'>
            <tbody>
                <tr>
                    <td align='center' valign='top'>
                        <div id='x_template_header_image' style = 'width: 100%; background-color: #000; padding: 10px 0;'>
                            
                            <img data-imagetype='External' src='https://i.imgur.com/qOilmUa.png' alt='Plásticos Líder' style='border:none; display:inline-block; font-weight:bold;  outline:none; text-decoration:none; text-transform:capitalize; vertical-align:middle; margin-left:0; margin-right:0'>
                        </div>
                        
                        <table border='0' cellpadding='0' cellspacing='0' width='100%' id='x_template_container' style='background-color:#f30000; border-radius:3px'>
                            <tbody>
                                <tr>
                                    <td align='center' valign='top'>
                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' id='x_template_header' style='background-color:#f30000; color:#fff; border-bottom:0; font-weight:bold; line-height:100%; vertical-align:middle;  font-family: 'Montserrat', sans-serif; border-radius:3px 3px 0 0'>
                                            <tbody>
                                                <tr>
                                                    <td id='x_header_wrapper' style='padding:36px 48px; display:block'>
                                                        <h1 style='font-family: 'Montserrat', sans-serif;font-size:20px; font-weight:300; line-height:150%; margin:0; text-align:left; color:#fff;'>
                                                            <p style = 'color: #fff; font-size 16px'>Nova solicitação de orçamento!</p>
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
                                                                                    <th class='x_td' scope='col' style='color:#737373; border:1px solid #e4e4e4; vertical-align:middle; padding:12px; text-align:center'>Produto
                                                                                    </th>

                                                                                    <th class='x_td' scope='col' style='color:#737373; border:1px solid #e4e4e4; vertical-align:middle; padding:12px; text-align:center'>Código
                                                                                    </th>
                                                                                    
                                                                                    <th class='x_td' scope='col' style='color:#737373; border:1px solid #e4e4e4; vertical-align:middle; padding:12px; text-align:center'>Quantidade
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
                                                                                    
                                                                                    <address class='x_address' style='padding:12px; color:#737373; border:1px solid #e4e4e4'>Nome: ".$name."<br >
                                                                                    
                                                                                        <a href='tel:".$phone."' target='_blank' rel='noopener noreferrer' data-auth='NotApplicable' style='color:#737373; font-weight:normal; text-decoration:underline' data-linkindex='1'>Telefone: ".$phone."</a> <br>

                                                                                        <a href='mailto:".$email."?subject=Solicitação de orçamento' target='_blank' rel='noopener noreferrer' data-auth='NotApplicable' style='color:#737373; font-weight:normal; text-decoration:underline' data-linkindex='1'>E-mail: ".$email."</a> <br>

                                                                                        <a rel='noopener noreferrer' data-auth='NotApplicable' style='color:#737373; font-weight:normal;' data-linkindex='1'>Cnpj: ".$cnpj."</a> <br>

                                                                                        <a rel='noopener noreferrer' data-auth='NotApplicable' style='color:#737373; font-weight:normal;' data-linkindex='1'>Mensagem do Cliente: ".$msg."</a>
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
    }

    public static function registerBudget($name, $email, $phone, $cnpj) {
        if($name && $email && $phone && $cnpj) {

            Budget::insert([
                'client_name' => $name,
                'client_email' => $email,
                'client_phone' => $phone,
                'client_cnpj' => $cnpj
            ])->execute();

            return true;
        }
        
        else {
            return false;
        }


    }
}