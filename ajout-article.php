<a href="index.php?page=deconnexion">
    Deconnexion
</a>

<?php
if (
    isset($_POST['nom'])
    && isset($_POST['description'])
    && isset($_POST['prix'])
) {
    //si tous les champs ne sont pas vides
    if (
        $_POST['nom'] != ""
        && $_POST['description'] != ""
        && $_POST['prix'] != ""
    ) {
        $sql = "INSERT INTO article (nom, description, prix) 
                VALUES ('" . $_POST['nom'] . "' , 
                    '" . $_POST['description'] . "' , 
                        " . $_POST['prix'] . ")";

        $connexion = new PDO("mysql:host=localhost:3307;dbname=cci_dwwm_2021_commerce;charset=UTF8", "root", "");

        $connexion->query($sql);
    } else {
        echo "Tous les champs sont obligatoires";
    }
}
?>

<h1>ajout article</h1>

<form method="POST">

    <input type="text" name="nom">
    <textarea name="description"></textarea>
    <input type="number" name="prix">
    <input type="submit" value="Ajouter article">

</form>