<!DOCTYPE html>
<html>
    <head>
        <meta charset="uft-8"/>
        <link rel="stylesheet" type="text/css" href="<?=URL?>views/styles/style.css" />
        <title><?= $t ?></title>
    </head>
    <header>

        <nav id="navbar">
            <div class="nav-cellule header-logo"> <a href="<?=URL?>"><img src="<?=URL?>views/images/logo.svg" alt="logo"/></a> </div>
            <div class="nav-cellule"><a href="<?=URL?>">Liste</a></div>
            <div class="nav-cellule"><a href="<?=URL?>editpokemons">Ajout/suppression</a></div>
        </nav>
    </header>

    <div class="corps">
        <?= $content ?>
    </div>
</html>