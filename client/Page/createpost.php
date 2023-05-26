<?php
require_once '../TPL/header.php';
session_start();

$id = $_SESSION['id'];

$userInfo = "http://localhost:4000/user/" . $id;
$json = file_get_contents($userInfo);
$user = json_decode($json, true);

?>

        <main class="main">
                <a class="iconRetour" href="../Page/publications.php"> <img src="../asset/iconRetour.svg" alt="iconRetour"> <button class="buttonRetour">Retour</button></a>
                <button class="buttonPublier1">PUBLIER</button>
                <div class="profileCreatPost">
                        <img src="<?=$user['picture']?>" alt="Image de profile creat post" class="imageProfileCreatPost">
                        
                        <div class="nomPromoCreatPost">
                                <h3 class="textWhite"><?=$user['firstname']?> <?=$user['lastname']?></h3>
                                <p class="textGray"><?=$user['promo_name'] ?></p>
                        </div>
                </div>
                <form action="http://localhost:4000/profile/feed/add/<?=$id?>" method="POST" enctype="multipart/form-data">

                        <div class="ajouterUnTitre">    
                                <input class="textWhite inputPost" type="text" placeholder="Ajouter titre" name="title">
                        </div>
                        <textarea class="textWhite inputDescritpion" type="text" placeholder="Ajouter une description" name="content"></textarea>
                        
                        <input class="buttonPhotos" type="file" placeholder="Enter picture" accept=".jpeg, .jpg, .png" name="picture">
                        
                        <button class="buttonPublier2">PUBLIER</button>
                </form>
        </main>
</body>
</html>