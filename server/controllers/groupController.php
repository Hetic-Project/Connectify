<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class Group {

    function addGroupPublicOrPrivateForOneUser (){

        // je récupère les champs du formulaire 
        $name = $_POST['name'];
        $description = $_POST['description'];
        $status = $_POST['status'];
       
        // je récupère l'id de l'utilisateur
        $id = $_SESSION['user']['id'];


        $db = new Database();

        $connexion = $db->getConnection();

        $requestGroup = $connexion->prepare("
            INSERT INTO `group` (name, description, status)
            VALUES (:name, :description, :status);
        ");

        $requestMember = $connexion->prepare("
            INSERT INTO membre (group_id, user_id, role_id)
            VALUES (:group_id, :user_id, 3);
        ");

        $requestGroup->execute([
            'name' => $name,
            'description' => $description,
            'status' => $status
        ]);

        $group_id = $connexion->lastInsertId();

        $requestMember->execute([
            'group_id' => $group_id,
            'user_id' => $id
        ]);

        $connection = null;

        $message = "Le groupe a été créer avec succes";
        header('Location: http://localhost:3000/Page/#.php/' . $group_id . '?message=' . urlencode($message));
        exit;

    }

    function joinGroupPublicForOneUser ($group_id){

        // je récupère l'id de l'utilisateur
        $id = $_SESSION['user']['id'];

        $db = new Database();

        $connexion = $db->getConnection();

        $request = $connexion->prepare("  
            INSERT INTO membre (group_id, user_id, role_id)
            VALUES (:group_id, :user_id, 4);
        ");
        
        $request->execute([
            'group_id' => $group_id,
            'user_id' => $id
        ]);

        $connection = null;

        $message = "Félicitation vous avez rejoint le groupe";
        header('Location: http://localhost:3000/Page/#.php/' . $group_id . '?message=' . urlencode($message));
        exit;
    }

    function joinGroupPrivateForOneUser($group_id){

        // je récupère l'id de l'utilisateur 
        $id = $_SESSION['user']['id'];

        //rechercher dans la table menbre qui est admin 
        $db = new Database();

        $connexion = $db->getConnection();

        // je récupère les admins
        $request = $connexion->prepare("
            SELECT member.user_id 
            FROM member 
            WHERE member.role_id = 3 
            AND member.group_id = :group_id
            
        ");

        $request->execute(['group_id' => $group_id]);

        //je récupère les admins du group
        $admins = $request->fetchAll(PDO::FETCH_ASSOC);

        $request = $connexion->prepare("
            SELECT user.firstname, user.lastname
            FROM user 
            WHERE user.id = :id  
        ");

        $request->execute(['id' => $id]);

        // nom et prénom de l'utilisateur qui veut rejoindre le group 
        $result = $request->fetch(PDO::FETCH_ASSOC);

        // message a envoyer aux admis 
        $message = $result['lastname'] . ' ' . $result['firstname'] . ' ' . "Souhaite rejoindre votre groupe";

        

        // pour chaque admin dans admins
        foreach ($admins as $admin) {
            $transmitter_id = $id;
            $receiver_id = $admin;
            $message_content = $message;
            
            // j'envoi un message
            $request = $connexion->prepare("
                INSERT INTO private_message (transmitter_id, receiver_id, message_content)
                VALUES (:transmitter_id, :receiver_id, :message_content);
            ");
        
            $request->execute([
                'transmitter_id' => $transmitter_id,
                'receiver_id' => $receiver_id,
                'message_content' => $message_content
            ]);
        }

        header('Content-Type: application/json');

        echo json_encode($message);


        // j'envoie le message 

    }
    
    function getGroupPublicationForMembers ($id_group){

    }

    function addRelationOnGroup ($id_group){

    }

    function acceptOrDeniedCandidateInGroup (){
        $_SESSION['id'];    
    }

    function ifAdminSetOtherAdminInGroup (){
        $_SESSION['id'];
    }

    function ifAdminBanishMember (){
        $_SESSION['id'];
    }

    function ifAdminUpdateGroupInfo (){
        $_SESSION['id'];
    }


    
}