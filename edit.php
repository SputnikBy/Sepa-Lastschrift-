<?php
// including the database connection file
include_once ("config.php");

//  Hier beginnt sie Update-Verarbeitung 



if(isset($_POST['update']))
{

        $ID               =$_POST['ID'];
        $Eintrittsdatum   =$_POST['Eintrittsdatum'];
	$Vorname          =$_POST['Vorname'];
        $Nachname         =$_POST['Nachname'];
        $Anrede           =$_POST['Anrede'];
        $Strasse          =$_POST['Strasse'];
        $Postleitzahl     =$_POST['Postleitzahl'];
        $Ort              =$_POST['Ort'];
        $IBAN             =$_POST['IBAN'];
        $BIC              =$_POST['BIC'];
        $Jahresbeitrag    =$_POST['Jahresbeitrag'];
        $TelefonFestnetz  =$_POST['TelefonFestnetz'];
        $Austrittsdatum   =$_POST['Austrittsdatum'];
        $KontoName        =$_POST['KontoName'];
        $Konto_Strasse    =$_POST['Konto_Strasse'];
        $Konto_Plz        =$_POST['Konto_Plz'];
        $Konto_Ort        =$_POST['Konto_Ort'];
        $KontoMandatvom   =$_POST['KontoMandatvom'];
        $KontoMandatNr    =$_POST['KontoMandatNr'];
        $Geschlecht       =$_POST['Geschlecht'];
        $Geburtsdatum     =$_POST['Geburtsdatum'];
        $Ortsteil         =$_POST['Ortsteil'];
        $Verwendungszweck =$_POST['Verwendungszweck'];
        $Email            =$_POST['Email']; 
        $KontoLand        =$_POST['KontoLand']; 
        $KontoBank        =$_POST['KontoBank'];
        $KontoErstFolgeabbuchung = $_POST['KontoErstFolgeabbuchung'];
        $Nichtzahler       =$_POST['Nichtzahler']; 

/// checking empty fields

 	if(empty($Vorname) ||  empty($Nachname))
        {
		if(empty($Vorname))
                {
			echo "<font color='red'>der Vorname fehlt.</font><br/>";
		}

		if(empty($Nachname))
                {
			echo "<font color='red'>der Nachname fehlt.</font><br/>";
		}

//		if(empty($Anrede))
//                {
//			echo "<font color='red'>die Anrede fehlt.</font><br/>";
//		}
	} else {
 
// eine Zeilen Testhilfe 

 

        //updating the table
	$sql = "UPDATE Mitglieder SET 
                                 Eintrittsdatum=:Eintrittsdatum, 
                                 Vorname=:Vorname, 
                                 Nachname=:Nachname, 
                                 Anrede=:Anrede ,
                                 IBAN=:IBAN,
                                 BIC =:BIC,
                                 Strasse=:Strasse, 
                                 Postleitzahl=:Postleitzahl,
                                 Ort =:Ort, 
                                 Jahresbeitrag=:Jahresbeitrag,
                                 TelefonFestnetz=:TelefonFestnetz,
                                 Austrittsdatum=:Austrittsdatum,
                                 Nichtzahler=:Nichtzahler,
                                 KontoName=:KontoName,
                                 Konto_Strasse=:Konto_Strasse,
                                 Konto_Plz=:Konto_Plz,
                                 Konto_Ort=:Konto_Ort,
                                 KontoMandatvom=:KontoMandatvom,
                                 KontoMandatNr=:KontoMandatNr,
                                 KontoErstFolgeabbuchung=:KontoErstFolgeabbuchung,
                                 Ortsteil=:Ortsteil,
                                 Email=:Email,
                                 Verwendungszweck=:Verwendungszweck,
                                 KontoLand=:KontoLand,
                                 KontoBank=:KontoBank,
                                 Geschlecht=:Geschlecht,
                                 Geburtsdatum=:Geburtsdatum
                                 WHERE ID=:ID";

    
// var_dump ($sql);          

         	$query = $dbConn->prepare($sql);

		$query->bindparam(':ID',$ID);
                $query->bindparam(':Eintrittsdatum',$Eintrittsdatum);
		$query->bindparam(':Vorname',$Vorname);
 		$query->bindparam(':Nachname',$Nachname);
		$query->bindparam(':Anrede',$Anrede);
                $query->bindparam(':IBAN',$IBAN);
                $query->bindparam(':BIC',$BIC);
                $query->bindparam(':Strasse',$Strasse);
                $query->bindparam(':Postleitzahl',$Postleitzahl);
                $query->bindparam(':Ort',$Ort);
                $query->bindparam(':Jahresbeitrag',$Jahresbeitrag);
                $query->bindparam(':TelefonFestnetz',$TelefonFestnetz);
                $query->bindparam(':Austrittsdatum',$Austrittsdatum);
                $query->bindparam(':Nichtzahler',$Nichtzahler);
                $query->bindparam(':KontoName',$KontoName);
                $query->bindparam(':Konto_Strasse',$Konto_Strasse);
                $query->bindparam(':Konto_Plz',$Konto_Plz);
                $query->bindparam(':Konto_Ort',$Konto_Ort);
                $query->bindparam(':KontoMandatvom',$KontoMandatvom);
                $query->bindparam(':KontoMandatNr',$KontoMandatNr);
                $query->bindparam(':KontoErstFolgeabbuchung',$KontoErstFolgeabbuchung);
                $query->bindparam(':Ortsteil',$Ortsteil);
                $query->bindparam(':Email',$Email);
                $query->bindparam(':Verwendungszweck',$Verwendungszweck);
                $query->bindparam(':KontoLand',$KontoLand);
                $query->bindparam(':KontoBank',$KontoBank);
                $query->bindparam(':Geschlecht',$Geschlecht);
                $query->bindparam(':Geburtsdatum',$Geburtsdatum);
// 
      	        $query->execute();

		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, 
                // redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
    } 

 }   // Isset oOst Update
 
?>
<?php
//getting id from url

$ID = $_GET['ID'];


//selecting data associated with this particular id

$sql = "SELECT * FROM Mitglieder WHERE ID=:ID";
$query = $dbConn->prepare($sql);
$query->execute(array(':ID' => $ID));

// $result = $dbConn->query("SELECT * FROM Mitglieder Where ID = :ID");

// while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
 while($row = $query->fetch(PDO::FETCH_ASSOC))
{


        $Eintrittsdatum            = $row['Eintrittsdatum'];
 	$Vorname                   = $row['Vorname'];
        $Nachname                  = $row['Nachname'];
        $Anrede                    = $row['Anrede'];
        $IBAN                      = $row['IBAN'];
        $BIC                       = $row['BIC'];
        $Strasse                   = $row['Strasse'];
        $Postleitzahl              = $row['Postleitzahl'];
        $Ort                       = $row['Ort'];
        $Jahresbeitrag             = $row['Jahresbeitrag'];
        $TelefonFestnetz           = $row['TelefonFestnetz'];
        $Austrittsdatum            = $row['Austrittsdatum'];
        $Nichtzahler               = $row['Nichtzahler'];
        $KontoName                 = $row['KontoName'];
        $Konto_Strasse             = $row['Konto_Strasse'];
        $Konto_Plz                 = $row['Konto_Plz'];
        $Konto_Ort                 = $row['Konto_Ort'];
        $KontoMandatvom            = $row['KontoMandatvom'];
        $KontoMandatNr             = $row['KontoMandatNr'];
        $KontoErstFolgeabbuchung   = $row['KontoErstFolgeabbuchung'];
        $Ortsteil                  = $row['Ortsteil'];
        $Email                     = $row['Email'];
        $Verwendungszweck          = $row['Verwendungszweck'];
        $KontoLand                 = $row['KontoLand'];
        $KontoBank                 = $row['KontoBank'];
        $Geschlecht                = $row['Geschlecht'];
        $Geburtsdatum              = $row['Geburtsdatum'];

}


?>
<html>
<head>	
	<title>Daten bearbeiten</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Vorname</td>
				<td><input type="text" name="Vorname" value="<?php echo $Vorname;?>"></td>
			</tr>

                	<tr> 
				<td>Nachname</td>
				<td><input type="text" name="Nachname" value="<?php echo $Nachname;?>"></td>
			</tr>

			<tr> 
				<td>Anrede</td>
				<td><input type="text" name="Anrede" value="<?php echo $Anrede;?>"></td>
			</tr>
                        <tr>
                                <td>Strasse</td>
                                <td><input type="text" name="Strasse" value="<?php echo $Strasse;?>"></td>
                        </tr>
                        <tr>
                                <td>Postleitzahl</td>
                                <td><input type="text" name="Postleitzahl" value="<?php echo $Postleitzahl;?>"></td>
                        </tr>
                        <tr>
                                <td>Ort</td>
                                <td><input type="text" name="Ort" value="<?php echo $Ort;?>"></td>
                        </tr>
                        <tr>
                                <td>IBAN</td>
                                <td><input type="text" name="IBAN" value="<?php echo $IBAN;?>"></td>
                        </tr>


                        <tr>
                                <td>BIC</td>
                                <td><input type="text" name="BIC" value="<?php echo $BIC;?>"></td>
                        </tr>
                        <tr>
                                <td>Eintrittsdatum</td>
                                <td><input type="date" name="Eintrittsdatum" value="<?php echo $Eintrittsdatum;?>"></td>
                        </tr>

                        <tr>
                                <td>Jahresbeitrag</td>
                                <td><input type="text" name="Jahresbeitrag" value="<?php echo $Jahresbeitrag;?>"></td>
                        </tr>
                        <tr>
                                <td>TelefonFestnetz</td>
                                <td><input type="text" name="TelefonFestnetz" value="<?php echo $TelefonFestnetz;?>"></td>
                        </tr>

                        <tr>
                                <td>Austrittsdatum</td>
                                <td><input type="date" name="Austrittsdatum" value="<?php echo $Austrittsdatum;?>"></td>
                        </tr>

                        <tr>
                                <td>KontoName</td>
                                <td><input type="text" name="KontoName" value="<?php echo $KontoName;?>"></td>
                        </tr>

                        <tr>
                                <td>Konto_Strasse</td>
                                <td><input type="text" name="Konto_Strasse" value="<?php echo $Konto_Strasse;?>"></td>
                        </tr>



                        <tr>
                                <td>Konto_Plz</td>
                                <td><input type="text" name="Konto_Plz" value="<?php echo $Konto_Plz;?>"></td>
                        </tr>


                        <tr>
                                <td>Konto_Ort</td>
                                <td><input type="text" name="Konto_Ort" value="<?php echo $Konto_Ort;?>"></td>
                        </tr>

                        <tr>
                                <td>Geburtsdatum</td>
                                <td><input type="date" name="Geburtsdatum" value="<?php echo $Geburtsdatum;?>"></td>
                        </tr>
                        <tr>
                                <td>KontoMandatvom</td>
                                <td><input type="date" name="KontoMandatvom" value="<?php echo $KontoMandatvom;?>"></td>
                        </tr>


                        <tr>
                                <td>Geschlecht</td>
                                <td><input type="text" name="Geschlecht" value="<?php echo $Geschlecht;?>"></td>
                        </tr>
   

                        <tr>
                                <td>Ortsteil</td>
                                <td><input type="text" name="Ortsteil" value="<?php echo $Ortsteil;?>"></td>
                        </tr>

                        <tr>
                                <td>Email</td>
                                <td><input type="text" name="Email" value="<?php echo $Email;?>"></td>
                        </tr>
                        <tr>
                                <td>Verwendungszweck</td>
                                <td><input type="text" name="Verwendungszweck" value="<?php echo $Verwendungszweck;?>"></td>
                        </tr>


                        <tr>
                                <td>Nichtzahler</td>
                                <td><input type="text" name="Nichtzahler" value="<?php echo $Nichtzahler;?>"></td>
                        </tr>

                        <tr>
                                <td>KontoErstFolgeabbuchung</td>
                                <td><input type="text" name="KontoErstFolgeabbuchung" value="<?php echo $KontoErstFolgeabbuchung;?>"></td>
                        </tr>



                         <tr>
                                <td>KontoLand</td>
                                <td><input type="text" name="KontoLand" value="<?php echo $KontoLand;?>"></td>
                        </tr>

                        <tr>
                                <td>KontoBank</td>
                                <td><input type="text" name="KontoBank" value="<?php echo $KontoBank;?>"></td>
                        </tr>


                        <tr>
				<td><input type="hidden" name="ID" value=<?php echo $_GET['ID'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
