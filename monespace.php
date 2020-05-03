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
    <div  id="conteneurEspace">
        <div class="membreTitre">
            <span>Mon Espace</span>
        </div>
        <div class="conteneurMenuInfo">
            <nav class="conteneurMenuGauche">
                <ul>
                    <li><a href="#">Informations Personnelles</a></li>
                    <li><a href="#">Agence</a></li>
                    <li><a href="#" class="selectionMenu">Changer les identifiants</a></li>
                    <li><a href="#">Favoris</a></li>
                </ul>
            </nav>
            <div class="superConteurInfoDroit">
                <div class="conteneurInfoDroit">
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
                <div class="conteneurInfoDroit">
                    <form action="" method="post">
                        <fieldset>
                            <legend>Agence de référence</legend>
                            <div class="choixAgenceInfo">
                                <span class="choixTypeBien modifAgence">
                                    <select id="agenceListe" class="choixTypeBienSelection selectAgenceEspace">
                                        <option selected>Agence Marseille</option>
                                        <option>Agence Lyon</option>
                                        <option>Agence Paris</option>
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
                <div class="conteneurInfoDroit">
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
            </div>
        </div>
    </div>
    <footer id="foot">
        <div class="introFooter">
            <p class="titreFooter">La confiance d'un groupe d'agences immobilières innovantes</p>
            <p class="crééPar">Créé par Clara Vesval et Alan Philipiert</p>
        </div>
        <img class="finLogoC" alt="Logo de fin" src="img/logo.png">
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
