<?php

class CoreController
{
    /**
     * Cette méthode permet l'affichage des pages 
     * demandée depuis le navigateur
     *
     * @return void
     */
    public function show($viewName, $viewData = [])
    {
        // Grace au mot-clé global, on injecter la variable
        // $router (créé dans le fichier index.php)
        // directement dans la méthode show
        global $router;
        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}