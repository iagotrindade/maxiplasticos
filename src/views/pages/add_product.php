<?php 
    $render('adm-header', ['loggedUser'=>$loggedUser]);
    $render('adm-asside-menu');
?> 

<section class = "section-products-form">
        <h3>Adicionar novo Produto</h3>
        <?php if(!empty($_SESSION['flash'])): ?>
            <div class="warning">
                <p style = "text-align: left;"><?php echo ($_SESSION['flash']);  $_SESSION['flash'] = '';?></p>
            </div>
        <?php endif; ?>

        <div class = "section-area-products-form">
            <form class="product-form" method="POST" action="<?=$base;?>/update_profile" enctype="multipart/form-data">
                <?php if(!empty($_SESSION['flash'])): ?>
                    <div class="warning">
                       <p><?php echo ($_SESSION['flash']); $_SESSION['flash'] = ''; $_SESSION['flash'] = '';?></p>
                    </div>
                <?php endif; ?>
                <label class = "label-name">
                    <p>Nome do Produto</p>
                    <input type="text" name="name">
                </label>  

                <label class = "label-desc">
                    <p>Descrição do Produto</p>
                    <textarea type="text" name="name"></textarea>
                </label> 

                <div class = "category-area">
                    <h4>Categorias de Produto</h4>
                    <div class = "category-list">
                        <fieldset>
                            <legend>Categorias:</legend>

                            <div>
                                <input type="checkbox" id="scales" name="scales" checked>
                                <label for="scales">Fabricação</label>
                            </div>

                            <div>
                                <input type="checkbox" id="horns" name="horns">
                                <label for="horns">Escolar</label>
                            </div>

                            <div>
                                <input type="checkbox" id="horns" name="horns">
                                <label for="horns">Escritório</label>
                            </div>

                            <div>
                                <input type="checkbox" id="horns" name="horns">
                                <label for="horns">Covid-19</label>
                            </div>

                            <div>
                                <input type="checkbox" id="horns" name="horns">
                                <label for="horns">Calculadoras</label>
                            </div>

                            <div>
                                <input type="checkbox" id="horns" name="horns">
                                <label for="horns">Encadernação</label>
                            </div>

                            <div>
                                <input type="checkbox" id="horns" name="horns">
                                <label for="horns">Pasta Catalogo</label>
                            </div>

                            <div>
                                <input type="checkbox" id="horns" name="horns">
                                <label for="horns">Envelopes</label>
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
                        <input type="text" name="name" placeholder = "Código">
                    </div>
                    
                    <div class = "input-detail-area">
                        <input type="text" name="name"  placeholder = "Cor">
                    </div>

                    <div class = "input-detail-area">
                        <input type="text" name="name"  placeholder = "Formato">
                    </div>

                    <div class = "input-detail-area">
                        <input type="text" name="name"  placeholder = "Quantidade">
                    </div>

                    <div class = "input-detail-area">
                        <input type="text" name="name"  placeholder = "Composição">
                    </div>

                    <div class = "input-detail-area">
                        <input type="text" name="name"  placeholder = "Detalhes">
                    </div>
                </label> 
                
                <div class = "photos-area">
                    <div class = "section-photos-area">
                        <h4>Imagem principal</h4>
                        <a href = "#">Definir imagem principal +</a>
                    </div>

                    <div class = "section-photos-area">
                        <h4>2ª Imagem</h4>
                        <a href = "#">Definir imagem +</a>
                    </div>

                    <div class = "section-photos-area">
                        <h4>3ª Imagem</h4>
                        <a href = "#">Definir imagem +</a>
                    </div>

                    <div class = "section-photos-area">
                        <h4>4ª Imagem</h4>
                        <a href = "#">Definir imagem +</a>
                    </div>
                </div>
                
            </form>
        </div>

        
    </div>

    <div class = "add-product-form-button">
        <a class = "add-product-button" href = "add_product">ADICIONAR</a>
    </div>
</section>