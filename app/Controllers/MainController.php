<?php

/**
 * Cette classe va nous permettre de piloter en arrière boutique 
 * l'affichage de nos pages
 * 
 * Un controleur, c'est comme un chef d'orchestre ou un Manager de restaurant
 * qui va s'assurer que tout fonctionne comme prévu dans l'application.
 * 
 * Et c'est ici que l'on mettre en place une grande partie de la logique de fonctionnement
 * de notre application
 */
class MainController extends CoreController
{

    /**
     * Permet l'affichage de la page d'accueil
     */
    public function home()
    {
        // On récupère la liste de tous les films (Movie)
        $pokemon = new Pokemon();
        $pokemonList = $pokemon->findAll();


        // On appelle la vue views/home.tpl.php
        // je vais pouvoir récupérer les films grâce
        // $viewData['movieList']
        $this->show('home', [
            'pokemonList' => $pokemonList
        ]);
    }
}