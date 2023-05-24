<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class Feed {

    function getAllFeedsForOneUser ($id_user) {

        
        // j'appelle l'objet base de donnée
        $db = new Database();

        // je me connecte à la BDD avec la fonction getConnection de l'objet Database
        $connexion = $db->getConnection();
        
        // je prépare la requête
        $request = $connexion->prepare("SELECT * FROM post");
        // j'exécute la requête
                    $request->execute();
                    // je récupère tous les résultats dans users
                    $comments = $request->fetchAll(PDO::FETCH_ASSOC);
                    // je ferme la connection
                    $connexion = null;
        
                    // je renvoie au front les données au format json
                    header('Content-Type: application/json');
                    echo json_encode($comments);

    }


    function addFeedOfUser () {
        // $_SESSION['id']; 

        
        // Create a new instance of the Database class
        $db = new Database();

        // Establish a connection to the database
        $connection = $db->getConnection();

        // Prepare the SQL statement to insert the relation
        $sql = "INSERT INTO post (user_id, title, content, picture) VALUES (:user_id, :title, :content, :picture)";
        $statement = $connection->prepare($sql);

        // Bind the values to the parameters in the SQL statement
        $statement->bindValue(':user_id', 1, PDO::PARAM_INT);
        $statement->bindValue(':title', 'Moi', PDO::PARAM_STR);
        $statement->bindValue(':content', 'photo de moi', PDO::PARAM_STR);
        $statement->bindValue(':picture', 'url', PDO::PARAM_STR);

        // Execute the SQL statement
        if ($statement->execute()) {
            // The relation was added successfully
            $response = array('success' => true, 'message' => 'Post ajouté !.');
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // An error occurred while adding the relation
            $response = array('success' => false, 'message' => 'echec envoi du post.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }

        // Close the database connection
        $connection = null;


    }


    function updateFeedOfUser ($id_feed) {
        // $_SESSION['id']; 
        $feed_id= 4;
           

        // Create a new instance of the Database class
        $db = new Database();

        // Establish a connection to the database
        $connection = $db->getConnection();

        // Prepare the SQL statement to update the comment
        $sql = "UPDATE post SET title = 'trop cool !' WHERE id = :feed_id";
        $statement = $connection->prepare($sql);

        // Bind the new comment content and comment ID to the parameters in the SQL statement
        $statement->bindValue(':feed_id', $feed_id, PDO::PARAM_INT);

        // Execute the SQL statement
        if ($statement->execute()) {
            // The comment was updated successfully
            $response = array('success' => true, 'message' => 'Post modifié !');
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // An error occurred while updating the comment
            $response = array('success' => false, 'message' => 'Échec modification du post.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }

        // Close the database connection
        $connection = null;


    }


    function deleteFeedOfUser ($id_feed) {
        // $_SESSION['id']; 
        $feed_id = 1;

        // Create a new instance of the Database class
        $db = new Database();
        
        // Establish a connection to the database
        $connection = $db->getConnection();
        
        // Prepare the SQL statement to delete the post
        $sql = "DELETE FROM post WHERE id = :feed_id";
        $statement = $connection->prepare($sql);
        
        // Bind the value to the parameter in the SQL statement
        $statement->bindValue(':feed_id', $feed_id, PDO::PARAM_INT);
        
        // Execute the SQL statement
        if ($statement->execute()) {
            // The post was deleted successfully
            $response = array('success' => true, 'message' => 'Post supprimé !');
            header('Content-Type: application/json');
            echo json_encode($response);
        } 
        else {
            // An error occurred while deleting the post
            $response = array('success' => false, 'message' => 'Échec de la suppression du post.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
        
        // Close the database connection
        $connection = null;
        


    }

}