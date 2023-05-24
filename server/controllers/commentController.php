<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class Comment {

        function getAllCommentsForOnePublication ($id_publication) {
            
            // j'appelle l'objet base de données
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

            $db = new Database();

            $connection = $db->getConnection();

            $sql = "INSERT INTO comment (comment_content, user_id, publication_id) VALUES (:comment_content, :user_id, :publication_id)";
            $statement = $connection->prepare($sql);

            $statement->bindValue(':comment_content', 'magnifique robe!', PDO::PARAM_STR);
            $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $statement->bindValue(':publication_id', $id_publication, PDO::PARAM_INT);

            if ($statement->execute()) {
                $id_comment = $connection->lastInsertId();

                $response = array('success' => true, 'message' => 'Commentaire ajouté !', 'id_comment' => $id_comment);
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                $response = array('success' => false, 'message' => 'Échec envoi commentaire.');
                header('Content-Type: application/json');
                echo json_encode($response);
            }

            $connection = null;



        }

        function ifAuthorUpdateComment ($id_comment) {
            // // $_SESSION['id'];
            $id_comment = 4; 
           

            $db = new Database();

            $connection = $db->getConnection();

            $sql = "UPDATE comment SET comment_content = 'trop cool !' WHERE id = :id_comment";
            $statement = $connection->prepare($sql);

            $statement->bindValue(':id_comment', $id_comment, PDO::PARAM_INT);

            if ($statement->execute()) {
                $response = array('success' => true, 'message' => 'Commentaire modifié !');
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                $response = array('success' => false, 'message' => 'Échec modification commentaire.');
                header('Content-Type: application/json');
                echo json_encode($response);
            }

            $connection = null;

            

        }

        function ifAuthorDeleteComment ($id_comment) {
            // $_SESSION['id']; 
            
            $id_comment = 3; // Remplacez 1 par l'ID du commentaire que vous souhaitez supprimer

            $db = new Database();

            $connection = $db->getConnection();

            $sql = "DELETE FROM comment WHERE id = :id_comment";
            $statement = $connection->prepare($sql);

            $statement->bindParam(':id_comment', $id_comment, PDO::PARAM_INT);

            if ($statement->execute()) {
                $response = array('success' => true, 'message' => 'Commentaire supprimé !');
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                $response = array('success' => false, 'message' => 'Échec suppression commentaire.');
                header('Content-Type: application/json');
                echo json_encode($response);
            }

            $connection = null;

        }
    
}