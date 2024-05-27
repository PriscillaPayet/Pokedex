<?php

class PokemonController extends CoreController
{
    public function about($params)
    {

        //$params contiendra l'id du pokemon
        $pokemonModel=new Pokemon();
        $pokemon = $pokemonModel ->find($params['id']);

    
        $this->show('about', [
            'pokemon' => $pokemon
        ]);
    }
}