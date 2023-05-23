<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class User {

    function getOneUsers(){

        // j'appelle l'objet base de donnée
        $db = new Database();

        // je récupère le user id
        $id = $_SESSION['user']['id'];

        // je me connecte à la BDD avec la fonction getConnection de l'objet Database
        $connexion = $db->getConnection();

        // je prépare la requête
        $request = $connexion->prepare("SELECT * FROM user WHERE user.id = :id");
        // j'exécute la requête
        $request->execute([':id' => $id]);
        // je récupère tous les résultats dans users
        $users = $request->fetchAll(PDO::FETCH_ASSOC);
        // je ferme la connection
        $connexion = null;

        // je renvoie au front les données au format json
        header('Content-Type: application/json');
        echo json_encode($users);
    }
    function updateInformationsForOneUser(){

        // je récupère l'id de la session
        $id = $_SESSION['user']['id'];

        // Connection la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // je récupère les champs du formulaire signin
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $mail = filter_input(INPUT_POST, 'mail');
        $username = filter_input(INPUT_POST, 'username');
        $picture = filter_input(INPUT_POST, 'picture');
        $banner = filter_input(INPUT_POST, 'banner');
        $description = filter_input(INPUT_POST, 'description');

        // si tous les champs sont remplies
        if($firstname && $lastname && $mail && $username && $picture && $banner && $description){

            // je prépare ma requète
            $request = $connection->prepare("
                UPDATE user SET(
                    firstname = :firstname ,
                    lastname = :lastname,
                    mail = :mail,
                    username = :username,
                    picture = :picture,
                    banner = :banner,
                    description = :description
                WHERE
                    id = :id;
            )");

            $request->execute(
                [
                    ":firstname" => $firstname,
                    ":lastname" => $lastname,
                    ":mail" => $mail,
                    ":username" => $username,
                    ":picture" => $picture,
                    ":banner" => $banner,
                    ":description" => $description,
                    ":id" => $id
                ]
            );
            // Fermeture de la connection
            $connection = null;

            $message = "les modifications ont bien été prit en compte";
            header('Location: http://localhost:3000/Page/signin.php?message=' . urlencode($message));
            exit;

        }else {
            $message = "Tout les champs sont requis";
            header('Location: http://localhost:3000/Page/signin.php?message=' . urlencode($message));
            exit;
        }
    }
    function deactivateAccountForOneUser(){
        // je récupère l'id de la session
        $id = $_SESSION['user']['id'];

        // Connection la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();
        // je prépare ma requète
        $request = $connection->prepare("UPDATE user SET active = FALSE WHERE user.id = :id");

        $request->execute([":id" => $id]);

        // Fermeture de la connection
        $connection = null;

        $message = "Le compte a été désactivé avec succès";
        header('Location: http://localhost:3000?message=' . urlencode($message));
        exit;

    }
    function reactivateAccountforOneUser(){
        // je récupère l'id de la session
        $id = $_SESSION['user']['id'];

        // Connection la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();
        // je prépare ma requète
        $request = $connection->prepare("UPDATE user SET active = TRUE WHERE user.id = :id");

        $request->execute([":id" => $id]);

        // Fermeture de la connection
        $connection = null;

        $message = "Le compte a été réactiver";
        header('Location: http://localhost:3000?message=' . urlencode($message));
        exit;
    }
    function delectAccountForOneUser(){
        // je récupère l'id de la session
        $id = $_SESSION['user']['id']; 

        // j'appelle l'objet base de donnée
        $db = new Database();

        // je me connecte à la BDD avec la fonction getConnection de l'objet Database
        $connexion = $db->getConnection();

        // je prépare la requête
        $request = $connexion->prepare("DELETE FROM user WHERE user.id = :id");
        // j'exécute la requête
        $request->execute([':id' => $id]);

        $message = "Le compte a bien été suprimé";
        header('Location: http://localhost:3000?message=' . urlencode($message));
        exit;

        // je requête la BDD

    }
    function loginAccount() {

        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();
        $_SESSION['user'] = $userInfos;

        // récupérer les champs du formulaire login
        $username = $_POST['username'];
        $password = $_POST['password'];

        // si les champs son renseigner
        if($username && $password) {
            // Requêtes SQL
            $request = $connection->prepare("
                SELECT user.id, user.password, user.active, role.name
                FROM user 
                JOIN role
                ON user.role_id = role.id
                WHERE username = :username
            ");
            $request->execute([":username" => $username]);
            $userInfos = $request->fetch(PDO::FETCH_ASSOC);

            if ($userInfos && password_verify($password, $userInfos['password'])) {
                if ($userInfos['active']){

                    session_start();
                    $_SESSION['user'] = $userInfos;
                    header('HTTP/1.1 200 OK');
                    $message = "Connexion réussie";
                    header('Location: http://localhost:3000/Page/publications.php?message=' . urlencode($message));
                    exit;

                }else {
                    $message = "Le compte a été désactiver";
                    header('Location: http://localhost:3000?message=' . urlencode($message));
                    exit;
                }
                
            } else {
                header("HTTP/1.1 402");
                $message = "le nom d'utilisateur ou le mot de passe est incorrect";
                header('Location: http://localhost:3000/Page/login.php?message=' . urlencode($message));
                exit;
            }
        } else {
            $message = "Tout les champs sont requis";
            header('Location: http://localhost:3000/Page/login.php?message=' . urlencode($message));
            exit;
        }
        
        // Fermeture de la connection
        $connection = null;


    }
    function addStudent(){
        // je vérifie que l'id du user est relier a un role admin 

        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // je récupère les champs du formulaire signin
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $role_id = $_POST['role_id'];
        $promo_id = $_POST['promo_id'];

        // jsi tous les champs sont remplies
        if($firstname && $lastname && $mail && $password && $username && $role_id && $promo_id){

            // Je hash le mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            // je prépare ma requète
            $request = $connection->prepare("
            INSERT INTO user (
                firstname,
                lastname,
                mail,
                password,
                username,
                role_id,
                promo_id
            ) VALUES (
                :firstname,
                :lastname,
                :mail,
                :password,
                :username,
                :role_id,
                :promo_id);");

            $request->execute(
                [
                    ":firstname" => $firstname,
                    ":lastname" => $lastname,
                    ":mail" => $mail,
                    ":password" => $hashed_password,
                    ":username" => $username,
                    ":role_id" => $role_id,
                    ":promo_id" => $promo_id
                ]
            );
            // Fermeture de la connection
            $connection = null;

            $message = "l'étudiant a bien été créé";
            header('Location: http://localhost:3000/Page/accueil.php?message=' . urlencode($message));
            exit;

        }else {
            $message = "Tout les champs sont requis";
            header('Location: http://localhost:3000/Page/signin.php?message=' . urlencode($message));
            exit;
        }
        

    }
    function logoutAccount(){

        session_unset();
        session_destroy();

        header('Location: http://localhost:3000');

    }
    function searchRelation(){
        
        // je récupère les champs
        $searchBarre = $_POST['searchBarre'];
        $query = $_POST['query'];
        //Connecter la BDD
        $db = new Database();
    
        // Ouverture de la connection
        $connection = $db->getConnection();

        switch($query){

            case 'user':

                $request = $connection->prepare("SELECT * FROM user WHERE firstname = :searchBarre OR lastname = :searchBarre");
                $request->execute([
                    ':searchBarre' => $searchBarre
                ]);
                $results = $request->fetchAll(PDO::FETCH_ASSOC);
            
                if($results){
                    header('Content-Type: application/json');
                    echo json_encode($results);
                }else{
                    $message = "Aucun résultats";
                    header('Location: http://localhost:3000/Page/recherche.php?message=' . urlencode($message));
                    exit;
                }
                break;
            
            case 'group':

                $request = $connection->prepare("SELECT * FROM group WHERE group.name = :searchBarre");
                $request->execute([
                    ':searchBarre' => $searchBarre
                ]);
                $results = $request->fetchAll(PDO::FETCH_ASSOC);
            
                if($results){
                    header('Content-Type: application/json');
                    echo json_encode($results);
                }else{
                    $message = "Aucun résultats";
                    header('Location: http://localhost:3000/Page/recherche.php?message=' . urlencode($message));
                    exit;
                }
                break;
            
            case 'promo':

                $request = $connection->prepare("SELECT * FROM promo WHERE promo.promo_name = :searchBarre");
                $request->execute([
                    ':searchBarre' => $searchBarre
                ]);
                $results = $request->fetchAll(PDO::FETCH_ASSOC);
            
                if($results){
                    header('Content-Type: application/json');
                    echo json_encode($results);
                }else{
                    $message = "Aucun résultats";
                    header('Location: http://localhost:3000/Page/recherche.php?message=' . urlencode($message));
                    exit;
                }
                break;
            
            case 'publication':

                $request = $connection->prepare("SELECT * FROM publication WHERE publication.title = :searchBarre");
                $request->execute([
                    ':searchBarre' => $searchBarre
                ]);
                $results = $request->fetchAll(PDO::FETCH_ASSOC);
            
                if($results){
                    header('Content-Type: application/json');
                    echo json_encode($results);
                }else{
                    $message = "Aucun résultats";
                    header('Location: http://localhost:3000/Page/recherche.php?message=' . urlencode($message));
                    exit;
                }
                break;
                
            default: 

                if(!$query){
                    $message = "Merci de choisir un filtre";
                    header('Location: http://localhost:3000/Page/recherche.php?message=' . urlencode($message));
                    exit; 
                }
            break;   
        }  

    
        
    }
    

    
}