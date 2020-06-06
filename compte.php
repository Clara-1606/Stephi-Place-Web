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
    $mail=$_POST['email'];
    $mdpn=$_POST['mdp1'];
    $mdp=password_hash($mdpn, PASSWORD_DEFAULT);
    $dn=$_POST['naissance'];
    $tel=$_POST['telephone'];
    $ad=$_POST['adresse'];
    $ville=$_POST['ville'];
    $comp=$_POST['compAdresse'];
    $cp=$_POST['cp'];
    $tm=$_POST['typeMembre'];
    $agence=$_POST['agenceListe'];
    $agent=rand(1,50);


    //ID TYPE MEMBRE
    $idMem="SELECT id_type_membre FROM type_membre WHERE libelle='$tm'";
    $stmt5=$cnx->prepare($idMem);
    $stmt5->execute();
    $line1=$stmt5->fetch(PDO::FETCH_ASSOC); 
    $typeM=$line1['id_type_membre'];

    //AJOUT DE L'ADRESSE
    $ajAd="INSERT INTO adresse (adresse,complement_adresse,ville,code_postal) VALUES (?,?,?,?)";
    $stmt4=$cnx->prepare($ajAd);
    $stmt4->execute([$ad,$comp,$ville,$cp]);

    //ID ADRESSE
    $selIdAd="SELECT MAX(id_adresse) AS maxAd FROM adresse";
    $stmt8=$cnx->prepare($selIdAd);
    $stmt8->execute([$selIdAd]);
    $line=$stmt8->fetch(PDO::FETCH_ASSOC);
    $maxA=$line['maxAd'];

    $ins="INSERT INTO membre (prenom, nom, mail, mot_de_passe, date_naissance, numero_telephone, id_adresse, id_type_membre, id_agent, id_agence) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $statins=$cnx->prepare($ins);
    $statins->execute([$pr,$nom,$mail,$mdp,$dn,$tel,$maxA,$typeM,$agent,$agence]);
    //echo $pr.$nom.$mail.$mdp.$dn.$tel.$ad.$typeM.$agent.$agence;
    header('Refresh: 5; URL=index.php');

}

?>

<div class='redirection'>
        <div class='conteneurRedirect'>
                    <span>Félicitation ! Vous êtes désormais un membre de la StephiPlace !</span> 
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