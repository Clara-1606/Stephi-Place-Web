<?php
session_start();
$ses=$_SESSION['email'];
ini_set('display_errors', 'off');
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

if(isset($_POST))
{

    $pr=$_POST['prenom'];
    $nom=$_POST['nom'];
    $dn=$_POST['naissance'];
    $tel=$_POST['telephone'];
    $ad=$_POST['adresse'];
    $ville=$_POST['ville'];
    if(isset($_POST['compAdresse'])){
        $comp=$_POST['compAdresse'];
    }
    $cp=$_POST['codePostal'];
    $tm=$_POST['typeMembre'];

    //ID TYPE MEMBRE
    $idMem="SELECT id_type_membre FROM type_membre WHERE libelle='$tm'";
    $stmt5=$cnx->prepare($idMem);
    $stmt5->execute();
    $line1=$stmt5->fetch(PDO::FETCH_ASSOC); 
    $typeM=$line1['id_type_membre'];

    //ID ADRESSE
    $idAd="SELECT a.id_adresse FROM adresse as a
    INNER JOIN membre as m ON a.id_adresse=m.id_adresse
    WHERE mail='$ses'";
    $stmt9=$cnx->prepare($idAd);
    $stmt9->execute();
    $line9=$stmt9->fetch(PDO::FETCH_ASSOC);
    $idAdr=$line9['id_adresse'];


    //AJOUT DE L'ADRESSE
    $ajAd="UPDATE adresse SET adresse='$ad', complement_adresse='$comp', ville='$ville', code_postal='$cp'
    WHERE id_adresse='$idAdr'";
    $stmt4=$cnx->prepare($ajAd);
    $stmt4->execute();

    $ins="UPDATE membre SET prenom='$pr', nom='$nom', date_naissance='$dn', numero_telephone='$tel', id_type_membre='$typeM' WHERE mail='$ses'";
    $statins=$cnx->prepare($ins);
    $statins->execute();
    header('Refresh: 5; URL=index.php');

}

?>

<div class='redirection'>
        <div class='conteneurRedirect'>
                    <span>Vos informations personnelles ont été mises à jour !</span> 
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