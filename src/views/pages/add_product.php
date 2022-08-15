<?php 
    $render('adm-header', ['loggedUser'=>$loggedUser]);
    $render('adm-asside-menu');
?> 

<section class = "section-products-form">
        <h3>Adicionar novo Produto</h3>
        <?php if(!empty($_SESSION['flash'])): ?>
            <div class="warning">
                <p style = "width: 1250px; padding-left: 5px; text-align: left;"><?php echo ($_SESSION['flash']);  $_SESSION['flash'] = '';?></p>
            </div>
        <?php endif; ?>

        <div class = "section-area-products-form">
            <form class="product-form" method="POST" action="<?=$base;?>/add_product" enctype="multipart/form-data">
                <label class = "label-name">
                    <p>Nome do Produto</p>
                    <input type="text" name="name">
                </label>  

                <label class = "label-desc">
                    <p>Descrição do Produto</p>
                    <textarea type="text" name="desc"></textarea>
                </label> 

                <div class = "category-area">
                    <h4>Categorias de Produto</h4>
                    <div class = "category-list">
                        <fieldset>
                            <div>
                                <input type="checkbox" name="category[]" checked value = "Fabricação">
                                <label for="category">Fabricação</label>
                            </div>

                            <div>
                                <input type="checkbox" name="category[]" value = "Escolar">
                                <label for="category">Escolar</label>
                            </div>

                            <div>
                                <input type="checkbox" name="category[]" value = "Escritório">
                                <label for="category">Escritório</label>
                            </div>

                            <div>
                                <input type="checkbox" name="category[]" value = "Covid-19">
                                <label for="category">Covid-19</label>
                            </div>

                            <div>
                                <input type="checkbox" name="category[]" value = "Calculadoras">
                                <label for="category">Calculadoras</label>
                            </div>

                            <div>
                                <input type="checkbox" name="category[]" value = "Encadernação">
                                <label for="category">Encadernação</label>
                            </div>

                            <div>
                                <input type="checkbox" name="category[]"  value = "Envelopes">
                                <label for="category">Envelopes</label>
                            </div>
                        </fieldset>

                        <div class = "button-add-category-area">
                            <a href="#">Adicionar nova categoria +</a>
                        </div>
                    </div>
                </div>

                <label class = "label-details">
                    <p>Detalhes do Produto</p>
                    <div class = "input-detail-area">
                        <input type="text" name="code" placeholder = "Código">
                    </div>
                    
                    <div class = "input-detail-area">
                        <input type="text" name="color"  placeholder = "Cor">
                    </div>

                    <div class = "input-detail-area">
                        <input type="text" name="format"  placeholder = "Formato">
                    </div>

                    <div class = "input-detail-area">
                        <input type="text" name="amount"  placeholder = "Quantidade">
                    </div>

                    <div class = "input-detail-area">
                        <input type="text" name="composition"  placeholder = "Composição">
                    </div>

                    <div class = "input-detail-area">
                        <input type="text" name="details"  placeholder = "Detalhes">
                    </div>
                </label> 
                
                <div class = "photos-area">
                    <div class = "section-photos-area">
                        <p>Imagem principal</p>
                        <a class = "main-define">Definir imagem principal +</a>
                        <input type="file" name="main-image" class = "input-main-photo">
                    </div>

                    <div class = "section-photos-area">
                        <p>Imagens secundarias</p>
                        <a class = "sec-define">Definir imagens secundárias +</a>
                        <input type="file" name="images[]" multiple="multiple" class = "input-sec-photo">
                    </div>
                </div>
                <div class = "add-product-form-button">
                    <button type="submit" for = ""class = "add-product-button">ADICIONAR</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script type="text/javascript">
    let mainPhoto = document.querySelector('.main-define');
    let photoMainFile = document.querySelector('.input-main-photo');

    mainPhoto.addEventListener('click', function(){
        photoMainFile.click();
    });

    photoMainFile.addEventListener('change', function(){         
    });


    let secPhoto = document.querySelector('.sec-define');
    let secPhotoFile = document.querySelector('.input-sec-photo');

    secPhoto.addEventListener('click', function(){
        secPhotoFile.click();
    });

    secPhotoFile.addEventListener('change', function(){         
    });
</script>   