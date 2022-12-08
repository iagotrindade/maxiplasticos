<?php 
    $render('adm-header', ['loggedUser'=>$loggedUser, 'categories' => $categories]);
    $render('adm-asside-menu');
?> 

<section class = "section-products-form">
    <div class = section-area-products-form-hold>
        <div class = "section-area-products-form">
            <h3>Adicionar novo Produto</h3>
            <?php if(!empty($_SESSION['flash'])): ?>
                <div class="warning">
                    <p style = "padding-left: 5px; text-align: left;"><?php echo ($_SESSION['flash']);  $_SESSION['flash'] = '';?></p>
                </div>
            <?php endif; ?>

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
                            <?php foreach($categories as $categorie):?>
                                <div>
                                    <input type="checkbox" name="category[]" value = "<?=$categorie->name?>">
                                    <label for="category"><?=$categorie->name?></label>
                                </div>
                            <?php endforeach ?>
                        </fieldset>

                        <div class = "button-add-category-area">
                            <a href="<?=$base;?>/categories">Adicionar nova categoria +</a>
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
                    <div class = "section-photos-area main">
                        <p>Imagem principal</p>
                        <a class = "main-define">Definir imagem principal +</a>
                        <input type="file" name="images[]" class = "input-main-photo">
                    </div>

                    <div class = "section-photos-area sec">
                        <p>Imagens secundarias</p>
                        <a class = "sec-define">Definir imagens secundárias +</a>
                        <input type="file" name="images[]" multiple="multiple" class = "input-sec-photo">
                    </div>
                </div>

                <div class = "add-product-form-button">
                    <button type="submit" for = ""class = "add-product-button">ADICIONAR</button>
                    <a href = "<?=$base;?>/products">Voltar</a>
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

        let element = document.querySelector('.warnning-photos-main')
        
        element.parentNode.removeChild(element);
    });

    photoMainFile.addEventListener('change', () => {
        
        let mainPhoto = document.querySelector('.main');
        
        
        
        
        mainPhoto.insertAdjacentHTML('beforeend','<p class = "warnning-photos-main">Arquivo carregado</p>');
    });


    let secPhoto = document.querySelector('.sec-define');
    let secPhotoFile = document.querySelector('.input-sec-photo');

    secPhoto.addEventListener('click', function(){
        secPhotoFile.click();
        
        let element = document.querySelector('.warnning-photos-sec');
        element.parentNode.removeChild(element);
    });

    secPhotoFile.addEventListener('change', () => {

        let secPhoto = document.querySelector('.sec');
        secPhoto.insertAdjacentHTML('beforeend','<p class = "warnning-photos-sec">Arquivos carregados</p>');
    });
</script>   