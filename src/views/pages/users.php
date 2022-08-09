<?php 
    $render('adm-header', ['loggedUser'=>$loggedUser]);
    $render('adm-asside-menu');
?>
    
    <section class = "section-users-table">
        <h3> USUÁRIOS</h3>
        <div class = "section-area-users-table">
        <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    
                        <thead>
                            <tr>     
                                <form class="login-form" method="POST" action="<?=$base;?>/add_user" enctype="multipart/form-data"> 
                                    <th>
                                        <div class = "table-form-image">
                                            <div class = "table-form-image-circle">
                                                <label>Foto</label>
                                                <input type="file" name="avatar" class = "input-file">
                                                <img class = "img-user" src = "<?=$base;?>/assets/images/avatars/<?=$loggedUser->img?>"/>
                                            </div>     
                                        </div>
                                    </th>

                                    <th>
                                        <label class = "add-user-form-label">
                                            <p>Nome</p>
                                            <input type="text" name="name">
                                        </label>
                                    </th>

                                    <th>
                                        <label class = "add-user-form-label">
                                            <p>Telefone</p>
                                            <input type="tel" name="phone"/>
                                        </label>
                                    </th>

                                    <th>
                                        <label class = "add-user-form-label">
                                            <p>Ramal</p>
                                            <input type="tel" name="ramal" style = "width: 75px"/>
                                        </label>
                                    </th>

                                    <th>
                                        <label class = "add-user-form-label">
                                            <p>E-mail</p>
                                            <input type="email" name="email"/>
                                        </label>
                                    </th>

                                    <th>
                                        <label class = "add-user-form-label">
                                            <p>Senha</p>
                                            <input type="password" name="password" style = "width:75px"/>
                                        </label></th>
                                    </th>

                                    <th>
                                        <button class = "form-user-submit">ADICIONAR</button>
                                    </th>
                                </form>
                            </tr>
                        </thead>
                    
                </table>
            </div>

            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>      
                            <th>
                                <div class = "table-form-image">
                                    <div class = "table-form-image-circle">
                                        <input type="file" name="avatar" class = "input-file">
                                        <img class = "img-user" src = "<?=$base;?>/assets/images/avatars/<?=$loggedUser->img?>"/>
                                    </div>     
                                </div>
                            </th>

                            <th>
                                <p>Iago Silva</p>
                            </th>

                            <th>
                                <p>(51) 51991657516</p>
                            </th>

                            <th>
                                <p>Ramal</p>
                            </th>

                            <th>
                                <p>email@teste.com</p
                            </th>

                            <th>
                                <p>******</p>
                            </th>

                            <th class = "action-user-area">
                                <a href = "" class = "edit-user-button">EDITAR</a>
                                <a href = "del_user" class = "delete-user-button"> 
                                    ...
                                </a>
                            </th>
                        </tr>
                    </thead>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script type="text/javascript">
    let feedPhoto = document.querySelector('.img-user');
    let feedFile = document.querySelector('.input-file');

    feedPhoto.addEventListener('click', function(){
        feedFile.click();
        });
    feedFile.addEventListener('change', function(){
                
    });
</script>       