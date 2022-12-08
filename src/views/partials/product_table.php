    <div class = "filter-search-area">
        <div class = "filter-area">
            <form class = "filter-form" method = "POST" name = 'filter-category-form' action = "<?=$base;?>/filter">
                <select class="add-button" name ="categorie-select" name="isso" onchange="location = this.value;">
                    <option selected disabled>Filtrar por Categoria</option>
                    
                    <?php foreach($categories as $category): ?>
                        <option value="<?=$base?>/filter/<?=$category->id;?>"><?=$category->name?></option>
                    <?php endforeach?>
                </select>
            </form>
        </div>

        <div class = "search-area">
            <form name = 'search' method = 'GET' action = '<?=$base;?>/search_by_code'>
                <i class='search-area-lupa bx bx-search' ></i>
                <input type="text" placeholder="Pesquisar por código..." name = "searching">
            </form>
        </div>
    </div>

    <?php if(!empty($_SESSION['flash'])): ?>
        <div class="warning" style='width:100%;'>
            <p style = "padding-left: 5px; text-align: left;"><?php echo ($_SESSION['flash']);  $_SESSION['flash'] = '';?></p>
        </div>
    <?php endif; ?>