<?php
require_once ('views/View.php');

class ControllerEditpokemons
{

    private PokemonManager $_pokemonManager;
    private $_view;


    public function __construct($url)
    {
        $this->_pokemonManager = new PokemonManager();

        //echo count($url);
        //echo print_r($_POST);
        if(isset($_POST['submitAdd'])){
            $nom = $_POST['name'];
            $pv = $_POST['pv'];
            $pc = $_POST['pc'];
            $imagepath = $_POST['imagepath'];
            $this->_pokemonManager->addPokemon($nom, $pc, $pv, $imagepath);
            $this->render(null, "Le pokemon a bien été ajouté");
        }else if(isset($_POST['submitDelete'])){
            $nom = $_POST['name'];
            $pokemon = $this->_pokemonManager->getPokemonByName($nom);
            if($pokemon != null){
                $this->_pokemonManager->deletePokemon($pokemon);
                $this->render(null, "Le pokemon a bien été supprimé");
            }else{
                $this->render("Ce pokemon n'existe pas !", null);
            }
        }
        $this->render(null, null);
    }

    private function render(?string $errorMsg, ?string $successMsg){
        $this->_view = new View('EditPokemons');
        $this->_view->generate(Array('errorMsg' => $errorMsg , 'successMsg' => $successMsg));
    }

}