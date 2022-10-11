<?php $render ('header', ['products' => $products, 'recentProducts' => $recentProducts, 'categorieFab' => $categorieFab, 'categorieEsc' => $categorieEsc, 'categorieEscol' => $categorieEscol, 'activeMenu' => 'home']);?>  
        <section>
            <div class="banner-section-area">
                <div class="slider">
                    <div class="slider--controls">
                        <div class="slider--control" onclick="goPrev()">
                            <i class='bx bx-chevron-left' ></i>
                        </div>
                        <div class="slider--control" onclick="goNext()">
                            <i class='bx bx-chevron-right' ></i>
                        </div>
                    </div>
                    <div class="slider--width">
                        <div class="slider--item" style="background-image: url('<?=$base;?>/assets/images/banners/banner-teste.png');">
                        </div>
                        <div class="slider--item" style="background-image: url('<?=$base;?>/assets/images/banners/banner-teste.png');">
                            
                        </div>
                        <div class="slider--item" style="background-image: url('<?=$base;?>/assets/images/banners/banner-teste.png');">
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                let totalSlides = document.querySelectorAll('.slider--item').length;
                let currentSlide = 0;

                let sliderWidth = document.querySelector('.slider').clientWidth;

                document.querySelector('.slider--width').style.width = 
                    `${sliderWidth * totalSlides}px`;

                document.querySelector('.slider--controls').style.width = 
                    `${sliderWidth}px`;
                document.querySelector('.slider--controls').style.height = 
                    `${document.querySelector('.slider').clientHeight}px`;

                function goPrev() {
                    currentSlide--;
                    if(currentSlide < 0) {
                        currentSlide = totalSlides - 1;
                    }
                    updateMargin();
                }
                function goNext() {
                    currentSlide++;
                    if(currentSlide > (totalSlides-1)) {
                        currentSlide = 0;
                    }
                    updateMargin();
                }

                function updateMargin() {
                    let sliderItemWidth = document.querySelector('.slider--item').clientWidth;
                    let newMargin = (currentSlide * sliderItemWidth);
                    document.querySelector('.slider--width').style.marginLeft = 
                        `-${newMargin}px`;
                }

                setInterval(goNext, 5000);
            </script>
        </section>

        <section>
            <div class="section-categories-area-tittle">
                <h1>CATEGORIAS</h1>
            </div>
                <div class = "section-categories-groups">
                    <div class="category-box">
                        <div class="category-box-icon">
                            <img src="<?=$base;?>/assets/images/icons/fabricação.png"/>
                        </div>
                        <div class="category-box-tittle">
                            <h3>
                                <?=$categorieFab->name?>
                            </h3>
                        </div>
                        <div class="category-box-text">
                            <?=$categorieFab->desc?>
                        </div>
                        <div class="category-box-button">
                            <a href="<?=$base?>/produtos/categoria/<?=$categorieFab->id?>">
                                VER MAIS
                            </a>
                        </div>
                    </div>

                    <div class="category-box">
                        <div class="category-box-icon">
                            <img src="<?=$base;?>/assets/images/icons/escritorio.png"/>
                        </div>
                        <div class="category-box-tittle">
                            <h3>
                                <?=$categorieEsc->name?>
                            </h3>
                        </div>
                        <div class="category-box-text">
                            <?=$categorieEsc->desc?>
                        </div>
                        <div class="category-box-button">
                            <a href="<?=$base?>/produtos/categoria/<?=$categorieEsc->id?>">
                                VER MAIS
                            </a>
                        </div>
                    </div>

                    <div class="category-box">
                        <div class="category-box-icon">
                            <img src="<?=$base;?>/assets/images/icons/escolar.png"/>
                        </div>
                        <div class="category-box-tittle">
                            <h3>
                                <?=$categorieEscol->name?>
                            </h3>
                        </div>
                        <div class="category-box-text">
                            <?=$categorieEsc->desc?>
                        </div>
                        <div class="category-box-button">
                            <a href="<?=$base?>/produtos/categoria/<?=$categorieEscol->id?>">
                                VER MAIS
                            </a>
                        </div>
                    </div>
                </div>
        </section>

        <section class="section-catalog-download">
            <div class="section-catalog-left">
                <div class="section-catalog-img">
                    <img src="<?=$base;?>/assets/images/banners/imagem-catalogo.png">
                </div>
            </div>

            <div class="section-catalog-right">
                <div class="section-catalog-tittle">
                    <h3>CATALOGO DE PRODUTOS</h3>
                    <div class="catalog-tittle-underline"></div>
                </div>
                <div class="section-catalog-text">
                    <P>Com mais de 300 produtos, nosso catalogo irá ajuda-lo(a) a conhecer todos nossos produtos e decidir qual se encaixa melhor para sua necessidade <font color="#f30000">faça download clicando no botão abaixo.</font></P>
                </div>
                <div class="section-catalog-button">
                    <a href="<?=$base;?>/assets/files/catalogo.pdf" download="catalogo.pdf">
                        DOWNLOAD
                    </a>
                </div>
            </div>
        </section>

        <section class="products-carrousell">
            <div class="products-carrousell-tittle">
                <h3>
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.2612 6.67863C17.5479 7.20318 16.8359 7.72992 16.1209 8.25183C15.117 8.98444 14.1101 9.71353 13.1049 10.4439C12.7814 10.6792 12.7221 10.8618 12.8454 11.2415C13.4767 13.1843 14.1079 15.1271 14.736 17.0708C14.7632 17.1551 14.7575 17.2503 14.7672 17.3407C14.6785 17.3087 14.5762 17.2951 14.5025 17.242C12.845 16.0432 11.1902 14.84 9.53532 13.6382C9.21576 13.406 9.02965 13.4055 8.71273 13.6356C7.0671 14.8304 5.42192 16.0265 3.7741 17.2183C3.68982 17.2793 3.57876 17.3025 3.48044 17.3438C3.49229 17.2424 3.48702 17.1357 3.51775 17.0409C4.13974 15.1139 4.76568 13.1883 5.39163 11.2622C5.52375 10.8561 5.46932 10.6819 5.12957 10.4352C3.48395 9.23991 1.83789 8.04596 0.194894 6.84719C0.115883 6.78968 0.0645257 6.69443 0 6.61674C0.0956912 6.5983 0.191382 6.56363 0.287513 6.56319C2.31634 6.56011 4.34517 6.56099 6.374 6.56055C6.81119 6.56055 6.95385 6.45608 7.08861 6.04259C7.71631 4.11121 8.34401 2.17939 8.97522 0.249324C9.00463 0.160217 9.07003 0.0825227 9.11876 0C9.17143 0.0855953 9.24386 0.165045 9.27414 0.257664C9.90579 2.18773 10.5326 4.11955 11.1603 6.05093C11.2911 6.45345 11.4382 6.56055 11.8635 6.56055C13.8862 6.56055 15.9093 6.55967 17.932 6.56275C18.0422 6.56275 18.1524 6.59172 18.2625 6.60708C18.2612 6.63122 18.2612 6.65493 18.2612 6.67863Z" fill="#F30000"/>
                        </svg>                        
                    PRODUTOS DE FABRICAÇÃO
                </h3>

                <a href="<?=$base?>/produtos/categoria/1">
                    <p>VER TODOS -></p>
                </a>
            </div>
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach($products as $product): ?>
                        <div class="swiper-slide">
                            <div class = "product-box">
                                <a href = "<?=$base?>/product/<?=$product->id;?>">
                                    <div class = "product-box-img">
                                        <?php 
                                            if($product->main_image == 'default_product_image.jpeg') {
                                                echo("<img src = ".$base."/assets/images/products/default_product_image.jpeg>");
                                            }

                                            else {
                                                echo("<img src = ".$base."/".$product->path."/".$product->main_image.">");
                                            }
                                        ?>
                                    </div>
                                    <div class = "product-box-description">
                                        <?=$product->desc?>
                                    </div>
                                </a>
                                <div class="budget-button">
                                    <a href="<?=$base?>/product/<?=$product->id;?>">
                                        ORÇAMENTO 
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>
        
        <section>
            <div class="section-two-banners">
                <div class="section-banner-left">
                    <img src="<?=$base?>/assets/images/banners/banner-left.png">
                </div>
                <div class="section-banner-right">
                    <img src="<?=$base?>/assets/images/banners/banner-right.png">
                </div>
            </div>
        </section>

        <section class="products-carrousell">
            <div class="products-carrousell-tittle">
                <h3>
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.2612 6.67863C17.5479 7.20318 16.8359 7.72992 16.1209 8.25183C15.117 8.98444 14.1101 9.71353 13.1049 10.4439C12.7814 10.6792 12.7221 10.8618 12.8454 11.2415C13.4767 13.1843 14.1079 15.1271 14.736 17.0708C14.7632 17.1551 14.7575 17.2503 14.7672 17.3407C14.6785 17.3087 14.5762 17.2951 14.5025 17.242C12.845 16.0432 11.1902 14.84 9.53532 13.6382C9.21576 13.406 9.02965 13.4055 8.71273 13.6356C7.0671 14.8304 5.42192 16.0265 3.7741 17.2183C3.68982 17.2793 3.57876 17.3025 3.48044 17.3438C3.49229 17.2424 3.48702 17.1357 3.51775 17.0409C4.13974 15.1139 4.76568 13.1883 5.39163 11.2622C5.52375 10.8561 5.46932 10.6819 5.12957 10.4352C3.48395 9.23991 1.83789 8.04596 0.194894 6.84719C0.115883 6.78968 0.0645257 6.69443 0 6.61674C0.0956912 6.5983 0.191382 6.56363 0.287513 6.56319C2.31634 6.56011 4.34517 6.56099 6.374 6.56055C6.81119 6.56055 6.95385 6.45608 7.08861 6.04259C7.71631 4.11121 8.34401 2.17939 8.97522 0.249324C9.00463 0.160217 9.07003 0.0825227 9.11876 0C9.17143 0.0855953 9.24386 0.165045 9.27414 0.257664C9.90579 2.18773 10.5326 4.11955 11.1603 6.05093C11.2911 6.45345 11.4382 6.56055 11.8635 6.56055C13.8862 6.56055 15.9093 6.55967 17.932 6.56275C18.0422 6.56275 18.1524 6.59172 18.2625 6.60708C18.2612 6.63122 18.2612 6.65493 18.2612 6.67863Z" fill="#F30000"/>
                        </svg>                        
                    PRODUTOS RECENTES
                </h3>

                <a href="<?=$base?>/produtos/categoria/recentes">
                    <p>VER TODOS -></p>
                </a>
            </div>
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach($recentProducts as $rProduct): ?>
                        <div class="swiper-slide">
                            <div class = "product-box">
                                <a href = "<?=$base?>/product/<?=$rProduct->id;?>">
                                    <div class = "product-box-img">
                                        <?php 
                                            if($rProduct->main_image == 'default_product_image.jpeg') {
                                                echo("<img src = ".$base."/assets/images/products/default_product_image.jpeg>");
                                            }

                                            else {
                                                echo("<img src = ".$base."/".$rProduct->path."/".$rProduct->main_image.">");
                                            }
                                        ?>
                                    </div>
                                    <div class = "product-box-description">
                                        <?=$rProduct->desc?>
                                    </div>
                                </a>
                                <div class="budget-button">
                                    <a href="<?=$base?>/product/<?=$product->id;?>">
                                        ORÇAMENTO 
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
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
                    slidesPerGroup: 5,
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
            </script>
        </section>

        <section class="section-about">
            <div class="section-about-left">
                <div class="section-about-img">
                    <img src="<?=$base;?>/assets/images/banners/maxi.png">
                </div>
            </div>

            <div class="section-about-right">
                <div class="section-about-tittle">
                    <h3>SOBRE NÓS</h3>
                </div>
                <div class="section-about-text">
                    <p>A MaxiPlásticos está no mercado de representação de produtos para papelarias há mais de 23 anos. Construímos uma história de confiança através dos anos, trabalhando para atender as 

                    expectativas, oferecendo produtos que satisfaçam as reais necessidades dos nossos clientes.
                </p>
                </div>
                <div class="section-about-button">
                    <a href="<?=$base;?>/about">
                        SAIBA MAIS
                    </a>
                </div>
            </div>
        </section>
        <?php $render('footer', ['categorieFab' => $categorieFab, 'categorieEsc' => $categorieEsc, 'categorieEscol' => $categorieEscol])?>
    </body>
</html>