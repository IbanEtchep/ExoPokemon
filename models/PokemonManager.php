<?php


class PokemonManager extends Model
{

    public function getPokemons(): array
    {
        return $this->getAll('POKEMON', 'Pokemon');

    }


    //CREATE TABLE POKEMON (
    //    id bigint AUTO_INCREMENT,
    //    nom varchar(50) UNIQUE,
    //    pv int,
    //    pc int,
    //    imagepath varchar(255),
    //    PRIMARY KEY (id)
    //);

    public function getPokemonByName(string $nom): ?Pokemon {
        $pokemon = null;
        $req = $this->getBdd()->prepare('SELECT * FROM POKEMON WHERE nom=:nom;');
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->execute();
        if($data = $req->fetch(PDO::FETCH_ASSOC)){
            $pokemon = new Pokemon($data);
        }
        return $pokemon;
        $req->closeCursor();
    }

    public function getPokemonById(int $id): ?Pokemon {
        $pokemon = null;
        $req = $this->getBdd()->prepare('SELECT * FROM POKEMON WHERE id=:id;');
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        if($data = $req->fetch(PDO::FETCH_ASSOC)){
            $intervenant = new Pokemon($data);
        }
        return $pokemon;
        $req->closeCursor();
    }

    public function updatePokemon(Pokemon $pokemon){
        $req = $this->getBdd()->prepare('UPDATE POKEMON SET nom=? , pc=?, pv=?, imagepath=? WHERE id=?');
        $req->execute(Array($pokemon->getNom(), $pokemon->getPc(), $pokemon->getPv(), $pokemon->getImagepath(), $pokemon->getId()));
        $req->closeCursor();
    }

    public function deletePokemon(Pokemon $pokemon){
        $req = $this->getBdd()->prepare('DELETE FROM POKEMON WHERE id=?');
        $req->execute(Array($pokemon->getId()));
        $req->closeCursor();
    }

    public function addPokemon(string $nom, int $pc, int $pv, string $imagepath){
        $req = $this->getBdd()->prepare('INSERT INTO POKEMON (nom, pc, pv, imagepath) VALUES (?, ?, ?, ?)');
        $req->execute(Array($nom, $pc, $pv, $imagepath));
        $req->closeCursor();
    }

}