<?php

try {

    $db = new PDO("mysql:host=localhost;dbname=autovoorraad", "root", "");
    $query = $db->prepare("SELECT * FROM autos");
    $query->execute();
    $resultaat = $query->fetchAll(PDO::FETCH_ASSOC);
    echo "<table border>";
    foreach($resultaat as &$data) {
        echo "<tr>";
        echo "<td>" . "nummer" . "</td>";
        echo "<td>" . "model" . "</td>";
        echo "<td>" . "type" . "</td>";
        echo "<td>" . "prijs" . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $data['id'] . "</td>";
        echo "<td>" . $data['model'] . "</td>";
        echo "<td>" . $data['type'] . "</td>";
        echo "<td>" . $data['prijs'] . "</td>";
        echo "<td>" . "<a href='delete.php?id=".$data['id']."'>" . "delete" . "</a>" . "</td>";
        echo "<td>" . "<a href='update.php?id=".$data['id']."'>" . "update" . "</a>" . "</td>";
        echo "<td>" . "<a href='insert.php?id=".$data['id']."'>" . "insert" . "</a>" . "<td>";
        echo "<td>" . "<a href='details.php?id=".$data['id']."'>" . "wegenbelasting" . "</a>" . "<td>";
        echo "</tr>";

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

<style>
table{
    border: 1px solid;
}
</style>

<!-- <form method="POST">

<label>model </label>
<input type="text" name="model" value=""> <br>

<label> prijs </label>
<input type="number" name="prijs"> <br>

<label> type </label>
<input type="text" name="type" value="">
<br>
<input type="submit" name="verzenden" value="submit">




</form> -->
    
</body>
</html>