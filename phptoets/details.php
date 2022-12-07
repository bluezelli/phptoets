<?php

try {

    $db = new PDO("mysql:host=localhost;dbname=autovoorraad", "root", "");
    $query = $db->prepare("SELECT * FROM autos");
    $query->execute();
    $resultaat = $query->fetchAll(PDO::FETCH_ASSOC);
    echo "<table>";
    echo "<h4>" . "autovoorraad" . "</h4>";
    foreach($resultaat as &$data) {
        $btw = 0;
        if($data['gewicht'] > 1500){
            $btw = 60;
        } else if($data['gewicht'] > 1000){
            $btw = 40;
        } else if($data['gewicht'] > 750) {
            $btw = 22;
        } else if($data['gewicht' > 500]){
            $btw = 18;
        } else {
            $btw = 0;
        }
      
        echo "<tr>";
        echo "<td>" . "gewicht" . "</td>";
        echo "<td>" . "belasting" . "</td>";
       
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $data['gewicht'] . "</td>";
        echo "<td>" . $btw . "</td>";
    
      
        echo "</tr>";

    }
    echo "</table>";


    echo "<br>";
    echo "<td>" . "<a href='delete.php?id=".$data['id']."'>" . "items verwijderen" . "</a>" . "</td>";
    
        echo "<br>";

        echo "<td>" . "<a href='update.php?id=".$data['id']."'>" . "items updaten" . "</a>" . "</td>";

        echo "<br>";

        echo "<td>" . "<a href='insert.php?id=".$data['id']."'>" . "items toevoegen" . "</a>" . "<td>";
  



}catch(PDOException $e){
    die("error: " . $e->getMessage());
}



?>