<?php
$wishlist = "";
if(file_exists($GLOBALS["wishlist_store"])) {
	$wishlist = file_get_contents($GLOBALS["wishlist_store"]);
}
if(isset($_GET["command"])) {
	$wishlistCommand = $_GET["command"];
	if($wishlistCommand == "delete") {
		unlink($GLOBALS["wishlist_store"]);
		$Vdata = "***************************** ";
		$Vdata .= date(DATE_RFC822);
		$Vdata .= " *****************************\n";
		file_put_contents($GLOBALS["wishlist_store"], $Vdata);
	}
}
 
?>

<div>
	<textarea class="wishlist" rows="30" cols="100" name="wishlist" readonly><?php echo $wishlist; ?></textarea>
</div>
<div>
 <span><a href="index.php?inc=wishlist&command=delete"><img src="img/trash_icon&32.png" alt="" /></a></span>
</div>
