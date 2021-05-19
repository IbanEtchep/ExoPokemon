<?php $this->_t = 'Edition pokemons'; ?>

<h1>Gestion des pokemons :</h1>


<?php
if(isset($errorMsg)):?>
    <div class="error"><?=$errorMsg?></div>
<?php endif;?>

<?php
if(isset($successMsg)):?>
    <div class="success"><?=$successMsg?></div>
<?php endif;?>

<div class="flex-container">

    <div class="flex-item">

        <form action="" method="POST">
            <h1>Ajouter un pokemon</h1>

            <a>Nom :</a>
            <input type="text" name="name" required/><br />
            <a>PV :</a>
            <input type="number" name="pv" required/><br />
            <a>PC :</a>
            <input type="number" name="pc" required/><br />
            <a>lien image :</a>
            <input type="text" name="imagepath" required/><br />

            <input class="yellow-btn" type="submit" value="Ajouter" name="submitAdd" />
        </form>

    </div>

    <div class="flex-item">

        <form action="" method="POST">
            <h1>Supprimer un pokemon</h1>

            <a>Nom :</a>
            <input type="text" name="name" placeholder="Nom du pokemon" /><br />
            <input class="yellow-btn" type="submit" value="Supprimer" name="submitDelete" />
        </form>

    </div>

</div>

