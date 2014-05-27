<h1>Mein Profil</h1> 

<?php
//DEMO MITARBEITER:
$mitarbeiter = 13;

//1) Verbindung zu MySQL öffnen
$verb = openMySqlConnection();

?>
     
 	
	
	<div style="width:100%">
		<div style="float:left">
	
		<table id="profiltable" class="contenttable">

			<?php 
				//2) SQL Abfrage ausführen
				$result = executeSqlQuery($verb, sqlProfil4($mitarbeiter));
				//var_dumb($result);
			?>
		
			<?php while ($profil = mysqli_fetch_array($result)) { ?>
			<tr>
				<td rowspan="1"><h7>Name</h7></td>		 		
				<td rowspan="1"><?php echo $profil['vorname']; ?> <?php echo $profil['MName']; ?></td>
			</tr>
			<tr>
				<td rowspan="1"><h7>Kontakt</h7></td>
				<td rowspan="1"><?php echo $profil['mailadresse']; ?></td>
			</tr>
			<tr>
				<td rowspan="1"><h7>Institut</h7></td>
				<td rowspan="1"><?php echo $profil['IName']; ?></td>
			</tr>
			<tr>
				<td colspan="2"><a href="<?php echo $profil['link']; ?>"><h7>Zur Detailseite</h7></a></td>
                
				<!--<td rowspan="1"><a href="<?php echo $profil['link']; ?>"><?php echo $profil['link']; ?></a></td> -->
			</tr>
			<?php } ?>             
			 
		</table> 
	
			<br/>
		</div>
		
	<h2>&nbsp</h2>

	<h2>Meine Kompetenzen anpassen</h2>
    
    <?php 
	// HINZUFÜGEN
if(isset($_POST['add'])) {
	
	if (!empty($_POST['Kategorie']) && !empty($_POST['Spezifikation'])) {
	
		//Kategoriename holen --> Serverseitig!
		$result1 = executeSqlQuery($verb, sqlProfil2($_POST['Kategorie']));
		
		//escape variables for security
		$kategorieId = mysqli_real_escape_string($verb, $_POST['Kategorie']);
		$spezfikation = mysqli_real_escape_string($verb, $_POST['Spezifikation']);
		
		//Eingaben abspeichern und Meldung ausgeben
		if(executeSqlQuery($verb, sqlProfil3($_POST['Kategorie'], $_POST['Spezifikation'], $mitarbeiter))) {
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

// BEARBEITEN
$editMode = false;
if(isset($_POST['edit'])) {
	$editId = mysqli_real_escape_string($verb, key($_POST["edit"]));
	$editMode = true;
}

if(isset($_POST['complete'])) {
	$editId = '';
	$editMode = false;
}


// ENTFERNEN
if(isset($_POST['delete'])) {
	$id = mysqli_real_escape_string($verb, key($_POST["delete"]));
	
	//Eingaben abspeichern und Meldung ausgeben
	if(executeSqlQuery($verb, sqlProfil7($id))) {
		echo "<p style="."color:#357ebd;".">Spezifikation wurde erfolgreich entfernt</p>" . "<br />";
	} else {
		echo "<p style="."color:#d43f3a;".">Spezifikation wurde konnte nicht entfernt werden</p>" . "<br />";
	}
	
}

	?>
    
    
    
	
		<form action="<?php /* daten an server senden */ echo "index.php?page=" . $page ?>" method="post">
			<table class="contenttable">
				<!-- zum hinzufügen -->
				<tbody>
				<tr>
					<th style="width:30%"><h7>Kategorie</h7></th>
					<th style="width:50%"><h7>Kompetenz</h7></th>
					<th><h7>Aktion</h7></th>
				</td>
				
				<tr>
					
					<td>
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
					<td rowspan="1" style="padding-right:8px;"><input type="text" name="Spezifikation" placeholder="Spezifikation" value="" style="width:100%;"></td>
					<td><input type="submit" name="add" value="Hinzufügen" style="cursor:pointer; color: #FFF; background-color: #4cae4c; border: 0px; padding:5px;"></td>
					
				</tr>
				</tbody>
			
				<!-- zum anzeigen -->
				<tbody>
				
				
				<?php 
					//2) SQL Abfrage ausführen
					$result = executeSqlQuery($verb, sqlProfil5($mitarbeiter));	
					
					//3) HTML Code mit Ausgabe von SQL Daten
					$i = 1; while ($row = mysqli_fetch_array($result)) {
						
						echo "<tr>";
						// echo "<td>" . $i . "</td>";
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
							if($editMode && ($editId == $row['id'])) {echo "<input type='image' src='images/delete_16.png' name='delete[".$innerRow['id']."]' id='deleteSpez' title='Kompetenz löschen' />";}
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
				?>
				
				</tbody>
				
				
				
			</table>
		</form>
	</div>
	
	
 
<?php
	//4) Verbindung zu MySQL schliessen
	closeMySqlConnection($verb);
?>