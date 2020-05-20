<?php

include_once('utile.php'); 

if(isset($_POST))
{

    $pr=$_POST['prenom'];
    $nom=$_POST['nom'];
    $mail=$_POST['email'];
    $mdpn=$_POST['mdp1'];
    $mdp=password_hash($mdpn, PASSWORD_DEFAULT);
    $dn=$_POST['naissance'];
    $tel=$_POST['telephone'];
    $ad=$_POST['adresse'];
    $ville=$_POST['ville'];
    $comp=$_POST['compAdresse'];
    $cp=$_POST['cp'];
    $tm=$_POST['typeMembre'];
    $agence=$_POST['agenceListe'];
    $agent=rand(1,50);


    //ID TYPE MEMBRE
    $idMem="SELECT id_type_membre FROM type_membre WHERE libelle='$tm'";
    $stmt5=$cnx->prepare($idMem);
    $stmt5->execute();
    $line1=$stmt5->fetch(PDO::FETCH_ASSOC); 
    print_r($line1);
    $typeM=$line1['id_type_membre'];
    echo $typeM;

    //AJOUT DE L'ADRESSE
    $ajAd="INSERT INTO adresse (adresse,complement_adresse,ville,code_postal) VALUES (?,?,?,?)";
    $stmt4=$cnx->prepare($ajAd);
    $stmt4->execute([$ad,$comp,$ville,$cp]);

    //ID ADRESSE
    $selIdAd="SELECT MAX(id_adresse) AS maxAd FROM adresse";
    $stmt8=$cnx->prepare($selIdAd);
    $stmt8->execute([$selIdAd]);
    $line=$stmt8->fetch(PDO::FETCH_ASSOC);
    $maxA=$line['maxAd'];

    $ins="INSERT INTO membre (prenom, nom, mail, mot_de_passe, date_naissance, numero_telephone, id_adresse, id_type_membre, id_agent, id_agence) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $statins=$cnx->prepare($ins);
    $statins->execute([$pr,$nom,$mail,$mdp,$dn,$tel,$maxA,$typeM,$agent,$agence]);
    //echo $pr.$nom.$mail.$mdp.$dn.$tel.$ad.$typeM.$agent.$agence;
    header('Refresh: 5; URL=index.php');

}

?>

<div class='redirection'>
        <div class='conteneurRedirect'>
                    <span>Félicitation ! Vous êtes désormais un membre de la StephiPlace !</span> 
                    <div>
                        <span>Vous allez être redirigé vers l'accueil dans </span>
                        <span id="compteARebours"></span>
                    <div>
                    <a id="accueilStephi" href="index.php">StephiPlace</a>
        </div>
        </div>

<script>
var seconde = 5, $seconde = document.querySelector('#compteARebours');
(function compteARebours() {
    $seconde.textContent = seconde + ' secondes';
    if(seconde --> 0) setTimeout(compteARebours, 1000)
})();
</script>