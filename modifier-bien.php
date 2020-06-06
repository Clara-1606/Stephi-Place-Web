<?php session_start (); ?>
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
</head>
<body>
<?php try{
    $cnx = new PDO('mysql:host=localhost;dbname=UF;port=3307', 'root','');
}
catch(PDOException $e){
    print($e->getMessage()."\n");
    exit;
}

$monMail=$_SESSION['email'];
$idB=$_GET['id'];

$selectAgence="SELECT id_agence, nom_agence FROM agence";
$stmt1=$cnx->prepare($selectAgence);
$stmt1->execute();

$selectAgenceOblig="SELECT a.id_agence, nom_agence FROM agence as a
INNER JOIN membre as m ON m.id_agence=a.id_agence
WHERE mail='$monMail'";
$stmt3=$cnx->prepare($selectAgenceOblig);
$stmt3->execute();

$selectDependance="SELECT DISTINCT nom_dependance FROM dependance";
$stmt2=$cnx->prepare($selectDependance);
$stmt2->execute();

$selBien="SELECT * FROM biens WHERE id_bien='$idB'";
$stmt4=$cnx->prepare($selBien);
$stmt4->execute();
$line4=$stmt4->fetch(PDO::FETCH_ASSOC);

$selAd="SELECT * FROM adresse as a
INNER JOIN biens as b ON a.id_adresse=b.id_adresse
WHERE id_bien='$idB'";
$stmt5=$cnx->prepare($selAd);
$stmt5->execute();
$line5=$stmt5->fetch(PDO::FETCH_ASSOC);

$selDep="SELECT * FROM dependance WHERE id_bien='$idB'
GROUP BY id_bien";
$stmt6=$cnx->prepare($selDep);
$stmt6->execute();
$line6=$stmt6->fetch(PDO::FETCH_ASSOC);
?>
    <div id="enTete">
        <div id="enTeteGauche">
            <a id="accueilStephi" href="index.php">StephiPlace</a>
            <div class="depotAnnonce">
            <?php
            if (isset($_SESSION['email'])&& isset($_SESSION['mdp'])) 
            {
                echo'
                <a href="deposer.php"><i class="far fa-plus-square"></i><span>Déposer une annonce</span></a>';}
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
                            <input type="email" id="email" name="email" required>
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
    <div class="conteneurDeposerTout">
        <div class="membreTitre">
            <span>Modifier une annonce</span>
        </div>
        <div class="conteneurDeposer">
            <form action="modifier-bien-fonc.php?id=<?php echo $idB?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Type de biens</legend>
                    <div class="typeBien typeBienDepot">
                        <input checked="checked" type="radio" id="villa" name="maison" value="villa" class="box">
                        <label for="villa" class="maison">Maison</label>
                        <input type="radio" id="appartement" name="maison" value="appartement" class="box">
                        <label for="appartement">Appartement</label>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Informations Générales</legend>
                    <div class="conteneurChampDepot">
                        <div>
                            <div class="champDepot etageAppartement">
                                <label for="etageDepot">Etage pour Appartement</label>
                                <input type="number" id="etageDepot" name="etageDepot" value="<?php echo $line4['etage'];?>">
                            </div>     
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="pieceDepot">Nombre de pièces</label>
                                <input type="number" id="pieceDepot" name="pieceDepot" required value="<?php echo $line4['nb_piece'];?>">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="chambreDepot">Nombre de chambres</label>
                                <input type="number" id="chambreDepot" name="chambreDepot" required value="<?php echo $line4['nb_chambre'];?>">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="superficieDepot">Superficie</label>
                                <input type="number" id="superficieDepot" name="superficieDepot" required value="<?php echo $line4['superficie'];?>">
                            </div>
                        </div>  
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Adresse</legend>
                    <div class="conteneurChampDepot">
                        <div>
                            <div class="champDepot">
                                <label for="adresseDepot">Adresse</label>
                                <input type="text" id="adresseDepot" name="adresseDepot" required value="<?php echo $line5['adresse'];?>">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="complAdresseDepot">Complément d'adresse</label>
                                <input type="text" id="complAdresseDepot" name="complAdresseDepot" value="<?php echo $line5['complement_adresse'];?>">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="villeDepot">Ville</label>
                                <input type="text" id="villeDepot" name="villeDepot" required value="<?php echo $line5['ville'];?>">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="codePostalDepot">Code postal</label>
                                <input type="text" id="codePostalDepot" name="codePostalDepot" required value="<?php echo $line5['code_postal'];?>">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <span class="titreAgenceDepot">Agences</span>
                                <span class="choixTypeBien">
                                    <select name="agenceListe" id="agenceListe" class="choixTypeBienSelection">
                                    <?php foreach ($stmt3 as $c) { ?>
                                        <option value="<?=$c['id_agence']?>"><?=$c['nom_agence']?></option>
                                            <?php } ?>
                                    </select>
                                </span>
                                <span class="agenceMessage">Ceci est votre agence de référence, si vous voulez la modifier, rendez-vous sur votre espace</span>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Informations Supplémentaires</legend>
                    <div class="conteneurChampDepot">
                        <div>
                            <div class="champDepot">
                                <div class="conteneurDepAjout">
                                    <div class="conteneurAjoutPlus">
                                        <div class="conteneurDepInfo">
                                            <span class="titreAgenceDepot">Dépendances</span>
                                            <span class="choixTypeBien">
                                                <select name="dependanceListe" id="dependanceListe" class="choixTypeBienSelection">
                                                    <option selected="selected" value="<?php echo $line6['nom_dependance'];?>"><?php echo $line6['nom_dependance'];?></option>
                                                    <?php foreach ($stmt2 as $c) { ?>
                                                    <option value="<?=$c['nom_dependance']?>"><?=$c['nom_dependance']?></option>
                                                        <?php } ?>
                                                </select>
                                            </span>
                                        </div>
                                        <div class="conteneurDepInfo">
                                            <label for="superficieDepDepot">Superficie Dépendances</label>
                                            <input type="number" id="superficieDepDepot" name="superficieDepDepot" value="<?php echo $line6['superficie'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="conteneurAjoutDependance">
                                    <i class='ajoutDependance far fa-plus-square'></i><span>Ajouter une dépendance supplémentaire</span>
                                </div>
                                <div class="conteneurSupprimerDependance">
                                    <i class='supprimerDependance far fa-minus-square'></i><span>Retirer une dépendance</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="imageDepot">Photo</label>
                                <input type="file" accept="image/png, image/jpeg, image/jpg" id="imageDepot" name="imageDepot">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="description">Description</label>
                                <input type="textarea" id="description" name="description" required value="<?php echo $line4['descriptif'];?>">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Prix</legend>
                    <div class="conteneurChampDepot">
                        <div>
                            <div class="champDepot">
                                <label for="prixVenteDepot">Prix de Vente</label>
                                <input type="number" id="prixVenteDepot" name="prixVenteDepot" required value="<?php echo $line4['prix_vente'];?>">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="prixMinDepot">Prix Minimum</label>
                                <input type="number" id="prixMinDepot" name="prixMinDepot" required value="<?php echo $line4['prix_min'];?>">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="prixMaxDepot">Prix Maximum</label>
                                <input type="number" id="prixMaxDepot" name="prixMaxDepot" required value="<?php echo $line4['prix_max'];?>">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="conteneurEnvoieValiderAnnonce">
                    <input class="envoieValiderAnnonce" type="submit" value="Valider l'annonce">   
                </div>                
            </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>