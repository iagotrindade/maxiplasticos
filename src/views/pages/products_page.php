<?php $render ('header', ['id' => $id, 'products' => $products, 'categorieFab' => $categorieFab, 'categorieEsc' => $categorieEsc, 'categorieEscol' => $categorieEscol, 'activeMenu' => 'produtos/categoria/'.$id.'']); ?>

<section>
    <div class="products-area">
        <div class="products-area-tittle">
            <h2>PRODUTOS</h2>
        </div>

        <div class="products-action-bar">
            <div class = "filter-search-area" style = "padding:0;">
                <div class = "filter-area">
                    <form class = "filter-form" method = "POST" name = 'filter-category-form' action = "<?=$base;?>/filter_categorie/products">
                        <select class="add-button" name ="categorie-select" name="isso" onchange="location = this.value;">
                            <option selected disabled>Filtrar por Categoria</option>
                            
                            <?php foreach($categories as $category): ?>
                                <option value="<?=$base?>/produtos/categoria/<?=$category->id;?>"><?=$category->name?></option>
                            <?php endforeach?>
                        </select>
                    </form>
                </div>
            </div>
        
            <?php if(!empty($_SESSION['flash'])): ?>
                <div class="warning" style='width:100%;'>
                    <p style = "padding-left: 5px; text-align: left;"><?php echo ($_SESSION['flash']);  $_SESSION['flash'] = '';?></p>
                </div>
            <?php endif; ?>
        </div>

        <div class="products-boxes-area">
            <?php foreach($products as $product): ?>
                <div class = "product-box">
                    <a href = "<?=$base?>/product/<?=$product->id;?>">
                        <div class = "product-box-img">
                            <?php 
                                if($product->main_image == 'default_product_image.jpeg') {
                                    echo("<img src = ".$base."/assets/images/products/default_product_image.jpeg alt='".$product->name."'>");
                                }

                                else {
                                    echo("<img src = ".$base."/".$product->path."/".$product->main_image." alt='".$product->name."'>");
                                }
                            ?>
                        </div>
                        
                        <div class="product-box-name">
                            <?=$product->name?>
                        </div>
                        <div class = "product-box-description">
                            <?php
                                if(strlen($product->desc) > 160) {
                                    echo(substr($product->desc, 0, 100)."...");
                                            
                                }
                                        
                                else {
                                    echo($product->desc);
                                }
                            ?>
                        </div>
                    </a>
                    <div class="budget-button">
                        <a href="<?=$base?>/product/<?=$product->id;?>">
                            ORÇAMENTO 
                        </a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>

<?php $render('footer', [ 'categorieFab' => $categorieFab, 'categorieEsc' => $categorieEsc, 'categorieEscol' => $categorieEscol])?>






