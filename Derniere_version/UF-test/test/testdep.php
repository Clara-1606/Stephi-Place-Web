<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Alan Philipiert">
    <meta name="description" content="Organisez votre voyage au Japon !">
    <meta name="keywords" content="Voyage, Japon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stephi Place</title>
    <link rel="icon" type="image/png" href="img/tori-icone.png">
    <link rel="stylesheet" href="main.css">
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
    <script src="main.js"></script>
</head>
<body>
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
            <form action="" method="post">
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
                                <input type="number" id="etageDepot" name="etageDepot">
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
                                    <select id="agenceListe" class="choixTypeBienSelection">
                                        <option selected>Agence Marseille</option>
                                        <option>Agence Lyon</option>
                                        <option>Agence Paris</option>
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
                                <span class="titreAgenceDepot">Dépendances</span>
                                <span class="choixTypeBien">
                                    <select id="agenceListe" class="choixTypeBienSelection">
                                        <optgroup label="Dépendances">
                                            <option>Garage</option>
                                            <option>Grenier</option>
                                            <option>Cave</option>
                                            <option>Terasse</option>
                                            <option>Veranda</option>
                                        </optgroup>
                                    </select>
                                </span>
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
    <script src="main.js"></script>
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

if(isset($_POST['etageDepot']) && isset($_POST['pieceDepot']) && isset($_POST['chambreDepot']) && isset($_POST['superficieDepot']) && isset($_POST['adresseDepot']) && isset($_POST['complAdresseDepot']) && isset($_POST['villeDepot']) && isset($_POST['codePostalDepot']) && isset($_POST['description']) && isset($_POST['prixVenteDepot']) && isset($_POST['prixMinDepot']) && isset($_POST['prixMaxDepot']))
        {
            $etage=$_POST['etageDepot'];
            $piece=$_POST['pieceDepot'];
            $ch=$_POST['chambreDepot'];
            $sup=$_POST['superficieDepot'];
            $ad=$_POST['adresseDepot'];
            $cad=$_POST['complAdresseDepot'];
            $ville=$_POST['villeDepot'];
            $cp=$_POST['codePostalDepot'];
            $des=$_POST['description'];
            $pVente=$_POST['prixVenteDepot'];
            $pMin=$_POST['prixMinDepot'];
            $pMax=$_POST['prixMaxDepot'];
            $dateAjout=date('Y-m-d');
            $aj = "INSERT INTO biens (superficie,prix_min, prix_max, prix_vente, nb_piece, nb_chambre, date_ajout, descriptif, etage, id_statut) VALUES ($sup, $pMin, $pMax, $pVente, $piece, $ch, $dateAjout, $des, $etage,'1)";
            $stmt=$cnx->prepare($aj);
            $stmt->execute();
        }
?>