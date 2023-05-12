<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class Group {

    function addGroupPublicOrPrivateForOneUser ($id_group){

    }

    function joinGroupPublicForOneUser ($id_group){

    }

    function joinGroupPrivateForOneUser($id_group){

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