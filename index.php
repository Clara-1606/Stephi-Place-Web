<?php
    session_cache_limiter('private_no_expire, must-revalidate');
    session_start ();
?>

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
    <link rel="icon" type="image/png" href="img/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.7.3/themes/base/jquery-ui.css">
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
        if(isset($_SESSION['email'])){
            $vMail=$_SESSION['email'];

            $selTypeM="SELECT id_type_membre FROM membre
            WHERE mail='$vMail'";
            $sts4=$cnx->prepare($selTypeM);
            $sts4->execute();
            $line4=$sts4->fetch(PDO::FETCH_ASSOC);

            $c="SELECT mail, prenom, nom FROM agent_immobilier WHERE mail='$vMail'";
            $d=$cnx->prepare($c);
            $d->execute();
            $line1=$d->fetch(PDO::FETCH_ASSOC);
        }

    ?>
    <div id="enTete">
        <div id="enTeteGauche">
            <a id="accueilStephi" href="index.php">StephiPlace</a>
            <div class="depotAnnonce">
            <?php
            if (isset($_SESSION['email'])&& isset($_SESSION['mdp'])) 
            {
                if($line4['id_type_membre']==2 || $line4['id_type_membre']==3 || $line1>0)
                {
                    echo '<a href="deposer.php"><i class="far fa-plus-square"></i><span>Déposer une annonce</span></a>';
                } else {
                    echo '<a href="vendeurMessage.php"><i class="far fa-plus-square"></i><span>Déposer une annonce</span></a>';
                }
            }
            else{
                echo'
                <a class="connexionBouton" href="#"><i class="far fa-plus-square"></i><span>Déposer une annonce</span></a>';
            }
            ?>
            </div>
        </div>
        <div id="enTeteDroite">
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <?php

        try{
            $cnx = new PDO('mysql:host=localhost;dbname=UF;port=3307', 'root','');
        }
        catch(PDOException $e){
            print($e->getMessage()."\n");
            exit;
        }

        $selectAgence="SELECT id_agence, nom_agence FROM agence";
        $stmt1=$cnx->prepare($selectAgence);
        $stmt1->execute();

        $selectVille="SELECT DISTINCT ville FROM adresse";
        $stmt2=$cnx->prepare($selectVille);
        $stmt2->execute();

    if (isset($_SESSION['email'])&& isset($_SESSION['mdp'])) 
    {
        echo '<li class="monEspace"><a href="monespace.php"><i class="material-icons">person</i>Espace</a></li>
        <li><a class="deconnexionBouton" href="deconnexion.php"><i class="material-icons">person</i>Déconnexion</a></li>';
    } else {
        echo '<li><a class="connexionBouton" href="#"><i class="material-icons">person</i>Connexion</a></li>
        <li><a href="inscription.php">Inscription</a></li>';
    }      
    ?>
                    

                </ul>
            </nav>
        </div>
        <div id="connexionFenetre" class="fenetre">
            <div class="connexionFenetreContenu">
                <span class="fermer">&times;</span>
                <div class="connexionFenetreContenuSuite">
                    <div class="bienvenueConteneur">
                        <p class="bienvenue">Bienvenue !</p>
                        <p class="bienvenueTexte">Merci de vous connecter pour accéder à toutes nos fonctionnalités.</p>
                    </div>
                    <form action="login.php" method="post">
                        <div class="champConteneur">
                            <label for="email">E-mail</label>
                            <input type="mail" id="email" name="email" required>
                        </div>
                        <div class="champConteneur">
                            <label for="mdp">Mot de passe</label>
                            <input type="password" id="mdp" name="mdp" required>
                            <a class="motOublie" href="#">Mot de passe oublié</a>
                        </div>
                        <a class="okConnexion" href="indexphpl"><input class="envoiConnexion" type="submit" value="Se connecter"></a>
                        <div>
                            <a class="creerCompte" href="inscription.php">Créer un compte</a>
                        </div>
                    </form>
                </div>
            </div>     
        </div>    
    </div>
    <div class="imageIntro">
    </div>
    <div id="conteneurTout">
        <div id="conteneurRecherche">
            <form action="index.php" method="post" id="formulaireRecherche">
                <div class="agence">
                    <label for="agenceListe">Choix de l'agence</label>
                    <span class="choixTypeBien">
                        <select id="agenceListe" class="choixTypeBienSelection" name="nomAgence">
                            <option selected></option>
                        <?php foreach ($stmt1 as $c) { ?>
                                        <option value="<?=$c['id_agence']?>"><?=$c['nom_agence']?></option>
                                            <?php } ?>
                        </select>
                    </span>
                </div>
                <div class="conteneurLocalisationTypeBien">
                    <div class="typeBien">
                        <input type="checkbox" id="maison" class="box" name="choix[]" value="1">
                        <label for="maison" class="maison">Villa</label>
                        <input type="checkbox" id="appartement" class="box" name="choix[]" value="2">
                        <label for="appartement">Appartement</label>
                    </div>
                    <div class="conteneurLocalisation">
                        <label for="localisation">Localisation</label>
                        <span class="localisationSaisie">
                            <span><i class="fa fa-map-marker"></i></span>
                            <input name="ville" id="ville" type="text" placeholder="Ville">
                            <script>
                                $("#ville").autocomplete({
                                source: function (request, response) {
                                    $.ajax({
                                        url: "https://api-adresse.data.gouv.fr/search/?city="+$("input[name='ville']").val(),
                                        data: { q: request.term },
                                        dataType: "json",
                                        success: function (data) {
                                            var cities = [];
                                            response($.map(data.features, function (item) {
                                                if ($.inArray(item.properties, cities) == -1) {
                                                    cities.push(item.properties);
                                                    return { label: item.properties.city, 
                                                            value: item.properties.city
                                                    };
                                                }
                                            }));
                                        }
                                    });
                                },
                                });
                            </script>
                        </span>
                    </div>
                </div>
                <div class="conteneurAutresCriteres">
                    <div class="conteneurCriteres conteneurSuperficie">
                        <span class="boutonSuperficie">Superficie</span>
                        <i class="boutonSuperficie material-icons test">keyboard_arrow_down</i>
                    </div>
                    <div class="criteres critereSuperficie">
                        <span>Superficie</span>
                        <input type ="number" class="crit critMin" placeholder="Min (m2)" name="supMin">
                        <input type ="number" class="crit critMax" placeholder="Max (m2)" name="supMax">
                    </div>
                    <div class="conteneurCriteres conteneurPiece">
                        <span class="boutonPiece">Pièces</span>
                        <i class="boutonPiece material-icons">keyboard_arrow_down</i>
                    </div>
                    <div class="criteres criterePiece">
                        <span>Nombre de pièces</span>
                        <input type ="number" class="crit critMin" placeholder="" name="nbPiece">
                    </div>
                    <div class="conteneurCriteres conteneurPrix">
                        <span class="boutonPrix">Prix</span>
                        <i class=" boutonPrix material-icons">keyboard_arrow_down</i>
                    </div>
                    <div class="criteres criterePrix">
                        <span>Prix</span>
                        <input type ="number" class="crit critMin" placeholder="Min" name="prixMin">
                        <input type ="number" class="crit critMax" placeholder="Max" name="prixMax">
                    </div>
                    <div class="conteneurCriteres conteneurAutres">
                        <span>Autres critères</span>
                        <i class="material-icons">keyboard_arrow_down</i>
                    </div>
                </div>
                <div id="conteneurEnvoieRecherche">
                    <i class='fas fa-search'></i>
                    <input class="envoieRecherche" type="submit" value="Rechercher" required>
                </div>
            </form>
        </div>
        <div id="conteneurBienTout">
        <?php
error_reporting(0);
try{
    $cnx = new PDO('mysql:host=localhost;dbname=UF;port=3307', 'root','');
}
catch(PDOException $e){
    print($e->getMessage()."\n");
    exit;
}

if(!empty($_POST)){
if(empty($_POST['nbPiece']) && empty($_POST['supMin']) && empty($_POST['supMax']) && empty($_POST['prixMin']) && empty($_POST['prixMax']) && empty($_POST['nomAgence']) && empty($_POST['choix']) && empty($_POST['ville']) && empty($_POST['nomAgence'])){
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
                        <a class="titreBien" href="bien.php?id='.$idBien.'">'.$line1['libelle'].' '.$line1['nb_piece'].' pièces de '.intval($line1['superficie']).'m2</a>';
                        if (isset($_SESSION['email'])) {
                            echo'<a id="favBouton" href="ajout-favoris.php?id='.$line['id_bien'].'"><i class="favAccueil fas fa-heart"></i></a>';
                        } else {
                            echo'<a id="favBouton" class="connexionBouton" href="#"><i class="favAccueil fas fa-heart"></i></a>';
                        }
                        echo '
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
                    <a class="titreBien" href="bien.php?id='.$idBien.'">'.$line['libelle'].' '.$line['nb_piece'].' pièces de '.intval($line['superficie']).'m2</a>';
                    if (isset($_SESSION['email'])) {
                        echo'<a id="favBouton" href="ajout-favoris.php?id='.$line['id_bien'].'"><i class="favAccueil fas fa-heart"></i></a>';
                    } else {
                        echo'<a id="favBouton" class="connexionBouton" href="#"><i class="favAccueil fas fa-heart"></i></a>';
                    }
                    echo '
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
    $choix=$_POST['choix'];
    $req = "SELECT *
    FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
    ) AS m
    INNER JOIN biens AS b ON b.id_bien=m.id_bien
    INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
    INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse WHERE";
    $req.=(!empty($choix[0])) ? " b.id_type_bien='".$choix[0]."' AND":"";
    $req.=(!empty($choix[1])) ? " b.id_type_bien='".$choix[0]."' OR"." b.id_type_bien='".$choix[1]."' AND":"";
    $req.=(!empty($_POST['ville'])) ? " ville='".$_POST['ville']."' AND":"";
    $req.=(!empty($_POST['nomAgence'])) ? " b.id_agence='".$_POST['nomAgence']."' AND":"";
    $req.=(!empty($_POST['nbPiece'])) ? " nb_piece='".$_POST['nbPiece']."' AND":"";
    $req.=(!empty($_POST['supMax'])) ? " superficie<'".$_POST['supMax']."' AND":"";
    $req.=(!empty($_POST['supMin'])) ? " superficie>'".$_POST['supMin']."' AND":"";
    $req.=(!empty($_POST['prixMax'])) ? " prix_vente<'".$_POST['prixMax']."' AND":"";
    $req.=(!empty($_POST['prixMin'])) ? " prix_vente>'".$_POST['prixMin']."' AND":"";
    $req= rtrim($req,' AND');
$req.="ORDER BY date_ajout DESC";

$sts=$cnx->prepare($req);
$sts->execute();
while($line=$sts->fetch(PDO::FETCH_ASSOC))
{
    if($line==0)
{
    echo '<div class="rienTrouve"><span>Aucun bien ne correspond à votre recherche</span></div>';
} else {
    $idBien=$line['id_bien'];
    echo '
    <div class="conteneurBien">
        <div class="imageBien">
            <img src='.$line['premiere_image'].' alt="image bien">
        </div>
        <div class="texteBien">
            <div class="titreBienFav">
                <a class="titreBien" href="bien.php?id='.$idBien.'">'.$line['libelle'].' '.$line['nb_piece'].' pièces de '.intval($line['superficie']).'m2</a>';
                if (isset($_SESSION['email'])) {
                    echo'<a id="favBouton" href="ajout-favoris.php?id='.$line['id_bien'].'"><i class="favAccueil fas fa-heart"></i></a>';
                } else {
                    echo'<a id="favBouton" class="connexionBouton" href="#"><i class="favAccueil fas fa-heart"></i></a>';
                }
                echo '
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
}
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
                        <a class="titreBien" href="bien.php?id='.$idBien.'">'.$line1['libelle'].' '.$line1['nb_piece'].' pièces de '.intval($line1['superficie']).'m2</a>';
                        if (isset($_SESSION['email'])) {
                            echo'<a id="favBouton" href="ajout-favoris.php?id='.$line['id_bien'].'"><i class="favAccueil fas fa-heart"></i></a>';
                        } else {
                            echo'<a id="favBouton" class="connexionBouton" href="#"><i class="favAccueil fas fa-heart"></i></a>';
                        }
                        echo '
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
                    <a class="titreBien" href="bien.php?id='.$idBien.'">'.$line['libelle'].' '.$line['nb_piece'].' pièces de '.intval($line['superficie']).'m2</a>';
                    if (isset($_SESSION['email'])) {
                        echo'<a id="favBouton" href="ajout-favoris.php?id='.$line['id_bien'].'"><i class="favAccueil fas fa-heart"></i></a>';
                    } else {
                        echo'<a id="favBouton" class="connexionBouton" href="#"><i class="favAccueil fas fa-heart"></i></a>';
                    }
                    echo '
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
    </div>
</div>
    </div>
    <footer id="foot">
        <div class="introFooter">
            <p class="titreFooter">La confiance d'un groupe d'agences immobilières innovantes</p>
            <p class="crééPar">Créé par Clara Vesval et Alan Philipiert</p>
        </div>

        <div class ="lienFinLogo"href="indexphpl">
            <div class="stats">
                <span>100</span>
                <span>Projets réalisés</span>
            </div>
            <div class="stats">
                <span>93%</span>
                <span>Recommandation clients</span>
            </div>
            <div class="stats">
                <span>50</span>
                <span>Agences en France</span>
            </div>
            <div class="stats">
                <span>100%</span>
                <span>Agence indépendante</span>
            </div>
        </div>
        <div class="conteneurApplication">
            <div class="margeApp">
                <img src="img/logo2.png" alt="logo stephi">
            </div>
            <span>Notre application</span>
            <a class="buttonApplication" href="logiciel/Executable_logiciel.zip">
                <i class='fas fa-download'></i>
                <span>Télécharger</span>
            </a>
            <div class="margeApp"></div>
            <a class="retourHaut" href="#"><i class='fas fa-angle-double-up'></i></a>
        </div>
        <div class="reseauxSociaux">
            <i style="font-size:4rem" class="facebook fa fa-facebook-square"></i>
            <i style="font-size:4rem" class='twitter fab fa-twitter'></i>
            <i style="font-size:4rem" class="fa fa-instagram"></i>
            <i style="font-size:4rem" class='fab fa-linkedin'></i>
        </div> 
        <p>Suivez-nous sur les réseaux sociaux !</p>
        <p class="copyright">&copy; 2020. Stephi Place France.</p>
        <p class="copyright">Tous droits réservés. Conditions générales. Réseau de franchise immobilière. Chaque agence est financièrement et juridiquement indépendante.</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>