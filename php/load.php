<?php
	switch($_GET['pageId']){
		case 0:
			header("Location: index.php");
			break;
		case 1:
			header("Location: cv.php");
			break;
		case 2:
			header("Location: huco617-1.php");
			break;
		case 3:
			header("Location: huco520.php");
			break;
		case 4:
			header("Location: unity.php");
			break;
		case 5:
			header("Location: login.php");
			break;
		default:
			header("HTTP/1.0 404 Not Found")
	}
?>