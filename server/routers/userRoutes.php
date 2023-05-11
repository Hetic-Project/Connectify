<?php
ini_set('display_errors', 1);
// inclure les controllers nécessaires
require_once './controllers/userController.php';

// Obtenir le chemin de l'URL demandée
$url = $_SERVER['REQUEST_URI'];

// Obtenir la méthode HTTP actuelle
$method = $_SERVER['REQUEST_METHOD'];

$matched = false;

switch ($url) {
    // Route utilisateur de l'API
    case '/users':
        $controller = new User();
        if ($method == 'GET') {
            $controller->getAllUsers();
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };
        break;

    // Route pour obtenir un événement spécifique
    // case preg_match('@^/events/(\d+)$@', $url, $matches) ? $url : '':
    //     $controller = new Event();
    //     if ($method == 'GET') {
    //         $controller->getOneEvent($matches[1]);
    //         $matched = true;
    //     } elseif ($method == 'DELETE') {
    //         $controller->deleteEvent($matches[1]);
    //         $matched = true;
    //     } else {
    //         header('HTTP/1.1 405 Method Not Allowed');
    //         header('Allow: GET');
    //     };
    //     break;
}