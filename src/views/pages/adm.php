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
                <div class="login-modal">
                    <h2 class="login-form-header">Login</h2>
                    <div class="login-form-area">
                        
                        <form class="login-form" method="POST" action="<?=$base;?>/login">
                            <?php if(!empty($flash)): ?>
                               <div class="warning">
                                   <p><?php echo ($flash)?></p>
                                </div>
                            <?php endif; ?>

                            <?php if(!empty($_SESSION['flashSuccess'])): ?>
                               <div class="login-warning-success">
                                   <p><?php echo ($_SESSION['flashSuccess'])?></p>
                                </div>
                            <?php endif; ?>
                            <input type="text" name="email" placeholder="E-mail:">
                            <div class = "password-hold">
                                <input class = "password" type="password" name="password" placeholder="Senha:">
                                <i class='bx bx-show show-pass-icon'></i>
                                <i class='hide-pass-icon bx bx-hide' style = "display: none;"></i>
                            </div>
                            
        
                            <div class="login-form-buttons">
                                <button class="login-button-submit" style="margin:10px;" type="submit">Login</button>
                            </div>

                            <div class="recover-password-link">
                                <p>Esqueceu sua senha? <a href="recover">Clique aqui!</a></p>
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