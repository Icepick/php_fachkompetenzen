<?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $username = $_POST['username'];
      $passwort = $_POST['passwort'];

      $hostname = $_SERVER['HTTP_HOST'];
      $path = dirname($_SERVER['PHP_SELF']);
	  
	  //standardmässig nicht eingeloggt!
	  $_SESSION['kompetenzen'] = array();
	  $_SESSION['kompetenzen'][1] = array('angemeldet' => false);

      // Benutzername und Passwort werden überprüft
      if ($username == 'tamara' && $passwort == 'geheim') {
		$_SESSION['kompetenzen'][1] = array('angemeldet' => true, 'username' => $username);
	   

       // Weiterleitung zur geschützten Startseite
       if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
        if (php_sapi_name() == 'cgi') {
         header('Status: 303 See Other');
         }
        else {
         header('HTTP/1.1 303 See Other');
         }
        }

		   header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');
		   exit;
       }
      }
?>


  <p style="background-color:#000; color:#FFF";>DEMO: <br/>username:tamara <br/>passwort:geheim<br/><br/>Bitte DB updaten!</p><br/><br/>
      

  <h1>Guten Tag! Bitte loggen Sie sich ein</h1>
                     
  <form action="<?php echo 'index.php?page=' . $page; ?>" method="post">
	  <table class="anmelden" width="300px">
		  <tr>
			  <td>Username:</td>
			  <td><input type="text" name="username" /></td>
		  </tr>
		  <tr>
			  <td>Passwort:</td>
			  <td><input type="password" name="passwort" /></td>
		  </tr>
		  <tr> 
			  <td>&nbsp</td>
			  <td><input type="submit" value="Anmelden" /></td>
		  </tr>
	  </table>
  </form> 
		  