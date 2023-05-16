<?php
require_once './debug.php';
// inclure les controllers nécessaires
require_once './controllers/messageController.php';

// Obtenir le chemin de l'URL demandée
$url = $_SERVER['REQUEST_URI'];

// Obtenir la méthode HTTP actuelle
$method = $_SERVER['REQUEST_METHOD'];

$matched = false;

switch ($url) {
    // Route utilisateur de l'API
        case preg_match('@^/message/(\d+)/(\d+)/?$@', $url, $matches) ? $url : '':
            $controller = new Message();
            if ($method == 'POST') {
                $controller->sendPrivateMessage($matches[1], $matches[2]);
                $matched = true;
            } else if ($method == 'GET') {
                $controller->receivePrivateMessage($matches[1], $matches[2]);
                $matched = true;
            } else {
                header('HTTP/1.1 405 Method Not Allowed');
                header('Allow: POST, GET');
            }
            break;

    case preg_match('@^/message/update/(\d+)$@', $url, $matches) ? $url : '':
        $controller = new Message();
        if ($method == 'POST') {
            $controller->ifAuthorUpdateMessage($matches[1], $_POST['new_message_content']);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;
    
    case preg_match('@^/message/delete/(\d+)$@', $url, $matches) ? $url : '':
        $controller = new Message();
        if ($method == 'POST') {
            $controller->ifAuthorDeleteMessage($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;

}