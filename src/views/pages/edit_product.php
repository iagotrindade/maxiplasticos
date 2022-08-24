<?php 
    $render('adm-header', ['loggedUser'=>$loggedUser, 'categories' => $categories, 'images' => $images]);
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

            <form class="product-form" method="POST" action="<?=$base;?>/edit_product" enctype="multipart/form-data">
                <label class = "label-name">
                    <p>Nome do Produto</p>
                    <input type="text" name="name" value = "<?=$product->name?>">
                </label>  

                <label class = "label-desc">
                    <p>Descrição do Produto</p>
                    <textarea type="text" name="desc"><?=$product->desc?></textarea>
                </label> 

                <div class = "category-area">
                    <h4>Categorias de Produto</h4>
                    <div class = "category-list">
                        <fieldset>
                            <?php foreach($categories as $categorie):?>
                                <div>
                                    <input type="checkbox" name="category[]" value = "<?=$categorie->name?>" <?php if($product->category === $categorie->name) {echo("checked");}?>>
                                    <label for="category"><?=$categorie->name?></label>
                                </div>
                            <?php endforeach ?>
                        </fieldset>

                        <div class = "button-add-category-area">
                            <a href="<?=$base;?>/categories">Adicionar nova categoria +</a>
                        </div>
                    </div>
                </div>

                <label class = "label-details label-details-edit">
                    <p>Detalhes do Produto</p>
                    <div class = "input-detail-area">
                        <input type="text" name="code" placeholder = "Código" value = "<?=$product->code?>">
                    </div>
                    
                    <div class = "input-detail-area">
                        <input type="text" name="color"  placeholder = "Cor" value = "<?=$product->color?>">
                    </div>

                    <div class = "input-detail-area">
                        <input type="text" name="format"  placeholder = "Formato" value = "<?=$product->format?>">
                    </div>

                    <div class = "input-detail-area"> 
                        <input type="text" name="amount"  placeholder = "Quantidade"value = "<?=$product->amount?>">
                    </div>

                    <div class = "input-detail-area">
                        <input type="text" name="composition"  placeholder = "Composição" value = "<?=$product->comp?>">
                    </div>

                    <div class = "input-detail-area">
                        <input type="text" name="details"  placeholder = "Detalhes" value = "<?=$product->details?>">
                    </div>
                </label> 
                
                <div class = "section-edit-products-photos">
                    <div class = "edit-photo-img">
                        <img src = "<?=$base."/".$product->mainI?>"/></br>
                        <input type = 'hidden' name ='main_image' value = "<?=$product->mainI[$i];?>">
                        <p>Foto Principal</p>
                        <a href ="" class = "main-delete">EXCLUIR</a>
                    </div>
                    
                    
                    <?php foreach($images as $img):?>
                        <?php
                            echo(
                                "<div class = 'section-sec-photos'>
                                    <img src = '".$base.'/'.$img->path.'/'.$img->img."'>
                                    <input type = 'hidden' name ='c_images[]' value = ".$img->img.">
                                    <p>Foto Secundária</p>
                                    <a href ='' class = 'main-delete'>EXCLUIR</a>
                                </div>"
                            );
                        ?>
                    <?php endforeach ?>

                    <div class = "section-add-more-photos">
                        <input type="file" name="new_photos[]" multiple="multiple"/>
                    </div>
                </div>

                

                <div class = "add-product-form-button">
                    <button type="submit" for = ""class = "add-product-button">ATUALIZAR</button>
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