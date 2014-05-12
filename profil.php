<?php
//1) Verbindung zu MySQL öffnen
$verb = openMySqlConnection();

//Ausgefüllte Daten aus dem Kategorie & Spezifikation Formular werden hier abgefangen und in die Datenbank hinzugefügt.
if(isset($_POST['Kategorie']) && isset($_POST['Spezifikation'])) {
	if (!empty($_POST['Kategorie']) && !empty($_POST['Spezifikation'])) {
	
		//Kategoriename holen --> Serverseitig!
		$result1 = executeSqlQuery($verb, sqlProfil2($_POST['Kategorie']));
		
		//escape variables for security
		$kategorieId = mysqli_real_escape_string($verb, $_POST['Kategorie']);
		$spezfikation = mysqli_real_escape_string($verb, $_POST['Spezifikation']);
		
		//Eingaben abspeichern und Meldung ausgeben
		if(executeSqlQuery($verb, sqlProfil3($_POST['Kategorie'], $_POST['Spezifikation'], 13))) {
			while ($row = mysqli_fetch_array($result1)) {
				echo "<p style="."color:#357ebd;".">Daten wurden erfolgreich gespeichert: " . $row['name'] . ", " . $_POST['Spezifikation']."</p>" . "<br />";
			}
		} else {
				echo "<p style="."color:#d43f3a;".">Daten konnten nicht gespeichert werden: " . $row['name'] . ", " . $_POST['Spezifikation']."</p>" . "<br />";
		}	
	} else {
		echo "<p style="."color:#d43f3a;".">Bitte füllen Sie alle Felder aus.</p>" . "<br />";
	}
}
?>
     

	 
	<h1>Mein Profil</h1> 
 
	<table id="profiltable" width="600" class="contenttable" style="float:left; width:260px">

		<?php 
			//2) SQL Abfrage ausführen
			$result = executeSqlQuery($verb, sqlProfil4(14));
		?>
	
		<?php while ($profil = mysqli_fetch_array($result)) { ?>
        <tr>
            <td rowspan="1"><strong>Name</strong></td>		 		
            <td rowspan="1"><?php echo $profil['vorname']; ?> <?php echo $profil['MName']; ?></td>
        </tr>
        <tr>
            <td rowspan="1"><strong>Kontakt</strong></td>
            <td rowspan="1"><?php echo $profil['mailadresse']; ?></td>
        </tr>
        <tr>
            <td rowspan="1"><strong>Institut</strong></td>
            <td rowspan="1"><?php echo $profil['IName']; ?></td>
        </tr>
        <tr>
            <td rowspan="1"><strong>Link</strong></td>
            <td rowspan="1"><a href="<?php echo $profil['link']; ?>"><?php echo $profil['link']; ?></a></td>
        </tr>
        <?php } ?>             
         
    </table> 
    
    
	
    <form action="<?php /* daten an server senden */ echo "index.php?page=" . $page ?>" method="post">
    <table id="profiltable" class="contenttable" style="float:right; width:320px">

		<tr>
            <td rowspan="1"><strong>Kategorie</strong></td>		 		
            <td rowspan="1">
			
			<select name="Kategorie" style="width:100%;">
				<?php 
					//2) SQL Abfrage ausführen
					$result = executeSqlQuery($verb, sqlProfil1());	

					//3) HTML Code mit Ausgabe von SQL Daten
					while ($row = mysqli_fetch_array($result)) {
						echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
					}	
				?>
			</select>
			
			</td>
        </tr>
        <tr>
            <td rowspan="1"><strong>Spezifikation</strong></td>
            <td rowspan="1" style="padding-right:8px;"><input type="text" name="Spezifikation" placeholder="Spezifikation" value="" style="width:100%;"></td>
        </tr>
        <tr>
			<td>&nbsp;</td>
        	<td><input type="submit" value="Speichern" style="background-color: #4cae4c; border: 0px; padding:5px;"></td>
        </tr>       
         
    </table> 
    </form>
 
<?php
	//4) Verbindung zu MySQL schliessen
	closeMySqlConnection($verb);
?>