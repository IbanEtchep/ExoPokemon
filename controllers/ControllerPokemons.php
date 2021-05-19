<?php
require_once ('views/View.php');

class ControllerPokemons
{

    private $_pokemonManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count( array($url) ) > 1){
            throw new Exception("Page introuvable");
        }else {
            $this->pokemons();
        }
    }

    private function pokemons(){
        $this->_pokemonManager = new PokemonManager();
        $pokemons = $this->_pokemonManager->getPokemons();
        $this->_view = new View('Pokemons');
        $this->_view->generate(Array('pokemons' => $pokemons));
    }

}