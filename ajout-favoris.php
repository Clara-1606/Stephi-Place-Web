
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Alan Philipiert, Clara Vesval">
    <meta name="description" content="La confiance d'un groupe d'agences immobilières innovantes, la maison de vos rêves se trouve ici !">
    <meta name="keywords" content="StephiPlace, immobilier, maison, appartement, villa, biens immobiliers, vente immobilier, achat immobilier, agence immoblière">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stephi Place</title>
    <link rel="icon" type="image/png" href="img/tori-icone.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/normalize.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="icon" type="image/png" href="img/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
<?php
session_start();
/* AJOUT EN FAVORIS*/

include_once('utile.php'); 

if(isset($_SESSION['email'])){

        $idB=$_GET['id'];
        $uti=$_SESSION['email'];
        $idUti="SELECT * FROM membre WHERE mail='$uti'";
        $sts=$cnx->prepare($idUti);
        $sts->execute();
        $line=$sts->fetch(PDO::FETCH_ASSOC);
        $idM=$line['id_membre'];

        $test="SELECT * FROM favoris WHERE id_membre='$idM' AND id_bien='$idB'";
        $sts2=$cnx->prepare($test);
        $sts2->execute();
        $line1=$sts2->fetch(PDO::FETCH_ASSOC);
        if($line1==0){
            $ajoutFav="INSERT INTO favoris (id_membre, id_bien) VALUES (?,?)";
            $sts1=$cnx->prepare($ajoutFav);
            $sts1->execute([$idM, $idB]);
            header('Refresh: 5; URL=bien.php?id='.$idB);
            echo '
            <div class="redirection">
                <div class="conteneurRedirect">
                            <span>Le bien a été ajouté à vos favoris! Rendez vous dans Mon Espace pour le consulter</span> 
                            <div>
                                <span>Vous allez être redirigé vers la page de bien </span>
                                <span id="compteARebours"></span>
                            <div>
                            <a id="accueilStephi" href="index.php">StephiPlace</a>
                </div>
            </div>
    
    <script>
    var seconde = 5, $seconde = document.querySelector("#compteARebours");
    (function compteARebours() {
        $seconde.textContent = seconde + " secondes";
        if(seconde --> 0) setTimeout(compteARebours, 1000)
    })();
    </script>';
        } else {
            header('Refresh: 3; URL=bien.php?id='.$idB);
            echo '
            <div class="redirection">
            <div class="conteneurRedirect">
                        <span>Ce bien est déjà dans vos favoris</span> 
                        <div>
                            <span>Vous allez être redirigé vers la page de bien </span>
                            <span id="compteARebours"></span>
                        <div>
                        <a id="accueilStephi" href="index.php">StephiPlace</a>
            </div>
            </div>
    
    <script>
    var seconde = 5, $seconde = document.querySelector("#compteARebours");
    (function compteARebours() {
        $seconde.textContent = seconde + " secondes";
        if(seconde --> 0) setTimeout(compteARebours, 1000)
    })();
    </script>';
        }
}

?>
</body>
</html>