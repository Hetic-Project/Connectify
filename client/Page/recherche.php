<?php
require_once '../TPL/header.php';
session_start();
?>
<main class="Search">
    <form class="recherche" action="http://localhost:4000/profile/relation/search" method="POST">
        <input class="searchBarre" type="text" placeholder="Recherche" checked>
        <div class="buttonSearch">
            <div class="radioSearch">
                <input type="radio" name="query" class="demo1" id="demo1-a" value="user" checked>
                <label for="demo1-a">Utilisateur</label>
                <input type="radio" name="query" class="demo1" id="demo1-b" value="group">
                <label for="demo1-b">Groupe</label>
            </div>
            <div class="radioSearch">
                <input type="radio" name="query" class="demo1" id="demo1-c" value="promo">
                <label for="demo1-c">Promo</label>
                <input type="radio" name="query" class="demo1" id="demo1-d" value="publication">
                <label for="demo1-d">Publication</label>
            </div>
        </div>
    </form>


    <div class="searchUSers" id="contentUsers">
        <div class="contentUsers contentUsersOff">
            <button class="friendList">
                <div class="profileInvitation sliderFriendsContent">
                    <img src="../asset/IconProfile.svg" alt="Image de profile"  class="imageProfile">

                    <div class="nomPromo">
                        <h3 class="textWhite">Rubens Bonnin</h3>
                        <p class="textGray">Promo</p>
                    </div>
                </div>
            </button>
        </div>
    </div>

    <div class="searchPublication" id="contentPublications">
        <div class="contentPublications">
            <div>
                <img class="img1" src=""></img>
                <img class="img1" src=""></img>
                <img class="img1" src=""></img>
            </div>
            
        </div>
    </div>
</main>