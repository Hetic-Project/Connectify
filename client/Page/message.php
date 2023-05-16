<?php
require_once '../TPL/header.php';
session_start();
?>

<main class="main">
	<div class="iconAndUser">
		<button id="menuBurger" class="iconsButton"><img src="../asset/iconBurger.svg" alt="menu burger"></button>
		<div class="friendMessage">
			<h2 class="textWhite">Tom Cardonnel</h2>
			<p class="textGray">Promo</p>
		</div>
	</div>

	<div class="containerMessage">
		<div class="slider">
			<div class="unMessage">
				<form action="http://localhost:4000/message/1/2/" method="GET">
					<img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">
						<div class="userMessage">
							<h3 name="firstname" name="lastname" class="textWhite"></h3>
							<p name="message_content" class="textWhite"></p>
						</div>
				</form>
			</div>



		</div>
	</div>

	<div class="friendsSlider friendsSliderOff" id="sliderElement">

		<button class="iconRetour retourSlider textWhite" id="sliderFriendsRetour"> <img src="../asset/iconRetour.svg"
				alt="iconRetour">Retour</button>

		<div class="allFriends">

			<button class="friendList">
				<div class="profileInvitation sliderFriendsContent">
					<img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

					<div class="nomPromo">
						<h3 class="textWhite">Tom Cardonnel</h3>
						<p class="textGray">Promo</p>
					</div>
				</div>
			</button>

			<button class="friendList">
				<div class="profileInvitation sliderFriendsContent">
					<img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

					<div class="nomPromo">
						<h3 class="textWhite">Tom Cardonnel</h3>
						<p class="textGray">Promo</p>
					</div>
				</div>
			</button>

			<button class="friendList">
				<div class="profileInvitation sliderFriendsContent">
					<img src="../asset/IconProfile.svg" alt="Image de profile" class="imageProfile">

					<div class="nomPromo">
						<h3 class="textWhite">Tom Cardonnel</h3>
						<p class="textGray">Promo</p>
					</div>
				</div>
			</button>
		</div>
	</div>

	<form action="http://localhost:4000/message/1/2/" method="POST" id="messageForm">
    	<input name="message_content" class="sendMessage" type="text" placeholder="Envoyer un message">
	</form>

</main>
<script src="../js/sliderFriends.js"></script>
</body>

</html>