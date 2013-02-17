<?php
if(isset($_GET["command"])) {
	$command = $_GET["command"];
	if($command) {
		$action = explode("_", $command);
		//only search for stations commands
		if($action[0] == "stations") {
			$stationsCommand = $action[1];
			if($stationsCommand == "delete") {
				deleteStationEntry();
			}
			else if($stationsCommand == "add") {
				addStationEntry();
			}
		}	
	}
}


// iterate over the station entries and create the action links
if(file_exists($GLOBALS["radio_store"])) {
	$Vdata = file_get_contents($GLOBALS["radio_store"]);
	if(strlen(trim($Vdata)) > 0 ) {		
		$stations = explode("\n", $Vdata);
		for($i=0; $i<sizeof($stations); $i++) {
			$url = $stations[$i];			
?>
	<div class="station-row">
	   <span><input type="text" readonly class="station-url" value="<?php echo $url; ?>" /></span>
	   <div class="buttons">
		   <span><a href="index.php?command=stations_delete&id=<?php echo $i; ?>"><img src="img/trash_icon&32.png" alt="Delete" /></a></span>
		   <span><a href="<?php echo $url; ?>" target="new"><img class="action_icon" src="img/music_square_icon&32.png" alt="Play" /></a></span>
	   </div>	   
	</div>
<?php
		}
	}
	else { ?>
	<span>No station</span>
	<?php 
	}
}
?>


<form action="index.php" method="get" name="addStation">
	<div class="station-row">
	   <div class="label">Add new station</div>
	   	<span><input type="text" name="stationUrl" class="station-url-input" value=""></span>
		  <span><input type="hidden" name="command" value="stations_add" /></span>
	 		<div class="ok-button">
	 		  <span><a href="javascript:document.forms['addStation'].submit()"><img class="action_icon" src="img/checkmark_icon&48.png" alt="Save" /></a></span>
	   </div>
	</div>
</form>


