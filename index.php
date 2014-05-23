<?php
// Verbindung
require_once("verbindung.php");

include("abfragen.php");

//aktuelle seite merken! --> dynamische navigation
$hostname = $_SERVER['HTTP_HOST'];
$path = dirname($_SERVER['PHP_SELF']);

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
	$page = 'home';
}
?>


<!doctype html>
<html>
<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<title>Forschungskompetenzen</title>

<link rel="stylesheet" type="text/css" href="css/styles.css" media="all">
<link rel="stylesheet" type="text/css" href="css/font.css" media="all">
<link rel="stylesheet" type="text/css" href="css/menu.css" media="all">
<link rel="stylesheet" type="text/css" href="css/event.css" media="all">
<link rel="stylesheet" type="text/css" href="css/footer.css" media="all">
</head>

<body>


<div id="main">
	<div id="layout">
    
<!-- start Header -->
    	<div id="header">&nbsp;
			<div id="logo">
				<a target="_blank" href="http://www.htwchur.ch"><img src="images/htw_chur_rgb.png" width="100%" border="0" alt="Home"></a>
			</div>
            <div id="header_content">
                     		
            </div>
            
		</div>
    <!-- end Header -->
    
<div id="navigation_top">&nbsp;</div>
<div id="content">
		
<div id="content_left">

<!---------- MENU ---------->
<ul class="menu">
<?php 
	include 'menu.php';
?>
</ul>

</div>

      
<div id="content_center"> 

                
				
<?php
//inhalt je nach seite laden
	switch($page) {
		case 'home': include('home.php');
			break;
		case 'profil': include('profil.php');
			break;
		case 'search': include('search.php');
			break;
		case 'search-results': include('search-results.php');
			break;
		default: include('error404.php');
	}		
?>
	
	
 </div>         
           
      </table>  
  
		  </div>
			<div id="content_right">&nbsp;</div>
		
		</div>
		
		<div id="footer_top">
			<div id="footer_top_content">
				<div id="footer_box_1" class="footer_box">
					&nbsp;
				</div>
				<div id="footer_box_2" class="footer_box">
					&nbsp;
				</div>
				<div id="footer_box_3" class="footer_box">
					&nbsp;
				</div>
				<div id="footer_box_4" class="footer_box">
					&nbsp;
				</div>
			</div>
		</div>
		<div id="footer_bottom">
			<div id="footer_bottom_content">&nbsp;</div>
		</div>
		
    </div>
</div>
</div>

</body>
</html>