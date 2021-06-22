<?php
echo md5("root");
if (isset($_POST['pseudo']) && isset($_POST['mot_de_passe'])) {

    if ($_POST['mot_de_passe'] == $_POST['confirme_mot_de_passe']) {

        $sql = "INSERT INTO administrateur (pseudo,  mot_de_passe)
                VALUES (:pseudo , :mot_de_passe)";

        $connexion = new PDO("mysql:host=localhost:3307;dbname=cci_dwwm_2021_commerce;charset=UTF8", "root", "");

        $requete = $connexion->prepare($sql);
        $requete->execute(
            [
                ":pseudo" => $_POST['pseudo'],
                ":mot_de_passe" =>
                password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT)
            ]
        );
    } else {
        echo "Les mot de passe ne sont pas identique";
    }
}

?>

<form method="POST">

    <input type="text" name="pseudo">
    <input type="text" name="mot_de_passe">
    <input type="text" name="confirme_mot_de_passe">
    <input type="submit" value="Connexion">
</form>