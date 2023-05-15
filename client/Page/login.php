<?php
require_once '../TPL/header.php';
session_start();
?>

<main class="main">

        <body>
                <div class="wrapper">
                        <h1>Connexion</h1>
                        <p class="textLogin">Utilisez les identifiants fournis par votre établissement</p>
                        <form action="http://localhost:4000/profile/login" method="POST">
                                <input type="text" placeholder="Enter username">
                                <input type="password" placeholder="Password">
                        <button class="Login"> Login </button>
                        </form>
                </div>
        </body>
</main>
</body>

</html>