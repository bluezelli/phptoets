<?php
try {
 $db = new PDO("mysql:host=localhost;dbname=autovoorraad", "root", "");
if(isset($_POST['id'])){
    $query =$db-prepare("DELETE FROM AUTOS WHERE id = :id");
    $query->bindParam("id", $_GET['id']);
    if($query->execute()){
        echo "het item is verwijderd";
    } else {
        echo "er is een fout opgetreden";
    }
    echo "<br>";
}

}catch(PDOException $e){
    die("error: " . $e->getMessage());
}

$query = $db->prepare("SELECT * FROM autos");
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);
echo "<table>";
foreach($results as &$data){
    echo "<tr>";
 echo "<a href='delete.php?id=".$data['id']."'>";
 echo "<td>" . $data['type'] . "<td>";
 echo "<td>" . $data['prijs'] . "</td>";
 echo"<td>" . $data['model'] . "</td>";
 echo "<td>" . $data['id'] . "</td>";
 echo "</a>";
echo "</tr>";
}
echo "</table>";

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