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
                            <input type="text" id="email" name="email">
                        </div>
                        <div class="champConteneur">
                            <label for="mdp">Mot de passe</label>
                            <input type="text" id="mdp" name="mdp">
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
<?php

try{
    $cnx = new PDO('mysql:host=localhost;dbname=UF;port=3307', 'root','');
}
catch(PDOException $e){
    print($e->getMessage()."\n");
    exit;
}

$idB=$_GET['id'];

$mb="SELECT * FROM membre as m
INNER JOIN biens as b ON b.id_membre=m.id_membre
WHERE b.id_bien='$idB'";
$sts0=$cnx->prepare($mb);
$sts0->execute();
$line0=$sts0->fetch(PDO::FETCH_ASSOC);

$test="SELECT * FROM (SELECT i.id_bien, MIN(lien_image) AS derniere_image, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
) AS m
INNER JOIN biens AS b ON b.id_bien=m.id_bien
INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
WHERE b.id_bien=$idB;
ORDER BY date_ajout DESC";
$sts=$cnx->prepare($test);
$sts->execute();
while($line=$sts->fetch(PDO::FETCH_ASSOC)){
        echo '
        <div class="conteneurTT">
            <div class="conteneurTB">
                <div class="conteneurTBInfo conteneurTBInfoImg">
                    <div class="conteneurCarousel">
                        <div class="TBInfoImgImg">
                            <div class="container"> 
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                    <img src="'.$line['premiere_image'].'" alt="image 1" style="height:400px;">
                                    </div>
                            
                                    <div class="item">
                                    <img src="'.$line['derniere_image'].'" alt="image 2" style="height:400px;">
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="TBInfoImgText">
                        <div>
                            <span class="TBtitreBien">'.$line['libelle'].' '.$line['nb_piece'].' pièces de '.intval($line['superficie']).'m2</span>
                        </div>
                        <span class="prixBien">'.intval($line['prix_vente']).' &euro;</span>
                        <div class="conteneurOffreFavTete">
                            ';if (isset($_SESSION['email'])) {
                                echo '<span><a id="offreBouton" href="#"><i class="material-icons">email</i>Faire une offre</a></span>';
                            } else {
                                echo '<span><a id="offreBouton" href="#"><i class="material-icons">email</i>Faire une offre</a></span>';
                            }
                            if (isset($_SESSION['email'])) {
                                echo '<span><a id="favBouton" href="ajout-favoris.php?id='.$line['id_bien'].'"><i class="far fa-heart"></i>Ajouter en favoris</a></span>';
                            } else {
                                echo '<span><a class="connexionBouton" id="favBouton" href="#"><i class="far fa-heart"></i>Ajouter en favoris</a></span>';
                            }; echo '
                            
                        </div>
                    </div>
                </div>
                <div class="conteneurTBInfo conteneurTBInfoCrit">
                    <span class=TBTitre>Critères :</span>
                    <div>
                        <div>
                            <span class="critTitre"><i class="fas fa-home"></i>Type de bien</span>
                            <span>'.$line['libelle'].'</span>
                        </div>
                        <div>
                            <span class="critTitre"><i class="fas fa-vector-square"></i>Superficie (m2)</span>
                            <span>'.intval($line['superficie']).'</span>  
                        </div>
                        <div>
                            <span class="critTitre"><i class="far fa-square"></i>Nombre de pièce</span>
                            <span>'.$line['nb_piece'].'</span>
                        </div>
                        <div>
                            <span class="critTitre"><i class="fas fa-bed"></i>Nombre de chambre</span>
                            <span>'.$line['nb_chambre'].'</span>
                        </div>
                    </div>
                </div>
                <div class="conteneurTBInfo conteneurTBInfoDes">
                    <span class=TBTitre>Description :</span>
                    <p>'.$line['descriptif'].'</p>
                </div>
                <div class="conteneurTBInfo conteneurTBInfoVend">
                    <span class=TBTitre>Information du vendeur :</span>
                    <div>
                        <span class="infoVend">Vendeur :</span><span>'.' '.$line0['nom'].' '.$line0['prenom'].'</span>
                    </div>
                    <div>
                        <span class="infoVend">Email :</span><span>'.' '.$line0['mail'].'</span>
                    </div>
                    <div>
                    <span class="infoVend">Numéro de téléphone :</span><span>'.' '.$line0['numero_telephone'].'</span>
                    </div>
                </div>
                <div class="conteneurTBInfo conteneurTBInfoLoc">
                    <span class=TBTitre>Localisation</span>
                    <div class="TBlocInfo">
                        <span>Adresse : '.$line['adresse'].'</span>
                        <span>Code Postal : '.$line['code_postal'].'</span>
                        <span>Ville : '.$line['ville'].'</span>
                    </div>
                    <iframe src="https://www.google.com/maps/place/'.$line['ville'].'/" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="conteneurOffreFavTete secondeOffreFav">
                    <span><a id="offreBouton" href="#"><i class="material-icons">email</i>Faire une offre</a></span>
                    <span><a id="offreBouton" href="ajout-favoris.php?id='.$line['id_bien'].'"><i class="far fa-heart"></i>Ajouter en favoris</a></span>
                </div>
            </div>
        </div>
        ';
}
?>
<div id="offreFenetre" class="fenetre">
    <div class="offreFenetreContenu">
        <span class="fermer">&times;</span>
        <div class="offreFenetreContenuSuite">
            <div class="bienvenueConteneur">
                <p class="bienvenue">Faire une offre</p>
                <p class="bienvenueTexte">Merci de remplir les champs suivants.</p>
            </div>
            <form action="proposition.php?id=<?php echo $idB?>" method="post">
                <div class="champConteneur">
                    <label for="emailOffre">E-mail</label>
                    <input type="text" id="emailOffre" name="emailOffre">
                </div>
                <div class="champConteneur">
                    <label for="offre">Offre</label>
                    <textarea id="offre" name="offre"></textarea>
                </div>
                <div class="champConteneur">
                    <label for="prixOffre">Proposition (prix)</label>
                    <input type="number" id="prixOffre" name="prixOffre">
                </div>
                <input class="envoiOffre" type="submit" value="Se connecter">
            </form>
        </div>
    </div>     
</div>    
<footer id="foot">
        <div class="introFooter">
            <p class="titreFooter">La confiance d'un groupe d'agences immobilières innovantes</p>
            <p class="crééPar">Créé par Clara Vesval et Alan Philipiert</p>
        </div>

        <div class ="lienFinLogo"href="index.php">
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
            <span>Notre application</span>
            <div class="buttonApplication">
                <i class='fas fa-download'></i>
                <span>Télécharger</span>
            </div>
        </div>
        <div class="reseauxSociaux">
            <i style="font-size:4rem" class="facebook fa fa-facebook-square"></i>
            <i style="font-size:4rem" class='twitter fab fa-twitter'></i>
            <i style="font-size:4rem" class="fa fa-instagram"></i>
        </div>
        <p>Suivez-nous sur les réseaux sociaux !</p>
        <p class="copyright">&copy; 2020. Stephi Place France.</p>
        <p class="copyright">Tous droits réservés. Conditions générales. Réseau de franchise immobilière. Chaque agence est financièrement et juridiquement indépendante.</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>