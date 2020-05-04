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
        <div id="connexionFenetre" class="fenetre">
            <div class="connexionFenetreContenu">
                <span class="fermer">&times;</span>
                <div class="connexionFenetreContenuSuite">
                    <div class="bienvenueConteneur">
                        <p class="bienvenue">Bienvenue !</p>
                        <p class="bienvenueTexte">Merci de vous connecter pour accéder à toutes nos fonctionnalités.</p>
                    </div>
                    <form action="">
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
    <div class="imageIntro">
    </div>
    <div id="conteneurTout">
        <div id="conteneurRecherche">
            <form action="indexphp" method="post" id="formulaireRecherche">
                <div class="agence">
                    <label for="agenceListe">Choix de l'agence</label>
                    <span class="choixTypeBien">
                        <select id="agenceListe" class="choixTypeBienSelection">
                            <option selected>Agence Marseille</option>
                            <option>Agence Lyon</option>
                            <option>Agence Paris</option>
                        </select>
                    </span>
                </div>
                <div class="conteneurLocalisationTypeBien">
                    <div class="typeBien">
                        <input type="checkbox" id="maison" name="maison" class="box">
                        <label for="maison" class="maison">Maison</label>
                        <input type="checkbox" id="appartement" name="appartement" class="box">
                        <label for="appartement">Appartement</label>
                    </div>
                    <div class="conteneurLocalisation">
                        <label for="localisation">Localisation</label>
                        <span class="localisationSaisie">
                            <span><i class="fa fa-map-marker"></i></span>
                            <input type="text" id="localisation" name="localisation">
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
                        <input type ="number" class="crit critMin" placeholder="Min (m2)">
                        <input type ="number" class="crit critMax" placeholder="Max (m2)">
                    </div>
                    <div class="conteneurCriteres conteneurPiece">
                        <span class="boutonPiece">Pièces</span>
                        <i class="boutonPiece material-icons">keyboard_arrow_down</i>
                    </div>
                    <div class="criteres criterePiece">
                        <span>Nombre de pièces</span>
                        <input type ="number" class="crit critMin" placeholder="">
                    </div>
                    <div class="conteneurCriteres conteneurPrix">
                        <span class="boutonPrix">Prix</span>
                        <i class=" boutonPrix material-icons">keyboard_arrow_down</i>
                    </div>
                    <div class="criteres criterePrix">
                        <span>Prix</span>
                        <input type ="number" class="crit critMin" placeholder="Min">
                        <input type ="number" class="crit critMax" placeholder="Max">
                    </div>
                    <div class="conteneurCriteres conteneurAutres">
                        <span>Autres critères</span>
                        <i class="material-icons">keyboard_arrow_down</i>
                    </div>
                </div>
                <div id="conteneurEnvoieRecherche">
                    <i class='fas fa-search'></i>
                    <input class="envoieRecherche" type="submit" value="Rechercher">
                </div>
            </form>
        </div>
        <div id="conteneurBienTout">
<?php   
try{
    $cnx = new PDO('mysql:host=localhost;dbname=UF;port=3307', 'root','');
}
catch(PDOException $e){
    print($e->getMessage()."\n");
    exit;
}

$bienTout="SELECT b.id_bien, b.superficie, b.prix_vente, b.nb_piece, b.descriptif, tb.libelle, ad.adresse, ad.code_postal, ad.ville, premiere_image, date_ajout
FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
) AS m
INNER JOIN biens AS b ON b.id_bien=m.id_bien
INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
ORDER BY date_ajout DESC";
$stmt=$cnx->prepare($bienTout);
$stmt->execute();

$x=1;
while($line=$stmt->fetch(PDO::FETCH_ASSOC))
{
    echo '
    <div class="conteneurBien">
        <div class="imageBien">
            <img src='.$line['premiere_image'].' alt="image bien">
        </div>
        <div class="texteBien">
            <span class="titreBien">'.$line['libelle'].'</span>
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