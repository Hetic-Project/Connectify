<?php
ini_set('display_errors', 1);
require_once '../TPL/header.php';
session_start();

$id = $_SESSION['user']['id'];

$userInfo = "http://localhost:4000/user/" . $id;
// Effectuer la requête GET
$json = file_get_contents($userInfo);
$user = json_decode($json, true);
?>

<main class="main" overflow="hidden">

    <img class="banniereProfil" src="<?= $user['banner'] ?>">
    </img>

    <div class="profileInvitation">
        <img src="<?=$user['picture']?>" alt="Image de profile" class="imageProfile">
        <div class="nomPromo">
            <h3 class="textWhite"><?=$user['firstname']?> <?=$user['lastname']?></h3>
            <p class="textGray"><?=$user['promo_name'] ?></p>
        </div>
        <!-- <btn class="modifierProfil textWhite"> Modifier le Profil -->
        <a class="boutonModifier textWhite" href="../Page/modifierprofile.php">Modifier le Profil</a>
        <!-- </btn> -->
    </div>
    <br>
    <div class="Description">
        <p class="textWhite"><?=$user['description'] ?></p>
    </div>

    <div class="contentBtn">
        <button id="left-button" class="enlarge textWhite">Publications</button>
        <button id="right-button" class="textWhite">Liste d'Amis</button>
        <form action="http://localhost:4000/profile/logout" method="POST">
            <button id="right-button" class="textWhite">déconnection</button>

        </form>
    </div>

    <div class="Publication" id="contentPublication">
        <div class="contentPublication">
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
            <img class="img1" src=""></img>
        </div>
    </div>

    <div class="Amis AmisOff" id="contentAmis">

        <div class="contentprofileFriend">

            <button class=" friendList">
                <div class="profileInvitation sliderFriendsContent">
                    <img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

                    <div class="nomPromo">
                        <h3 class="textWhite">Rubens Bonnin</h3>
                        <p class="textGray">Promo</p>
                    </div>
                </div>
            </button>
            <button class="friendList">
                <div class="profileInvitation sliderFriendsContent">
                    <img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

                    <div class="nomPromo">
                        <h3 class="textWhite">Rubens Bonnin</h3>
                        <p class="textGray">Promo</p>
                    </div>
                </div>
            </button>
            <button class="friendList">
                <div class="profileInvitation sliderFriendsContent">
                    <img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

                    <div class="nomPromo">
                        <h3 class="textWhite">Rubens Bonnin </h3>
                        <p class="textGray">Promo</p>
                    </div>
                </div>
            </button>
            <button class="friendList">
                <div class="profileInvitation sliderFriendsContent">
                    <img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

                    <div class="nomPromo">
                        <h3 class="textWhite">Rubens Bonnin</h3>
                        <p class="textGray">Promo</p>
                    </div>
                </div>
            </button>
            <button class="friendList">
                <div class="profileInvitation sliderFriendsContent">
                    <img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

                    <div class="nomPromo">
                        <h3 class="textWhite">Rubens Bonnin</h3>
                        <p class="textGray">Promo</p>
                    </div>
                </div>
            </button>
            <button class="friendList">
                <div class="profileInvitation sliderFriendsContent">
                    <img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

                    <div class="nomPromo">
                        <h3 class="textWhite">Rubens Bonnin</h3>
                        <p class="textGray">Promo</p>
                    </div>
                </div>
            </button>
            <button class="friendList">
                <div class="profileInvitation sliderFriendsContent">
                    <img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

                    <div class="nomPromo">
                        <h3 class="textWhite">Rubens Bonnin</h3>
                        <p class="textGray">Promo</p>
                    </div>
                </div>
            </button>
            <button class="friendList">
                <div class="profileInvitation sliderFriendsContent">
                    <img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

                    <div class="nomPromo">
                        <h3 class="textWhite">Rubens Bonnin</h3>
                        <p class="textGray">Promo</p>
                    </div>
                </div>
            </button>
            <button class="friendList">
                <div class="profileInvitation sliderFriendsContent">
                    <img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

                    <div class="nomPromo">
                        <h3 class="textWhite">Rubens Bonnin</h3>
                        <p class="textGray">Promo</p>
                    </div>
                </div>
            </button>
        </div>
    </div>




    <!-- <div class="form-box">
        <div class="button-box">
            <div id="button1"></div>
            <button type="button" class="toggle-button1" onclick="leftClick()">Left</button>
            <button type="button" class="toggle-button1" onclick="rightClick()">Right</button>
        </div>
    </div> -->
</main>
<script src="../js/profile.js"></script>
</body>

</html>