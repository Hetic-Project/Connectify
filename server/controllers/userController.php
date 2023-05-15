<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class User {

    function getAllUsers(){

        // j'appelle l'objet base de donnée
        $db = new Database();

        // je me connecte à la BDD avec la fonction getConnection de l'objet Database
        $connexion = $db->getConnection();

        // je prépare la requête
        $request = $connexion->prepare("SELECT * FROM user");
        // j'exécute la requête
        $request->execute();
        // je récupère tous les résultats dans users
        $users = $request->fetchAll(PDO::FETCH_ASSOC);
        // je ferme la connection
        $connexion = null;

        // je renvoie au front les données au format json
        header('Content-Type: application/json');
        echo json_encode($users);
    }
    function updateInformationsForOneUser(){
        $_SESSION['id']; 
    }
    function deactivateAccountForOneUser(){
        $_SESSION['id']; 
    }
    function reactivateAccountforOneUser(){
        $_SESSION['id']; 
    }
    function delectAccountForOneUser(){
        $_SESSION['id']; 
    }
    function loginAccount() {

        
    }
    function signUpAccount(){

    }
    function logoutAccount(){

    }
    function searchRelation($parms){
   
    }

    
}