<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-sotore">
      
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="<?=$base?>/assets/css/style.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Painél Administrativo Maxiplásticos</title>
</head>

<body class = 'adm-panel-body'>
    <nav class="sidebar close">
        <header>
            <div class="logo-area">
                <span class="image">
                    
                </span>

                <div class="text logo-text">
                    
                </div>
            </div>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <!--<li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <form name = 'search' method = 'GET' action = '<?=$base;?>/search'>
                        <input type="text" placeholder="Procurar..." name = "searching">
                    </form>
                </li>-->

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="<?=$base?>/adm-panel">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a onclick="openModal()">
                            <i class='bx bx-user' style = "font-size: 22px;"></i>
                            <span class="text nav-text">Usuários</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-category' style = "font-size: 22px;"></i>
                            <span class="text nav-text">Categorias</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="about">
                            <i class='bx bx-category-alt' style = "font-size: 22px;"></i>
                            <span class="text nav-text">Subcategorias</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="about">
                            <i class='bx bx-package' style = "font-size: 22px;"></i>
                            <span class="text nav-text">Produtos</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="about">
                            <i class='bx bx-trash' style = "font-size: 22px;"></i>
                            <span class="text nav-text">Lixeira</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="<?=$base;?>/sair" onclick='return confirmExit()'>
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>

    <div class = "tittle-adm-panel">
        <h2>Painel Administrativo Maxiplásticos</h2>
    </div>