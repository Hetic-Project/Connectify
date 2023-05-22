<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class Rubric {
    function getRubricsForOnePage ($id_page){

        $db = new Database();
        $conn = $db->getConnection();
        // requete la table rubric pour récupeérer toutes les rubriques d'une page (id_page)
        $sql = "SELECT * FROM rubric WHERE id_page = :id_page";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id_page' => $id_page]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header ('content - type:application/json');
        echo json_encode($result); 
    }

    function addOneRubricForOnePage ($id_page){
    // 1. je récupère les champs du formulaire
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $picture = $_POST['picture'];
    $banner = $_POST['banner'];
    // 2. Vérifier que l'utilisateur est connecté et qu'il est un administrateur
    session_start();
    $user_id = $_SESSION['user']['id'];
    $dsn = "mysql:host=localhost;dbname=mydatabase;charset=utf8mb4";
    $username = "username";
    $password = "password";
    $pdo = new PDO($dsn, $username, $password);
    $sql = "SELECT role.name FROM role JOIN role_page ON role.id = role_page.role_id WHERE role_page.user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id' => $user_id]);
         // 3. Ajouter la nouvelle rubrique dans la base de données
         $sql = "INSERT INTO rubric (titre, contenu, id_page, picture, banner) VALUES ('$titre', '$contenu', $id_page, '$picture', '$banner')";
         $stmt = $pdo->prepare($sql);
         $stmt->execute(['user_id' => $user_id]);
         // 4. Rediriger l'utilisateur vers la page des rubriques
        header("Location: rubriques.php");
        exit;
            // créer une variable qui contient l'id de l'utilisateur
            session_start();
            $user_id = $_SESSION['user']['id'];
            // requéter le role_id de la table role_page  join avec l'id de la table role de la base de donnée
            SELECT role.name 
            FROM role 
            JOIN role_page ON role.id = role_page.role_id
            WHERE role_page.user_id = :user_id
                // renvoyer une réponse pour prévenir l'utilisateur du succès de l'ajout de la rubric
                $response = array(
                    'success' => true,
                    'message' => 'Rubric added successfully!'
                );
                echo json_encode($response);
                // Renvoyer un message d'erreur, en json
                $response = array(
                    'success' => false,
                    'message' => 'You are not authorized to add a rubric.'
                );
                echo json_encode($response);
                
    }           
    function deleteRubricsForOnePage ($id_rubric){
            // Vérifier que l'utilisateur est bien connecté et est un administrateur
            if (!isset( $_SESSION['user']['id'];) || $_SESSION['role'] !== 'admin') {
                return json_encode(['error' => 'Unauthorized access']);
            }
            // Créer une instance de la classe Rubric pour accéder aux méthodes permettant de manipuler les rubriques
            $rubricModel = new Rubric();
            // Récupérer la rubrique spécifiée par $id_rubric
            $rubric = $rubricModel->getRubricById($id_rubric);
            // Vérifier que la rubrique existe
            if (!$rubric) {
                return json_encode(['error' => 'Rubric not found']);
            }
            // Supprimer la rubrique
            $rubricModel->deleteRubricById($id_rubric);
            // Retourner un message de succès
            return json_encode(['message' => 'Rubric deleted successfully']);
    }
    
    function updateRubricsForOnePage ($id_rubric){
    
            // Vérifier que l'utilisateur est bien connecté et est un administrateur
            if (!isset( $_SESSION['user']['id'];) || $_SESSION['role'] !== 'admin') {
                return json_encode(['error' => 'Unauthorized access']);
            }
            // Créer une instance de la classe Rubric pour accéder aux méthodes permettant de manipuler les rubriques
            $rubricModel = new Rubric();
            // Récupérer la rubrique spécifiée par $id_rubric
            $rubric = $connexion->prepare("SELECT * FROM_rubric");
            // Vérifier que la rubrique existe
            if (!$rubric) {
                return json_encode(['error' => 'Rubric not found']);
            }
            // Supprimer la rubrique
            $rubricModel->deleteRubricById($id_rubric);
            // Retourner un message de succès
            return json_encode(['message' => 'Rubric deleted successfully']);
       
        
    }
    
}