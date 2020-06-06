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
    <div  id="conteneurEspace">
        <div class="conteneurInfoDroitAgent conteneurVend">
            <form action="deposer-agent.php" method="post">
                <fieldset>
                    <legend>Espace Agent</legend>
                    <?php
                    try{
                        $cnx = new PDO('mysql:host=localhost;dbname=UF;port=3307', 'root','');
                    }
                    catch(PDOException $e){
                        print($e->getMessage()."\n");
                        exit;
                    }

                    $mail=$_SESSION['email'];

                    $reqMb="SELECT * FROM agent_immobilier WHERE mail='$mail'";
                    $stmt14=$cnx->prepare($reqMb);
                    $stmt14->execute();
                    $line14=$stmt14->fetch(PDO::FETCH_ASSOC);
                    $idAg=$line14['id_agent'];

                    $selectAgence="SELECT id_agence, nom_agence FROM agence";
                    $stmt1=$cnx->prepare($selectAgence);
                    $stmt1->execute();
                    
                    $bienTout="SELECT b.id_bien, b.superficie, b.prix_vente, b.nb_piece, b.descriptif, tb.libelle, ad.adresse, ad.code_postal, ad.ville, premiere_image, date_ajout, mb.prenom
                    FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
                    ) AS m
                    INNER JOIN biens AS b ON b.id_bien=m.id_bien
                    INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
                    INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
                    INNER JOIN agence as a ON a.id_agence=b.id_agence
                    INNER JOIN agent_immobilier as ag ON a.id_agence=ag.id_agence
                    INNER JOIN membre as mb ON ag.id_agence=mb.id_agence
                    WHERE ag.id_agent='$idAg'
                    GROUP BY b.id_bien
                    ORDER BY date_ajout DESC";
                    $stmt=$cnx->prepare($bienTout);
                    $stmt->execute();
                    
                    $x=1;
                    while($line=$stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $idBien=$line['id_bien'];
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
                        <div class="survolImage">
                            <a class="consulter" href="bien.php?id='.$idBien.'">
                                <i class="consulter fab fa-algolia"></i>
                                <span class="textConsulter">Consulter</span>
                            </a>
                            <a class="modifierBien" href="modifier-bien.php?id='.$idBien.'">
                                <i class="modifierBien fas fa-pen-fancy"></i>
                                <span class="textModifierBien">Modifier</span>
                            </a>
                            <a class="poubelle" href="supprimer-biens.php?id='.$idBien.'">
                                <i class="poubelle fas fa-trash-alt"></i>
                                <span class="textPoubelle">Supprimer</span>
                            </a>
                        </div>
                        <div class="margeFav"></div>';
                    }
                    ?>
                </fieldset>
                <input class="ajoutBienAgent" type="submit" value="Ajouter un bien">             
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
            <div class="margeApp">
                <img src="img/logo2.png" alt="logo stephi">
            </div>
            <span>Notre application</span>
            <a class="buttonApplication" href="Tutoriel VPN Pfsense IPsec.pdf" download="Tutoriel VPN Pfsense IPsec.pdf">
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