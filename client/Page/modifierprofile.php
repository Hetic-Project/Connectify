<?php
require_once '../TPL/header.php';
session_start();
$id = $_SESSION['user']['id'];

?>

<main class="main">

    <body>
        <div class="wrappers">
            <h1 class="modifProfil textWhite">Veuillez modifier votre profil </h1>
            <form action="http://localhost:4000/profile/update/<?= $id ?>" method="POST" class="   "  enctype="multipart/form-data">

                <h1 class="banniere textWhite">
                    Modifier la Bannière :
                </h1>
                <input name="banner" type="file" placeholder="Enter picture" accept=".jpeg, .jpg, .png">
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
                <textarea name='description' class="modifierespaceDesc" rows="4" cols="36"></textarea>

                <a class="textWhite" href="../Page/modifierprofile.php"> Changer le Mot de Passe</a>

                <div class="containerModif">
                    <a class="modifButtonred textWhite red" href="../Page/profile.php">Annuler</a>
                    <button class="modifButtongreen textWhite green">Modifier</button>
                </div>
            </form>
        </div>
        <div class="desactiver">
            <a class="desactiverButton textWhite red" href="">Desactiver le Compte </a>
        </div>
    </body>
</main>
</body>

</html>