<?php 
    $render('adm-header', ['loggedUser'=>$loggedUser, 'categorie' => $categorie]);
    $render('adm-asside-menu');
?> 
<section class = "section-category-table">
    <h3>EDITANDO A CATEGORIA <?=strtoupper($categorie->name)?></h3>
    <?php if(!empty($_SESSION['flash'])): ?>
        <div class="warning">
            <p style = "width: 60vw; padding-left: 20px; text-align: left;"><?php echo ($_SESSION['flash']);  $_SESSION['flash'] = '';?></p>
        </div>
    <?php endif; ?>
    <div class = "section-area-edit-categorie">
        <div class="edit-categorie-form-area">
            <form class="edit-category-form" method="POST" action="<?=$base;?>/update_categorie" enctype="multipart/form-data"> 
                <label class = "edit-category-form-label">
                    <p>Nome</p>
                    <input type = "hidden" name ="id" value="<?=$categorie->id?>"/>
                    <input class="input-edit-category-name" type="text" name="name" value="<?=$categorie->name?>">
                </label>

                <label class = "edit-category-form-label">
                    <p>Descrição</p>
                    <textarea  class="input-edit-category-desc" type="text" name="desc"><?=$categorie->desc?></textarea>
                </label>

                
            
        </div>

        <div class = "button-submit-edit-categorie-area">
            <button class = "form-edit-categorie-submit">ATUALIZAR</button>
        </div>
        </form>
    </div>
</section>

<script src = "<?=$base?>/assets/js/vanilla.js"></script>
<script type="text/javascript">
    let feedPhoto = document.querySelector('.img-user');
    let feedFile = document.querySelector('.input-file');

    feedPhoto.addEventListener('click', function(){
        feedFile.click();
        });
    feedFile.addEventListener('change', function(){
                
    });
</script>       