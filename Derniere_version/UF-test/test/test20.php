<?php
if(!empty($_POST)){
if(empty($_POST['mot1']) && empty($_POST['mot2']) && empty($_POST['mot3'])){
echo 'Veuillez au moins remplir un champ de recherche<br /><br />
<a href="javascript:history.go(-1);">Retour au formulaire</a>';
}
else
{
    $req = "select leschamps from latable where";
    $req.=(!empty($_POST['mot1'])) ? " champ1='".$_POST['mot1']."' AND":"";
    $req.=(!empty($_POST['mot2'])) ? " champ2='".$_POST['mot2']."' AND":"";
    $req.=(!empty($_POST['mot3'])) ? " champ3='".$_POST['mot3']."' AND":"";
    $req= rtrim($req,' AND');
   
$req.=" order by bidule asc";
echo $req;
}
}
else
{
echo '<form method="post" action="test20.php">
Mot 1 :<input type="text" name="mot1" size="25"><br /><br />
Mot 2 :<input type="text" name="mot2" size="25"><br /><br />
Mot 3 :<input type="text" name="mot3" size="25"><br /><br />
<input type="submit" value="valider">
</form>';
}
?>