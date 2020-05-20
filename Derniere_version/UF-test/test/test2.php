
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
    <div id="inscriptionPage" class="inscriptionConteneur">
        <div class="inscriptionFenetreContenu">
            <div class="inscriptionFenetreContenuSuite">
                <div class="bienvenueConteneur">
                    <p class="bienvenue">Inscription</p>
                    <p class="bienvenueTexte">Merci de compléter tous les champs ci-dessous pour vous inscrire.</p>
                </div>
                <form action="test2.php" method="post">
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
                        <label for="naissance">Date de naissance</label>
                        <input type="date" id="naissance" name="naissance">
                    </div>
                    <div class="champConteneur">
                        <label for="telephone">Téléphone</label>
                        <input type="text" id="telephone" name="telephone">
                    </div>
                    <a class="okConnexion" href="#"><input class="envoiConnexion" type="submit" value="S&apos;inscrire"></a>
                    <div>
                        <a class="creerCompte" href="index.php">Vous avez déjà un compte ? Connectez-vous !</a>
                    </div>
                </form>
            </div>
        </div>     
      </div>

      <?php

try{
    $cnx = new PDO('mysql:host=localhost;dbname=UF;port=3307', 'root','');
}
catch(PDOException $e){
    print($e->getMessage()."\n");
    exit;
}

if(isset($_POST)){

    $pr=$_POST['prenom'];
    $nom=$_POST['nom'];
    $mail=$_POST['email'];
    $dn=$_POST['naissance'];
    $tel=$_POST['telephone'];
    $ins="INSERT INTO membre (prenom, nom, mail, date_naissance, numero_telephone) VALUES ('$pr','$nom','$mail','$dn','$tel')";
    $stmt1=$cnx->prepare($ins);
    $stmt1->execute();
}

?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>