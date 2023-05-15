<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class Page {

    function getPageForOneUser ($id_user){
        
                    
                    // 1. Connexion à la base de données
                    $db = new Database();
                    $conn = $db->getConnection();
            
                    // 2. Préparation et exécution de la requête SQL pour récupérer toutes les pages de l'utilisateur
                    $stmt = $conn->prepare("SELECT * FROM pages WHERE id_user = ?");
                    $stmt->bind_param("i", $id_user);
                    $stmt->execute();
            
                    // 3. Récupération des résultats et stockage dans un tableau associatif
                    $result = $stmt->get_result();
                    $pages = array();
                    while ($row = $result->fetch_assoc()) {
                        $pages[] = $row;
                    }
            
                    // 4. Fermeture de la connexion à la base de données
                    $stmt->close();
                    $conn->close();
            
                    // 5. Retour du tableau de pages
                    return $pages;
                }
            }
            
        }
        

    }

    function addPageForOneUser ($id_user, $data){
        
        
                
                // 1. Connexion à la base de données
                $db = new Database();
                $conn = $db->getConnection();
        
                // 2. Préparation et exécution de la requête SQL pour récupérer toutes les pages de l'utilisateur
                $stmt = $conn->prepare("SELECT * FROM pages WHERE id_user = ?");
                $stmt->bind_param("i", $id_user);
                $stmt->execute();
        
                // 3. Récupération des résultats et stockage dans un tableau associatif
                $result = $stmt->get_result();
                $pages = array();
                while ($row = $result->fetch_assoc()) {
                    $pages[] = $row;
                }
        
                // 4. Fermeture de la connexion à la base de données
                $stmt->close();
                $conn->close();
        
                // 5. Retour du tableau de pages
                return $pages;
            
        
        
        }
        

    }

    function updatePageForOneUserIfAdmin ($id_page){
      
            // Vérifier si l'utilisateur est connecté et est un administrateur
            if ($_SESSION['id'] && $_SESSION['role'] == 'admin') {
                // Récupérer les données envoyées dans la requête
                $data = json_decode(file_get_contents('php://input'), true);
                
                // Mettre à jour la page pour l'utilisateur spécifié
                $pageModel = new Page();
                $updatedPage = $pageModel->updatePage($id_page, $data);
                
                // Retourner la page mise à jour en format JSON
                echo json_encode($updatedPage);
            } else {
                // Si l'utilisateur n'est pas connecté ou n'est pas un administrateur, retourner une erreur
                http_response_code(401);
                echo json_encode(array("message" => "Vous devez être connecté en tant qu'administrateur pour accéder à cette ressource"));
            }
        }
        
       
    }
    
    function deletePageForOneUserIfAdmin ($id_page){

    
            // Vérifier si l'utilisateur est connecté et est un administrateur
            if (isset($_SESSION['id']) && $_SESSION['role'] == 'admin') {
                // Se connecter à la base de données
                $db = new Database();
                $conn = $db->getConnection();
        
                // Préparer la requête de suppression de la page
                $stmt = $conn->prepare("DELETE FROM pages WHERE id_page = ?");
                $stmt->bind_param("i", $id_page);
                $stmt->execute();
        
                // Vérifier si la suppression a été effectuée avec succès
                if ($stmt->affected_rows > 0) {
                    // Retourner un message de succès
                    return array("message" => "La page a été supprimée avec succès.");
                } else {
                    // Retourner un message d'erreur
                    return array("message" => "La page n'a pas pu être supprimée.");
                }
            } else {
                // Retourner un message d'erreur si l'utilisateur n'est pas connecté ou n'est pas un administrateur
                return array("message" => "Vous n'êtes pas autorisé à effectuer cette action.");
            }
        
        
       
        
      
    }
    
}