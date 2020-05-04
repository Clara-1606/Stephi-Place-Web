

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

$selectAgence="SELECT id_agence, nom_agence FROM agence";
$stmt1=$cnx->prepare($selectAgence);
$stmt1->execute();

$selectDependance="SELECT DISTINCT nom_dependance FROM dependance";
$stmt2=$cnx->prepare($selectDependance);
$stmt2->execute();

?>
    <div id="enTete">
        <div id="enTeteGauche">
            <a id="accueilStephi" href="index.php">StephiPlace</a>
            <div class="depotAnnonce">
                <a href="#"><i class='far fa-plus-square'></i><span>Déposer une annonce</span></a>
            </div>
        </div>
        <div id="enTeteDroite">
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="#">Favoris</a></li>
                    <li><a id="connexionBouton" href="#"><i class="material-icons">person</i>Connexion</a></li>
                    <li class="monEspace"><a href="monespace.php"><i class="material-icons">person</i>Espace</a></li>
                    <li><a class="deconnexionBouton" href="#"><i class="material-icons">person</i>Déconnexion</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="conteneurDeposerTout">
        <div class="membreTitre">
            <span>Déposer une annonce</span>
        </div>
        <div class="conteneurDeposer">
            <form action="deposer.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Type de biens</legend>
                    <div class="typeBien typeBienDepot">
                        <input type="checkbox" id="maison" name="maison" class="box">
                        <label for="maison" class="maison">Maison</label>
                        <input type="checkbox" id="appartement" name="appartement" class="box">
                        <label for="appartement">Appartement</label>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Informations Générales</legend>
                    <div class="conteneurChampDepot">
                        <div>
                            <div class="champDepot etageAppartement">
                                <label for="etageDepot">Etage pour Appartement</label>
                                <input disabled="disabled" type="number" id="etageDepot" name="etageDepot">
                            </div>     
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="pieceDepot">Nombre de pièces</label>
                                <input type="number" id="pieceDepot" name="pieceDepot">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="chambreDepot">Nombre de chambres</label>
                                <input type="number" id="chambreDepot" name="chambreDepot">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="superficieDepot">Superficie</label>
                                <input type="number" id="superficieDepot" name="superficieDepot">
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
                                <input type="text" id="adresseDepot" name="adresseDepot">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="complAdresseDepot">Complément d'adresse</label>
                                <input type="text" id="complAdresseDepot" name="complAdresseDepot">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="villeDepot">Ville</label>
                                <input type="text" id="villeDepot" name="villeDepot">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="codePostalDepot">Code postal</label>
                                <input type="text" id="codePostalDepot" name="codePostalDepot">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <span class="titreAgenceDepot">Agences</span>
                                <span class="choixTypeBien">
                                    <select name="agenceListe" id="agenceListe" class="choixTypeBienSelection">
                                    <?php foreach ($stmt1 as $c) { ?>
                                        <option value="<?=$c['id_agence']?>"><?=$c['nom_agence']?></option>
                                            <?php } ?>
                                    </select>
                                </span>
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
                                                    <?php foreach ($stmt2 as $c) { ?>
                                                    <option value="<?=$c['nom_dependance']?>"><?=$c['nom_dependance']?></option>
                                                        <?php } ?>
                                                </select>
                                            </span>
                                        </div>
                                        <div class="conteneurDepInfo">
                                            <label for="superficieDepDepot">Superficie Dépendances</label>
                                            <input type="number" id="superficieDepDepot" name="superficieDepDepot">
                                        </div>
                                    </div>
                                </div>
                                <div class="conteneurAjoutDependance">
                                    <i class='ajoutDependance far fa-plus-square'></i><span>Ajouter une dépendance supplémentaire</span>
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
                                <input type="textarea" id="description" name="description">
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
                                <input type="number" id="prixVenteDepot" name="prixVenteDepot">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="prixMinDepot">Prix Minimum</label>
                                <input type="number" id="prixMinDepot" name="prixMinDepot">
                            </div>
                        </div>
                        <div>
                            <div class="champDepot">
                                <label for="prixMaxDepot">Prix Maximum</label>
                                <input type="number" id="prixMaxDepot" name="prixMaxDepot">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php

try{
    $cnx = new PDO('mysql:host=localhost;dbname=UF;port=3307', 'root','');
}
catch(PDOException $e){
    print($e->getMessage()."\n");
    exit;
}


if(isset($_POST['etageDepot']) && isset($_POST['pieceDepot']) && isset($_POST['chambreDepot']) && isset($_POST['superficieDepot']) && isset($_POST['adresseDepot']) && isset($_POST['complAdresseDepot']) && isset($_POST['villeDepot']) && isset($_POST['codePostalDepot']) && isset($_POST['description']) && isset($_POST['prixVenteDepot']) && isset($_POST['prixMinDepot']) && isset($_POST['prixMaxDepot']) && isset($_POST['dependanceListe']) && isset($_POST['superficieDepDepot']))
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
            $aj = "INSERT INTO biens (superficie,prix_min, prix_max, prix_vente, nb_piece, nb_chambre, date_ajout, descriptif, etage, id_statut) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt=$cnx->prepare($aj);
            $stmt->execute([$sup, $pMin, $pMax, $pVente, $piece, $ch, $dateAjout, $des, $etage,1]);

            $selIdBien="SELECT MAX(id_bien) AS maxBien FROM biens";
            $stmt3=$cnx->prepare($selIdBien);
            $stmt3->execute([$selIdBien]);
            while($line=$stmt3->fetch(PDO::FETCH_ASSOC))
            { 
                $maxB=$line['maxBien'];
            }

            $ajAd="INSERT INTO adresse (adresse, complement_adresse, code_postal, ville) VALUES (?,?,?,?)";
            $stmt4=$cnx->prepare($ajAd);
            $stmt4->execute([$ad, $cad, $cp, $ville]);

            $ajDep = "INSERT INTO dependance (nom_dependance, id_bien) VALUES (?,?)";
            $stmt5=$cnx->prepare($ajDep);
            $stmt5->execute([$dep, $maxB]);
        }/*
if ($_POST['imageDepot']){

    $uploaddir = '/img/biens/';
    $uploadfile = $uploaddir . basename($_FILES['imageDepot']['name']);

    echo '<pre>';
    if (move_uploaded_file($_FILES['imageDepot']['tmp_name'], $uploadfile)) {
    echo "Le fichier est valide, et a été téléchargé
            avec succès. Voici plus d'informations :\n";
    } else {
    echo "Attaque potentielle par téléchargement de fichiers.
            Voici plus d'informations :\n";
    }

    echo 'Voici quelques informations de débogage :';
    print_r($_FILES);

    echo '</pre>';

    $filename='';
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
        }
    }
}*/



?>