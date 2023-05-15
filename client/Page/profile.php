<?php
require_once '../TPL/header.php';
session_start();
?>

<main class="main">

    <img class="banniereProfil" src="<?= $gcef ?>">
    </img>

    <div class="profileInvitation">
        <img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">
        <div class="nomPromo">
            <h3 class="textWhite">Rubens Bonnin</h3>
            <p class="textGray">Promo</p>
        </div>
        <btn class="modifierProfil"> Modifier le Profil</btn>
    </div>
    <br>
    <div class="Description">
        <h4 class="textWhite">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. </h4>
        <br>

        <p class="textGray"> 42 abonnés 666 abonnements</p>
    </div>

    <div class="form-box">
        <div class="button-box">
            <div id="button1"></div>
            <button type="button" class="toggle-button1" onclick="leftClick()">Left</button>
            <button type="button" class="toggle-button1" onclick="rightClick()">Right</button>
        </div>
    </div>
</main>
<script src="../js/profile.js"></script>
</body>

</html>