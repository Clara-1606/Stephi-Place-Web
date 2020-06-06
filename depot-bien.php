<?php 
    session_start();
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
<?php

include_once('utile.php'); 

//isset($_POST['etageDepot']) && isset($_POST['pieceDepot']) && isset($_POST['chambreDepot']) && isset($_POST['superficieDepot']) && isset($_POST['adresseDepot']) && isset($_POST['complAdresseDepot']) && isset($_POST['villeDepot']) && isset($_POST['codePostalDepot']) && isset($_POST['description']) && isset($_POST['prixVenteDepot']) && isset($_POST['prixMinDepot']) && isset($_POST['prixMaxDepot']) && isset($_POST['dependanceListe']) && isset($_POST['superficieDepDepot']) && isset($_POST['maison'])
if(isset($_POST))
        {
            $etage=$_POST['etageDepot'];
            $piece=$_POST['pieceDepot'];
            $ch=$_POST['chambreDepot'];
            $sup=$_POST['superficieDepot'];
            $supDep=$_POST['superficieDepDepot'];
            $ad=$_POST['adresseDepot'];
            $cad=$_POST['complAdresseDepot'];
            $ville=$_POST['villeDepot'];
            $cp=$_POST['codePostalDepot'];
            $des=$_POST['description'];
            $pVente=$_POST['prixVenteDepot'];
            $pMin=$_POST['prixMinDepot'];
            $pMax=$_POST['prixMaxDepot'];
            $dateAjout=date('Y-m-d');
            $dep=$_POST['dependanceListe'];
            $tBien=$_POST['maison'];
            $agence=$_POST['agenceListe'];

            //ID Type bien
            $typeBienSel="SELECT tb.id_type_bien, tb.libelle 
            FROM type_bien AS tb 
            INNER JOIN biens AS b ON  b.id_type_bien = tb.id_type_bien
            WHERE tb.libelle='$tBien'";
            $stmt6=$cnx->prepare($typeBienSel);
            $stmt6->execute();
            $line=$stmt6->fetch(PDO::FETCH_ASSOC);
            $idTBien=$line['id_type_bien'];

            //ID Membre
            $reqMb="SELECT * FROM membre WHERE mail='$verMail'";
            $stmt14=$cnx->prepare($reqMb);
            $stmt14->execute();
            $line14=$stmt14->fetch(PDO::FETCH_ASSOC);
            $idMb=$line14['id_membre'];

            //Adresse
            $ajAd="INSERT INTO adresse (adresse, complement_adresse, code_postal, ville) VALUES (?,?,?,?)";
            $stmt4=$cnx->prepare($ajAd);
            $stmt4->execute([$ad, $cad, $cp, $ville]);

            //Sélection du dernier id d'adresse
            $selIdAd="SELECT MAX(id_adresse) AS maxAd FROM adresse";
            $stmt8=$cnx->prepare($selIdAd);
            $stmt8->execute([$selIdAd]);
            $line=$stmt8->fetch(PDO::FETCH_ASSOC);
            $maxA=$line['maxAd'];

            //Insertion du nouveau bien
            $aj = "INSERT INTO biens (superficie,prix_min, prix_max, prix_vente, nb_piece, nb_chambre, date_ajout, descriptif, en_ligne, etage, id_statut, id_type_bien, id_adresse, id_agence, id_membre) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $stmt=$cnx->prepare($aj);
            $stmt->execute([$sup, $pMin, $pMax, $pVente, $piece, $ch, $dateAjout, $des,1, $etage,1, $idTBien, $maxA, $agence, $idMb]);

            //Sélection du dernier l'id bien
            $selIdBien="SELECT MAX(id_bien) AS maxBien FROM biens";
            $stmt3=$cnx->prepare($selIdBien);
            $stmt3->execute([$selIdBien]);
            $line=$stmt3->fetch(PDO::FETCH_ASSOC);
            $maxB=$line['maxBien'];

            //Dépendance
            $ajDep = "INSERT INTO dependance (nom_dependance, superficie ,id_bien) VALUES (?,?,?)";
            $stmt5=$cnx->prepare($ajDep);
            $stmt5->execute([$dep, $supDep,$maxB]);

            //Photo
            if (!empty($_FILES['imageDepot'])) {

                $localisation = "img/biens/"; //Où on veut que le fichier aille
                $file = $_FILES['imageDepot']['name']; //On récupère son nom
        
                $path = pathinfo($file); //Récuperer le path où elle a été stockée
                $fichier = $path['filename'];
                $ext = $path['extension']; //On récupère son extension
        
                $tmp = $_FILES['imageDepot']['tmp_name']; //On récupère son nom temporaire
                $path_fichier_ext = $localisation . $fichier . '.' . $ext;
                if (move_uploaded_file($tmp, $path_fichier_ext)) { //On bouge le fichier là où on veut qu'il soit
                    $fichier = 'img/biens/'.$fichier . '.' . $ext;


                    $ajoutPhoto="INSERT INTO image (lien_image, id_bien) VALUES (?,?)";
                    $stmt10=$cnx->prepare($ajoutPhoto);
                    $stmt10->execute([$fichier, $maxB]);
                    header('Refresh: 5; URL=index.php');
                }
            }

        }

?>
        <div class='redirection'>
        <div class='conteneurRedirect'>
                    <span>Votre bien a été ajouté à notre site!</span> 
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