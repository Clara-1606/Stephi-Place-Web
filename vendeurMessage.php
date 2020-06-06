<?php 
    session_start();
    ini_set('display_errors','off');
    $verMail=$_SESSION['email'];
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
    <div class='redirection vendeurMessage'>
        <div class='conteneurRedirect conteneurVendeurMessage'>
                    <span>Vous devez êtes vendeur pour pouvoir déposer une annonce</span> 
                    <div>
                        <span>Cliquez sur Mon Espace pour modifier votre type de compte ou revenez à l'accueil</span>
                    <div>
                    <div class="lienRedirectionVendeur">
                        <a href="index.php">Accueil</a>
                        <a href="monespace.php">Mon Espace</a>
                    </div>
                    <a id="accueilStephi" href="index.php">StephiPlace</a>
        </div>
    </div>
</body>
</html>