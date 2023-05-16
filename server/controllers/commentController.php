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
            
                    // Vérifie si la méthode de requête est POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // j'appelle l'objet base de données
                $db = new Database();

                // je me connecte à la BDD avec la fonction getConnection de l'objet Database
                $connexion = $db->getConnection();

                // je récupère les données de la requête POST
                $commentContent = $_POST['comment_content'];
                $userId = $_POST['user_id'];
                $publicationId = $_POST['publication_id'];

                // je prépare la requête
                $request = $connexion->prepare("INSERT INTO `comment` (comment_content, user_id, publication_id)
                                                VALUES ('magnifique robe !' 2, 1)");

                // j'exécute la requête en liant les valeurs
                // $request->bindParam(':comment_content', $commentContent);
                // $request->bindParam(':user_id', $userId);
                // $request->bindParam(':publication_id', $publicationId);
                $request->execute();

                // je récupère l'ID du commentaire nouvellement inséré
                // $commentId = $connexion->lastInsertId();

                // je ferme la connexion
                $connexion = null;

                // // je renvoie l'ID du commentaire nouvellement inséré au front-end
                // header('Content-Type: application/json');
                // echo json_encode(['comment_id' => $commentId]);
            } else {
                // Si la méthode de requête n'est pas POST, renvoie une erreur appropriée
                http_response_code(405);
                echo 'Method Not Allowed';
            }

        }

        function ifAuthorUpdateComment ($id_comment) {
            // $_SESSION['id'];
            $role_id = 1;
            $user_id = 1;


        }

        function ifAuthorDeleteComment ($id_comment) {
            $_SESSION['id']; 
        }
    
}