<?php

//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
 
        $Eintrittsdatum = $_POST['Eintrittsdatum'];
	$Vorname = $_POST['Vorname'];
        $Nachname = $_POST['Nachname'];
        $Anrede = $_POST['Anrede'];
        $Strasse = $_POST['Strasse'];
        $Postleitzahl = $_POST['Postleitzahl'];
        $Ort = $_POST['Ort'];
        $IBAN = $_POST['IBAN'];
        $BIC = $_POST['BIC'];  
        $Jahresbeitrag = $_POST['Jahresbeitrag'];
        $TelefonFestnetz  = $_POST['TelefonFestnetz '];
        $Austrittsdatum  = $_POST['Austrittsdatum'];
 	$Nichtzahler  = $_POST['Nichtzahler'];
        $KontoName  = $_POST['KontoName'];
        $Konto_Strasse  = $_POST['Konto_Strasse'];
        $Konto_Plz  = $_POST['Konto_Plz'];
        $Konto_Ort   = $_POST['Konto_Ort']; 
        $KontoMandatvom   = $_POST['KontoMandatvom '];
        $KontoMandatNr = $_POST['KontoMandatNr'];
        $KontoErstFolgeabbuchung = $_POST['KontoErstFolgeabbuchung'];
        $Ortsteil  = $_POST['Ortsteil'];
        $Email  = $_POST['Email'];
        $Verwendungszweck = $_POST['Verwendungszweck'];
        $KontoLand = $_POST['KontoLand'];
        $KontoBank = $_POST['KontoBank'];
        $Geschlecht = $_POST['Geschlecht'];
        $Geburtsdatum = $_POST['Geburtsdatum'];



        echo ("Aktiv ".$Vorname.$Nachname.$Strasse."<br>"); 



	// checking empty fields
	if(empty($Vorname) || empty($Nachname) || empty($Strasse)) {
				
		if(empty($Vorname)) {
			echo "<font color='red'>Vorname fehlt.</font><br/>";
		}
		
		if(empty($Nachname)) {
			echo "<font color='red'>Nachname fehlt.</font><br/>";
		}
		
		if(empty($Strasse)) {
			echo "<font color='red'>Strasse fehlt.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Zurück zur Erfassung</a>";
	} 




else { 

         Echo  ("Else Zweig"); 


 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO Mitglieder(
                                               Eintrittsdatum, 
                                               Vorname,
                                               Nachname,
                                               Anrede,
                                               IBAN,
                                               BIC,
                                               Strasse,
                                               Postleitzahl,
                                               Ort,
                                               Jahresbeitrag,
                                               TelefonFestnetz,
                                               Nichtzahler,
                                               KontoName,
                                               Konto_Strasse,
                                               Konto_Plz,
                                               Konto_Ort,
                                               KontoMandatvom,
                                               KontoMandatNr,
                                               KontoErstFolgeabbuchung,
                                               Ortsteil,
                                               Email,
                                               Verwendungszweck,
                                               KontoLand,
                                               KontoBank,
                                               Geschlecht,
                                               Geburtsdatum
                                               )
                        VALUES(:Eintrittsdatum,
                               :Vorname,
                               :Nachname,
                               :Anrede,
                               :IBAN,
                               :BIC,
                               :Strasse,
                               :Postleitzahl,
                               :Ort,
                               :Jahresbeitrag,
                               :TelefonFestnetz,
                               :Nichtzahler,
                               :KontoName,
                               :Konto_Strasse,
                               :Konto_Plz,
                               :Konto_Ort,
                               :KontoMandatvom,
                               :KontoMandatNr,
                               :KontoErstFolgeabbuchung,
                               :Ortsteil,
                               :Email,
                               :Verwendungszweck,
                               :KontoLand,
                               :KontoBank,
                               :Geschlecht,
                               :Geburtsdatum
                              )";


 

 





//
//$sql = "INSERT INTO Mitglieder (
//                                ID, 
//                                Eintrittsdatum,
//                                Vorname)
//                                Nachname,
//                                Anrede,
//                                IBAN,
//                                BIC,
//                                Strasse,
//                                Postleitzahl,
//                                Ort,
//                                Jahresbeitrag,
//                                TelefonFestnetz,
//                                Austrittsdatum,
//                                Nichtzahler,
//                                KontoName,
//                                Konto_Strasse,
//                                Konto_Plz,
//                                Konto_Ort,
//                                KontoMandatvom,
//                                KontoMandatNr,
//                                KontoErstFolgeabbuchung,
//                                Ortsteil,
//                                Email,
//                                Verwendungszweck,
//                                KontoLand,
//                                KontoBank,
//                                Geschlecht,
//                                Geburtsdatum
//                                )
//                       VALUES (
//                               'NULL',
//                               :Eintrittsdatum,
//                               :Vorname,
//                              :Nachname, 
 //                              :Anrede,
 //                              :IBAN,
 //                              :BIC,
//                               :Strasse
 //                              :Postleitzahl,
 //                              :Ort,
 //                              :Jahrsbeitrag,
 //                              :TelefonFestnetz,
 //                              :Austrittsdatum,
 //                              :Nichtzahler,
 //                              :KontoName,
 //                              :Konto_Strasse,
 //                              :Konto_Plz,
 //                              :Konto_Ort,
 //                              :KontoMandatvom,
 //                              :KontoMandatNr,
 //                              :KontoErstFolgeabbuchung,
 //                              :Ortsteil,
 //                              :Email,
 //                              :Verwendungszweck,
 //                              :KontoLand,
  //                             :KontoBank,
   //                            :Geschlecht,
   //                            :Geburtsdatum
  //                                 )";
ECHO  ("SQL DURCH");

		$query = $dbConn->prepare($sql);

ECHO  ("prepare DURCH");


//                $query->bindparam(':ID','341'); 
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
 //               $query->bindparam(':Austrittsdatum',$Austrittsdatum);
                   

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

                echo ("Bind2 durch"); 


         	$query->execute();

                echo  ("nach Execute");

// insert these two lines after prepare():

// catch(PDOException $e) {
//   echo $e->getMessage();








		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";

		echo "<br/><a href='index.php'>View Result</a>";
	}

}
?>

