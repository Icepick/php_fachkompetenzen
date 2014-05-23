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
 
	<table id="profiltable" class="contenttable" style="float:left;">

		<?php 
			//2) SQL Abfrage ausführen
			$result = executeSqlQuery($verb, sqlProfil4(14));
			//var_dumb($result);
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
    
    
<<<<<<< HEAD
    <form action="<?php /* daten an server senden */ echo "index.php?page=" . $page ?>" method="post">
    <table id="profiltable" class="contenttable">
		<form action="<?php /* daten an server senden */ echo "index.php?page=" . $page ?>" method="post">
			<table class="contenttable">
				<!-- zum hinzufügen -->
				<tbody>
				<tr>
					<td><strong>ID</strong></td>
					<td style="width:50%"><strong>Kategorie</strong></td>
					<td style="width:50%"><strong>Spezifikation</strong></td>
					<td><strong>Aktion</strong></td>
				</td>
				
				<tr>
					
					<td></td>
					<td>
						<select name="Kategorie" style="width:100%;">
						<?php 
							//2) SQL Abfrage ausführen
							$result = executeSqlQuery($verb, sqlProfil1());	
						?>
=======
	
    <form action="<?php /* daten an server senden */ echo "index.php?page=" . $page ?>" method="post">
    <table id="profiltable" class="contenttable">
>>>>>>> 67ac163c6fc5018f86399ea74e5245addb07044e

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
<<<<<<< HEAD
					$i = 1; while ($row = mysqli_fetch_array($result)) {
						
						echo "<tr>";
						echo "<td>" . $i . "</td>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>";
					
						//echo var_dump($row);
						$result2 = executeSqlQuery($verb, sqlProfil6($mitarbeiter, $row['id']));	
						$j = 1; while ($innerRow = mysqli_fetch_array($result2)) {
							if($j == 1) {
								echo $innerRow['spezname']. " ";
							} else {
								echo ", " . $innerRow['spezname']. " ";
							}
							if($editMode && ($editId == $row['id'])) {echo "<input type='image' src='/images/delete_16.png' name='delete[".$innerRow['id']."]' id='deleteSpez' title='Spezifikation löschen' />";}
							$j++;
						}
						
						echo "</td>";
						//echo "<td></td>";
						if($editMode && ($editId == $row['id'])) {
							echo "<td style='width:20px;'><input type='submit' name='complete' value='Fertig' style='cursor:pointer; width:70px; color: #FFF; border: 0px; padding:5px;'></td>";
						} else { 
							echo "<td style='width:20px;'><input type='submit' name='edit[".$row['id']."]' value='Bearbeiten' style='cursor:pointer; width:70px; color: #FFF; background-color: #3276b1; border: 0px; padding:5px;'></td>";
						}
						echo "</tr>";
						$i++;
					
					}
=======
>>>>>>> 67ac163c6fc5018f86399ea74e5245addb07044e
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