
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
    <div id="enTete">
        <div id="enTeteGauche">
            <a id="accueilStephi" href="index.php">StephiPlace</a>
            <div class="depotAnnonce">
                <a href="deposer.php"><i class='far fa-plus-square'></i><span>Déposer une annonce</span></a>
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
    <div  id="conteneurEspace">
        <div class="membreTitre">
            <span>Mon Espace</span>
        </div>
        <div class="conteneurMenuInfo">
            <nav class="conteneurMenuGauche">
                <ul>
                    <li class="boutonInfo"><a href="#">Informations Personnelles</a></li>
                    <li class="boutonAgence"><a href="#">Agence</a></li>
                    <li class="boutonId"><a href="#">Changer les identifiants</a></li>
                    <li class="boutonFav"><a href="#">Favoris</a></li>
                </ul>
            </nav>
            <div class="superConteurInfoDroit">
                <div class="conteneurInfoDroit conteneurId">
                    <form action="" method="post">
                        <fieldset>
                            <legend>Email</legend>
                            <div class="champInfo">
                                <label for="email">E-mail</label>
                                <input type="text" id="email" name="email">
                            </div>
                            <input class="infoValide" type="submit" value="Modifier e-mail">
                        </fieldset>
                        <fieldset>
                            <legend>Mot de passe</legend>
                            <div class="champInfo">
                                <label for="mdp">Mot de passe</label>
                                <input type="text" id="mdp" name="mdp">
                            </div>
                            <div class="champInfo">
                                <label for="mdp">Confirmez votre mot de passe</label>
                                <input type="text" id="mdp" name="mdp">
                            </div>
                            <input class="infoValide" type="submit" value="Modifier le mot de passe">
                        </fieldset>               
                    </form>
                </div>
                <div class="conteneurInfoDroit conteneurAg">
                    <form action="" method="post">
                        <fieldset>
                            <legend>Agence de référence</legend>
                            <div class="choixAgenceInfo">
                                <span class="choixTypeBien modifAgence">
                                    <select id="agenceListe" class="choixTypeBienSelection selectAgenceEspace">
                                    <?php foreach ($stmt1 as $c) { ?>
                                    <option value="<?=$c['id_agence']?>"><?=$c['nom_agence']?></option>
                                            <?php } ?>
                                    </select>
                                </span>
                                <input class="infoValide modifAgenceValide" type="submit" value="Modifier l'agence">
                            </div>      
                        </fieldset>
                        <fieldset>
                            <legend>Agent immobilier de référence</legend>
                            <div class="champInfo">
                                <label for="agentImmo">Agent immobilier actuel</label>
                                <input type="text" id="agentImmo" name="agentImmo">
                            </div>
                        </fieldset>               
                    </form>
                </div>
                <div class="conteneurInfoDroit conteneurInfoP">
                    <form action="" method="post">
                        <fieldset>
                            <legend>Informations Personnelles</legend>
                            <div class="champInfo">
                                <label for="nom">Nom</label>
                                <input type="text" id="nom" name="nom">
                            </div>
                            <div class="champInfo">
                                <label for="prenom">Prénom</label>
                                <input type="text" id="prenom" name="prenom">
                            </div>
                            <div class="champInfo">
                                <label for="naissance">Date de naissance</label>
                                <input type="text" id="naissance" name="naissance">
                            </div>
                            <div class="champInfo">
                                <label for="adresse">Adresse</label>
                                <input type="text" id="adresse" name="adresse">
                            </div>
                            <div class="champInfo">
                                <label for="telephone">Numéro de téléphone</label>
                                <input type="text" id="telephone" name="telephone">
                            </div>
                            <input class="infoValide" type="submit" value="Valider les modifications">
                        </fieldset>               
                    </form>
                </div>
                <div class="conteneurInfoDroit conteneurFav">
                    <form action="" method="post">
                        <fieldset>
                            <legend>Favoris</legend>
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
                            
                            $bienTout="SELECT b.id_bien, b.superficie, b.prix_vente, b.nb_piece, b.descriptif, tb.libelle, ad.adresse, ad.code_postal, ad.ville, premiere_image, date_ajout, f.id_favoris, mb.prenom
                            FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
                            ) AS m
                            INNER JOIN biens AS b ON b.id_bien=m.id_bien
                            INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
                            INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
                            INNER JOIN favoris AS f ON b.id_bien=f.id_bien
                            INNER JOIN membre AS mb ON f.id_membre=mb.id_membre
                            WHERE mb.prenom='Livia'
                            ORDER BY date_ajout DESC";
                            $stmt=$cnx->prepare($bienTout);
                            $stmt->execute();
                            
                            $x=1;
                            while($line=$stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                echo '
                                <div class="conteneurFavoris">
                                    <div class="imageFavoris">
                                        <img src='.$line['premiere_image'].' alt="image bien">
                                    </div>
                                    <div class="texteFavoris">
                                        <span class="titreFavoris">'.$line['libelle'].' '.$line['nb_piece'].' pièces de '.intval($line['superficie']).'m2</span>
                                        <span class="description">'.$line['descriptif'].'</span>
                                        <div class="infoFavoris">
                                            <span class="localisationInfo">Localisation :</span>
                                            <span class="localisationFavoris">'.$line['adresse'].', '.$line['code_postal'].' '.$line['ville'].'</span>
                                        </div>
                                        <div class="infoFavoris">
                                            <span class="prixInfo">Prix :</span>
                                            <span class="prixFavoris">'.intval($line['prix_vente']).' &euro;</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="survolImage"><i class="consulter fab fa-algolia"></i><i class="poubelle fas fa-trash-alt"></i></div>';
                            }
                            ?>
                        </fieldset>               
                    </form>
                </div>
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