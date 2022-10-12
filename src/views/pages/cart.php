<?php $render ('header', ['categorieFab' => $categorieFab, 'categorieEsc' => $categorieEsc, 'categorieEscol' => $categorieEscol, 'cartProducts' => $cartProducts, 'activeMenu' => 'budget']); ?>

<section><?php if(!empty($_SESSION['flash'])): ?>
            <div class="warning">
                <p style = "margin-top: 10px; text-align: center;"><?php echo ($_SESSION['flash']);  $_SESSION['flash'] = '';?></p>
            </div>
        <?php endif; ?>
    <div class = "section-cart-area">
        
        <div class = "section-cart-area-left">
            <h3>LISTA DE PRODUTOS</h3> 
            <div class ="section-cart-products" <?php if(empty($_SESSION['cart'])) { echo("style = 'height: 80px;'");}?>>

            <?php
                if(empty($cartProducts)) {
                    echo ('Ops, você não escolheu nenhum produto :(');
                    exit;
                }
            ?>
                <?php foreach($cartProducts as $product): ?>
                    <div class = "section-cart-product">
                        <p class = "cart-desc-tittle">Descrição</p>
                        <p  class = "cart-qtd-tittle">Qtd</p>

                        <?php 
                            if($product['image'] == 'default_product_image.jpeg') {
                                echo("<img src = ".$base."/assets/images/products/default_product_image.jpeg>");
                            }

                            else {
                                echo("<img src = ".$base."/".$product['folder']."/".$product['image'].">");
                            }
                        ?>
                        <p class = "cart-desc-text"><?=$product['description']?></p>

                        <div class = "qtd-cart-buttons">
                            
                            <form method = "POST" action = "<?=$base?>/updateCart">
                                <input type="hidden" name="id_product" value="<?php echo $product['id']; ?>">
                                <input type="hidden" name="qt_product" value="<?php echo $product['qt']; ?>">

                                <input type="submit" name="-" value="-">
                                <?php echo $product['qt']; ?>
                                <input type="submit" name="+" value="+">
                            </form>
                        </div>
                        
                        <div class = "section-del-button">
                            <a href = "<?=$base?>/delCartItem/<?=$product['id'];?>" class = "cart-del-button" onclick='return confirmDel("Tem certeza que deseja remover esse item do seu orçamento?")'>x</a>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class ="botom-button">
                <a class = "clear-list" href="<?=$base?>/clearCart" onclick='return confirmDel("Tem certeza que deseja esvaziar seu orçamento?")'>Limpar Lista</a><br>
                
                <a class = "more-products" href = "<?=$base?>">ESCOLHER MAIS PRODUTOS</a>
            </div>
        </div>

        <div class = "section-cart-area-right">
            <h3>SOLICITE UM ORÇAMENTO</h3>
 
            <form method = "POST" action = "<?=$base;?>/budgetMail" style="margin:0;">
                <label>
                    <p>NOME</p>
                    <input class = "input-name" type="text" name="name" required>
                </label>

                <div class = "form-double-info">
                    <label>
                        <p>E-MAIL</p>
                        <input class = "input-email" type="text" name="email" required>
                    </label>

                    <label>
                        <p>TELEFONE</p>
                        <input class = "input-phone" type="text" name="phone" required>
                    </label>
                </div>

                <label>
                    <p>CNPJ/CPF</p>
                    <input  class = "input-cnpj" type="text" name="cnpj" required>
                </label>

                <label>
                    <p style="margin-top:35px;">MENSAGEM</p>
                    <textarea style="height:380px;" name = 'msg'></textarea>
                </label>
                
                <div class = "cart-form-button">
                    <button>FINALIZAR ORÇAMENTO</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://unpkg.com/imask"></script>
<script>
    var maskCpfOuCnpj = IMask(document.querySelector('.input-cnpj'), {
		mask:[
			{
				mask: '000.000.000-00',
				maxLength: 11
			},
			{
				mask: '00.000.000/0000-00'
			}
		]
	});
</script>


<script src="<?=$base;?>/assets/js/vanilla.js"></script>
<?php $render('footer', [ 'categorieFab' => $categorieFab, 'categorieEsc' => $categorieEsc, 'categorieEscol' => $categorieEscol])?>