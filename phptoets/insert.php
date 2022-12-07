<?php 
try {

$db = new PDO("mysql:host=localhost;dbname=autovoorraad", "root", "");
if(isset($_POST['verzenden'])){

    


if(!empty($_POST['model']) && !empty($_POST['type']) && !empty($_POST['kleur']) && !empty($_POST['gewicht']) && !empty($_POST['prijs']) && !empty($_POST['voorraad'])){
$model = filter_input(INPUT_POST, "model", FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);
$kleur = filter_input(INPUT_POST, "kleur", FILTER_SANITIZE_STRING);
$gewicht = filter_input(INPUT_POST, "gewicht", FILTER_SANITIZE_INT);
$prijs = filter_input(INPUT_POST, "prijs", FILTER_SANITIZE_INT);
$voorraad = filter_input(INPUT_POST, "voorraad", FILTER_SANITIZE_INT);
if($model===false && $type===false && $kleur===false && $gewicht===false && $prijs===false) {
    echo "je hebt niet de juiste karakters gebruikt";
} else {
    if($voorraad >=1 && $prijs >= 10000 ){
        echo "je kan doorgaan";
        $query = $db->prepare("INSERT INTO autos(model,type,kleur,gewicht,prijs,voorraad) VALUES(:model, :type, :kleur, :gewicht, :prijs, :voorraad)");
        $query->bindParam("model", $model);
        $query->bindParam("type" , $type);
        $query->bindParam("kleur" , $kleur);
        $query->bindParam("gewicht", $gewicht);
        $query->bindParam("prijs" , $prijs);
        $query->bindParam("voorraad", $voorraad);
        if($query->execute()){
            echo "de nieuwe gegevens zijn ingevult";
        } else {
            "echo er is iets fouts gegaan";
        }
    } else {
        echo "er is iets verkeerds gegaan bij de voorraad/ prijs";
    }
   
    
}
}



}



}catch(PDOException $e){
    die("error: " . $e->getMessage());
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form method="POST">

<label>model </label>
<input type="text" name="model" value=""> <br>

<label> prijs </label>
<input type="number" name="prijs"> <br>

<label> type </label>
<input type="text" name="type" value="">
<br>

<label> kleur </label>
<input type="text" name="kleur" value="">
<br>
<label> gewicht </label>
<input type="text" name="gewicht" value="">
<br>
<label> voorraad</label>
<input type="text" name="voorraad" value="">
<br>
<input type="submit" name="verzenden" value="submit">




</form>



</body>
</html>