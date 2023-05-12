<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class Message {

    function sendPrivateMessage($id_receiver, $id_transmitter) {
        // Reprends le contenu du message privé
        // $message_content = $_POST['message_content']
        $message_content = 1;
    
        // Connexion à la DDB
        $db = new Database();
        $connection = $db->getConnection();
    
        $sql = "INSERT INTO private_message (message_content, transmitter_id, receiver_id) VALUES (:message_content, :transmitter_id, :receiver_id)";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':message_content', $message_content);
        $statement->bindValue(':transmitter_id', $id_transmitter);
        $statement->bindValue(':receiver_id', $id_receiver);
    
        if ($statement->execute()) {
            // Récupère l'ID du message inséré
            $message_id = $connection->lastInsertId();
    
            $response = array('success' => true, 'message' => 'Private message sent successfully.', 'message_id' => $message_id);
        } else {
            $response = array('success' => false, 'message' => 'Failed to send private message.');
        }
    
        // Éteins la connexion à la DDB
        $connection = null;
    
        // Retourne la réponse en JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    

    function receivePrivateMessage($id_receiver, $id_transmitter) {
        // J'appelle l'objet base de données
        $db = new Database();
    
        // Je me connecte à la BDD avec la fonction getConnection de l'objet Database
        $connection = $db->getConnection();
    
        // Je prépare la requête pour sélectionner les messages privés entre le récepteur et l'émetteur
        $sql = "SELECT message_content FROM private_message WHERE receiver_id = :receiver_id AND transmitter_id = :transmitter_id";
        $statement = $connection->prepare($sql);
    
        // J'exécute la requête en fournissant les valeurs des paramètres
        if ($statement->execute(array(':receiver_id' => $id_receiver, ':transmitter_id' => $id_transmitter))) {
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

    
        $user_id = 1;
        
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
        
        if ($message['transmitter_id'] !== $user_id) {
            // L'utilisateur n'est pas l'auteur du message
            $response = array('success' => false, 'message' => 'You are not the author of this message.');
            header('Content-Type: application/json');
            echo json_encode($response);
            return;
        }
        
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