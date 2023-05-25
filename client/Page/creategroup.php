<?php
require_once '../TPL/header.php';
session_start();
?>

        <main class="main">
        <a class="iconRetour" href="../page/messagegroup.php"> <img src="../asset/iconRetour.svg" alt="iconRetour"> <button class="buttonRetour">Retour</button></a>
        <form action="http://localhost:4000/group/create" method="POST">
                <button class="buttonCreerGroupe1">CRÉER</button>
                <div class="profileCreatGroupe">
                        <img src="../asset/IconProfile.svg" alt="Image de profile creat post" class="imageProfileCreatPost">

                        <div class="nomPromoCreatGroupe">
                                <h3 class="textWhite">Tom Cardonnel</h3>                                
                                <p class="textGray">Promo</p>
                        </div>
                </div>
                
                <div class="rechercheAmie">        
                        <select class="textWhite inputsearchBarreAmie" name="status">
                                <option value="Statut du groupe">
                                        statut du groupe
                                </option>
                                <option value="private">
                                        Privé
                                </option>
                                <option value="public">
                                        Publique
                                </option>
                        </select>
                </div>
                <div class="ajouterUnNom">     
                        <input class="textWhite inputName" type="text" name="name" placeholder="Nom du Groupe">
                </div>
                <textarea class="textWhite inputDescritpionGroupe" type="text" name="description" placeholder="Description du Groupe"></textarea>
                
                <button class="buttonCréerGroupe2">CRÉER</button>
        </form>
        </main>
</body>