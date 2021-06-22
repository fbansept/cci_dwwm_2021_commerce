<?php

$connexion = connectBdd("commerce");
//$connexion = new PDO("mysql:host=localhost;dbname=blog", "root", "");

$resultat = $connexion->query("SELECT * FROM article;");

//on récupère le resultat dans la variable $listeArticles
$listeArticles = $resultat->fetchAll();

foreach ($listeArticles as $article) { ?>

    <h2><?php echo $article["nom"] ?></h2>

    <p><?php echo $article["description"]; ?></p>

    <h3><?php echo $article["prix"]; ?></h3>

<?php
}
?>