<?php

require 'Controllers/AccueilController.php';
require 'Controllers/CategoriesController.php';
require 'Controllers/ArticleController.php';


// Récupération de l'URL
$url = isset($_GET['url']) ? $_GET['url'] : ''; //verifie si une variable est déclarée et est différente de null
$url = trim($url, '/'); //retourne un string
$url = explode('/', $url); //retourne un tableau de chaînes de caractères

// Initialisation des variables de contrôle
$controller = '';
$methode = '';
$params = array();

// Détermination du contrôleur à utiliser en fonction de l'URL demandée
if (empty($url[0])) {
    // Si l'URL est vide, on appelle la méthode index du AccueilController
    $controller = new AccueilController();
    $methode = 'accueil';
} elseif ($url[0] == 'categories') {
    // Si l'URL commence par "categories", on appelle le CategoriesController
    $controller = new CategoriesController();
    $methode = isset($url[1]) ? $url[1] : 'categories'; // méthode par défaut : categories
    if ($methode == 'article' && isset($url[2])) {
        // Si la méthode est "article" et qu'un troisième élément est présent dans l'URL, on appelle le ArticleController
        $controller = new ArticleController();
        $methode = $url[2];
    }
}

// Appel de la méthode du contrôleur correspondant
if (method_exists($controller, $methode)) {
    if (isset($url[3])) {
        // Si des paramètres sont présents dans l'URL, on les passe à la méthode appelée
        $params = array_slice($url, 3); //on extrait une partie du tableau
    }
    /*appeler une fonction utilisateur donnée avec un tableau de paramètres. */
    call_user_func_array([$controller, $methode], $params);
}
?>