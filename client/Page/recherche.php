<?php
require_once '../TPL/header.php';
session_start();
?>
<main class="Search">
    <form class="recherche" action="">
        <input class="searchBarre" type="text" placeholder="Recherche" checked>
        <!-- <input class="codding" type="radio"  name="checkbox" id="Utilisateur">
            <label for="Utilisateur">Utilisateur</label>
            <input class="codding" type="radio" name="checkbox" id="Groupe">
            <label for="Groupe">Groupe</label>
            <input class="codding" type="radio" name="checkbox" id="Promo">
            <label for="Promo">Promo</label>
            <input class="codding" type="radio" name="checkbox" id="Publication">
            <label for="Publication">Publication</label> -->

        <div class="buttonSearch">
            <div class="buttonTop">
                <input type="radio" name="demo1" class="demo1" id="demo1-a" checked>
                <label for="demo1-a">Utilisateur</label>
                <input type="radio" name="demo1" class="demo1" id="demo1-b">
                <label for="demo1-b">Groupe</label>
            </div>
            <div class="buttonBot">
                <input type="radio" name="demo1" class="demo1" id="demo1-c">
                <label for="demo1-c">Promo</label>
                <input type="radio" name="demo1" class="demo1" id="demo1-d">
                <label for="demo1-d">Publication</label>
            </div>
        </div>
    </form>
</main>