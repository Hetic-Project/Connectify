<?php
require_once '../TPL/header.php';
session_start();
?>

<main class="main">

    <body>
        <div class="wrapper">
            <h1 class="modifProfil textWhite">Veuillez modifier votre profil </h1>
            <form action="http://localhost:4000/profile/signup" method="POST">
                <div class="modifProfile">
                    <h1 class="banniere textWhite">
                        Modifier la Bannière :
                    </h1>
                    <input name="picture" type="file" placeholder="Enter picture" accept=".jpeg, .jpg, .png">
                    <h1 class="photoProfil textWhite">
                        Modifier la Photo de Profil :
                    </h1>
                    <input name="picture" type="file" placeholder="Enter picture" accept=".jpeg, .jpg, .png">
                    <h1 class="modifierUtilisateur textWhite">
                        Modifier le Nom du User :
                    </h1>
                    <input name="username" type="text" placeholder="Modifier votre Nom d'utilisateur">
                    <h1 class="modifierDescription textWhite">
                        Modifier la Description :
                    </h1>
                    <textarea class="modifierespaceDesc" rows="4" cols="36"></textarea>

                    <a href="../Page/modifierprofile.php"> Changer le Mot de Passe</a>

                    <div class="desactiver">
                        <a class="desactiverButton textWhite red" href="">Desactiver</a>
                    </div>

                    <div class="containerModif">
                        <a class="modifButtonred textWhite red" href="../Page/profile.php">Annuler</a>
                        <a class="modifButtongreen textWhite green" href="../Page/profile.php">Modifier</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</main>
</body>

</html>