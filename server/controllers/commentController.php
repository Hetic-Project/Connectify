<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class Comment {

        function getAllCommentsForOnePublication ($id_publication) {
            
            // j'appelle l'objet base de donnée
            $db = new Database();

            // je me connecte à la BDD avec la fonction getConnection de l'objet Database
            $connexion = $db->getConnection();

            // je prépare la requête
            $request = $connexion->prepare("SELECT * FROM comment");
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

        function addCommentInOnePublication ($id_publication) {
            
            $user_id = 2;
            $id_publication = 1;

            // Create a new instance of the Database class
            $db = new Database();

            // Establish a connection to the database
            $connection = $db->getConnection();

            // Prepare the SQL statement to insert the relation
            $sql = "INSERT INTO comment (comment_content, user_id, publication_id) VALUES (:comment_content, :user_id, :publication_id)";
            $statement = $connection->prepare($sql);

            // Bind the values to the parameters in the SQL statement
            $statement->bindValue(':comment_content', 'magnifique robe!', PDO::PARAM_STR);
            $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $statement->bindValue(':publication_id', $id_publication, PDO::PARAM_INT);

            // Execute the SQL statement
            if ($statement->execute()) {
                // Get the last inserted comment ID
                $id_comment = $connection->lastInsertId();

                // The relation was added successfully
                $response = array('success' => true, 'message' => 'Commentaire ajouté !', 'id_comment' => $id_comment);
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                // An error occurred while adding the relation
                $response = array('success' => false, 'message' => 'Échec envoi commentaire.');
                header('Content-Type: application/json');
                echo json_encode($response);
            }

            // Close the database connection
            $connection = null;



        }

        function ifAuthorUpdateComment ($id_comment) {
            // // $_SESSION['id'];
            $id_comment = 4; 
           

            // Create a new instance of the Database class
            $db = new Database();

            // Establish a connection to the database
            $connection = $db->getConnection();

            // Prepare the SQL statement to update the comment
            $sql = "UPDATE comment SET comment_content = 'trop cool !' WHERE id = :id_comment";
            $statement = $connection->prepare($sql);

            // Bind the new comment content and comment ID to the parameters in the SQL statement
            $statement->bindValue(':id_comment', $id_comment, PDO::PARAM_INT);

            // Execute the SQL statement
            if ($statement->execute()) {
                // The comment was updated successfully
                $response = array('success' => true, 'message' => 'Commentaire modifié !');
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                // An error occurred while updating the comment
                $response = array('success' => false, 'message' => 'Échec modification commentaire.');
                header('Content-Type: application/json');
                echo json_encode($response);
            }

            // Close the database connection
            $connection = null;

            

        }

        function ifAuthorDeleteComment ($id_comment) {
            // $_SESSION['id']; 
            
            $id_comment = 3; // Remplacez 1 par l'ID du commentaire que vous souhaitez supprimer

            // Create a new instance of the Database class
            $db = new Database();

            // Establish a connection to the database
            $connection = $db->getConnection();

            // Prepare the SQL statement to delete the comment
            $sql = "DELETE FROM comment WHERE id = :id_comment";
            $statement = $connection->prepare($sql);

            // Bind the comment ID to the parameter in the SQL statement
            $statement->bindParam(':id_comment', $id_comment, PDO::PARAM_INT);

            // Execute the SQL statement
            if ($statement->execute()) {
                // The comment was deleted successfully
                $response = array('success' => true, 'message' => 'Commentaire supprimé !');
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                // An error occurred while deleting the comment
                $response = array('success' => false, 'message' => 'Échec suppression commentaire.');
                header('Content-Type: application/json');
                echo json_encode($response);
            }

            // Close the database connection
            $connection = null;

        }
    
}