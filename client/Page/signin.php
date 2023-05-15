<?php
require_once '../TPL/header.php';
session_start();
?>

<main class="main">

    <body>
        <div class="wrapper">
            <h1>Connexion</h1>
            <p class="textSignin">Utilisez les identifiants fournis par votre établissement</p>
            <form>
            <p>Utilisez les identifiants fournis par votre établissement</p>
            <form action="http://localhost:4000/profile/signup" method="POST">
                <input type="file" placeholder="Enter picture">
                <input type="text" placeholder="Enter First name">
                <input type="text" placeholder="Enter LastName">
                <input type="text" placeholder="Enter username">
                <input type="text" placeholder="Enter mail">
                <input type="text" placeholder="Enter active">
                <input type="text" placeholder="Enter role">
                <input type="text" placeholder="Enter promo">
                <input type="text" placeholder="Enter password">
            <button class="Signin">Sign in</button>
            </form>
        </div>
    </body>
</main>
</body>

</html>