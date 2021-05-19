<?php $this->_t = 'Liste pokemons'; ?>

<h1>Liste des pokemons</h1>

<table>

    <thead>
    <tr>
        <td>Nom</td>
        <td>PV</td>
        <td>PC</td>
        <td>image</td>

    </tr>
    </thead>

    <tbody>
    <?php if(isset($pokemons)): ?>
        <?php foreach ($pokemons as $pokemon) : ?>
            <tr>
                <td><?=$pokemon->getNom()?></td>
                <td><?=$pokemon->getPv()?></td>

                <td><?=$pokemon->getPc()?></td>

                <td><img class="pokeicon" src="<?=$pokemon->getImagepath()?>"></a> </td>
            </tr>
        <?php endforeach ?>
    <?php else: ?>
        <div class="error">Aucun pokemon n'a été trouvé.</div>
    <?php endif;?>
    </tbody>

</table>
