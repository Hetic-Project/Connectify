<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class connect {
    function getRelationForOneUser() {
    
        // Retrieve the user ID from the session
        $id = $_SESSION['user']['id'];
    
        // J'appelle l'objet base de données
        $db = new Database();
    
        // Je me connecte à la BDD avec la fonction getConnection de l'objet Database
        $connection = $db->getConnection();
    
        // Je prépare la requête pour récupérer les relations de l'utilisateur
        $sql = "
            SELECT connect.friend_id, user.lastname, user.firstname, user.id  
            FROM connect 
            JOIN user
            ON connect.friend_id = user.id
            WHERE connect.user_id = :user_id
        ";
        $statement = $connection->prepare($sql);

        $statement->execute([':user_id' => $id]);
    
        $relations = $statement->fetchAll(PDO::FETCH_ASSOC);

        header('Content-Type: application/json');
        echo json_encode($relations);
    }
    
    function addRelationForOneUser($id_user) {
    
        $id = $_SESSION['user']['id'];
        
        
        $db = new Database();
    
        $connection = $db->getConnection();
    
        $sql = "INSERT INTO connect (user_id, friend_id) VALUES (:user_id, :friend_id)";
        $statement = $connection->prepare($sql);
    
        $statement->execute([
            ':user_id' => $id, 
            ':friend_id' => $id_user
        ]);
    
        $connection = null;
    }
    
    
    function deleteRelationForOneUser($id_user) {

        $id = $_SESSION['user']['id'];
    
        // J'appelle l'objet base de données
        $db = new Database();
    
        // Je me connecte à la BDD avec la fonction getConnection de l'objet Database
        $connection = $db->getConnection();
    
        // Je prépare la requête
        $sql = "
            DELETE FROM connect 
            WHERE connect.friend_id = :id_user 
            AND connect.user_id = :id
        ";
        $statement = $connection->prepare($sql);
        $statement->execute([
            ':id_user' => $id_user, 
            ':id' => $id
        ]);
            
        $message = "l'utilisateur a bien été supprimé";
        header('Location: http://localhost:3000/Page/#.php?message=' . urlencode($message));
        exit;
    }
}