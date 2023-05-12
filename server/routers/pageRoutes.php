<?php
require_once './debug.php';
// inclure les controllers nécessaires
require_once './group/pageController.php';

// Obtenir le chemin de l'URL demandée
$url = $_SERVER['REQUEST_URI'];

// Obtenir la méthode HTTP actuelle
$method = $_SERVER['REQUEST_METHOD'];

$matched = false;

switch ($url) {
    // Route utilisateur de l'API
    case preg_match('@^/page/get/(\d+)$@', $url, $matches) ? $url : '':
        $controller = new Page();
        if ($method == 'GET') {
            $controller->getPageForOneUser($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };
        break;

    case '/page/add':
        $controller = new Page();
        if ($method == 'POST') {
            $controller->addPageForOneUser($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;

    case preg_match('@^/page/update/(\d+)$@', $url, $matches) ? $url : '':
        $controller = new Page();
        if ($method == 'POST') {
            $controller->updatePageForOneUserIfAdmin($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;

    case preg_match('@^/page/delete/(\d+)$@', $url, $matches) ? $url : '':
        $controller = new Page();
        if ($method == 'POST') {
            $controller->deletePageForOneUserIfAdmin($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;
    } 