<?php
//*******************************************************************************************************
// dieses Script oist in der Lage eine beliebige Tabelle mit allen Attributen als HTML-Tabelle anzuzeigen 
// 25.11.2018 
//*******************************************************************************************************

// Verbindung zur Datenbank aufbauen 
 include("v-dbconnect.php");
// Tabellenstruktur ermitteln
 
// $ergebnis = mysqli_query($db,"Describe Kontakte"); 

$tabelle = 'Mitglieder';


$ergebnis = mysqli_query($db,"Describe ".$tabelle."");

 
// 
$SQLstring = "Select ";
echo "<table>";
$attribute = array();

  
 while ($row = mysqli_fetch_object($ergebnis))
 {
 
  

         $attribute[] =$row->Field;
         $SQLstring="$SQLstring".$row->Field.',';
 }

// das letzte Komma muss wieder entfernt werden 

$SQLstring = rtrim($SQLstring,',');


$SQLstring="$SQLstring"." from ".$tabelle.";";

$counts = 0;

$counts = array_count_values($attribute); 

for ($i = 1;
     $i <= count($attribute); 
     $i++) {
}

$ergebnis1 = mysqli_query($db,$SQLstring);

if ($ergebnis1->num_rows > 0) {
    echo "<table><tr>"; }


for ($i = 1;
     $i <= count($attribute);
     $i++) {

    echo "<th>".$attribute[$i]."</th>";

}

 echo "</tr>";


    // output data of each row
    while($row = $ergebnis1->fetch_assoc())
    {
        echo "<tr>";


        for ($i = 1;
             $i <= count($attribute);
             $i++) 
             {
 //            echo $i;
             echo " <td>".$row["$attribute[$i]"]."</td>";
             }
     } 

?>
