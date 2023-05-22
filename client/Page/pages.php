<?php
require_once '../TPL/header.php';
session_start();
?>

        <main class="main">

                <div class="headerPublication">
                        <h2 class="textWhite">Page</h2>

                        <div class="iconPublication">
                                <button class="iconsButton" id="buttonRecherche"><img src="../asset/iconChercher.svg" alt="Rechercher"></button>
                                <a href="/Page/createpost.php"><img src="../asset/icon+.svg" alt="Publier un nouveau post"></a>
                        </div>
                </div>

                <?php include "containerpublication.php" ?>
                
        </main>
</body>
</html> 