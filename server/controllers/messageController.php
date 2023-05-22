<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class Message {

    function sendPrivateMessage($id_receiver, $id_transmitter) {
    
        // Récupère le contenu du message privé depuis la requête POST
        $message_content = $_POST['message_content'];
    
        // Récupère l'identité de l'utilisateur émetteur depuis la session
        $id = $_SESSION['user']['id'];
    
        // Connexion à la base de données
        $db = new Database();
        $connection = $db->getConnection();
    
        // Insertion du message dans la table private_message
        $sql = "INSERT INTO private_message (message_content, transmitter_id, receiver_id) VALUES (:message_content, :transmitter_id, :receiver_id)";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':message_content', $message_content);
        $statement->bindValue(':transmitter_id', $id_transmitter);
        $statement->bindValue(':receiver_id', $id_receiver);
    
        if ($statement->execute()) {
            // Récupération du message inséré
            $message_id = $connection->lastInsertId();
            $sql = "SELECT * FROM private_message WHERE id = :message_id";
            $statement = $connection->prepare($sql);
            $statement->bindValue(':message_id', $message_id);
            $statement->execute();
            $message = $statement->fetch(PDO::FETCH_ASSOC);
    
            // Fermeture de la connexion à la base de données
            $connection = null;
    
            // Retourne le message inséré en JSON
            $message = "le message a été envoyé";
            header('Location: http://localhost:3000/Page/message.php?message=' . urlencode($message));
            exit;
        } else {
            // Retourne une réponse d'erreur en JSON
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(array('message' => 'An error occurred while inserting the message.'));
        }
    }
    

    function receivePrivateMessage($receiver_id) {
        // J'appelle l'objet base de données
        $db = new Database();
    
        // Je me connecte à la BDD avec la fonction getConnection de l'objet Database
        $connection = $db->getConnection();
        $id = $_SESSION['user']['id'];
    
        // Je prépare la requête pour sélectionner les messages privés entre le récepteur et l'émetteur
        $sql = "SELECT private_message.message_content, user.firstname, user.lastname
                FROM private_message
                JOIN user ON private_message.transmitter_id = user.id
                WHERE private_message.receiver_id = :id OR private_message.transmitter_id = :id";
        $statement = $connection->prepare($sql);
    
        // J'exécute la requête en fournissant les valeurs des paramètres
        if ($statement->execute(array(':id' => $id))) {
            // La requête s'est exécutée avec succès
    
            // Récupérer tous les résultats dans un tableau
            $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            // Fermeture de la connexion
            $connection = null;
    
            // Réponse JSON indiquant les messages privés
            header('Content-Type: application/json');
            echo json_encode($messages);
        } else {
            // Erreur lors de l'exécution de la requête
    
            // Fermeture de la connexion
            $connection = null;
    
            // Réponse JSON indiquant l'erreur
            $response = array('success' => false, 'message' => 'Failed to retrieve private messages.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    // Le formulaire en front doit contenir un champ new_message_content qui contient le nouveau contenu du message
    function ifAuthorUpdateMessage($id_message, $new_message_content) {

        // $id_message = 1;
        // $user_id = 1;
        // $new_message_content = 1;
        $new_message_content = $_POST['new_message_content'];
        
        // J'appelle l'objet base de données
        $db = new Database();
        
        // Je me connecte à la BDD avec la fonction getConnection de l'objet Database
        $connection = $db->getConnection();
        
        // Je prépare la requête pour sélectionner le message avec l'ID donné
        $sql = "SELECT transmitter_id FROM private_message WHERE id = :id_message";
        $statement = $connection->prepare($sql);
        
        // J'exécute la requête en fournissant la valeur du paramètre
        $statement->execute(array(':id_message' => $id_message));
        
        // Je récupère le résultat de la requête
        $message = $statement->fetch(PDO::FETCH_ASSOC);
        
        if (!$message) {
            // Message non trouvé
            $response = array('success' => false, 'message' => 'Message not found.');
            header('Content-Type: application/json');
            echo json_encode($response);
            return;
        }
        
        // if ($message['transmitter_id'] !== $user_id) {
        //     // L'utilisateur n'est pas l'auteur du message
        //     $response = array('success' => false, 'message' => 'You are not the author of this message.');
        //     header('Content-Type: application/json');
        //     echo json_encode($response);
        //     return;
        // }
        
        // lorsque l'utilisateur est l'auteur du message
        $sql = "UPDATE private_message SET message_content = :new_message_content, updated_at = CURRENT_TIMESTAMP WHERE id = :id_message";
        $statement = $connection->prepare($sql);
        $statement->execute(array(':id_message' => $id_message, ':new_message_content' => $new_message_content));
        
        $response = array('success' => true, 'message' => 'Message updated successfully.');
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    
    function ifAuthorDeleteMessage($message_id) {

        $user_id = 1;
    
        // Connexion à la DDB
        $db = new Database();
        $connection = $db->getConnection();
    
        // Vérifier si l'utilisateur est l'auteur du message
        $sql = "SELECT id FROM private_message WHERE id = :message_id AND transmitter_id = :user_id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':message_id', $message_id);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
    
        if ($statement->rowCount() > 0) {
            // L'utilisateur est l'auteur du message, procéder à la suppression
            $sql = "DELETE FROM private_message WHERE id = :message_id";
            $deleteStatement = $connection->prepare($sql);
            $deleteStatement->bindValue(':message_id', $message_id);
    
            if ($deleteStatement->execute()) {
                $response = array('success' => true, 'message' => 'Message deleted successfully.');
            } else {
                $response = array('success' => false, 'message' => 'Failed to delete message.');
            }
        } else {
            // L'utilisateur n'est pas l'auteur du message
            $response = array('success' => false, 'message' => 'User is not the author of the message.');
        }
    
        // Éteindre la connexion à la DDB
        $connection = null;
    
        // Retourner la réponse en JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}