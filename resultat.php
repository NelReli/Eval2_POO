<?php
include "Animal.php";
session_start();

//---------------------------------------------------------------------------------
// Logique Create
if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['action']) && $_POST['action'] === "create")  {
    
    $_SESSION['select']=  $_POST['select'];
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['age']=  $_POST['age'];
    $_SESSION['poids']=  $_POST['poids'];

    if (isset($_POST["select"])) {
        if ($_POST["select"] === "chien"){
            $_SESSION['select'] = new Chien($_POST["nom"], (int)$_POST["age"], (float)$_POST["poids"]);
            echo "<h3>Nouveau Objet Chien crée</h3>";
        }elseif ($_POST["select"] === "chat"){
            $_SESSION['select'] = new Chat($_POST["nom"], (int)$_POST["age"], (float)$_POST["poids"]);
            echo "<h3>Nouveau Objet Chat crée</h3>";
        }elseif ($_POST["select"] === "perroquet"){
            $_SESSION['select'] = new Perroquet($_POST["nom"], (int)$_POST["age"], (float)$_POST["poids"]);
            echo "<h3>Nouveau Objet Perroquet crée</h3>";
        }else{
            echo "Données introuvable";
        }
    }
};

//---------------------------------------------------------------------------------
// Logique DELETE
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] === "delete") {
        unset($_SESSION["select"]);
    }
}

//---------------------------------------------------------------------------------
// Logique Update

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === "update") {
    $_SESSION['select']->setNom($_POST["nom"]);
    $_SESSION['select']->setAge((int)$_POST["age"]); 
    $_SESSION['select']->setPoids((float)$_POST["poids"]); 
}
//---------------------------------------------------------------------------------
$animal = $_SESSION['select'] ?? null;
//---------------------------------------------------------------------------------
// <!-- Logique READ & VIEW -->

if ($animal){
    echo "<h3>Détail Objet Créé</h3>";
    echo "<p><strong>Nom :</strong> ".$animal->getType()."</p>";
    echo "<p><strong>Nom :</strong> ".$animal->getNom()."</p>";
    echo "<p><strong>Age :</strong> ".$animal->getAge()."</p>";
    echo "<p><strong>Poids :</strong> ".$animal->getPoids()."</p>";
    echo "<p><strong>Espèce :</strong> ". $animal::ESPECE."</p>";
    echo "<p>Le ".$animal->getNom()." fait ". $animal->crier()."</p>";
    echo "<br>";
}

//---------------------------------------------------------------------------------


// <!-- DELETE VIEW -->
if ($animal) {
?>
    <form action="" method="post">
        <input type="hidden" name="action" value="delete">
        <button type="submit">delete</button>
    </form>
<?php
}

//---------------------------------------------------------------------------------
// <!-- UPDATE VIEW -->

if ($animal) {
?>
<!-- update avec form -->

<form  method="post" >
    <input type="hidden" name="action" value="update">
        <label for="nom"><?=  $animal->getNom() ?> </label>
        <input type="text" name="nom"  />

        <label for="poids"><?=  $animal->getPoids() ?> </label>
        <input type="number" name="poids"  />

        <label for="age"><?=  $animal->getAge() ?> </label>
        <input type="number" name="age"  />

        <p><input type="submit" value="Modifier"></p>

</form>
<?php
}
?>

<?php







