<?php 
    $render('adm-header', ['loggedUser'=>$loggedUser, 'users' => $users]);
    $render('adm-asside-menu');
?>
    <section class = "section-users-table">
        <h3> USUÁRIOS</h3>
        <?php if(!empty($_SESSION['flash'])): ?>
            <div class="warning">
                <p style = "text-align: left;"><?php echo ($_SESSION['flash']);  $_SESSION['flash'] = '';?></p>
            </div>
        <?php endif; ?>
        <div class = "section-area-users-table">
            <div class="tbl-header">
                <form class="add-user-form" method="POST" action="<?=$base;?>/add_user" enctype="multipart/form-data"> 
                    <div class = "table-form-image">
                        <div class = "table-form-image-circle">
                            <label>Foto</label>
                            <input type="file" name="avatar" class = "input-file">
                            <img class = "img-user" src = "<?=$base;?>/assets/images/avatars/default_avatar.png"/>
                        </div>     
                    </div>

                    <label class = "add-user-form-label">
                        <p>Nome</p>
                        <input type="text" name="name">
                    </label>

                    <label class = "add-user-form-label">
                        <p>Telefone</p>
                        <input type="tel" name="phone"/>
                    </label>

                    <label class = "add-user-form-label">
                        <p>Ramal</p>
                        <input type="tel" name="ramal" style = "width: 75px"/>
                    </label>

                    <label class = "add-user-form-label">
                        <p>E-mail</p>
                        <input type="email" name="email"/>
                    </label>


                    <label class = "add-user-form-label">
                        <p>Senha</p>
                        <input type="password" name="password" style = "width:75px"/>
                    </label>

                    <button class = "form-user-submit">ADICIONAR</button>
                </form>
            </div>

            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <?php foreach($users as $user): ?>
                            <tr>      
                                <td class = "td-users">
                                    <div class = "table-form-image">
                                        <div class = "table-form-image-circle">
                                            <input type="file" name="avatar" class = "input-file">
                                            <img class = "img-user-area" src = "<?=$base;?>/assets/images/avatars/<?=$user->img?>"/>
                                        </div>     
                                    </div>
                                </td>

                                <td class = "td-users" >
                                    <p><?=$user->name?></p>
                                </td>

                                <td class = "td-users">
                                    <p><?=$user->phone?></p>
                                </td>

                                <td class = "td-users">
                                    <p><?=$user->ramal?></p>
                                </td>

                                <td class = "td-users" >
                                    <p><?=$user->email?></p>
                                </td>

                                <td class = "td-users">
                                    <p>********</p>
                                </td>

                                <td class = "td-users action-user-area">
                                    <a href = "edit_user/<?=$user->id?>" class = "edit-user-button">EDITAR</a>
                                    <a href = "<?=$user->id;?>/del_user" class = "delete-user-button"> 
                                        <img src = "<?=$base;?>/assets/images/icons/delete.png" onclick='return confirmDel()'/>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </thead>
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