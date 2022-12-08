<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=1.0">
        <meta name="description" content="Na MaxiPlaticos você encontrará tudo que precisa no que se refere a materiais plásticos, escolares e de escritório além de uma linha de fabricação própria."/>
        <meta name="keywords" content="maxiplasticos, maxi, plasticos, fabricação, MaxiPlasticos">
        <meta name="google-site-verification" content="mRNaEqmNW1ifWidvvHoDI895a8SIuuuumiWSFSAXUoQ"/>
        <meta name="robots" content="index,follow">
        <link rel="stylesheet" href="<?=$base?>/assets/css/style.css">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
        <link rel="shortcut icon" href="<?=$base;?>/assets/images/icons/favicon.png" type="image/x-icon" />
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-LLTCMQZ5Q1"></script>
        <script assync>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-LLTCMQZ5Q1');
        </script>

        <title>MaxiPlasticos – Atacado e distribuição de produtos de papelaria</title>
    </head>
    
    <body>
        <header>
            <div class="mobile-menu container ">
                <div class="content">
                    <nav class = 'mobile-nav' role="navigation" onclick="verifyMenu()">
                        <div id="menuToggle">
                            <input class="sandwiche-button" type="checkbox"/>
                                <span></span>
                                <span></span>
                                <span></span>
                            <ul id="menu">
                                <li>
                                    <div class="mobile-search-form">
                                        <form class="mobile-form-search-index" name = 'search' method = 'GET' action = '<?=$base;?>/procurar'>
                                            <input type="text" placeholder="Buscar produto..." name = "procurando_por" required>
                                        </form>
                                    </div>
                                </li>

                                <li>
                                    <a href="<?=$base?>/cart" aria-label="Página Inicial">
                                        <p>Orçamento</p>
                                    </a>
                                </li>
                                
                                <li> 
                                    <a href="<?=$base;?>" aria-label="Página Inicial">Home</a>
                                </li>
                                <li>
                                    <a href="<?=$base?>/produtos/categoria/<?=$categorieFab->id?>">
                                        <p>Fabricação</p>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?=$base?>/produtos/categoria/<?=$categorieEsc->id?>">
                                        <p>Escritório</p>
                                    </a>
                                </li>

                                

                                <li>
                                    <a href="<?=$base?>/produtos/categoria/<?=$categorieEscol->id?>">
                                        <p>Escolar</p>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?=$base?>/about">
                                        <p>Sobre nós</p>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <ul class="mobile-header-social-list">
                            <li class="mobile-header-social-item">
                                <a href="https://goo.gl/maps/k8qnZn4Wqngeoc3VA" target = '_blank'  aria-label="Venha nos conhecer!">
                                    <i class='bx bx-map'></i>                           
                                </a>
                            </li>
                            
                            <li class="mobile-header-social-item">
                                <a href="https://www.instagram.com/maxi.plasticos" target = _blank  aria-label="Acesse nosso Instagram!">
                                    <i class='bx bxl-instagram' ></i>
                                </a>
                            </li>

                            <li class="mobile-header-social-item">
                                <a href="mailto:orcamento@maxiplasticos.com" aria-label="Nos mande um Email!">
                                    <i class='bx bx-envelope' ></i>
                                </a>
                            </li>

                            <li class="mobile-header-social-item">
                                <a href="tel:+555133727898" aria-label="Entre em contato pelo nosso telefone!">
                                    <i class='bx bx-phone' ></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="section-header-slogan">
                <div class="section-header-social">
                    <ul class="header-social-list">
                        <li class="header-social-item">
                            <a href="https://goo.gl/maps/k8qnZn4Wqngeoc3VA" target = '_blank' aria-label="Venha nos conhecer!">
                                <i class='bx bxs-map bx-flip-horizontal' ></i>                                
                            </a>
                        </li>
                        
                        <li class="header-social-item">
                            <a href="https://www.instagram.com/maxi.plasticos" target = _blank aria-label="Conheça nosso Instagram!">
                                <i class='bx bxl-instagram-alt bx-flip-horizontal' ></i>
                            </a>
                        </li>

                        <li class="header-social-item">
                            <a href="mailto:orcamento@maxiplasticos.com"  aria-label="Nos mande um Email!">
                                <i class='bx bxs-envelope bx-flip-horizontal' ></i>
                            </a>
                        </li>

                        <li class="header-social-item">
                            <a href="tel:+555133727898" aria-label="Entre em contato pelo nosso telefone!">
                                <i class='bx bxs-phone' ></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="section-header-slogan-text">
                    <p>Há mais de 23 anos fazendo nosso melhor papel!<p>
                </div>
            </div>

            <div class = "section-header-menu-area">
                <div class="section-header-menu">
                    <div class="header-menu-logo">
                        <a href="<?=$base;?>">
                            <img src="<?=$base?>/assets/images/icons/logo-maxi.png" alt="MaxiPlasticos"> 
                            <h1 class="text-logo">MAXIPLÁSTICOS</h1>
                        </a>
                    </div>

                    <div class="header-menu">
                        <nav>
                            <ul class="header-menu-list">
                                <li class="menu-item">
                                    <a  href="<?=$base;?>">
                                        <p class = <?=($activeMenu == 'home')?'active-menu':''?>>Home</p>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="<?=$base?>/produtos/categoria/<?=$categorieFab->id?>">
                                        <p class = <?=($activeMenu == 'produtos/categoria/1')?'active-menu':''?>>Fabricação</p>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="<?=$base?>/produtos/categoria/<?=$categorieEsc->id?>">
                                        <p class = <?=($activeMenu == 'produtos/categoria/2')?'active-menu':''?>>Escritório</p>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="<?=$base?>/produtos/categoria/<?=$categorieEscol->id?>">
                                        <p class = <?=($activeMenu == 'produtos/categoria/3')?'active-menu':''?>>Escolar</p>
                                    </a>
                                </li>

                                <li class ="menu-item">
                                    <a href ="<?=$base?>/about">
                                        <p class = <?=($activeMenu == 'about')?'active-menu':''?>>Sobre nós</p>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="header-search-form">
                        <form class="form-search-index" name = 'search' method = 'GET' action = '<?=$base;?>/procurar'>
                            <i class='header-menu-lupa bx bx-search' ></i>
                            <input type="text" placeholder="Buscar produto..." name = "procurando_por" required>
                        </form>
                    </div>

                    <div class="budget-area">
                        <a href = "<?=$base?>/cart">
                            <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M28.3925 19.6876C28.3592 19.7813 28.326 19.8633 28.2816 19.9571C28.071 20.4376 27.572 20.7071 27.0953 20.6133C26.5852 20.5079 26.2082 20.0626 26.175 19.5118C26.175 19.418 26.175 19.3126 26.175 19.2188C26.175 15.2228 26.175 11.2384 26.175 7.24233C26.175 5.66031 25.2547 4.69938 23.7579 4.68766C23.392 4.68766 23.0261 4.68766 22.627 4.68766C22.627 5.07438 22.627 5.42594 22.627 5.78922C22.627 6.50406 22.1613 7.0314 21.5293 7.0314C20.8973 7.0314 20.4205 6.51578 20.4205 5.80094C20.4205 5.43766 20.4205 5.0861 20.4205 4.69938C18.7131 4.69938 17.0277 4.69938 15.3203 4.69938C15.3203 5.06266 15.3203 5.42594 15.3203 5.78922C15.3203 6.50406 14.8546 7.0314 14.2115 7.0314C13.5795 7.0314 13.1027 6.51578 13.1027 5.80094C13.1027 5.43766 13.1027 5.0861 13.1027 4.7111C11.3953 4.7111 9.70994 4.7111 8.00245 4.7111C8.00245 5.07438 8.00245 5.43766 8.00245 5.80094C8.00245 6.51578 7.53678 7.04312 6.8937 7.04312C6.26171 7.04312 5.78494 6.52749 5.78494 5.81266C5.78494 5.44938 5.78494 5.09782 5.78494 4.67594C5.15295 4.7111 4.52096 4.67594 3.92223 4.79313C2.92435 4.99235 2.23692 5.965 2.23692 7.06655C2.22583 9.03529 2.23692 11.0157 2.23692 12.9845C2.23692 17.0391 2.23692 21.0821 2.23692 25.1368C2.23692 26.6953 3.15719 27.668 4.64292 27.668C11.0183 27.668 17.3825 27.6563 23.7579 27.6797C25.2215 27.6914 26.1972 26.5547 26.1861 25.2657C26.1861 24.7149 26.5852 24.2696 27.0953 24.1641C27.5942 24.0704 28.0931 24.3633 28.3038 24.8672C28.3371 24.9375 28.3592 25.0078 28.3925 25.0782C28.3925 25.336 28.3925 25.5821 28.3925 25.8399C28.3703 25.8985 28.3481 25.9453 28.3371 26.0039C28.071 27.8789 26.7737 29.3906 25.033 29.8594C24.8445 29.9063 24.6449 29.9531 24.4453 30C17.6154 30 10.7743 30 3.9444 30C3.88897 29.9766 3.84462 29.9531 3.78918 29.9414C1.63819 29.6016 0.0194032 27.6563 0.00831568 25.3594C-0.00277189 19.2305 -0.00277189 13.1017 0.00831568 6.9728C0.00831568 4.88688 1.361 3.05877 3.26806 2.50799C3.9444 2.30877 4.64292 2.34393 5.33035 2.34393C5.47449 2.34393 5.61863 2.34393 5.77385 2.34393C5.77385 1.95721 5.77385 1.61737 5.77385 1.27753C5.77385 0.539251 6.22844 0.0119101 6.87152 0.000191458C7.52569 0.000191458 7.99137 0.527532 7.99137 1.27753C7.99137 1.62909 7.99137 1.96893 7.99137 2.32049C9.70994 2.32049 11.3953 2.32049 13.0916 2.32049C13.0916 1.95721 13.0916 1.61737 13.0916 1.27753C13.0916 0.527532 13.5462 0.0119101 14.1893 0.000191458C14.8435 0.000191458 15.3092 0.527532 15.3092 1.27753C15.3092 1.62909 15.3092 1.96893 15.3092 2.32049C17.0277 2.32049 18.713 2.32049 20.4094 2.32049C20.4094 1.95721 20.4094 1.61737 20.4094 1.27753C20.4094 0.527532 20.864 0.0119101 21.5071 0.000191458C22.1613 -0.0115272 22.627 0.515813 22.627 1.27753C22.627 1.62909 22.627 1.96893 22.627 2.34393C23.1037 2.34393 23.5472 2.34393 23.9796 2.34393C25.9865 2.35565 27.7162 3.77361 28.2373 5.82437C28.2927 6.04703 28.3371 6.26968 28.3925 6.50406C28.3925 10.8986 28.3925 15.2931 28.3925 19.6876Z" fill="white"/>
                                <path d="M14.1782 12.3048C11.3398 12.3048 8.49028 12.3048 5.65186 12.3048C5.15292 12.3048 4.77594 12.0939 4.55419 11.6134C4.22156 10.8751 4.70941 10.0197 5.47446 9.96106C5.54098 9.96106 5.60751 9.96106 5.66294 9.96106C11.3509 9.96106 17.0388 9.96106 22.7267 9.96106C23.2478 9.96106 23.647 10.1603 23.8576 10.6759C24.1792 11.4493 23.647 12.2931 22.8376 12.2931C21.6845 12.3048 20.5314 12.2931 19.3783 12.2931C17.6486 12.3048 15.9079 12.3048 14.1782 12.3048Z" fill="white"/>
                                <path d="M14.2004 18.047C11.3398 18.047 8.4792 18.047 5.6186 18.047C4.94226 18.047 4.45441 17.5431 4.45441 16.8751C4.45441 16.2657 4.89791 15.7501 5.48555 15.7032C5.55208 15.7032 5.6186 15.7032 5.67404 15.7032C11.362 15.7032 17.0499 15.7032 22.7378 15.7032C23.2589 15.7032 23.6581 15.9025 23.8687 16.4181C24.1903 17.1915 23.6581 18.0353 22.8487 18.047C21.8175 18.0587 20.7753 18.047 19.7442 18.047C17.8925 18.047 16.052 18.047 14.2004 18.047Z" fill="white"/>
                                <path d="M11.4285 21.6212C13.3799 21.6212 15.3203 21.6212 17.2717 21.6212C18.07 21.6212 18.5911 22.3946 18.3472 23.168C18.203 23.6368 17.7928 23.9415 17.316 23.9649C17.061 23.9766 16.7949 23.9649 16.5399 23.9649C12.9032 23.9649 9.26644 23.9649 5.62972 23.9649C4.78706 23.9649 4.24377 23.2149 4.49879 22.418C4.65401 21.9258 5.07534 21.6212 5.60754 21.6212C7.55896 21.6212 9.49928 21.6212 11.4285 21.6212Z" fill="white"/>
                            </svg>
                                
                            <p class="budget-text">Orçamento</p>
                        </a>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>
