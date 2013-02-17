<?php
$GLOBALS["radio_display"] = "";
execCommandAndDisplay($GLOBALS["mpc"] . " currentsong");


if(isset($_GET["command"])) {
	$command = $_GET["command"];
	$action = explode("_", $command);
	
	//only search for player commands
	if($action[0] == "player") {
		$playerCommand = $action[1];
	
		//play command
		if($playerCommand == "play") {
			execCommandAndDisplay($GLOBALS["mpc"] . " play");
		}
		//stop command
		else if($playerCommand == "stop") {
			execCommandAndDisplay($GLOBALS["mpc"] . " stop");
		}
		//prev command
		else if($playerCommand == "prev") {
			execCommandAndDisplay($GLOBALS["mpc"] . " prev");
		}
		//next command
		else if($playerCommand == "next") {
			execCommandAndDisplay($GLOBALS["mpc"] . " next");
		}
		//reload play list
		else if($playerCommand == "reload") {
			execCommandAndDisplay($GLOBALS["mpc"] . " stop");
			execCommandAndDisplay($GLOBALS["mpc"] . " clear");
			if(file_exists($GLOBALS["radio_store"])) {
				$Vdata = file_get_contents($GLOBALS["radio_store"]);
				$stations = explode("\n", $Vdata);
				for($i=0; $i<sizeof($stations); $i++) {
					$addCmd = $GLOBALS["mpc"] . " add" . $stations[$i];
					//	echo $addCmd;
					execCommandAndDisplay($addCmd);
				}
			}
			execCommandAndDisplay($GLOBALS["mpc"] . " play");
		}
		//add to whishlist
		else if($playerCommand == "wishlist") {
			$activeTitle = $GLOBALS["radio_display"];
			addToWishlist($activeTitle);			
		}
	}
}


/**
 * Executes the system command for the mpc client.
 * @param String $cmd
 */
function execCommandAndDisplay($cmd)
{
	$GLOBALS["radio_display"] = exec($cmd); 	
}
?>



<div style="height:250px;">
<div style="width:200px;">&nbsp;</div>
 <textarea rows="12" cols="80" class="wishlist" readonly><?php echo $GLOBALS["radio_display"]; ?></textarea>
</div>
<div>
 <para><a href="index.php?inc=player&command=player_play"> <img src="img/playback_play_icon&32.png" alt="" /></a></para>
  <para> <a href="index.php?inc=player&command=player_stop"> <img	src="img/playback_stop_icon&32.png" alt="" /></a></para>
	<para> <a href="index.php?inc=player&command=player_prev"> <img	src="img/playback_prev_icon&32.png" alt="" /></a></para>
	<para> <a href="index.php?inc=player&command=player_next"> <img	src="img/playback_next_icon&32.png" alt="" /></a> </para>
	
	<span> <a href="index.php?inc=player&command=player_wishlist"> <img src="img/star_fav_icon&32.png" alt="" /></a></span>
	
	<para> <a href="index.php?inc=player&command=player_reload"><img src="img/playback_reload_icon&24.png" alt="" /></a></para>
</div>
