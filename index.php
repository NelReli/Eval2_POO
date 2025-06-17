<?php
include "Animal.php";
session_start();
?>


<!-- CREATE VIEW  -->

<h3>Formulaire de Création</h3>

<form action="resultat.php" method="post">
    <input type="hidden" name="action" value="create">    
    <p><select name="select" id="">
        <option value="">Sélectionnez un animal</option>
        <option value="chien">Chien</option>
        <option value="chat">Chat</option>
        <option value="perroquet">Perroquet</option>
    </select></p>
    <p><input type="text" name="nom" placeholder="Nom de l'animal"></p>
    <p><input type="text" name="age" placeholder="Âge de l'animal"></p>
    <p><input type="text" name="poids" placeholder="Poids de l'animal"></p>
    <p><input type="submit" value="Envoyer"></p>
</form>

