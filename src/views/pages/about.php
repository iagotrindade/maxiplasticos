<?php $render ('header', ['categorieFab' => $categorieFab, 'categorieEsc' => $categorieEsc, 'categorieEscol' => $categorieEscol]);?>  

<section class="section-about" style = "margin-top: 40px;">
    <div class="section-about-left" style = "margin-right: 40px;">
        <div class="section-about-img">
            <img src="<?=$base;?>/assets/images/banners/maxi.png">
        </div>
    </div>

    <div class="section-about-right">
        <div class="section-about-tittle">
            <h3>SOBRE NÓS</h3>
        </div>

        <div class="section-about-text">
            <p>A MaxiPlásticos está no mercado de representação de produtos para papelarias há mais de 23 anos. Construímos uma história de confiança através dos anos, trabalhando para atender as expectativas, oferecendo produtos que satisfaçam as reais necessidades dos nossos clientes.</p>
            <br>

            <p>
                Hoje apostamos em outra area porem sem perder nossos valores como empresa, estamos entregando produtos de qualidade premium não para aqueles acomodados em sua zona de conforto, mas sim para aqueles que estão visando o topo.
            </p>
        </div>
    </div>
</section>

<section>
    <div class = "section-about-values">
        <div class = "section-about-value-box">
            <h3>MISSÃO</h3>
            <div class = "section-about-value-box-underline"></div>
            <p>
                Nossa MISSÃO é atender o maior número de clientes sem a mínima perda de qualidade nos processos,
                mantendo padrões altos e a confiabilidade inabalável dos nossos parceiros.
            </p>
        </div>

        <div class = "section-about-value-box">
            <h3>VISÃO</h3>
            <div class = "section-about-value-box-underline"></div>
            <p>
                Temos a VISÃO fixa no alcance de uma fatia ainda maior do mercado, alcançando todas as empresas
                brasileiras e seus setores que ainda não conhecem a MaxiPlásticos, e que poderão contar com 
                a melhor negociação e agilidade de entrega.
            </p>
        </div>

        <div class = "section-about-value-box">
            <h3>VALORES</h3>
            <div class = "section-about-value-box-underline"></div>
            <p>
                Os VALORES inegociáveis da MaxiPlásticos estão no respeito ao negócio dos clientes, na formação de contratos justos dos clientes e sempre cumpridos em tempo e no reconhecimento dos que nos
                acompanham em parceria, seja interna ou externa.
            </p>
        </div>
    </div>
</section>

<section>
    <div class = "section-about-partners">
        <h3>NOSSOS PARCEIROS</h3>

        <div class = "section-about-partners-banner">
            <div class = "partner-box">
                <img src = "<?=$base?>/assets/images/products/default_product_image.jpeg">
            </div>

            <div class = "partner-box">
            <img src = "<?=$base?>/assets/images/products/default_product_image.jpeg">
            </div>

            <div class = "partner-box">
            <img src = "<?=$base?>/assets/images/products/default_product_image.jpeg">
            </div>

            <div class = "partner-box">
                <img src = "<?=$base?>/assets/images/products/default_product_image.jpeg">
            </div>

            <div class = "partner-box">
                <img src = "<?=$base?>/assets/images/products/default_product_image.jpeg">
            </div>

            <div class = "partner-box">
                <img src = "<?=$base?>/assets/images/products/default_product_image.jpeg">
            </div>
        </div>
    </div>
</section>

<section>
    <div class = "section-about-form">
        <div class = "section-about-form-left">

            <h3>FALE CONOSCO</h3>

            <?php if(!empty($_SESSION['flash'])): ?>
                <div class="warning">
                    <p style = "margin-top: 10px; text-align: left;"><?php echo ($_SESSION['flash']);  $_SESSION['flash'] = '';?></p>
                </div>
            <?php endif; ?>

            <form method = "POST" action = "contact_email">
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
                    <p>ASSUNTO</p>
                    <input class = "input-cc" type="text" name="cc">
                </label>

                <label>
                    <p>MENSAGEM</p>
                    <textarea name = 'msg'></textarea>
                </label>
                
                <button>ENVIAR</button>
            </form>
        </div>

        <div class = "section-about-form-right">
            <div class="about-area-more-contact">
                <h3>OUTRAS FORMAS DE CONTATO</h3>
                <ul>
                    <li>
                        <a href="">(31) 3333 - 3333</a>
                    </li>

                    <li>
                        <a href="">(31) 3333 - 3333</a>
                    </li>

                    <li>
                        <a href="">(31) 3333 - 3333</a>
                    </li>

                    <li>
                        <a href="">exemplo@email.com</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>






<?php $render('footer', ['categorieFab' => $categorieFab, 'categorieEsc' => $categorieEsc, 'categorieEscol' => $categorieEscol])?>
