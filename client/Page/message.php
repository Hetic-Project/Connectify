
<?php
require_once '../TPL/header.php';
session_start();
?>

<main class="main">
	<div class="iconAndUser">
        <button id="menuBurger" class="iconsButton"><img src="../asset/iconBurger.svg" alt="menu burger"></button>
        <div class="userMessage">
                <h2 class="textWhite">Tom Cardonnel</h2>
                <p class="textGray">Promo</p>
        </div>
	</div>

	<div class="containerMessage">
		<div class="unMessage">
			<img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

			<div class="userMessage">
				<h3 class="textWhite">Tom Cardonnel</h3>
				<p class="textWhite">Je suis un messaaaaaaaaaaage ! </p>
			</div>
		</div>
		



	</div>

        <input class="sendMessage" type="text" placeholder="Envoyer un message">
</main>
</body>
</html>