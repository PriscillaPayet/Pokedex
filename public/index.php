<?php

// Cette ligne permet d'inclure les packages installé au sein de notre projet
// On va donc pouvoir utiliser AltoRouter et Var dumper sans problème
// Front Controller : permet de capter toutes les entrées du site
// Ce sera notre point d'entrée unique.
require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../app/Utils/Database.php';
require_once __DIR__ . '/../app/Models/CoreModel.php';
require_once __DIR__ . '/../app/Models/Pokemon.php';
require_once __DIR__ . '/../app/Controllers/CoreController.php';
require_once __DIR__ . '/../app/Controllers/MainController.php';
require_once __DIR__ . '/../app/Controllers/PokemonController.php';
require_once __DIR__ . '/../app/Controllers/ErrorController.php';

// Configuration avec AltoRouter
// Etape 1 : on configure le fichier .htaccess
// Etape 2 : On instancie la classe AltoRouter
$router = new AltoRouter();

$router->setBasePath($_SERVER['BASE_URI']);

// Etape 4 : On va configurer nos routes

// Page d'accueil : affiche la liste des films
$router->map(
    'GET', // $method HTTP : GET (pour lire du contenu) soit du POST (pour sauvegarde du contenu)
    '/', // $route : L'URL de la route à configurer
    // target : string, array, function, 
    [
        'controller' => 'MainController',
        'method' => 'home'
    ],
    // $name : le nom de la route
    // nomducontroller-nomdelamethode
    'main-home'
);

//Page affichant le détail d'un film
// /movie/2
$router->map(
    'GET',
    '/pokemon/[i:id]',
   [
       'controller'  => 'PokemonController',
       'method' => 'about'
     ],
    'pokemon-about' // controller-method
);

// La méthode generate va nous permettre de générer une URL
// associé à une route
// Ex : /soclephp/S05/S05-soutien/public/movie/2
// $routeUrl = $router->generate('movie-about', ['id' => 3]);
// dump($routeUrl);

// Etape 5
// On va ensuite faire le lien entre la route configurée et notre dispatcher
// Si je saisis /mentions-legales ==> La méthode match va me retourner un tableau
// contenant des informations sur la route associée à l'URL
$match = $router->match();

// dd($match['target']);

// On vérifie si la route demandée (la page) est définie ("is set" en anglais)
// dans notre tableau de routes
if ($match) {
    // si $page=about, controllerToCall='MainController'
    // $controllerToCall = $routes[$page]['controller'];
    $controllerToCall = $match['target']['controller'];

    // La variable $controllerToCall contient le nom de la classe
    // associée à la route courante.
    // Par exemple, si on tente d'acceder /mention-legales
    // alors la variable $controllerToCall aura pour valeur 'MainController'
    // Plus on fera new MainController();

    // si $page=about, methodToCall='about'
    // $methodToCall = $routes[$page]['method'];
    $methodToCall = $match['target']['method'];

    // Lorsqu'on a des routes avec des parties dynamique
    // la méthode match nous permet de récupérer les informations
    // de cette partie dynamique grâce à la clé 'params'
    // $params = ['id' => '12']
    $params = $match['params'];

    // On instance notre controleur afin d'appeler les méthodes
    // permettant l'affichage de nos pages 
    // $controller = new MainController();
    // On instancie dynamiquement le Controleur (class) à l'aide de la variable
    // $controllerToCall
    // $controller = new MainController()
    $controller = new $controllerToCall();

    // On peut en PHP appeler dynamiquement une méthode en utilisant une variable
    // Si $page = 'home'
    // alors : controller->home()
    $controller->$methodToCall($params);
} else {
    // La route n'existe pas ou n'est pas définçie...On affiche une erreur 404
    // var_dump('Vous ne passerez pas !');
    $controller = new ErrorController;
    $controller->error404();
}
