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

                <div class="demandeInvitation">

                        <div class="profileButtonInvitation">
                                <button class="iconsButton" id="buttonInvitationGauche"><img src="../asset/iconRetour.svg"></button>

                                <div class="profileInvitation">
                                        <img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

                                        <div class="nomPromo">
                                                <h3 class="textWhite">Tom Cardonnel</h3>
                                                <p class="textGray">Promo</p>
                                        </div>
                                </div>

                                <button class="iconsButton" id="buttonInvitationDroit"><img src="../asset/iconRetour.svg"></button>
                        </div>

                        <h4 class="invitationText textWhite">Cette ttestutilisateur<br>veut rejoindre vôtre groupe.</h4>

                        
                        <div class="containerInvitationButton">
                                <button class="invitationButton textWhite red">Refuser</button>
                                <button class="invitationButton textWhite green">Accepter</button>
                        </div>
                </div>
                <?php include "containerpublication.php" ?>
                
        </main>
</body>
</html> 