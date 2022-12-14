<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-sotore">
      
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="<?=$base?>/assets/css/style.css">
    <link rel="shortcut icon" href="<?=$base;?>/assets/images/icons/favicon.png" type="image/x-icon"/>
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Painel Administrativo MaxiPlásticos</title>
</head>

<body>
    <header>
        <div class = "section-adm-panel-header-menu-area">
            <div class="section-header-adm-panel">
                <div class="header-adm-panel-logo">
                    <a href="<?=$base;?>/adm-panel">
                        <img src="<?=$base?>/assets/images/icons/logo-maxi.png"> 
                        <p class="text-logo"><strong>MAXI</strong>PLÁSTICOS</p>
                    </a>
                </div>

                <div class="adm-panel-header-search-form">
                    <form class="form-search-index" name = 'search' method = 'GET' action = '<?=$base;?>/search'>
                        <i class='adm-panel-header-menu-lupa bx bx-search' ></i>
                        <input type="text" placeholder="Buscar..." name = "searching">
                    </form>
                </div>

                <div class = "header-adm-panel-user-info">
                    <div class = "user-picture">
                        <img src="<?=$base.'/assets/images/avatars/'.$loggedUser->img?>">
                    </div>
    
                    <h4>Bem Vindo (a) <?=$loggedUser->name?></h4>
                </div>

                <div class="header-adm-panel-site">
                    <div class="category-box-button" >
                        <a href="<?=$base;?>" target="_blank">
                            VISITAR SITE
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>