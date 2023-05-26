<?php
require_once '../TPL/header.php';
session_start();
$id = $_SESSION['id'];

$userInfo = "http://localhost:4000/profile/feed/get/" . $id;
$json = file_get_contents($userInfo);
$users = json_decode($json, true);

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
        <div class="containerPublication">
                <?php foreach($users as $user): ?>
                        <a class="buttonPublication" href="1publication.php">
                                <div class="containerProfile">
                                        <img class="imageProfile" src="<?=$user['picture_user']?>">
                                        <div class="profile">
                                                <h3 class="textWhite"><?=$user['firstname']?> <?=$user['lastname']?></h3>
                                                <h3 class="textWhite"><?=$user['title']?></h3>
                                                
                                        </div>
                                </div>
                                <img class="imagePublication" src="<?=$user['picture']?>">
                        </a>
                <?php endforeach; ?>
        </div>

</main>
</body>

</html>