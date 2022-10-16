<?php $render ('header', ['categorieFab' => $categorieFab, 'categorieEsc' => $categorieEsc, 'categorieEscol' => $categorieEscol, 'activeMenu' => 'about']);?>  

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

        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide" style = "background: none; box-shadow: none;">
                    <div class = "partner-box">
                        <img src = "<?=$base;?>/assets/images/banners/partner1.png">
                    </div>
                </div>

                <div class="swiper-slide" style = "background: none; box-shadow: none;">
                    <div class = "partner-box">
                        <img src = "<?=$base;?>/assets/images/banners/partner2.png">
                    </div>
                </div>

                <div class="swiper-slide" style = "background: none; box-shadow: none;">
                    <div class = "partner-box">
                        <img src = "<?=$base;?>/assets/images/banners/partner3.png">
                    </div>
                </div>

                <div class="swiper-slide" style = "background: none; box-shadow: none;">
                    <div class = "partner-box">
                        <img src = "<?=$base;?>/assets/images/banners/partner4.png">
                    </div>
                </div>

                <div class="swiper-slide" style = "background: none; box-shadow: none;">
                    <div class = "partner-box">
                        <img src = "<?=$base;?>/assets/images/banners/partner5.png">
                    </div>
                </div>

                <div class="swiper-slide" style = "background: none; box-shadow: none;">
                    <div class = "partner-box">
                        <img src = "<?=$base;?>/assets/images/banners/partner6.png">
                    </div>
                </div>

                <div class="swiper-slide" style = "background: none; box-shadow: none;">
                    <div class = "partner-box">
                        <img src = "<?=$base;?>/assets/images/banners/partner7.png">
                    </div>
                </div>

                <div class="swiper-slide" style = "background: none; box-shadow: none;">
                    <div class = "partner-box">
                        <img src = "<?=$base;?>/assets/images/banners/partner8.png">
                    </div>
                </div>

                <div class="swiper-slide" style = "background: none; box-shadow: none;">
                    <div class = "partner-box">
                        <img src = "<?=$base;?>/assets/images/banners/partner9.png">
                    </div>
                </div>

                <div class="swiper-slide" style = "background: none; box-shadow: none;">
                    <div class = "partner-box">
                        <img src = "<?=$base;?>/assets/images/banners/partner10.png">
                    </div>
                </div>

                <div class="swiper-slide" style = "background: none; box-shadow: none;">
                    <div class = "partner-box">
                        <img src = "<?=$base;?>/assets/images/banners/partner11.png">
                    </div>
                </div>

                <div class="swiper-slide" style = "background: none; box-shadow: none;">
                    <div class = "partner-box">
                        <img src = "<?=$base;?>/assets/images/banners/partner12.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
            
    <!-- Initialize Swiper and Mouseover -->
    <script>
        var width = window. screen. width;

        if(width < 1350 && width > 800) {
            var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            });
        }

        else if(width < 800 && width > 600) {
            var swiper = new Swiper(".mySwiper", {
            slidesPerView: 2,
            spaceBetween: 30,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            slidesPerGroup: 2,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            });
        }

        else if (width < 600) {
            var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            slidesPerGroup: 1,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            });
        }

        else {
            var swiper = new Swiper(".mySwiper", {
            slidesPerView: 5,
            spaceBetween: 30,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            slidesPerGroup: 5,
            loop: true,
            loopFillGroupWithBlank: true,
            
            });
        }
</script>
<?php $render('footer', ['categorieFab' => $categorieFab, 'categorieEsc' => $categorieEsc, 'categorieEscol' => $categorieEscol])?>
