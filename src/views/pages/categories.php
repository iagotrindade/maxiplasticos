<?php 
    $render('adm-header', ['loggedUser'=>$loggedUser, 'categories' => $categories]);
    $render('adm-asside-menu');
?> 
<section class = "section-category-table">
    <h3>CATEGORIAS</h3>
    <?php if(!empty($_SESSION['flash'])): ?>
        <div class="warning" style = "width: 100%;">
            <p style = "width: 60vw; padding-left: 40px; text-align: left;"><?php echo ($_SESSION['flash']);  $_SESSION['flash'] = '';?></p>
        </div>
    <?php endif; ?>
    <div class = "section-area-categories-table">
        <div class="tbl-header">
            <form class="add-category-form" method="POST" action="<?=$base;?>/add_categorie" enctype="multipart/form-data"> 
                <label class = "add-category-form-label">
                    <p>Nome</p>
                    <input class="input-category-name" type="text" name="name">
                </label>

                <label class = "products-count add-category-form-label">
                    <p>Produtos</p>
                    <p>-</p>
                </label>

                <label class = "add-category-form-label">
                    <p>Descrição</p>
                    <input  class="input-category-desc" type="text" name="desc"/>
                </label>

                <button class = "form-user-submit">ADICIONAR</button>
            </form>
        </div>

        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
            <?php foreach($categories as $categorie):?>
                <thead>
                        <tr class = "td-category">      
                            <td class = "td-category" style = "width: 285px">
                                <p><?=$categorie->name?></p>
                            </td>

                            <td class = "td-category" style = "width: 106px">
                                <p><?=$categorie->products?></p>
                            </td>

                            <td class = "td-category" style = "width: 500px">
                                <p><?=$categorie->desc?></p>
                            </td>

                            <td class = "td-category action-user-area" style = "width: 120px">
                                <a href = "edit_categorie/<?=$categorie->id;?>" class = "edit-user-button">EDITAR</a>
                                <a href = "<?=$categorie->id;?>/del_categorie" class = "delete-user-button"> 
                                    <img src = "<?=$base;?>/assets/images/icons/delete.png" onclick='return confirmDel("Tem certeza que deseja excluir essa categoria?")'/>
                                </a>
                            </td>
                        </tr>
                    
                    </thead>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
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