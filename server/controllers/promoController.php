<!-- <?php 
// 
//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';

class Promo {


    // méthode pour récupérer toutes les promotions
    function getAllPromos() {
        $sql = "SELECT * FROM promos";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $promos = array();
            while($row = $result->fetchAll()) {
                $promos[] = $row;
            }
            return $promos;
        }
         else {
            return null;
        }
    }
    function getOnePromo ($id_promo){
        $sql = "SELECT * FROM promos WHERE id_promo = '$id_promo'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $promo = $result->fetch();
            return $promo;
        } else {
            return null;
          }
        
    }
    function addPromoIfAdmin ($id_promo){

            // ajouter les variables dans les parametres de la fonction
       
            // Vérifier que l'utilisateur est connecté et qu'il est un administrateur
            session_start();
            if(isset($_SESSION['id']) && $_SESSION['is_admin'] === true) {
                // Ajouter la promotion à la base de données
                $sql = "INSERT INTO promos (promo_name, page_id, group_id, description) VALUES (:promo_name, :page_id, :group_id, :description)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':promo_name', $promo_name)e;
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':page_id', $page_id);
        $stmt->bindValue(':group_id', $group_id);
        $stmt->execute();
        
            } else {
                // Renvoyer un message d'erreur
                echo "Vous n'êtes pas autorisé à effectuer cette action.";
            }

    }
    function deletePromoIfAdmin ($id_promo){
        
            // Vérifier que l'utilisateur est connecté et qu'il est un administrateur
            session_start();
            if(isset($_SESSION['id']) && $_SESSION['is_admin'] === true) {
                // Supprimer la promotion de la base de données 
                $sql = "DELETE FROM promos WHERE id_promo = :id_promo";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['id_promo' => $id_promo]);

                // connexion à la base de données
                $conn = new mysqli('localhost', 'user', 'motdepasse', 'ma_base_de_donnees');
                
                // Vérification de la connexion
                if ($conn->connect_error) {
                    die("La connexion a échoué: " . $conn->connect_error);
                } 
                
                // Requête de suppression
                // $sql = "DELETE FROM promotions WHERE id_promo = id_promo";
                // $stmt = $conn->prepare($sql);
                // $stmt->execute();
                // Vérification de la suppression
                if ($stmt->affected_rows > 0) {
                    echo "La promotion a été supprimée avec succès.";
                } else {
                    echo "La promotion n'a pas été trouvée dans la base de données.";
                }
                // Fermeture de la connexion
                $stmt->close();
                $conn->close();
            } else {
                // Renvoyer un message d'erreur
                echo "Vous n'êtes pas autorisé à effectuer cette action.";
            }
    }

    function updatePromoIfAdmin ($id_promo, $promoData){
        
            // Vérifier que l'utilisateur est connecté et qu'il est un administrateur
            session_start();
            if(isset($_SESSION['id']) && $_SESSION['is_admin'] === true) {
                // Mettre à jour la promotion dans la base de données
                $db = new PDO('mysql:host=localhost;dbname=ma_base_de_donnees', 'nom_utilisateur', 'mot_de_passe');
                $query = "UPDATE promos SET nom = :nom, description = :description, date_debut = :date_debut, date_fin = :date_fin WHERE id_promo = :id_promo";
                $stmt = $db->prepare($query);
               // ajouter un bind value pour chaque paramatre dans la query ainsi que lajouter dans les parametre de la fonction

                $stmt->execute();
                if($stmt->rowCount() > 0) {
                    echo "La promotion a été mise à jour avec succès.";
                } else {
                    echo "La promotion n'a pas été trouvée dans la base de données.";
                }
            } else {
                // Renvoyer un message d'erreur
                echo "Vous n'êtes pas autorisé à effectuer cette action.";
            }
    
} -->
// 