<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM Mitglieder ORDER BY Nachname,Vorname ASC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Neue Daten erfassen</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Vorname</td>
  		<td>Nachname</td>
	        <td>Strasse</td>
                <td>Postleitzahl</td>
                <td>Ort</td> 
               
		<td>Aktion</td>
	</tr>

</html>
<?php 

        while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['Vorname']."</td>";
                echo "<td>".$row['Nachname']."</td>";
                echo "<td>".$row['Strasse']."</td>";
                echo "<td>".$row['Postleitzahl']."</td>";
                echo "<td>".$row['Ort']."</td>";
       //         echo "<img title="Bearbeiten" class="icon ic_b_edit" alt="Bearbeiten" src="themes/dot.gif">";                 
		echo "<td><a href=\"edit.php?ID=$row[ID]\">Ändern</a> | <a href=\"delete.php?ID=$row[ID]\" onClick=\"return confirm('Wollen Sie löschen ?')\">Löschen</a></td>";
	}
?>	
	</table>
</body>
</html>

