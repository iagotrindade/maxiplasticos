<?php 
    $render('adm-header', ['loggedUser'=>$loggedUser]);
    $render('adm-asside-menu');
?>
    
    <section class = "section-users-table">
        <h3> USUÁRIOS</h3>
        <div class = "section-area-users-table">
        <div class="tbl-header">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <form class="login-form" method="POST" action="<?=$base;?>/add_user" enctype="multipart/form-data">
                            <thead>
                                <tr>      
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
                                </tr>
                            </thead>
                        </form>
                    </table>
                </div>

                <div class="tbl-content">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tr>
                                <td>01</td>
                                <td>01</td>
                                <td>01</td>
                                <td>01</td>
                    
                        <tr>
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