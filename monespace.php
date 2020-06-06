
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
    <?php
    include_once('utile.php'); 
    $vMail=$_SESSION['email'];

    $selectAgence="SELECT id_agence, nom_agence FROM agence";
    $stmt1=$cnx->prepare($selectAgence);
    $stmt1->execute();

    $select="SELECT * FROM membre AS m
    INNER JOIN adresse AS a ON m.id_adresse=a.id_adresse
    WHERE m.mail='$vMail'";
    $sts=$cnx->prepare($select);
    $sts->execute();
    $line1=$sts->fetch(PDO::FETCH_ASSOC);

    $select="SELECT * FROM membre AS m
    INNER JOIN agent_immobilier AS a ON m.id_agent=a.id_agent
    WHERE m.mail='$vMail'";
    $sts=$cnx->prepare($select);
    $sts->execute();
    $line=$sts->fetch(PDO::FETCH_ASSOC);

    $selTypeM="SELECT id_type_membre FROM membre
    WHERE mail='$vMail'";
    $sts4=$cnx->prepare($selTypeM);
    $sts4->execute();
    $line4=$sts4->fetch(PDO::FETCH_ASSOC);

    $selAgent="SELECT mail FROM agent_immobilier
    WHERE mail='$vMail'";
    $sts5=$cnx->prepare($selAgent);
    $sts5->execute();
    $line5=$sts5->fetch(PDO::FETCH_ASSOC);

    ?>
    <div id="enTete">
        <div id="enTeteGauche">
            <a id="accueilStephi" href="index.php">StephiPlace</a>
            <div class="depotAnnonce">
            <?php
            if (isset($_SESSION['email'])&& isset($_SESSION['mdp'])) 
            {
                if($line4['id_type_membre']==2 || $line4['id_type_membre']==3)
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
        echo '<li><a class="connexionBouton" href="#"><i class="material-icons">person</i>Connexion</a></li>';
    }      
    ?>
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
                    <?php
                        if($line4['id_type_membre']==1 || $line4['id_type_membre']==3)
                        {
                            echo '<li class="boutonFav"><a href="#">Favoris</a></li>';
                        } else {};
                        ?>
                    <?php
                        if($line4['id_type_membre']==2 || $line4['id_type_membre']==3)
                        {
                            echo '<li class="boutonVend"><a href="#">Espace Vendeur</a></li>';
                        } else {};
                    ?>
                    <?php
                        if($line5==0)
                        {
                        } else {
                            echo '<li class="boutonVend"><a href="espace-agent.php">Espace Agent</a></li>';
                        };
                    ?>
                </ul>
            </nav>
            <div class="superConteurInfoDroit">
                <div class="conteneurInfoDroit conteneurId">
                    <form action="changelog.php" method="post">
                        <fieldset>
                            <legend>Email</legend>
                            <div class="champInfo">
                                <label for="emailChange">E-mail</label>
                                <input type="email" id="emailChange" name="emailChange" value="<?php $verif=$_SESSION['email'];echo $verif;?>">
                            </div>
                            <input class="infoValide" type="submit" value="Modifier e-mail">
                        </fieldset>
                        <fieldset>
                            <legend>Mot de passe</legend>
                            <div class="champInfo">
                                <label for="mdp">Mot de passe</label>
                                <input type="password" id="mdp" name="mdp">
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
                                <input type="text" disabled="disabled" id="agentImmo" name="agentImmo" value="<?php echo $line['nom'];?>">
                            </div>
                        </fieldset>               
                    </form>
                </div>
                <div class="conteneurInfoDroit conteneurInfoP">
                    <form action="info-perso.php" method="post">
                        <fieldset>
                            <legend>Informations Personnelles</legend>
                            <div class="champInfo">
                                <label for="nom">Nom</label>
                                <input required type="text" id="nom" name="nom" value="<?php echo $line1['nom'];?>">
                            </div>
                            <div class="champInfo">
                                <label for="prenom">Prénom</label>
                                <input required type="text" id="prenom" name="prenom" value="<?php echo $line1['prenom'];?>">
                            </div>
                            <div class="champInfo">
                                <label for="naissance">Date de naissance</label>
                                <input required type="date" id="naissance" name="naissance" value="<?php echo $line1['date_naissance'];?>">
                            </div>
                            <div class="champInfo">
                                <label for="adresse">Adresse</label>
                                <input required type="text" id="adresse" name="adresse" value="<?php echo $line1['adresse'];?>">
                            </div>
                            <div class="champInfo">
                                <label for="adresse">Complément d'adresse</label>
                                <input type="text" id="compladresse" name="compladresse" value="<?php echo $line1['complement_adresse'];?>">
                            </div>
                            <div class="champInfo">
                                <label for="adresse">Code Postal</label>
                                <input required type="text" id="codePostal" name="codePostal" value="<?php echo $line1['code_postal'];?>">
                            </div>
                            <div class="champInfo">
                                <label for="adresse">Ville</label>
                                <input required type="text" id="ville" name="ville" value="<?php echo $line1['ville'];?>">
                            </div>
                            <div class="champInfo">
                                <label for="telephone">Numéro de téléphone</label>
                                <input required type="text" id="telephone" name="telephone" value="<?php echo $line1['numero_telephone'];?>">
                            </div>
                            <div class="typeMembre">
                                <input checked="checked" type="radio" id="acheteur" name="typeMembre" value="Acheteur" class="box">
                                <label for="acheteur">Acheteur</label>
                                <input type="radio" id="vendeur" name="typeMembre" value="Vendeur" class="box">
                                <label for="vendeur">Vendeur</label>
                                <input type="radio" id="acheteurVendeur" name="typeMembre" value="Acheteur/Vendeur" class="box">
                                <label for="acheteurVendeur">Acheteur/Vendeur</label>
                            </div>
                            <div>
                            <span>Merci de renseigner votre type de compte à chaque envoie si vous voulez modifier vos données</span>
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

                            $mail=$_SESSION['email'];

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
                            WHERE mb.mail=:mail
                            ORDER BY date_ajout DESC";
                            $stmt=$cnx->prepare($bienTout);
                            $stmt->execute(["mail"=>$mail]);
                            
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
                                    <a class="poubelle" href="supprimer-favoris.php?id='.$idBien.'">
                                        <i class="poubelle fas fa-trash-alt"></i>
                                        <span class="textPoubelle">Supprimer</span>
                                    </a>
                                </div>
                                <div class="margeFav"></div>';
                            }
                            ?>
                        </fieldset>               
                    </form>
                </div>
                <div class="conteneurInfoDroit conteneurVend">
                    <form action="" method="post">
                        <fieldset>
                            <legend>Espace Vendeur</legend>
                            <?php
                            try{
                                $cnx = new PDO('mysql:host=localhost;dbname=UF;port=3307', 'root','');
                            }
                            catch(PDOException $e){
                                print($e->getMessage()."\n");
                                exit;
                            }

                            $mail=$_SESSION['email'];

                            $reqMb="SELECT * FROM membre WHERE mail='$mail'";
                            $stmt14=$cnx->prepare($reqMb);
                            $stmt14->execute();
                            $line14=$stmt14->fetch(PDO::FETCH_ASSOC);
                            $idMb=$line14['id_membre'];

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
                            WHERE b.id_membre='$idMb'
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