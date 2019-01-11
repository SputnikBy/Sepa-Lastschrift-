# Sepa-Lastschrift
Erstellung einer Sepa-Sammellastschrift für einen Verein auf Basis zweier MySQL-Tabellen 

Unter Verwendung der Basis 

  tschiffler/sepa-xml-creator-php 
  
wird hier ein Unterbau in Form zweier MySQL-Tabellen genutzt um die Lastschrift zu erstellen. Das Ganze hat noch keinen produktionsreifen Status, führt aber schon mal in die richtige Richtung. Durch die Nutzung der Datenbank, könnte die Datenpflege per PHPMyAdmin erfolgen. Später kann eine Pflegeoberfläche ergänzt werden. 

Die Tabelle Stammdaten enthält die Attribute, die den Verein betreffen.
Die Tabelle Mitglieder enthält die Attribute, die die Mitglieder betreffen. 

Da ich im PHP bislang noch keine Erfahrungen habe, sei mir die eine oder andere Schwäche im Coding nachgesehen. 
