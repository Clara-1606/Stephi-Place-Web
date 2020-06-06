<?php 
    session_start();
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
    try{
        $cnx = new PDO('mysql:host=localhost;dbname=UF;port=3307', 'root','');
    }
    catch(PDOException $e){
        print($e->getMessage()."\n");
        exit;
    }

    $idB=$_GET['id'];
    $verMail=$_SESSION['email'];

    $reqMb="SELECT * FROM membre WHERE mail='$verMail'";
    $stmt14=$cnx->prepare($reqMb);
    $stmt14->execute();
    $line14=$stmt14->fetch(PDO::FETCH_ASSOC);
    $idMb=$line14['id_membre'];

    $com=$_POST['offre'];
    $dateAjout=date('Y/m/d');
    $offrePrix=$_POST['prixOffre'];

    $ajoutProp="INSERT INTO proposition (statut, date_proposition, prix, commentaire, id_bien, id_membre) VALUES ('1','$dateAjout','$offrePrix','$com','$idB','$idMb')";
    $stmt=$cnx->prepare($ajoutProp);
    $stmt->execute();
    header('Refresh: 5; URL=bien.php?id='.$idB);
?>
<div class='redirection'>
        <div class='conteneurRedirect'>
                    <span>Votre proposition a bien été créée !</span> 
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