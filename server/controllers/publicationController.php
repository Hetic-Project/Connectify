<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class Publication {

    function getAllPublicationsInGroup ($group_id) {
        
        // récupérer l'id de la session
        $id = $_SESSION['user']['id'];

        // j'appelle l'objet base de donnée
        $db = new Database();

        // je me connecte à la BDD avec la fonction getConnection de l'objet Database
        $connexion = $db->getConnection();

        // vérifie que l'utilisateur est membre du goupe (table membre)
        $sql= "
            SELECT member.status
            FROM member
            WHERE member.user_id = :id
            AND member.group_id = :group_id
        ";
        $request = $connexion->prepare($sql);

        $request->execute([
            ':id' => $id,
            ':group_id' => $group_id
        ]);

        $member = $request->fetchAll(PDO::FETCH_ASSO);

        if($member['status'] == 1){

            // je prépare la requête
            $request = $connexion->prepare("SELECT * FROM publication WHERE group_id = :group_id");

            // j'exécute la requête
            $request->execute([':group_id' => $group_id]);
            // je récupère tous les résultats dans publications
            $publications = $request->fetchAll(PDO::FETCH_ASSOC);
            // je ferme la connexion
            $connexion = null;
    
            // je renvoie au front les données au format json
            header('Content-Type: application/json');
            echo json_encode($publications);

        }else if ($member['status'] == 2){
            $message = "vous avez été bannis !";
                header('Location: http://localhost:3000/Page/#.php?message=' . urlencode($message));
                exit;

        }else if ($member['status'] == 0){
            $message = "vous n'avez pas encore intégré le group";
            header('Location: http://localhost:3000/Page/#.php?message=' . urlencode($message));
            exit;
        }else if (!$member['status']) {
            //rediriger l'utilisateur sur la page pour candidater a un group
            header('Location: http://localhost:3000/Page/#.php?message=' . urlencode($message));
            exit;
        }


    }

    
    function getOnePublication ($id_publication) {

        // j'appelle l'objet base de donnée
        $db = new Database();

        // je me connecte à la BDD avec la fonction getConnection de l'objet Database
        $connexion = $db->getConnection();

        // je prépare la requête
        $request = $connexion->prepare("SELECT * FROM publication WHERE id = :publication_id");
        // j'attribue la valeur de $group_id au paramètre :group_id de la requête
        $request->bindParam(':publication_id', $publication_id);
        // j'exécute la requête
        $request->execute();
        // je récupère tous les résultats dans publications
        $publication = $request->fetch(PDO::FETCH_ASSOC);
        // je ferme la connexion
        $connexion = null;

        // je renvoie au front les données au format json
        header('Content-Type: application/json');
        echo json_encode($publication);

    }

    


    function addPublicationInGroup($id_group) {
        
        $group_id = 1;
        $author_id = 2;
        
        // Create a new instance of the Database class
        $db = new Database();
        
        // Establish a connection to the database
        $connection = $db->getConnection();
        
       
        // Prepare the SQL statement to insert the relation
        $sql = "INSERT INTO publication (title, content, picture, author_id, group_id) VALUES (:title, :content, :picture, :author_id, :group_id)";
        $statement = $connection->prepare($sql);
        
            // Bind the values to the parameters in the SQL statement
        $statement->bindValue(':title', 'Photo de chat', PDO::PARAM_STR);
        $statement->bindValue(':content', 'Photo réalisé par William Vandal', PDO::PARAM_STR);
        $statement->bindValue(':picture', 'picture url', PDO::PARAM_STR);
        $statement->bindValue(':author_id', $author_id, PDO::PARAM_INT);
        $statement->bindValue(':group_id', $group_id, PDO::PARAM_INT);
        
        // Execute the SQL statement
        if ($statement->execute()) {
            // The relation was added successfully
            $response = array('success' => true, 'message' => 'Publication ajoutée !');
            header('Content-Type: application/json');
            echo json_encode($response);
        } 
        else {
            // An error occurred while adding the relation
            $response = array('success' => false, 'message' => 'Échec de l\'envoi de la publication.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
        
        
        // Close the database connection
        $connection = null;
        

    }


    function updatePublication ($id_publication) {
        // $_SESSION['id'];

        $publication_id = 3;

         // Create a new instance of the Database class
         $db = new Database();

         // Establish a connection to the database
         $connection = $db->getConnection();

         // Prepare the SQL statement to delete the comment
         $sql = "UPDATE publication SET title = 'Photo de chien' WHERE id = :publication_id";
         $statement = $connection->prepare($sql);

         // Bind the comment ID to the parameter in the SQL statement
         $statement->bindParam(':publication_id', $publication_id, PDO::PARAM_INT);

         // Execute the SQL statement
         if ($statement->execute()) {
             // The comment was deleted successfully
             $response = array('success' => true, 'message' => 'Publication modifié !');
             header('Content-Type: application/json');
             echo json_encode($response);
         } else {
             // An error occurred while deleting the comment
             $response = array('success' => false, 'message' => 'Échec modification de la publication.');
             header('Content-Type: application/json');
             echo json_encode($response);
         }

         // Close the database connection
         $connection = null;

    }


    function deletePublication ($id_publication) {
        // $_SESSION['id'];

        $publication_id = 4;

         // Create a new instance of the Database class
         $db = new Database();

         // Establish a connection to the database
         $connection = $db->getConnection();

         // Prepare the SQL statement to delete the comment
         $sql = "DELETE FROM publication WHERE id = :publication_id";
         $statement = $connection->prepare($sql);

         // Bind the comment ID to the parameter in the SQL statement
         $statement->bindParam(':publication_id', $publication_id, PDO::PARAM_INT);

         // Execute the SQL statement
         if ($statement->execute()) {
             // The comment was deleted successfully
             $response = array('success' => true, 'message' => 'Publication supprimé !');
             header('Content-Type: application/json');
             echo json_encode($response);
         } else {
             // An error occurred while deleting the comment
             $response = array('success' => false, 'message' => 'Échec suppression de la publication.');
             header('Content-Type: application/json');
             echo json_encode($response);
         }

         // Close the database connection
         $connection = null;

    }

   
    
}