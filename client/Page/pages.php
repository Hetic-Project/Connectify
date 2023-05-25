<?php
require_once '../TPL/header.php';
session_start();

// Utilisation de la superglobale $_GET
if (isset($_GET['id'])) {
    $valeur = $_GET['id'];
    $pagesURL = "http://localhost:4000/pages/get" .$valeur;
    
    // Effectuer la requête GET
    $jsonPages = file_get_contents($pagesURL);
    $dataPages = json_decode($jsonPages, true);
}
?>

<main class="main">

    <div class="headerPublication">
        <h2 class="textWhite"><?= $dataPages ?></h2>

        <div class="iconPublication">
            <a href="/Page/modifiergroup.php"><img src="../asset/iconSetting.svg" alt="Paramettre"></a>
            <a href="/Page/createpost.php"><img src="../asset/icon+.svg" alt="Publier un nouveau post"></a>
        </div>
    </div>

    <?php include "containerpublication.php" ?>

</main>
</body>

</html>