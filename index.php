<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?PHP include( "util.php" ); ?>
<?php 
  $GLOBALS["include"] = "stations";
	if(isset($_GET['inc'])) {
		$GLOBALS["include"] = $_GET['inc'];
	}
?>
<?php
  $GLOBALS["radio_store"] = "stations.txt";
  $GLOBALS["mpc"] = "mpc";
  $GLOBALS["wishlist_store"] = "wishlist.txt";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link type="text/css" href="css/common.css" rel="stylesheet" />
<title>Mephisto Administration</title>
</head>
<body>
	<div class="header">
		<span><img src="img/logo.png" alt="" border="0" /></span>
		<div class="navi">
			<span><a href="index.php?inc=stations">Stations</a></span>&nbsp;&nbsp;&nbsp;
			<span><a href="index.php?inc=player">Player</a></span>&nbsp;&nbsp;&nbsp;
			<span><a href="index.php?inc=wishlist">Wishlist</a></span>
		</div>		
	</div>
	<div class="separator"></div>
	<div class="content">
	
   <?PHP include( $GLOBALS["include"] . ".php" ); ?>
	
	</div>
</body>
</html>