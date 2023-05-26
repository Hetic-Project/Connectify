<?php
require_once '../TPL/header.php';
session_start();
$id = $_SESSION['user']['id'];
// Utilisation de la superglobale $_GET
if (isset($_GET['id'])) {
        $valeur = $_GET['id'];
        $pagesURL = "http://localhost:4000/publications/add" . $valeur . $id;

        // Effectuer la requête GET
        $jsonPages = file_get_contents($pagesURL);
        $dataPages = json_decode($jsonPages, true);
}
?>

<main class="main">

        <div class="headerPublication">
                <h2 class="textWhite">Feeds</h2>

                <div class="iconPublication">
                        <a href="/Page/recherche.php"><img src="../asset/iconChercher.svg" alt="Rechercher"></a>
                        <a href="/Page/createpost.php"><img src="../asset/icon+.svg" alt="Publier un nouveau post"></a>
                </div>
        </div>

        <div class="demandeInvitation">

        </div>
        <?php include "containerpublication.php" ?>
        <?php include "containerpublication.php" ?>

</main>
</body>

</html>