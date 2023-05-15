<?php
ini_set('display_errors', 1);
require_once '../TPL/header.php';
session_start();
?>

<main class="main">

        <body>
                <div class="wrapper">
                        <h1>Connexion</h1>
                        <p class="textLogin">Utilisez les identifiants fournis par votre établissement</p>
                        <form action="http://localhost:4000/profile/login" method="POST">
                                <input name="username" type="text" placeholder="Enter username">
                                <input name="password" type="password" placeholder="Password">
                        <button class="Login"> Login </button>
                        </form>
                </div>
        </body>
</main>
</body>

</html>