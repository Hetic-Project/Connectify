<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';

// Création du controller users

class Member {
    function joinGroup($id_group) {
        $id = $_SESSION['user']['id'];

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
            // $response = array('success' => true, 'message' => 'User joined the group successfully.');
            // header('Content-Type: application/json');
            // echo json_encode($response);
            $message = "l'étudiant a bien été créé";
            header('Location: http://localhost:3000/Page/accueil.php?message=' . urlencode($message));
            exit();
        } else {
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(array('message' => 'une erreur s\'est produite lors du téléchargement du fichier.'));
        }
    }
    
    function quitGroup($id_group) {
        $id = $_SESSION['user']['id'];

    
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