<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';

// Création du controller users

class Member {
    function joinGroup($id_group) {
        $user_id = 1;
        $role_id = 1;
    
        // J'appelle l'objet base de données
        $db = new Database();
    
        // Je me connecte à la BDD avec la fonction getConnection de l'objet Database
        $connection = $db->getConnection();
    
        // Je prépare la requête
        $sql = "INSERT INTO member (group_id, user_id, role_id) VALUES (:group_id, :user_id, :role_id)";
        $statement = $connection->prepare($sql);
    
        // J'exécute la requête
        if ($statement->execute(array(':group_id' => $id_group, ':user_id' => $user_id, ':role_id' => $role_id))) {
            // La requête s'est exécutée avec succès
    
            // Fermeture de la connexion
            $connection = null;
    
            // Réponse JSON indiquant le succès
            $response = array('success' => true, 'message' => 'User joined the group successfully.');
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // Erreur lors de l'exécution de la requête
    
            // Fermeture de la connexion
            $connection = null;
    
            // Réponse JSON indiquant l'erreur
            $response = array('success' => false, 'message' => 'Failed to join the group.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    
    function quitGroup($id_group) {
        $user_id = 1;
    
        // J'appelle l'objet base de données
        $db = new Database();
    
        // Je me connecte à la BDD avec la fonction getConnection de l'objet Database
        $connection = $db->getConnection();
    
        // Je prépare la requête
        $sql = "DELETE FROM member WHERE group_id = :group_id AND user_id = :user_id";
        $statement = $connection->prepare($sql);
    
        // J'exécute la requête
        if ($statement->execute(array(':group_id' => $id_group, ':user_id' => $user_id))) {
            // La requête s'est exécutée avec succès
    
            // Fermeture de la connexion
            $connection = null;
    
            // Réponse JSON indiquant le succès
            $response = array('success' => true, 'message' => 'User left the group successfully.');
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // Erreur lors de l'exécution de la requête
    
            // Fermeture de la connexion
            $connection = null;
    
            // Réponse JSON indiquant l'erreur
            $response = array('success' => false, 'message' => 'Failed to leave the group.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }  
    }
}