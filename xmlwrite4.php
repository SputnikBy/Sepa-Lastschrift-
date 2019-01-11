<?php 
       
        // Verbindung zur Datenbank aufbauen
        include("v-dbconnect.php");

	// Einbindung der SepaXmlCreator-Klasse
	require_once 'SepaXmlCreator.php';

	// Erzeugen einer neuen Instanz
	$creator = new SepaXmlCreator();

        $Ausfuehrungsoffset =0;

        if ($erg1 = mysqli_query($db,"SELECT * FROM Stammdaten"))

        {

    	  $datensatz1 = $erg1->fetch_object();

          $Vereinsname = $datensatz1->Vereinsname;
          $VereinsIban = $datensatz1->VereinsIban;
          $VereinsBIC = $datensatz1->VereinsBIC;
          $GlauebigerID = $datensatz1->GlauebigerID;
          $Ausfuehrungsoffset = $datensatz1->Ausfuehrungsoffset;

          echo ($Vereinsname." Vereinsname ");
          echo ($GlauebigerID ." GlauebigerID ");
          echo ($VereinsIban ." VereinsIban ");
          echo ($VereinsBIC ." VereinsBIC");
          echo ($Ausfuehrungsoffset . " Ausfuehrungsoffset");

        }

        if (!count($datensatz1))
        {
          echo "<p>Es liegen keine Stammdaten vor :(</p>";
        }


	/*
	 * Mit den Account-Werten wird das eigene Konto beschrieben
	 * erster Parameter = Name
	 * zweiter Parameter = IBAN
	 * dritter Paramenter = BIC
	 */
	$creator->setAccountValues($Vereinsname, $VereinsIban, $VereinsBIC);
	/*
	 * Setzen Sie von der Bundesbank übermittelte Gläubiger-ID
	 */
	$creator->setGlaeubigerId($GlauebigerID);
	/*
	 * Mit Hilfe eines Ausführungs-Offsets können Sie definieren, wann die Lastchrift gezogen wird. Die Anzahl
	 * der übergebenen Tage wird auf den aktuellen Kalendertag addiert
	 *
	 * Beispiel 1
	 * heute = 1. Juni 2013
	 * Offset nicht übergeben
	 * Ausführung -> Heute bzw. nächst möglich
	 *
	 * Beispiel 2
	 * heute = 1. Juni 2013
	 * Offset 3
	 * Ausführung -> 4. Juni 2013
	 */

	$creator->setAusfuehrungOffset($Ausfuehrungsoffset);


        // Verbindung zur Datenbank aufbauen
//        include("v-dbconnect.php");

        $tabelle = 'Mitglieder';

        echo ("DB-Connect durch<br> ");


        $daten = array();


//        $erg = mysqli_query($db,"SELECT * FROM Kontakte");
//        debug_print_backtrace();

           if ($erg = mysqli_query($db,"SELECT * FROM Mitglieder where Nichtzahler = ''  "))
//            $erg = mysqli_query($db,"SELECT * FROM Mitglieder where Nichtzahler = ''")
           {
            echo ("select durch<br>");

              if ($erg->num_rows)
              {
               while($datensatz = $erg->fetch_object())
               {


               $daten[] = $datensatz;
//               VAR_DUMP (each($daten));
               echo ("<br>");

//         	VAR_DUMP (key($daten));
                echo ("<br>");
                Var_Dump (each($daten));

//              Var_dump (array_keys($datensatz));

//		$Vorname =  $daten.Vorname;
 		echo ( key($datensatz));
                echo ("<br>");

                $ID = $datensatz->ID;
                $KontoName = $datensatz->KontoName;
                $Nachname = $datensatz->Nachname;
	        $Iban = $datensatz->IBAN;
		$BIC = $datensatz->BIC;
                $Ort = $datensatz->Ort;
                $Jahresbeitrag =  $datensatz->Jahresbeitrag;
                $Verwendungszweck = $datensatz->Verwendungszweck;
                $KontoMandatvom = $datensatz->KontoMandatvom;
                $KontoMandatNr = $datensatz->KontoMandatNr;

                echo ($ID . " ID");
                echo ($Vorname." Vorname ");

                echo ($Jahresbeitrag ." Beitrag ");

                echo ($KontoMandatNr." KontoMandat ");

                echo ($Ort ." Ort");

                $anzahl = count ( $daten );

        // Erzeugung einer neuen Buchungssatz
        $buchung = new SepaBuchung();
        // gewünschter Einzugsbetrag   $array["multi"]
        $buchung->setBetrag($Jahresbeitrag);
        // gewünschte End2End Referenz (OPTIONAL)


	$timestamp = time();
	$datum = date("d.m.Y", $timestamp);
	echo $datum;
//      <EndToEndId>04.01.2019 Mitglied 1</EndToEndId>
        $buchung->setEnd2End($datum . " Mitglied " . $ID);



        // BIC des Zahlungspflichtigen Institutes
         $buchung->setBic($BIC);
        // Name des Zahlungspflichtigen
        $buchung->setName($KontoName);
        // IBAN des Zahlungspflichtigen
        $buchung->setIban($Iban);
        // gewünschter Verwendungszweck (OPTIONAL)
        $buchung->setVerwendungszweck($Verwendungszweck);
        // Referenz auf das vom Kunden erteilte Lastschriftmandat
        // ID = MANDAT0001
        // Erteilung durch Kunden am 20. Mai 2013
        // False = seit letzter Lastschrift wurde am Mandat nichts geändert
        $buchung->setMandat($KontoMandatNr,$KontoMandatvom, false);
        // Buchung zur Liste hinzufügen
        $creator->addBuchung($buchung);



        echo ("Buchung erstellt<br>");
        next ($daten);
              }
              $erg->free();
            }
          }


if (!count($daten)) {
    echo "<p>Es liegen keine Mitgliederdaten vor :(</p>";
}

            foreach ($daten as $inhalt) {

 }


// Nun kann die XML-Datei über den Aufruf der entsprechenden Methode generiert werden
	$sepaxml = $creator->generateBasislastschriftXml();
	echo $sepaxml;
	file_put_contents('sepalastschrift-example.xml', $sepaxml);
	$creator->validateBasislastschriftXml('sepalastschrift-example.xml');
	$creator->printXmlErrors();
?>


