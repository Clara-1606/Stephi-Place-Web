<?php
session_start();
try{
    $cnx = new PDO('mysql:host=localhost;dbname=UF;port=3307', 'root','');
}
catch(PDOException $e){
    print($e->getMessage()."\n");
    exit;
}
$mail=$_SESSION['email'];
$newmail=$_POST['emailChange'];
$mdp=$_POST['mdp'];

$change="UPDATE membre SET mail='$newmail', mot_de_passe='$mdp' WHERE mail='$mail'";
$sts=$cnx->prepare($change);
$sts->execute();
header('Refresh: 5; URL=monespace.php');

?>

<div class='redirection'>
        <div class='conteneurRedirect'>
                    <span>Vos identifiants ont bien été mis à jour !</span> 
                    <div>
                        <span>Vous allez être redirigé vers l'accueil dans </span>
                        <span id="countdown"></span>
                    <div>
                    <a id="accueilStephi" href="index.php">StephiPlace</a>
        </div>
        </div>

<script>
var seconds = 5, $seconds = document.querySelector('#countdown');
(function countdown() {
    $seconds.textContent = seconds + ' seconds';
    if(seconds --> 0) setTimeout(countdown, 1000)
})();
</script>