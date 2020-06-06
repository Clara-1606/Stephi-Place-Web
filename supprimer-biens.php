
<?php 
session_cache_limiter('private_no_expire, must-revalidate');
session_start (); 
?>
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
include_once('utile.php'); 

if(isset($_SESSION['email'])){
    include_once('utile.php'); 
    $idB=$_GET['id'];
    $vMail=$_SESSION['email'];

    $ses="SELECT * FROM membre as m
    INNER JOIN favoris as f ON m.id_membre=f.id_membre
    WHERE mail='$vMail'
    GROUP BY f.id_membre";
    $stm1=$cnx->prepare($ses);
    $stm1->execute();
    $line=$stm1->fetch(PDO::FETCH_ASSOC);
    $idMembre=$line['id_membre'];
    echo $idMembre;

    $suppr1="DELETE FROM favoris
    WHERE id_bien='$idB'";
    $stm1=$cnx->prepare($suppr1);
    $stm1->execute();
    $suppr2="DELETE FROM dependance
    WHERE id_bien='$idB'";
    $stm2=$cnx->prepare($suppr2);
    $stm2->execute();
    $suppr3="DELETE FROM image
    WHERE id_bien='$idB'";
    $stm3=$cnx->prepare($suppr3);
    $stm3->execute();
    $suppr="DELETE FROM biens
    WHERE id_bien='$idB'";
    $stm=$cnx->prepare($suppr);
    $stm->execute();
    header('Refresh: 5; URL=monespace.php');
}


?>

<div class='redirection'>
        <div class='conteneurRedirect'>
                    <span><i class='fas fa-sad-tear'></i>Votre bien a été supprimé de notre site <i class='fas fa-sad-tear'></i></span> 
                    <div>
                        <span>Vous allez être redirigé vers l'accueil dans </span>
                        <span id="compteARebours"></span>
                    <div>
                    <a id="accueilStephi" href="index.php">StephiPlace</a>
        </div>
</div>

<script>
var seconde = 5, $seconde = document.querySelector('#compteARebours');
(function compteARebours() {
    $seconde.textContent = seconde + ' secondes';
    if(seconde --> 0) setTimeout(compteARebours, 1000)
})();
</script>
</body>
</html>