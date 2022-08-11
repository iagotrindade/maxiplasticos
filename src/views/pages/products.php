<?php 
    $render('adm-header', ['loggedUser'=>$loggedUser]);
    $render('adm-asside-menu');
?> 

<section class = "section-products-table">
        <h3>PRODUTOS</h3>
        <?php if(!empty($_SESSION['flash'])): ?>
            <div class="warning">
                <p style = "text-align: left;"><?php echo ($_SESSION['flash']);  $_SESSION['flash'] = '';?></p>
            </div>
        <?php endif; ?>
        <div class = "filter-search-area">
            <div class = "filter-area">
                <form class = "filter-form" method = "POST" name = 'filter-subcategory-form' action = "<?=$base;?>/filter">
                    <select class="add-button" name ="class-select">
                        <option selected disabled>Ordenar por Subcategoria</option>
                        <?php foreach($subcategories as $subcategorie): ?>
                            <option><?=$subcategorie->name?></option>
                        <?php endforeach?>
                    </select>

                    <!--<button class="add-button">Filtrar</button>-->
                </form>

                <form class = "filter-form" method = "POST" name = 'filter-category-form' action = "<?=$base;?>/filter">
                    <select class="add-button" name ="class-select">
                        <option selected disabled>Ordenar por Categoria</option>
                        <?php foreach($categories as $category): ?>
                            <option><?=$category->name?></option>
                        <?php endforeach?>
                    </select>
                </form>
            </div>
            <div class = "search-area">
                <form name = 'search' method = 'GET' action = '<?=$base;?>/search'>
                    <i class='search-area-lupa bx bx-search' ></i>
                    <input type="text" placeholder="Pesquisar por produtos..." name = "searching">
                </form>
            </div>
        </div>
        <div class = "section-area-users-table">
        <div class="tbl-header" style = "background-color: #fff;">
            <div class = "edit-button-area">
                <a class="edit-product-button" href = "">EDITAR</a>
            </div>
                            
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>      
                        <th>Imagem do produto</th>
                        <th>Nome</th>
                        <th>Código</th>
                        <th>Categoria</th>
                        <th>Data</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <tr>
                        <td class = "product-list-image">
                            <img src="<?=$base?>/assets/images/products/calc.jpeg"/>
                        </td>

                        <td>
                            <p>Lorem ipsum dolor sit amet. At enim incidunt</br>qui aliquid odit in dolor nihil.</p>

                        </td>
                        
                        <td>8874</td>

                        <td>
                            <ul class = "fabrication-info">
                                <li>
                                    <p>Fabricação</p>
                                </li>

                                <li>
                                    <p>Sub Categoria</p>
                                </li>

                                <li>
                                    <p>Envelopes</p>
                                </li>
                            </ul>
                        </td>

                        <td style = "display: flex; align-items: center;">
                            <ul class = "date-info">
                                <li>
                                    <p>PUBLICADO</p>
                                </li>

                                <li>
                                    <p>10/08/2022 ás 22:41</p>
                                </li>
                            </ul>

                            <a href = "/del_user" class = "delete-product-button"> 
                                <img src = "<?=$base;?>/assets/images/icons/delete.png" onclick='return confirmDel()'/>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class = "under-line-area">
                <div class = "under-line-product-box"></div>
            </div>
        </div>
    </div>
</section>