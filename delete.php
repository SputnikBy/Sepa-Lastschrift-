<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$ID = $_GET['ID'];

//deleting the row from table
$sql = "DELETE FROM Mitglieder WHERE ID=:ID";
$query = $dbConn->prepare($sql);
$query->execute(array(':ID' => $ID));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
