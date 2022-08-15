<?php 
    $render('adm-header', ['loggedUser'=>$loggedUser]);
    $render('adm-asside-menu');
?> 
        <section class="profile-section">
            <div class="login-modal">
                <p class="profile-form-header">MEU PERFIL</p >
                <div class="login-form-area">
                    <form class="login-form" method="POST" action="<?=$base;?>/update_profile" enctype="multipart/form-data">
                        <?php if(!empty($_SESSION['flash'])): ?>
                            <div class="warning">
                               <p><?php echo ($_SESSION['flash']); $_SESSION['flash'] = ''; $_SESSION['flash'] = '';?></p>
                            </div>
                        <?php endif; ?>
                            
                        <div class = "profile-form-image">
                            <div class = "profile-form-image-circle">
                                <input type="file" name="avatar" class = "input-file">
                                <img src = "<?=$base;?>/assets/images/avatars/<?=$loggedUser->img?>"/>
                            </div>     
                        </div>

                        <div class = "profile-name">
                            <h4><?=$loggedUser->name?></h4>
                            <p>ALTERAR FOTO</p>
                        </div>

                        <label>
                            <p>NOME</p>
                            <input type="text" name="name" value = "<?=$loggedUser->name?>">
                        </label>
                            
                        <div class = "form-profile-tel" style = "display:flex; justify-content:space-between; align-items: center;">
                            <label class = "label-tel">
                                <p>TELEFONE</p>
                                <input type="tel" name="phone" style = "width: 155px" value = "<?=$loggedUser->phone?>">
                            </label>

                            <label>
                                <p>RAMAL</p>
                                <input type="tel" name="ramal" style = "width: 155px" value = "<?=$loggedUser->ramal?>">
                            </label>
                        </div>

                        <label>
                            <p>E-MAIL</p>
                            <input type="text" name="email" value = "<?=$loggedUser->email?>">
                        </label>

                        <label>
                            <p>SENHA</p>
                            <input type="password" name="password"> 
                        </label>
                            
                        <div class="login-form-buttons">
                            <button class="login-button-submit" type="submit">SALVAR ALTERAÇÕES</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <script type="text/javascript">
            let photo = document.querySelector('.profile-name p');
            let photoFile = document.querySelector('.input-file');

            photoPhoto.addEventListener('click', function(){
                photoFile.click();
            });
            photoFile.addEventListener('change', function(){
                
            });
        </script>                 
    </body>
</html>