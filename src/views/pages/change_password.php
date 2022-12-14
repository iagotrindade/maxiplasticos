<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="<?=$base?>/assets/css/style.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Recuperação de Senha</title>
</head>

<body class = "recover-body">
    <section class="login-section">
        <!--for demo wrap-->
        <div class="recover-area">
            <section class="login-modal-area" style="margin: 0; margin-bottom: 10px">
                <div class="login-modal">
                    <h3 class="login-form-header">Recupere sua senha</h3>

                    <div class = "recover-form-logo">
                        <div class = "recover-form-logo-circle">
                            <img src="<?=$base?>/assets/images/icons/logo-maxi.png"> 
                        </div>     
                    </div>

                    <div class="login-form-area">
                        <form class="login-form" method="POST" action="<?=$base;?>/recover">
                            <?php if(!empty($_SESSION['flash'])): ?>
                               <div class="warning">
                                   <p><?php echo ($_SESSION['flash'])?></p>
                                </div>
                            <?php endif; ?>
                            
                            <?php if(!empty($_SESSION['flashSuccess'])): ?>
                               <div class="login-warning-success">
                                   <p><?php echo ($_SESSION['flashSuccess'].' para '. $email)?></p>
                                </div>
                            <?php endif; ?>
                            
                            <div class = "password-hold">
                                <label>
                                    <p>SENHA</p>
                                    <input type="hidden" name="token" value = '<?=implode("", $_SESSION['token']);?>'>
                                    <input type="password" name="password" style = "width: 286px;"> 
                                </label>
                                <i class='bx bx-show show-pass-icon'></i>
                                <i class='hide-pass-icon bx bx-hide' style = "display: none;"></i>
                            </div>
        
                            <div class="login-form-buttons">
                                <button class="login-button-submit">Enviar</button>
                            </div>

                            <div class="recover-password-link">
                                <p>Lembrou sua senha? <a href="adm-login">Faça Login!</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
</body>
</html>