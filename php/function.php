<?php
	$song = "99 bottles of beer on the wall...";
	function PWrap($string){
		$pString = '<p>'.$string.'</p>';
		return $pString;
	}

	echo PWrap($song)."\n";
?>
