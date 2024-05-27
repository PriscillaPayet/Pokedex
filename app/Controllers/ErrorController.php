<?php

class ErrorController extends CoreController
{

    /**
     * Page d'erreur 404
     *
     * @return void
     */
    public function error404()
    {
        // require le fichier views/error404.tpl.php
        $this->show('error404');
    }
}