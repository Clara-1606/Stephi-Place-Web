<?php
error_reporting(0);
try{
    $cnx = new PDO('mysql:host=localhost;dbname=UF;port=3307', 'root','');
}
catch(PDOException $e){
    print($e->getMessage()."\n");
    exit;
}

// => /A/ /V/ P

if((isset($_POST)) AND (empty($_POST['choix'][0]) AND empty($_POST['choix'][1]))){
    $pMin=$_POST['prixMin'];
    $pMax=$_POST['prixMax'];
    $piece=$_POST['nbPiece'];
    $supMin=$_POST['supMin'];
    
    
    $test="SELECT * FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
    ) AS m
    INNER JOIN biens AS b ON b.id_bien=m.id_bien
    INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
    INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
    WHERE (prix_min > ? OR ? is NULL) AND (prix_max > ? OR ? is NULL) AND (nb_piece= ? OR ? is Null ) AND (superficie > ? OR ? is NULL)
    ORDER BY date_ajout DESC";
    $sts=$cnx->prepare($test);
    $sts->execute([$pMin,$pMin,$pMax,$pMax,$piece,$piece,$supMin,$supMin]);
    while($line=$sts->fetch(PDO::FETCH_ASSOC)){
        echo '
        <div class="conteneurBien">
            <div class="imageBien">
                <img src='.$line['premiere_image'].' alt="image bien">
            </div>
            <div class="texteBien">
                <span class="titreBien">'.$line['libelle'].' '.$line['nb_piece'].' pièces de '.intval($line['superficie']).'m2</span>
                <span class="description">'.$line['descriptif'].'</span>
                <div class="infoBien">
                    <span class="localisationInfo">Localisation :</span>
                    <span class="localisationBien">'.$line['adresse'].', '.$line['code_postal'].' '.$line['ville'].'</span>
                </div>
                <div class="infoBien">
                    <span class="prixInfo">Prix :</span>
                    <span class="prixBien">'.intval($line['prix_vente']).' &euro;</span>
                </div>
            </div>
        </div>';
    };

}

// => A ou V /P/

if((!empty($_POST['choix'][0]) OR !empty($_POST['choix'][1])) AND (empty($_POST['prixMin']) AND empty($_POST['prixMax']) AND empty($_POST['nbPiece']) AND empty($_POST['supMin'])))
{

$villa=$_POST['choix'][0];
$appartement=$_POST['choix'][1];

$test1="SELECT * FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
) AS m
INNER JOIN biens AS b ON b.id_bien=m.id_bien
INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
WHERE (b.id_type_bien= ? OR ? is Null) AND (b.id_type_bien= ? OR ? is Null)
ORDER BY date_ajout DESC";
$sts1=$cnx->prepare($test1);
$sts1->execute([$villa,$villa,$appartement,$appartement]);
while($line1=$sts1->fetch(PDO::FETCH_ASSOC)){
    echo '
    <div class="conteneurBien">
        <div class="imageBien">
            <img src='.$line1['premiere_image'].' alt="image bien">
        </div>
        <div class="texteBien">
            <span class="titreBien">'.$line1['libelle'].' '.$line1['nb_piece'].' pièces de '.intval($line1['superficie']).'m2</span>
            <span class="description">'.$line1['descriptif'].'</span>
            <div class="infoBien">
                <span class="localisationInfo">Localisation :</span>
                <span class="localisationBien">'.$line1['adresse'].', '.$line1['code_postal'].' '.$line1['ville'].'</span>
            </div>
            <div class="infoBien">
                <span class="prixInfo">Prix :</span>
                <span class="prixBien">'.intval($line1['prix_vente']).' &euro;</span>
            </div>
        </div>
    </div>';

};
}



// => A + V /P/

if((!empty($_POST['choix'][0]) AND !empty($_POST['choix'][1])) AND (empty($_POST['prixMin']) AND empty($_POST['prixMax']) AND empty($_POST['nbPiece']) AND empty($_POST['supMin'])))
{

$villa=$_POST['choix'][0];
$appartement=$_POST['choix'][1];

$test1="SELECT * FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
) AS m
INNER JOIN biens AS b ON b.id_bien=m.id_bien
INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
WHERE (b.id_type_bien= ? OR ? )
ORDER BY date_ajout DESC";
$sts1=$cnx->prepare($test1);
$sts1->execute([1,2]);
while($line1=$sts1->fetch(PDO::FETCH_ASSOC)){
    echo '
    <div class="conteneurBien">
        <div class="imageBien">
            <img src='.$line1['premiere_image'].' alt="image bien">
        </div>
        <div class="texteBien">
            <span class="titreBien">'.$line1['libelle'].' '.$line1['nb_piece'].' pièces de '.intval($line1['superficie']).'m2</span>
            <span class="description">'.$line1['descriptif'].'</span>
            <div class="infoBien">
                <span class="localisationInfo">Localisation :</span>
                <span class="localisationBien">'.$line1['adresse'].', '.$line1['code_postal'].' '.$line1['ville'].'</span>
            </div>
            <div class="infoBien">
                <span class="prixInfo">Prix :</span>
                <span class="prixBien">'.intval($line1['prix_vente']).' &euro;</span>
            </div>
        </div>
    </div>';

};
}

// => A ou V + P

/*
FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
) AS m
INNER JOIN biens AS b ON b.id_bien=m.id_bien
INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
*/

if((!empty($_POST['choix'][0]) XOR !empty($_POST['choix'][1])) AND (!empty($_POST['prixMin']) OR !empty($_POST['prixMax']) OR !empty($_POST['nbPiece']) OR !empty($_POST['supMin'])))
{
    $pMin=$_POST['prixMin'];
    $pMax=$_POST['prixMax'];
    $piece=$_POST['nbPiece'];
    $supMin=$_POST['supMin'];
    $villa=$_POST['choix'][0];
    $appartement=$_POST['choix'][1];
    
    
    $test="SELECT * FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
    ) AS m
    INNER JOIN biens AS b ON b.id_bien=m.id_bien
    INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
    INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
    WHERE (b.prix_min > ? OR ? is NULL) AND (b.prix_max > ? OR ? is NULL) AND (b.nb_piece= ? OR ? is Null ) AND (b.superficie > ? OR ? is NULL) 
    INTERSECT 
    SELECT * FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
    ) AS m
    INNER JOIN biens AS b ON b.id_bien=m.id_bien
    INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
    INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
    WHERE (b.id_type_bien= ? OR ? is Null) AND (b.id_type_bien= ? OR ? is Null)
    ORDER BY date_ajout DESC";
    $sts=$cnx->prepare($test);
    $sts->execute([$pMin,$pMin,$pMax,$pMax,$piece,$piece,$supMin,$supMin,$villa,$villa,$appartement,$appartement]);
    while($line=$sts->fetch(PDO::FETCH_ASSOC)){
        echo '
        <div class="conteneurBien">
            <div class="imageBien">
                <img src='.$line['premiere_image'].' alt="image bien">
            </div>
            <div class="texteBien">
                <span class="titreBien">'.$line['libelle'].' '.$line['nb_piece'].' pièces de '.intval($line['superficie']).'m2</span>
                <span class="description">'.$line['descriptif'].'</span>
                <div class="infoBien">
                    <span class="localisationInfo">Localisation :</span>
                    <span class="localisationBien">'.$line['adresse'].', '.$line['code_postal'].' '.$line['ville'].'</span>
                </div>
                <div class="infoBien">
                    <span class="prixInfo">Prix :</span>
                    <span class="prixBien">'.intval($line['prix_vente']).' &euro;</span>
                </div>
            </div>
        </div>';
    
    };
}



// => A + V + P
if((!empty($_POST['choix'][0]) AND !empty($_POST['choix'][1])) AND (!empty($_POST['prixMin']) OR !empty($_POST['prixMax']) OR !empty($_POST['nbPiece']) OR !empty($_POST['supMin'])))
{
    $villa=$_POST['choix'][0];
    $appartement=$_POST['choix'][1];
    $pMin=$_POST['prixMin'];
    $pMax=$_POST['prixMax'];
    $piece=$_POST['nbPiece'];
    $supMin=$_POST['supMin'];
    
    $test1="SELECT * FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
    ) AS m
    INNER JOIN biens AS b ON b.id_bien=m.id_bien
    INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
    INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
    WHERE (b.id_type_bien= ? OR ? ) 
    INTERSECT 
    SELECT * FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
    ) AS m
    INNER JOIN biens AS b ON b.id_bien=m.id_bien
    INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
    INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
    WHERE (b.prix_min > ? OR ? is NULL) AND (b.prix_max > ? OR ? is NULL) AND (b.nb_piece= ? OR ? is Null ) AND (b.superficie > ? OR ? is NULL)
    ORDER BY date_ajout DESC";
    $sts1=$cnx->prepare($test1);
    $sts1->execute([1,2,$pMin,$pMin,$pMax,$pMax,$piece,$piece,$supMin,$supMin]);
    while($line1=$sts1->fetch(PDO::FETCH_ASSOC)){
        echo '
        <div class="conteneurBien">
            <div class="imageBien">
                <img src='.$line1['premiere_image'].' alt="image bien">
            </div>
            <div class="texteBien">
                <span class="titreBien">'.$line1['libelle'].' '.$line1['nb_piece'].' pièces de '.intval($line1['superficie']).'m2</span>
                <span class="description">'.$line1['descriptif'].'</span>
                <div class="infoBien">
                    <span class="localisationInfo">Localisation :</span>
                    <span class="localisationBien">'.$line1['adresse'].', '.$line1['code_postal'].' '.$line1['ville'].'</span>
                </div>
                <div class="infoBien">
                    <span class="prixInfo">Prix :</span>
                    <span class="prixBien">'.intval($line1['prix_vente']).' &euro;</span>
                </div>
            </div>
        </div>';
    
    };
}

// /A/ /V/ /P/

if((empty($_POST['choix'][0]) AND empty($_POST['choix'][1])) AND (empty($_POST['prixMin']) AND empty($_POST['prixMax']) AND empty($_POST['nbPiece']) AND empty($_POST['supMin'])))
{
    $bienTout="SELECT *
    FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
    ) AS m
    INNER JOIN biens AS b ON b.id_bien=m.id_bien
    INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
    INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
    ORDER BY date_ajout DESC";
    $stmt=$cnx->prepare($bienTout);
    $stmt->execute();
    
    while($line=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        echo '
        <div class="conteneurBien">
            <div class="imageBien">
                <img src='.$line['premiere_image'].' alt="image bien">
            </div>
            <div class="texteBien">
                <span class="titreBien">'.$line['libelle'].' '.$line['nb_piece'].' pièces de '.intval($line['superficie']).'m2</span>
                <span class="description">'.$line['descriptif'].'</span>
                <div class="infoBien">
                    <span class="localisationInfo">Localisation :</span>
                    <span class="localisationBien">'.$line['adresse'].', '.$line['code_postal'].' '.$line['ville'].'</span>
                </div>
                <div class="infoBien">
                    <span class="prixInfo">Prix :</span>
                    <span class="prixBien">'.intval($line['prix_vente']).' &euro;</span>
                </div>
            </div>
        </div>';
    }}
?>