<?php 
	require 'php/header.php';
?>
<h2>New Entry</h2><br />
<?php
	require 'php/library.php';
	$test = MySQLConnection('localhost','dmckechn','7hr58jh5','dmckechn');
	if($test != NULL){
		echo "<h2>Error</h2><p>MySQL connection failed with error ".$test[0].": ".$test[1]."</p><br />";
		$pageTitle = "Error: Connection Error";
		break;
	}	
	if(isset($_POST)){
		$insert = array(mysql_real_escape_string($_POST['name']),
		            	mysql_real_escape_string($_POST['description']),
		                mysql_real_escape_string($_POST['date']),
		                mysql_real_escape_string($_POST['type']),
		                mysql_real_escape_string($_POST['author']),
		                mysql_real_escape_string($_POST['submitentry'])
		                );
		
		if($insert[2] == '0000-00-00'){
			echo "Entry not added: date required.<br />";
			$pageTitle = "Error: No Date";
			return;
		}
		else{
			for($n = 0; $n <= count($insert); $n++){
				if(!empty($insert[$n])){
					break;
				}
				else{
					$insert[$n] = 'NULL';
				}
			}
		}
		$query = 'INSERT INTO posts(p_id,name,description,date,type,author) VALUES(NULL,"'.$insert[0].'","'.$insert[1].'","'.$insert[2].'","'.$insert[3].'","'.$insert[4].'")';
		$confirm = mysql_query($query);
		$error = mysql_errno().": ".mysql_error();
		if($confirm == TRUE){
			echo "Entry added. <br />";
			$pageTitle = "Entry Added Successfully";
		}
		else{
			echo "Entry not added. <br />";
			echo "Error no. ".$error."<br />";
			//debug details
			echo print_r($_POST)."<br />";
			echo $query."<br />";
			echo print_r($insert);
			$pageTitle = "Error: Error Adding Entry";
		}
	}
	else{
		echo "Entry not added.<br />";
		echo "No content entered.";
		$pageTitle = "Error: No Content";
		return;
	}

	mysql_close($test);

	require 'php/footer.php';
?>