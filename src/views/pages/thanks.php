<?php $render ('header', ['categorieFab' => $categorieFab, 'categorieEsc' => $categorieEsc, 'categorieEscol' => $categorieEscol, 'activeMenu' => 'budget']); ?>

<section class = "thanks-area">
    <div class = "thanks-area-modal">
        <h3>Agradecemos sua solicitação :)</h3>
        <p>Em breve, um de nossos funcionários entrará em contato com você via E-mail ou Telefone!</p>
        <a class = "home-button" href = "<?=$base;?>">Página Inicial</a>
    </div>
</section>

<?php $render('footer', [ 'categorieFab' => $categorieFab, 'categorieEsc' => $categorieEsc, 'categorieEscol' => $categorieEscol])?>