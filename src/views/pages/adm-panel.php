<?php 
    $render('adm-header', ['loggedUser'=>$loggedUser, 'usersCount' => $usersCount, 'userD' => $userD, 'productsCount' => $productsCount,  'productD' => $productD, 'categorieD' => $categorieD, 'categoriesCount' => $categoriesCount]);
    $render('adm-asside-menu');
?>      
        <div class = "section-index-adm-panel">
            <div class = "section-index-black-area">
                <section>
                    <div class ="home-info-area">
                        <div class = "home-info-area-tittle">
                            <h3>HOME</h3>
                        </div>
        
                        <div class = "home-info-area-count">
                            <div class = "count-box box1">
                                <div class = "count-box-info">
                                    <h4>USUÁRIOS CADASTRADOS</h4></br>
                                    <p class = "count-box-info-number"><?=$usersCount?></p>
                                    <p class = "count-box-info-date">Última atualização dia <?=date('d/m/Y', strtotime($userD))?></p>
                                </div>
        
                                <div class = "count-box-img-area">
                                    <div class = "count-box-icon">
                                        <i class='bx bxs-user'></i>
                                    </div>
                                </div>
                            </div>
        
                            <div class = "count-box box2">
                                <div class = "count-box-info">
                                    <h4>PRODUTOS CADASTRADOS</h4></br>
                                    <p class = "count-box-info-number"><?=$productsCount?></p>
                                    <p class = "count-box-info-date">Última atualização dia <?=date('d/m/Y', strtotime($productD))?></p>
                                </div>
        
                                <div class = "count-box-img-area">
                                    <div class = "count-box-icon">
                                        <i class='bx bxs-package'></i>
                                    </div>
                                </div>
                            </div>
        
                            <div class = "count-box box3">
                                <div class = "count-box-info">
                                    <h4>CATEGORIAS CADASTRADAS</h4></br>
                                    <p class = "count-box-info-number"><?=$categoriesCount?></p>
                                    <p class = "count-box-info-date">Última atualização dia <?=date('d/m/Y', strtotime($categorieD))?></p>
                                </div>
        
                                <div class = "count-box-img-area">
                                    <div class = "count-box-icon">
                                        <i class='bx bxs-category' ></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class = "section-index-white-area">
                <a href = "https://analytics.google.com/analytics/web/#/p337618089/reports/intelligenthome?params=_u..nav%3Dmaui%26_u..pageSize%3D25" target = '_blank'>
                    <img src = "<?=$base;?>/assets/images/banners/graph.jpeg">
                </a>
            </div>
        </div>

        <script src="<?=$base;?>/assets/js/vanilla.js"></script>
    </body>
</html>