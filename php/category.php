<?php
	require 'library.php';
	$test = MySQLConnection('localhost','dmckechn','7hr58jh5','dmckechn');
	if($test != NULL){
		echo "<h2>Error</h2><p>MySQL connection failed with error ".$test[0].": ".$test[1]."</p><br />";
		break;
	}	

	if($_POST["category"] != ""){
		$insert = mysql_real_escape_string($_POST['category']);
		$query = 'INSERT INTO categories(c_id, name) VALUES(NULL,"'.$insert.'")';
		$confirm = mysql_query($query);
		$error = mysql_errno().": ".mysql_error();
		if($confirm != FALSE){
			echo "Category added.";
		}
		else{
			echo "Category not added. <br />";
			echo "Error no. ".$error;
			$bug = print_r($_POST);
			echo $bug;
		}
	}
	else{
		echo "No content.";
		return;
	}

	mysql_close($test);
?>