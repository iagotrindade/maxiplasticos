<?php 
    $render('adm-header', ['loggedUser'=>$loggedUser, 'categories' => $categories, 'images' => $images]);
    $render('adm-asside-menu');
?> 

<section class = "section-products-form">
    <div class = section-area-products-form-hold>
        <div class = "section-area-products-form">
            <h3>Editando o produto <?=$product->name?></h3>
            
            <?php if(!empty($_SESSION['flash'])): ?>
                <div class="warning">
                    <p style = "padding-left: 5px; text-align: left;"><?php echo ($_SESSION['flash']);  $_SESSION['flash'] = '';?></p>
                </div>
            <?php endif; ?>

            <form class="product-form" method="POST" action="<?=$base;?>/edit_product" enctype="multipart/form-data">
                <label class = "label-name">
                    <p>Nome do Produto</p>
                    <input type="hidden" name="id" value="<?=$product->id?>">
                    <input type="hidden" name="path" value="<?=$product->path?>">
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
                        <?php 
                            if(empty($images)) {
                                echo("<img src = ".$base."/assets/images/products/default_product_image.jpeg>");
                            }

                            else {
                                echo("<img src = ".$base."/".$images[0]->path."/".$images[0]->img."></br>");
                            }
                        ?>

                        <p>Foto Principal</p>
                    </div>
                    
                    <div class ="section-area-photos">
                        <?php foreach($images as $img):?>
                            <?php
                                if(empty($images)) {
                                    echo (
                                        "<div class = 'section-sec-photos'>
                                            <img src = '".$base."/assets/images/products/default_product_image.jpeg>'>
                                        </div>"
                                    );
                                }
                                echo(
                                    "<div class = 'section-sec-photos'>
                                        <img src = '".$base.'/'.$img->path.'/'.$img->img."'>
                                        <input type = 'hidden' name ='c_images[]' value = ".$img->img.">

                                        <a href ='javascript:;' class = 'main-delete'>EXCLUIR</a>
                                    </div>"
                                );
                            ?>
                        <?php endforeach ?>

                        <div class = "section-add-more-photos">
                            <input type="file" name="new_photos[]" multiple="multiple"/>
                        </div>
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

    document.querySelectorAll('.section-sec-photos a').forEach(item => {
        item.addEventListener("click", function() {
            var parent = this.parentNode;
            
            parent.innerHTML = '';
        });
    });

    document.querySelectorAll('.main-img-buttons .main-delete').forEach(item => {
        item.addEventListener("click", function() {
            var parentMain = this.parentNode;

            parentMain = parentMain.parentNode;
            
            parentMain.innerHTML = '';
        });
    });
</script>   