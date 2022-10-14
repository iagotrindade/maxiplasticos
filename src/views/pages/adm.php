<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "<?=$base;?>/assets/css/style.css"/>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Login Painel Administrativo Maxiplásticos</title>
</head>
<body class = "login-body">
    <header>
        <section class="login-section"> 
            <div class="login-area">
                <section class="login-modal-area">
                    <div class = "login-form-logo">
                        <div class = "login-form-logo-circle">
                            <img src="<?=$base?>/assets/images/icons/logo-maxi.png"> 
                            <p class="text-login-logo"><strong>MAXI</strong>Pásticos</p>
                            
                        </div>     

                        <?php if(!empty($flash)): ?>
                            <div class="login-warning">
                            <p><?php echo ($flash)?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="login-modal"> 
                        <h3 class="login-form-header">LOGIN</h3>
                        <div class="login-form-area">
                            <form class="login-form" method="POST" action="<?=$base;?>/login">
                                <label>
                                    <p>E-MAIL</p>
                                    <input type="text" name="email"  autocomplete="username">
                                </label>
                                <div class = "password-hold">
                                    <label>
                                        <p>SENHA</p>
                                        <input class = "password" type="password" name="password" autocomplete="new-password"> 
                                    </label>
                                    <i class='bx bx-show show-pass-icon'></i>
                                    <i class='hide-pass-icon bx bx-hide' style = "display: none;"></i>
                                </div>
                                
            
                                <div class="login-form-buttons">
                                    <button class="login-button-submit" type="submit">Login</button>
                                </div>

                                <div class="recover-password-link">
                                    <div class = "remember-pass-area">
                                        <input type = "checkbox" placeholder ="Lembrar senha"/>
                                        Lembrar senha
                                    </div>

                                    <p>Esqueceu sua senha? <a href="<?=$base;?>/recover">Clique aqui!</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </header>

    <script>
        let btnShow = document.querySelector('.show-pass-icon');
        let btnHide = document.querySelector('.hide-pass-icon');

        btnShow.addEventListener('click', function() {
            let input = document.querySelector('.password');

            if(input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
                btnShow.style.display = 'none';
                btnHide.style.display = 'inline-block';
            }
        });

        btnHide.addEventListener('click', function() {
            let input = document.querySelector('.password');

            if(input.getAttribute('type') == 'text') {
                input.setAttribute('type', 'password');
                btnHide.style.display = 'none';
                btnShow.style.display = 'inline-block';
            }
        });
    </script>
</body>
</html>