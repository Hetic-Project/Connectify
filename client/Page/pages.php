<?php
require_once '../TPL/header.php';
session_start();
?>

<main class="main">

        <div class="headerPublication">
                <h2 class="textWhite">Name Group</h2>

                <div class="iconPublication">
                        <a href="/Page/modifiergroup.php"><img src="../asset/iconSetting.svg" alt="Paramettre"></a>
                        <a href="/Page/createpost.php"><img src="../asset/icon+.svg" alt="Publier un nouveau post"></a>
                </div>
        </div>

        
        <?php include "containerpublication.php" ?>

</main>
</body>

</html>