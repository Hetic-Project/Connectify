<?php
require_once './debug.php';
// inclure les controllers nécessaires
require_once './controllers/userController.php';

// Obtenir le chemin de l'URL demandée
$url = $_SERVER['REQUEST_URI'];

// Obtenir la méthode HTTP actuelle
$method = $_SERVER['REQUEST_METHOD'];

$matched = false;

switch ($url) {
    // Route utilisateur de l'API
    case '/profile/update':
        $controller = new User();
        if ($method == 'POST') {
            $controller->updateInformationsForOneUser();
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;

    case '/profile/deactivate':
        $controller = new User();
        if ($method == 'POST') {
            $controller->deactivateAccountForOneUser();
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;
        
    case '/profile/reactivate':
        $controller = new User();
        if ($method == 'POST') {
            $controller->reactivateAccountForOneUser();
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;

    case '/profile/delete':
        $controller = new User();
        if ($method == 'POST') {
            $controller->delectAccountForOneUser();
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;

    case '/profile/signup':
        $controller = new User();
        if ($method == 'POST') {
            $controller->signUpAccount();
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;

    case '/profile/login':
        $controller = new User();
        if ($method == 'POST') {
            $controller->loginAccount();
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;

    case '/profile/logout':
        $controller = new User();
        if ($method == 'POST') {
            $controller->logoutAccount();
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;

    case preg_match('@^/profile/relation/search/([\w-]+)$@', $url, $matches) ? $url : '':
        $controller = new User();
        if ($method == 'POST') {
            $controller->searchRelation($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;
}