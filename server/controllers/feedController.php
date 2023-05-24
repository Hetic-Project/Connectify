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

        
        $db = new Database();

        $connection = $db->getConnection();

        $sql = "INSERT INTO post (user_id, title, content, picture) VALUES (:user_id, :title, :content, :picture)";
        $statement = $connection->prepare($sql);

        $statement->bindValue(':user_id', 1, PDO::PARAM_INT);
        $statement->bindValue(':title', 'Moi', PDO::PARAM_STR);
        $statement->bindValue(':content', 'photo de moi', PDO::PARAM_STR);
        $statement->bindValue(':picture', 'url', PDO::PARAM_STR);

        if ($statement->execute()) {
            $response = array('success' => true, 'message' => 'Post ajouté !.');
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('success' => false, 'message' => 'echec envoi du post.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }

        $connection = null;
    }


    function updateFeedOfUser ($id_feed) {
        // $_SESSION['id']; 
        $feed_id= 4;
           

        $db = new Database();

        $connection = $db->getConnection();

        $sql = "UPDATE post SET title = 'trop cool !' WHERE id = :feed_id";
        $statement = $connection->prepare($sql);

        $statement->bindValue(':feed_id', $feed_id, PDO::PARAM_INT);

        if ($statement->execute()) {
            $response = array('success' => true, 'message' => 'Post modifié !');
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('success' => false, 'message' => 'Échec modification du post.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }

        $connection = null;
    }


    function deleteFeedOfUser ($id_feed) {
        // $_SESSION['id']; 
        $feed_id = 1;

        $db = new Database();
        
        $connection = $db->getConnection();
        
        $sql = "DELETE FROM post WHERE id = :feed_id";
        $statement = $connection->prepare($sql);
        
        $statement->bindValue(':feed_id', $feed_id, PDO::PARAM_INT);
        
        if ($statement->execute()) {
            $response = array('success' => true, 'message' => 'Post supprimé !');
            header('Content-Type: application/json');
            echo json_encode($response);
        } 
        else {
            $response = array('success' => false, 'message' => 'Échec de la suppression du post.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
        
        $connection = null;
    }

}