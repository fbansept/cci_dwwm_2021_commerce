<?php

if (isset($_POST['pseudo']) && isset($_POST['mot_de_passe'])) {
    $sql = "SELECT *
            FROM administrateur
            WHERE pseudo = :pseudo
            AND mot_de_passe = :mot_de_passe";

    echo $sql;

    $connexion = new PDO("mysql:host=localhost:3307;dbname=cci_dwwm_2021_commerce;charset=UTF8", "root", "");

    $requete = $connexion->prepare($sql);
    $requete->execute(
        [
            ":pseudo" => $_POST['pseudo'],
            ":mot_de_passe" =>
            password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT)
        ]
    );

    $administrateur = $requete->fetch();

    if (!$administrateur) {
        echo "Mauvais login / mot de passe";
    } else {
        $_SESSION["pseudo"] = $_POST["pseudo"];
        header("Location: index.php?page=ajout-article");
    }
}

?>

<form method="POST">

    <input type="text" name="pseudo">
    <input type="text" name="mot_de_passe">
    <input type="submit" value="Connexion">
</form>