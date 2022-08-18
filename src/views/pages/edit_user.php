<?php 
    $render('adm-header', ['loggedUser'=>$loggedUser, 'user' => $user]);
    $render('adm-asside-menu');
?> 
        <section class="profile-section">
            <div class="login-modal">
                <p class="profile-form-header">PERFIL DE <?=strtoupper($user->name)?></p >
                <div class="login-form-area">
                    <form class="login-form" method="POST" action="<?=$base;?>/edit_action" enctype="multipart/form-data">
                        <?php if(!empty($_SESSION['flash'])): ?>
                            <div class="warning">
                               <p><?php echo ($_SESSION['flash']); $_SESSION['flash'] = ''; $_SESSION['flash'] = '';?></p>
                            </div>
                        <?php endif; ?>
                            
                        <div class = "profile-form-image">
                            <div class = "profile-form-image-circle">
                                <input type = "hidden" name = "id" value = "<?=$user->id?>"/>
                                <input type="file" name="avatar" class = "input-file">
                                <img src = "<?=$base;?>/assets/images/avatars/<?=$user->img?>"/>
                            </div>     
                        </div>

                        <div class = "profile-name">
                            <h4><?=$user->name?></h4>
                            <p>ALTERAR FOTO</p>
                        </div>

                        <label>
                            <p>NOME</p>
                            <input type="text" name="name" value = "<?=$user->name?>">
                        </label>
                            
                        <div class = "form-profile-tel" style = "display:flex; justify-content:space-between; align-items: center;">
                            <label class = "label-tel">
                                <p>TELEFONE</p>
                                <input type="tel" name="phone" style = "width: 155px" value = "<?=$user->phone?>">
                            </label>

                            <label>
                                <p>RAMAL</p>
                                <input type="tel" name="ramal" style = "width: 155px" value = "<?=$user->ramal?>">
                            </label>
                        </div>

                        <label>
                            <p>E-MAIL</p>
                            <input type="text" name="email" value = "<?=$user->email?>">
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
            let feedPhoto = document.querySelector('.profile-name p');
            let feedFile = document.querySelector('.input-file');

            feedPhoto.addEventListener('click', function(){
                feedFile.click();
            });
            feedFile.addEventListener('change', function(){
                
            });
        </script>                 
    </body>
</html>