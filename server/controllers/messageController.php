<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class Message {

    function sendPrivateMessage ($id_receiver, $id_transmitter){

    }

    function receivePrivateMessage ($id_receiver, $id_transmitter){

    }

    function ifAuthorUpdateMessage ($id_message){
        $_SESSION['id'];
    }
    
    function ifAuthorDeleteMessage ($id_message){
        $_SESSION['id'];
    }
    
}