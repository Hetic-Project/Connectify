<?php
require_once '../TPL/header.php';
session_start();
?>

<main class="main">

    <body>
        <div class="wrapper">
            <h1>Connexion</h1>
            <p class="textSignin">Utilisez les identifiants fournis par votre établissement</p>
            <p>Utilisez les identifiants fournis par votre établissement</p>
            <form action="http://localhost:4000/profile/signup" method="POST">
                <!-- <input name="picture" type="file" placeholder="Enter picture"> -->
                <input name="firstname" type="text" placeholder="Enter First name">
                <input name="lastname" type="text" placeholder="Enter LastName">
                <input name="username" type="text" placeholder="Enter username">
                <input name="mail" type="text" placeholder="Enter mail">
                <input name="role_id" type="text" placeholder="Enter role">
                <!-- TODO
                <select name="role_id"> 
                    <option value="student">Etudiant</option>
                    <option value="teacher">Professeur</option>
                </select>
                -->
                <input name="promo_id" type="text" placeholder="Enter promo">
                <input name="password" type="text" placeholder="Enter password">
                <button class="Signin">Sign in</button>
            </form>
        </div>
    </body>
</main>
</body>

</html>