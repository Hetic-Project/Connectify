<?php
require_once '../TPL/header.php';
session_start();
?>

<main class="main">

    <body>
        <div class="wrapper">
            <h1>Connexion</h1>
            <p>Utilisez les identifiants fournis par votre établissement</p>
            <form>
                <input type="file" placeholder="Enter picture">
                <input type="text" placeholder="Enter First name">
                <input type="text" placeholder="Enter LastName">
                <input type="text" placeholder="Enter username">
                <input type="text" placeholder="Enter mail">
                <input type="text" placeholder="Enter active">
                <input type="text" placeholder="Enter role">
                <input type="text" placeholder="Enter promo">
                <input type="text" placeholder="Enter password">
            </form>
            <button class="Signin">Sign in</button>
        </div>
    </body>
</main>
</body>

</html>