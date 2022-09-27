<?php $render ('header', ['categorieFab' => $categorieFab, 'categorieEsc' => $categorieEsc, 'categorieEscol' => $categorieEscol]); ?>

<section>
    <div class = "section-cart-area">
        <div class = "section-cart-area-left">
            <h3>LISTA DE PRODUTOS</h3>   
            <div class ="section-cart-products">
                <div class = "section-cart-product">
                    <p class = "cart-desc-tittle">Descrição</p>
                    <p  class = "cart-qtd-tittle">Qtd</p>

                    <img src = "assets/images/products/default_product_image.jpeg">
                    <p class = "cart-desc-text">Lorem ipsum dolor sit amet. Aut voluptates consequatur nam vero iusto ut iste debitis ut</p>

                    <div class = "qtd-cart-buttons">
                        <i class='bx bx-chevron-up cart-qt-more' data-action='increase'></i>
                        <input class = "add-to-cart-qt 123" type = "text" name="qt" value ="1" id="input"></input>
                        <i class='bx bx-chevron-down cart-qt-less' data-action='decrease'></i>
                    </div>

                    <p class = "cart-del-button">x</p>
                </div>

                <div class = "section-cart-product">
                    <p class = "cart-desc-tittle">Descrição</p>
                    <p  class = "cart-qtd-tittle">Qtd</p>

                    <img src = "assets/images/products/default_product_image.jpeg">
                    <p class = "cart-desc-text">Lorem ipsum dolor sit amet. Aut voluptates consequatur nam vero iusto ut iste debitis ut</p>

                    <div class = "qtd-cart-buttons">
                        <i class='bx bx-chevron-up cart-qt-more' data-action='increase'></i>
                        <input class = "add-to-cart-qt 123" type = "text" name="qt" value ="1" id="input"></input>
                        <i class='bx bx-chevron-down cart-qt-less' data-action='decrease'></i>
                    </div>

                    <p class = "cart-del-button">x</p>
                </div>

                <div class = "section-cart-product">
                    <p class = "cart-desc-tittle">Descrição</p>
                    <p  class = "cart-qtd-tittle">Qtd</p>

                    <img src = "assets/images/products/default_product_image.jpeg">
                    <p class = "cart-desc-text">Lorem ipsum dolor sit amet. Aut voluptates consequatur nam vero iusto ut iste debitis ut</p>

                    <div class = "qtd-cart-buttons">
                        <i class='bx bx-chevron-up cart-qt-more' data-action='increase'></i>
                        <input class = "add-to-cart-qt 123" type = "text" name="qt" value ="1" id="input"></input>
                        <i class='bx bx-chevron-down cart-qt-less' data-action='decrease'></i>
                    </div>

                    <p class = "cart-del-button">x</p>
                </div>

                <div class = "section-cart-product">
                    <p class = "cart-desc-tittle">Descrição</p>
                    <p  class = "cart-qtd-tittle">Qtd</p>

                    <img src = "assets/images/products/default_product_image.jpeg">
                    <p class = "cart-desc-text">Lorem ipsum dolor sit amet. Aut voluptates consequatur nam vero iusto ut iste debitis ut</p>

                    <div class = "qtd-cart-buttons">
                        <i class='bx bx-chevron-up cart-qt-more' data-action='increase'></i>
                        <input class = "add-to-cart-qt 123" type = "text" name="qt" value ="1" id="input"></input>
                        <i class='bx bx-chevron-down cart-qt-less' data-action='decrease'></i>
                    </div>

                    <p class = "cart-del-button">x</p>
                </div>

                <div class = "section-cart-product">
                    <p class = "cart-desc-tittle">Descrição</p>
                    <p  class = "cart-qtd-tittle">Qtd</p>

                    <img src = "assets/images/products/default_product_image.jpeg">
                    <p class = "cart-desc-text">Lorem ipsum dolor sit amet. Aut voluptates consequatur nam vero iusto ut iste debitis ut</p>

                    <div class = "qtd-cart-buttons">
                        <i class='bx bx-chevron-up cart-qt-more' data-action='increase'></i>
                        <input class = "add-to-cart-qt 123" type = "text" name="qt" value ="1" id="input"></input>
                        <i class='bx bx-chevron-down cart-qt-less' data-action='decrease'></i>
                    </div>

                    <p class = "cart-del-button">x</p>
                </div>
            </div>
            <div class ="botom-button">
                <a class = "clear-list" href="">Limpar Lista</a><br>
                <a class = "more-products" href = "<?=$base?>">ESCOLHER MAIS PRODUTOS</a>
            </div>
        </div>

        <div class = "section-cart-area-right">
            <h3>SOLICITE UM ORÇAMENTO</h3>

            <?php if(!empty($_SESSION['flash'])): ?>
                <div class="warning">
                    <p style = "margin-top: 10px; text-align: left;"><?php echo ($_SESSION['flash']);  $_SESSION['flash'] = '';?></p>
                </div>
            <?php endif; ?>
 
            <form method = "POST" action = "contact_email" style="margin:0;">
                <label>
                    <p>NOME</p>
                    <input class = "input-name" type="text" name="name">
                </label>

                <div class = "form-double-info">
                    <label>
                        <p>E-MAIL</p>
                        <input class = "input-email" type="text" name="email">
                    </label>

                    <label>
                        <p>TELEFONE</p>
                        <input class = "input-phone" type="text" name="phone">
                    </label>
                </div>

                <label>
                    <p>CNPJ</p>
                    <input  class = "input-cnpj" type="text" name="cnpj">
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

<script>
    document.querySelectorAll('.qtd-cart-buttons i').forEach(item => {
        item.addEventListener("click", function() {
            console.log();
            var qt = parseInt(document.querySelector('.abcd').value);
            var action = item.getAttribute('data-action');

            if(action == 'decrease') {
                if(qt - 1 >= 1) {
                    qt = qt -1;
                }
            }

            else if(action == 'increase') {
                qt = qt + 1;
            }

            document.querySelector('.abcd').value = qt
                
        });
    });
</script>

<?php $render('footer', [ 'categorieFab' => $categorieFab, 'categorieEsc' => $categorieEsc, 'categorieEscol' => $categorieEscol])?>