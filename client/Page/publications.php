<?php
require_once '../TPL/header.php';
session_start();
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