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
        $sql = "SELECT * FROM connect WHERE user_id = :user_id OR friend_id = :user_id";
        $statement = $connection->prepare($sql);
    
        // J'exécute la requête en fournissant la valeur du paramètre
        if ($statement->execute(array(':user_id' => $user_id))) {
            // La requête s'est exécutée avec succès
    
            // Récupérer tous les résultats dans un tableau associatif
            $relations = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            // Fermeture de la connexion
            $connection = null;
    
            // Réponse JSON indiquant les relations de l'utilisateur
            header('Content-Type: application/json');
            echo json_encode($relations);
        } else {
            // Erreur lors de l'exécution de la requête
    
            // Fermeture de la connexion
            $connection = null;
    
            // Réponse JSON indiquant l'erreur
            $response = array('success' => false, 'message' => 'Failed to retrieve user relations.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    
    function addRelationForOneUser($id_user) {

        $id = $_SESSION['user']['id'];
    
        // Create a new instance of the Database class
        $db = new Database();
    
        // Establish a connection to the database
        $connection = $db->getConnection();
    
        // Prepare the SQL statement to insert the relation
        $sql = "INSERT INTO connect (user_id, friend_id) VALUES (:user_id, :friend_id)";
        $statement = $connection->prepare($sql);
    
        // Bind the values to the parameters in the SQL statement
        $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindValue(':friend_id', $id_user, PDO::PARAM_INT);
    
        // Execute the SQL statement
        if ($statement->execute()) {
            // The relation was added successfully
            $response = array('success' => true, 'message' => 'Relation added successfully.');
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // An error occurred while adding the relation
            $response = array('success' => false, 'message' => 'Failed to add relation.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    
        // Close the database connection
        $connection = null;
    }
    
    function deleteRelationForOneUser($id_user) {
        $id = $_SESSION['user']['id'];
    
        // J'appelle l'objet base de données
        $db = new Database();
    
        // Je me connecte à la BDD avec la fonction getConnection de l'objet Database
        $connection = $db->getConnection();
    
        // Je prépare la requête
        $sql = "DELETE FROM connect WHERE (user_id = :user_id OR friend_id = :user_id) AND (user_id = :id_user OR friend_id = :id_user)";
        $statement = $connection->prepare($sql);
    
        // J'exécute la requête
        if ($statement->execute(array(':user_id' => $user_id, ':id_user' => $id_user))) {
            // La requête s'est exécutée avec succès
    
            // Fermeture de la connexion
            $connection = null;
    
            // Réponse JSON indiquant le succès
            $response = array('success' => true, 'message' => 'Relation deleted successfully.');
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // Erreur lors de l'exécution de la requête
    
            // Fermeture de la connexion
            $connection = null;
    
            // Réponse JSON indiquant l'erreur
            $response = array('success' => false, 'message' => 'Failed to delete the relation.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}