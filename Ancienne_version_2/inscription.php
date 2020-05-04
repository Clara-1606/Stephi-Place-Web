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
    <div id="inscriptionPage" class="inscriptionConteneur">
        <div class="inscriptionFenetreContenu">
            <div class="inscriptionFenetreContenuSuite">
                <div class="bienvenueConteneur">
                    <p class="bienvenue">Inscription</p>
                    <p class="bienvenueTexte">Merci de compléter tous les champs ci-dessous pour vous inscrire.</p>
                </div>
                <form action="" method="post">
                    <div class="champConteneur">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom">
                    </div>
                    <div class="champConteneur">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom">
                    </div>
                    <div class="champConteneur">
                        <label for="email">E-mail</label>
                        <input type="text" id="email" name="email">
                    </div>
                    <div class="champConteneur">
                        <label for="mdp">Mot de passe</label>
                        <input type="text" id="mdp" name="mdp">
                    </div>
                    <div class="champConteneur">
                        <label for="mdp">Confirmez votre mot de passe</label>
                        <input type="text" id="mdp" name="mdp">
                    </div>
                    <div class="champConteneur">
                        <label for="naissance">Date de naissance</label>
                        <input type="date" id="naissance" name="naissance">
                    </div>
                    <div class="champConteneur">
                        <label for="telephone">Téléphone</label>
                        <input type="text" id="telephone" name="telephone">
                    </div>
                    <div class="champConteneur">
                        <label for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse">
                    </div>
                    <div class="champConteneur">
                        <span class="souhaitezVous">Souhaitez vous devenir acheteur, vendeur ou les deux?</span>
                        <div class="typeMembre">
                            <input type="checkbox" id="acheteur" name="acheteur" class="box">
                            <label for="acheteur" class="acheteur">Acheteur</label>
                            <input type="checkbox" id="vendeur" name="vendeur" class="box">
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
    <script src="main.js"></script>
</body>

</html>