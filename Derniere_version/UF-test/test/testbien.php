<!DOCTYPE html>
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
    <script src="js/main.js"></script>
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

//$idB=$_GET['id'];
$test="SELECT * FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
) AS m
INNER JOIN biens AS b ON b.id_bien=m.id_bien
INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
WHERE b.id_bien=100;
ORDER BY date_ajout DESC";
$sts=$cnx->prepare($test);
$sts->execute();
while($line=$sts->fetch(PDO::FETCH_ASSOC)){
        echo '
        <div class="conteneurTB">
            <div class="conteneurTBInfo conteneurTBInfoImg">
                <div class="TBInfoImgImg">
                    <img src='.$line['premiere_image'].' alt="image du bien">
                </div>
                <div class="TBInfoImgText">
                    <div>
                        <span class="titreBien">'.$line['libelle'].' '.$line['nb_piece'].' pièces de '.intval($line['superficie']).'m2</span>
                    </div>
                    <span class="prixBien">'.intval($line['prix_vente']).' &euro;</span>
                </div>
            </div>
            <div class="conteneurTBInfo conteneurTBInfoCrit">
                <span class=TBTitre>Critères :</span>
                <div>
                    <div>
                        <span><i class="fas fa-home"></i>Type de bien</span>
                        <span>'.$line['libelle'].'</span>
                    </div>
                    <div>
                        <span><i class="fas fa-vector-square"></i>Superficie (m2)</span>
                        <span>'.intval($line['superficie']).'</span>  
                    </div>
                    <div>
                        <span><i class="far fa-square"></i>Nombre de pièce</span>
                        <span>'.$line['nb_piece'].'</span>
                    </div>
                    <div>
                    <span><i class="fas fa-bed"></i>Nombre de chambre</span>
                    <span>'.$line['nb_chambre'].'</span>
                </div>
                </div>
            </div>
            <div class="conteneurTBInfo conteneurTBInfoDes">
                <span class=TBTitre>Description :</span>
                <p>'.$line['descriptif'].'</p>
            </div>
            <div class="conteneurTBInfo conteneurTBInfoLoc">
                <span class=TBTitre>Localisation</span>
                <div class="TBlocInfo">
                    <span>Adresse : '.$line['adresse'].'</span>
                    <span>Code Postal : '.$line['code_postal'].'</span>
                    <span>Ville : '.$line['ville'].'</span>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2904.047794173173!2d5.378131315486059!3d43.292320779135345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9c0ba52eeab47%3A0x4431f0372343f789!2s85%20Rue%20de%20Rome%2C%2013006%20Marseille!5e0!3m2!1sfr!2sfr!4v1588951603084!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
        ';
}
?>



</body>
</html>