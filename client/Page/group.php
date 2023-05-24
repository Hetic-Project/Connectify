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

                <div class="profileButtonInvitation">
                        <button class="iconsButton" id="buttonInvitationGauche"><img
                                        src="../asset/iconRetour.svg"></button>

                        <div class="test15">
                                <div class="profileInvitation">
                                        <img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

                                        <div class="nomPromo">
                                                <h3 class="textWhite">Tom Cardonnel</h3>
                                                <p class="textGray">Promo</p>
                                        </div>
                                </div>
                                <div class="containerInvitationButton">
                                        <button class="invitationButton textWhite red">Refuser</button>
                                        <button class="invitationButton textWhite green">Accepter</button>
                                </div>
                        </div>


                        <button class="iconsButton" id="buttonInvitationDroit"><img
                                        src="../asset/iconRetour.svg"></button>
                </div>
        </div>
        <?php include "containerpublication.php" ?>

</main>
</body>

</html>