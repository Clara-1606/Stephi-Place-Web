<?php

if (isset($_POST['email'])) {

        try{
            $cnx = new PDO('mysql:host=localhost;dbname=UF;port=3307', 'root','');
        }
        catch(PDOException $e){
            print($e->getMessage()."\n");
            exit;
        }
        $mdp=$_POST['mdp'];
        $mail=$_POST['email'];
        $a="SELECT mail, prenom, nom FROM membre WHERE mail='$mail'";
        $b=$cnx->prepare($a);
        $b->execute();
        $line=$b->fetch(PDO::FETCH_ASSOC);

        if($line==0){
            echo '<body onLoad="alert(\'Utilisateur introuvable\')">';

            echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        } else {
            $testmdp="SELECT mot_de_passe FROM membre WHERE mail='$mail'";
            $statmdp=$cnx->prepare($testmdp);
            $statmdp->execute();
            $linemdp=$statmdp->fetch(PDO::FETCH_ASSOC);


            if(password_verify($mdp, $linemdp['mot_de_passe']))
            {
                session_start ();
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['mdp'] = $_POST['mdp'];
                header ('location: index.php');
            }
            else
            {
                echo '<body onLoad="alert(\'Mot de passe incorrect\')">';
    
                echo '<meta http-equiv="refresh" content="0;URL=index.php">';	
            }
        }
        

} else {
    echo '<body onLoad="alert(\'Aucun utilisateur saisi\')">';

    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}
