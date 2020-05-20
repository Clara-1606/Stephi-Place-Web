
<?php
if(!empty($_POST)){
if(empty($_POST['mot1']) && empty($_POST['mot2']) && empty($_POST['mot3'])){
    $page=$_GET['page'];

    if($page==2){
        $bienTout1="SELECT *
        FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
        ) AS m
        INNER JOIN biens AS b ON b.id_bien=m.id_bien
        INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
        INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
        WHERE b.id_bien < 51
        ORDER BY date_ajout DESC";
        $stmt2=$cnx->prepare($bienTout1);
        $stmt2->execute();
        while($line1=$stmt2->fetch(PDO::FETCH_ASSOC))
        {
            $idBien=$line1['id_bien'];
            echo '
            <div class="conteneurBien">
                <div class="imageBien">
                    <img src='.$line1['premiere_image'].' alt="image bien">
                </div>
                <div class="texteBien">
                    <div class="titreBienFav">
                        <a class="titreBien" href="bien.php?id='.$idBien.'">'.$line1['libelle'].' '.$line1['nb_piece'].' pièces de '.intval($line1['superficie']).'m2</a><a id="favBouton" href="ajout-favoris.php?id='.$line1['id_bien'].'"><i class="favAccueil fas fa-heart"></i></a>
                    </div>
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
        }
        echo '        
        <div class="conteneurPagination">
            <a class="pagination" href="index.php">1</a>
                <span class="pagination">-</span>
            <a class="pagination" href="index.php?page=2">2</a>
        </div>';
    }else{
        $bienTout="SELECT *
        FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
        ) AS m
        INNER JOIN biens AS b ON b.id_bien=m.id_bien
        INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
        INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
        WHERE b.id_bien > 50
        ORDER BY date_ajout DESC";
        $stmt=$cnx->prepare($bienTout);
        $stmt->execute();
    while($line=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        $idBien=$line['id_bien'];
        echo '
        <div class="conteneurBien">
            <div class="imageBien">
                <img src='.$line['premiere_image'].' alt="image bien">
            </div>
            <div class="texteBien">
                <div class="titreBienFav">
                    <a class="titreBien" href="bien.php?id='.$idBien.'">'.$line['libelle'].' '.$line['nb_piece'].' pièces de '.intval($line['superficie']).'m2</a><a id="favBouton" href="ajout-favoris.php?id='.$line['id_bien'].'"><i class="favAccueil fas fa-heart"></i></a>
                </div>
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
    }
    echo '        
    <div class="conteneurPagination">
        <a class="pagination" href="index.php">1</a>
            <span class="pagination">-</span>
        <a class="pagination" href="index.php?page=2">2</a>
    </div>';
    }
}
else
{
    $req = "SELECT *
    FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
    ) AS m
    INNER JOIN biens AS b ON b.id_bien=m.id_bien
    INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
    INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse WHERE";
    $req.=(!empty($_POST['nbPiece'])) ? " nb_piece='".$_POST['nbPiece']."' AND":"";
    $req.=(!empty($_POST['supMax'])) ? " superficie<'".$_POST['supMax']."' AND":"";
    $req.=(!empty($_POST['supMin'])) ? " superficie>'".$_POST['supMin']."' AND":"";
    $req.=(!empty($_POST['prixMax'])) ? " prix_vente<'".$_POST['prixMax']."' AND":"";
    $req.=(!empty($_POST['prixMin'])) ? " prix_vent>'".$_POST['prixMin']."' AND":"";
    $req= rtrim($req,' AND');
   
$req.="ORDER BY date_ajout DESC";
$sts=$cnx->prepare($req);
$sts->execute();
$idBien=$line1['id_bien'];
echo '
<div class="conteneurBien">
    <div class="imageBien">
        <img src='.$line1['premiere_image'].' alt="image bien">
    </div>
    <div class="texteBien">
        <div class="titreBienFav">
            <a class="titreBien" href="bien.php?id='.$idBien.'">'.$line1['libelle'].' '.$line1['nb_piece'].' pièces de '.intval($line1['superficie']).'m2</a><a id="favBouton" href="ajout-favoris.php?id='.$line1['id_bien'].'"><i class="favAccueil fas fa-heart"></i></a>
        </div>
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
}
}
else
{
    $page=$_GET['page'];

    if($page==2){
        $bienTout1="SELECT *
        FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
        ) AS m
        INNER JOIN biens AS b ON b.id_bien=m.id_bien
        INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
        INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
        WHERE b.id_bien < 51
        ORDER BY date_ajout DESC";
        $stmt2=$cnx->prepare($bienTout1);
        $stmt2->execute();
        while($line1=$stmt2->fetch(PDO::FETCH_ASSOC))
        {
            $idBien=$line1['id_bien'];
            echo '
            <div class="conteneurBien">
                <div class="imageBien">
                    <img src='.$line1['premiere_image'].' alt="image bien">
                </div>
                <div class="texteBien">
                    <div class="titreBienFav">
                        <a class="titreBien" href="bien.php?id='.$idBien.'">'.$line1['libelle'].' '.$line1['nb_piece'].' pièces de '.intval($line1['superficie']).'m2</a><a id="favBouton" href="ajout-favoris.php?id='.$line1['id_bien'].'"><i class="favAccueil fas fa-heart"></i></a>
                    </div>
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
        }
        echo '        
        <div class="conteneurPagination">
            <a class="pagination" href="index.php">1</a>
                <span class="pagination">-</span>
            <a class="pagination" href="index.php?page=2">2</a>
        </div>';
    }else{
        $bienTout="SELECT *
        FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
        ) AS m
        INNER JOIN biens AS b ON b.id_bien=m.id_bien
        INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
        INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
        WHERE b.id_bien > 50
        ORDER BY date_ajout DESC";
        $stmt=$cnx->prepare($bienTout);
        $stmt->execute();
    while($line=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        $idBien=$line['id_bien'];
        echo '
        <div class="conteneurBien">
            <div class="imageBien">
                <img src='.$line['premiere_image'].' alt="image bien">
            </div>
            <div class="texteBien">
                <div class="titreBienFav">
                    <a class="titreBien" href="bien.php?id='.$idBien.'">'.$line['libelle'].' '.$line['nb_piece'].' pièces de '.intval($line['superficie']).'m2</a><a id="favBouton" href="ajout-favoris.php?id='.$line['id_bien'].'"><i class="favAccueil fas fa-heart"></i></a>
                </div>
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
    }
    echo '        
    <div class="conteneurPagination">
        <a class="pagination" href="index.php">1</a>
            <span class="pagination">-</span>
        <a class="pagination" href="index.php?page=2">2</a>
    </div>';
    }
}

?>



----
$bienTout="SELECT *
        FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
        ) AS m
        INNER JOIN biens AS b ON b.id_bien=m.id_bien
        INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
        INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
        WHERE b.id_bien > 50
        ORDER BY date_ajout DESC";






--------------
        echo '
        <div class="conteneurBien">
            <div class="imageBien">
                <img src='.$line['premiere_image'].' alt="image bien">
            </div>
            <div class="texteBien">
                <div class="titreBienFav">
                    <a class="titreBien" href="bien.php?id='.$idBien.'">'.$line['libelle'].' '.$line['nb_piece'].' pièces de '.intval($line['superficie']).'m2</a><a id="favBouton" href="ajout-favoris.php?id='.$line['id_bien'].'"><i class="favAccueil fas fa-heart"></i></a>
                </div>
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

        if($req==0)
        {
            echo "Aucun bien ne correspond à votre recherche";
        }