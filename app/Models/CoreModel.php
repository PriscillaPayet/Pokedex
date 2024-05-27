<?php

/**
 * Classe parente qui va stocker tous les éléments communs à tous les modèles
 * C'est classe mère dont vont hériter TOUS les models
 * Cette classe n'est pas destinée à être instanciée, à créer des objets, mais seulement à être héritée/étendue
 */
class CoreModel
{
    // Ici, on évite de répéter les propriétés présentes dans tous les Models
    // => on factorise dans la classe "parent" de tous les Models

    // visibilité private : uniquement accessible dans la classe CoreModel
    // visibilité protected : accesible par toute la "famille"
    // ce qui signifie que les modèles Category et Product y auront aussi accès.
    protected $id;

    // Ici, on évite de répéter les méthodes présentes dans tous les Models
    // => on factorise dans la classe "parent" de tous les Models (y'a de l'écho)

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
}