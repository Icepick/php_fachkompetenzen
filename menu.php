<?php
//echo $page; //gibt aktuelle seite aus
?>


<!-- HOME -->
<?php if ($page == 'home') { ?><li><a href="index.php" id="aktiv">Home</a></li>
<?php } else { ?><li><a href="index.php">Home</a><?php } ?>
	
<!-- SEARCH -->
<?php if ($page == 'search') { ?><li><a href="index.php?page=search" id="aktiv">Suche</a></li>
<?php } else { ?><li><a href="index.php?page=search">Suche</a><?php } ?>

<!-- PROFIL -->	
<?php if ($page == 'profil') { ?><li><a href="index.php?page=profil" id="aktiv">Mein Profil</a></li>
<?php } else { ?><li><a href="index.php?page=profil">Mein Profil</a><?php } ?>

<!-- LOGOUT -->	
<?php if ($page == 'logout.php') { ?><li><a href="index.php?page=logout" id="aktiv">Logout</a></li>
<?php } else { ?><li><a href="index.php?page=logout">Logout</a><?php } ?>
	
