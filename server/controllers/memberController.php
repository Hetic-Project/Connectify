<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class Member {

    function joinGroup ($id_group) {
        $user_id = $_SESSION['id'];

        // Ajouter l'utilisateur au groupe dans la DDB
        $db = new Database();
        $db->query("UPDATE groups SET members = CONCAT(members, ',', '$user_id') WHERE id = '$id_group'");
    }

    function quitGroup ($id_group) {
        $user_id = $_SESSION['id'];

        // Supprimer l'utilisateur au groupe dans la DDB
        $db = new Database();
        $db->query("UPDATE groups SET members = REPLACE(members, ',$user_id', '') WHERE id = '$id_group'");
    }
    
}