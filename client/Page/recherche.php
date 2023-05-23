<?php
require_once '../TPL/header.php';
session_start();
?>
<main class="Search">
    <form class="recherche" action="">
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
</main>