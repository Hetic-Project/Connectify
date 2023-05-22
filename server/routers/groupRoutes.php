<?php
require_once './debug.php';
// inclure les controllers nécessaires
require_once './controllers/groupController.php';

// Obtenir le chemin de l'URL demandée
$url = $_SERVER['REQUEST_URI'];

// Obtenir la méthode HTTP actuelle
$method = $_SERVER['REQUEST_METHOD'];

$matched = false;

switch ($url) {
    // Route utilisateur de l'API
    case preg_match('@^/group/create/(\d+)$@', $url, $matches) ? $url : '':
        $controller = new Group();
        if ($method == 'POST') {
            $controller->addGroupPublicOrPrivateForOneUser($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };
        break;
        
    case preg_match('@^/group/join/(\d+)$@', $url, $matches) ? $url : '':
        $controller = new Group();
        if ($method == 'POST') {
            $controller->joinGroupPublicForOneUser($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;

    case preg_match('@^/group/apply/(\d+)$@', $url, $matches) ? $url : '':
        $controller = new Group();
        if ($method == 'GET') {
            $controller->joinGroupPrivateForOneUser($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };
        break;
    
    case preg_match('@^/group/publications/(\d+)$@', $url, $matches) ? $url : '':
        $controller = new Group();
        if ($method == 'POST') {
            $controller->getGroupPublicationForMembers($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;

    case preg_match('@^/group/invite/(\d+)$@', $url, $matches) ? $url : '':
        $controller = new Group();
        if ($method == 'POST') {
            $controller->addRelationOnGroup($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;

    case '/group/approve':
        $controller = new Group();
        if ($method == 'GET') {
            $controller->acceptOrDeniedCandidateInGroup($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };
        break;

    case '/group/user/update/rights':
        $controller = new Group();
        if ($method == 'GET') {
            $controller->ifAdminSetOtherAdminInGroup($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };
        break;

    case '/group/user/delete':
        $controller = new Group();
        if ($method == 'GET') {
            $controller->ifAdminBanishMember($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };
        break;

    case '/group/update/info':
        $controller = new Group();
        if ($method == 'GET') {
            $controller->ifAdminUpdateGroupInfo($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };
        break;

}