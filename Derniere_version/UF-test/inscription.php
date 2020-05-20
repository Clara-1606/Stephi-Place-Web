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
$selectAgence="SELECT id_agence, nom_agence FROM agence";
$stmt1=$cnx->prepare($selectAgence);
$stmt1->execute();
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
        echo '<li><a class="connexionBouton" href="#"><i class="material-icons">person</i>Connexion</a></li>';
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
    </div>
    <div id="inscriptionPage" class="inscriptionConteneur">
        <div class="inscriptionFenetreContenu">
            <div class="inscriptionFenetreContenuSuite">
                <div class="bienvenueConteneur">
                    <p class="bienvenue">Inscription</p>
                    <p class="bienvenueTexte">Merci de compléter tous les champs ci-dessous pour vous inscrire.</p>
                </div>
                <form action="compte.php" method="post">
                    <div class="champConteneur">
                        <label for="prenom">Prénom</label>
                        <input required type="text" id="prenom" name="prenom">
                    </div>
                    <div class="champConteneur">
                        <label for="nom">Nom</label>
                        <input required type="text" id="nom" name="nom">
                    </div>
                    <div class="champConteneur">
                        <label for="email">E-mail</label>
                        <input required type="email" id="email" name="email">
                    </div>
                    <div class="champConteneur">
                        <label for="mdp">Mot de passe</label>
                        <input required type="password" id="mdp" name="mdp1">
                    </div>
                    <div class="champConteneur">
                        <label for="naissance">Date de naissance</label>
                        <input required type="date" id="naissance" name="naissance">
                    </div>
                    <div class="champConteneur">
                        <label for="telephone">Téléphone</label>
                        <input required type="tel" pattern="[0]{1}[0-9]{1}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" id="telephone" name="telephone">
                        <small>Format: 03-46-78-90-45</small>
                    </div>
                    <div class="champConteneur">
                        <label for="adresse">Adresse</label>
                        <input required type="text" id="adresse" name="adresse">
                    </div>
                    <div class="champConteneur">
                        <label for="compadresse">Complément d'adresse</label>
                        <input type="text" id="compAdresse" name="compAdresse">
                    </div>
                    <div class="champConteneur">
                        <label for="ville">Ville</label>
                        <input required type="text" id="ville" name="ville">
                    </div>
                    <div class="champConteneur">
                        <label for="cp">Code postal</label>
                        <input required type="text" id="cp" name="cp">
                    </div>
                    <div class="champDepot">
                                <span class="titreAgenceDepot">Agence de référence</span>
                                <span class="choixTypeBien">
                                    <select name="agenceListe" id="agenceListe" class="choixTypeBienSelection">
                                    <?php foreach ($stmt1 as $c) { ?>
                                        <option value="<?=$c['id_agence']?>"><?=$c['nom_agence']?></option>
                                            <?php } ?>
                                    </select>
                                </span>
                            </div>
                    <div class="champConteneur">
                        <span class="souhaitezVous">Souhaitez vous devenir acheteur, vendeur ou les deux?</span>
                        <div class="typeMembre">
                            <input checked="checked" type="checkbox" id="acheteur" name="typeMembre" class="box" value="Acheteur">
                            <label for="acheteur" class="acheteur">Acheteur</label>
                            <input type="checkbox" id="vendeur" name="typeMembre" class="box" value="Vendeur">
                            <label for="vendeur">Vendeur</label>
                        </div>
                    </div>
                    <a class="okConnexion" href="#"><input class="envoiConnexion" type="submit" value="S&apos;inscrire"></a>
                    <div>
                        <a class="creerCompte" href="index.php">Vous avez déjà un compte ? Connectez-vous !</a>
                    </div>
                </form>
            </div>
        </div>     
      </div>
    <footer id="foot">
        <div class="introFooter">
            <p class="titreFooter">La confiance d'un groupe d'agences immobilières innovantes</p>
            <p class="crééPar">Créé par Clara Vesval et Alan Philipiert</p>
        </div>
        <img class="finLogoB" alt="Logo de fin" src="img/logo.png">
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