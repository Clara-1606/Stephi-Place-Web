
<form method="post" action="test22.php">
    <div class="typeBien">
        <input type="checkbox" id="maison" class="box" name="choix[]" value="1">
        <label for="maison" class="maison">Villa</label>
        <input type="checkbox" id="appartement" class="box" name="choix[]" value="2">
        <label for="appartement">Appartement</label>
        <input type=submit>
    </div>
</form>
<?php
$choix=$_POST['choix'];
if(!empty($choix)){
    echo $choix[0];
}


?>