<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon super site ecommerce</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/cosmo/bootstrap.min.css">
</head>

<body>

    <?php
    session_start();

    /**
     *Permet de retourner un objet PDO 
     *pour se connecter à la base de donnée 
     *@param $bdd = nom de la base de donné
     *@param $hote = nom d'hote de la base de donné
     *@param $utilisateur = nom d'utilisateur de la base de donné
     *@param $motDePasse = mot de passe de la base de donné
     *
     * @return objet PDO pour la connexion à la base de donnée
     */
    function connectBdd(
        $bdd,
        $hote = "localhost",
        $utilisateur = "root",
        $motDePasse = ""
    ) {
        $maConnexion = new PDO(
            "mysql:host=" . $hote . ";charset=UTF8;dbname=" . $bdd,
            $utilisateur,
            $motDePasse
        );
        $maConnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $maConnexion;
    }

    $page = "accueil";

    $listePagesDisponibles = [
        "accueil",
        "connexion",
        "deconnexion",
        "ajout-article",
        "inscription"
    ];

    $listePagesBackOffice = [
        "ajout-article"
    ];

    //si l'url contient un parametre "page"
    if (isset($_GET["page"])) {

        //si la valeur du paramètre page fait partie des pages disponibles
        if (in_array($_GET["page"], $listePagesDisponibles)) {

            //si la page est reservé à un administarteur 
            if (in_array($_GET["page"], $listePagesBackOffice)) {

                //si il est connecté
                if (isset($_SESSION["pseudo"])) {
                    $page = $_GET["page"];
                } else {
                    $page = "connexion";
                }
                //sinon si ce n'est pas une page d'administration
            } else {
                $page = $_GET["page"];
            }
        } else {
            $page = "404";
        }
    }
    include("./" . $page . ".php");

    ?>
</body>

</html>