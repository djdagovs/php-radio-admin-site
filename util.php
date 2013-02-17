<?php 
/**
 * Adds a new station to the end of the station store.
 */
function addStationEntry() {
	$filename = $GLOBALS["radio_store"];
	$stationUrl = $_GET["stationUrl"];
	$buffer = "";
	if(file_exists($filename)) {
		$buffer = file_get_contents($filename);
		unlink($GLOBALS["radio_store"]);
	}
	$buffer .= "\n";
	$buffer .= $stationUrl;
	file_put_contents($filename, trim($buffer));
}


/**
 * Deletes an entry from the stations store file.
 * The id of the entry matches the row number.
 */
function deleteStationEntry() {
	$id = $_GET["id"];
	$filename = $GLOBALS["radio_store"];
	$Vdata = file_get_contents($filename);
	unlink($GLOBALS["radio_store"]);
	$stations = explode("\n", $Vdata);
	$buffer = "";
	for($i=0; $i<sizeof($stations); $i++) {
		if($id != $i) {
			$buffer .= $stations[$i];
			$buffer .= "\n";
		}
	}
	file_put_contents($filename, trim($buffer));
}

/**
 * Add the given entry to the wishlist file
 */
function addToWishlist($entry) {
	$filename = $GLOBALS["wishlist_store"];
	$Vdata = "";
	$Vdata .= "\n\n";
	$Vdata .= "***************************** ";
	$Vdata .= date(DATE_RFC822);
	$Vdata .= " *****************************\n";
	$Vdata .= $entry;
	file_put_contents($filename, $Vdata, FILE_APPEND | LOCK_EX);
}
?>