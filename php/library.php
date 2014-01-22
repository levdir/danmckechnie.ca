<?php
	function MySQLConnection($host, $login, $password, $db){
		//connect to the database
		$pipeline = mysql_pconnect($host, $login, $password);

		//select a database
		$selectSuccess = mysql_select_db($db);
		$fail = array();

		if($pipeline && $selectSuccess){
			return null;
		}
		else{
			array_push($fail, mysql_errno());
			array_push($fail, mysql_error());
			return $fail;
		}

		if($fail[0] != 0){
			echo "<h2>Error</h2><p>MySQL connection failed with error ".$fail[0].": ".$fail[1]."</p><br />";
			$pageTitle = "Error: Connection Error";
			break;
		}
	}

	function FetchList($query,$value,$label){
		while($row = mysql_fetch_assoc($query)){
			if($row[$label] == NULL){
				break;
			}
			else{
				echo "<option value=\"{$row[$value]}\">{$row[$label]}</option>";				
			}
		}
	}

	function GetURL(){
		$query = $_SERVER['PHP_SELF'];
		$path = pathinfo($query);
		$currentPage = $path['filename'];
		switch($currentPage){
			case 'index.php':
				$pageTitle = 'University of Alberta Humanities Computing Student';
				break;
			case 'cv.php':
				$pageTitle = 'Curriculum Vitae';
				break;
			case 'huco617-1.php':
				$pageTitle = 'HUCO 617 (Fall Term) Assignments';
				break;
			case 'huco520.php':
				$pageTitle = 'HUCO 520 Assignments';
				break;
			case 'unity.php':
				$pageTitle = 'Game Experiments';
				break;
			case 'login.php':
				$pageTitle = 'Add or Edit a CV Entry';
				break;
		}
		return $pageTitle;
	}

	function AddEntry($_POST){	
		if(isset($_POST['entrysubmitted'])){
			$insert = array(mysql_real_escape_string($_POST['name']),
			            	mysql_real_escape_string($_POST['description']),
			                mysql_real_escape_string($_POST['date']),
			                mysql_real_escape_string($_POST['type']),
			                mysql_real_escape_string($_POST['author']),
			                );
			if($insert[3] == 'addnew'){
				$insert[3] = $_POST['enternew'];
				$insertCat = mysql_real_escape_string($_POST['enternew']);
				$queryCat = 'INSERT INTO categories(c_id, kind) VALUES(NULL,"'.$insertCat.'")';
				$confirm = mysql_query($queryCat);
				$error = mysql_errno().": ".mysql_error();
				if($confirm != FALSE){
					echo "Category added.<br />";
				}
				else{
					echo "Category not added. <br />";
					echo "Error no. ".$error."<br />";
				}
			}

			$updatedCats = "SELECT * FROM categories";
			$queryUpdatedCats = mysql_query($updatedCats);
			while($line = mysql_fetch_assoc($queryUpdatedCats)){
				$insert[3] = $line['c_id'];
			}

			$query = 'INSERT INTO posts(p_id,name,description,date,type,author) VALUES(NULL,"'.$insert[0].'","'.$insert[1].'","'.$insert[2].'","'.$insert[3].'","'.$insert[4].'")';
			$confirm = mysql_query($query);
			$error = mysql_errno().": ".mysql_error();
			if($confirm == FALSE){
				echo "Entry not added. <br />";
				echo "Error no. ".$error."<br />"; 	
				$pageTitle = "Error: Error Adding Entry";
				return;
			}
			else{
				echo "Entry added. <br />";
				$pageTitle = "Entry Added Successfully";
			}
			return;
		}
	}

	function UpdateEntry($_POST){
		if(isset($_POST['entryupdated'])){
			$insert = array(mysql_real_escape_string($_POST['newname']),
			            	mysql_real_escape_string($_POST['newdescription']),
			                mysql_real_escape_string($_POST['newdate']),
			                mysql_real_escape_string($_POST['newtype']),
			                mysql_real_escape_string($_POST['newauthor']),
			                mysql_real_escape_string($_POST['entrylist'])
			                );

			$query = 'UPDATE posts SET name="'.$insert[0].'",description="'.$insert[1].'",date="'.$insert[2].'",type='.$insert[3].',author="'.$insert[4].'" WHERE p_id='.$insert[5];
			$confirm = mysql_query($query);
			$error = mysql_errno().": ".mysql_error();

			if($confirm == FALSE){
				echo "Entry not updated. <br />";
				echo "Error no. ".$error."<br />"; 	
				$pageTitle = "Error: Error Updating Entry";
				return;
			}
			else{
				echo "Entry updated. <br />";
				$pageTitle = "Entry Updated Successfully";
			}
		}
		return;
	}

	function DeleteEntry($_POST){
		if(isset($_POST['entrydeleted'])){
			$insert = mysql_real_escape_string($_POST['deletelist']);

			$query = "UPDATE posts SET name=NULL,description=NULL,date=NULL,type=NULL,author=NULL WHERE p_id=".$insert;
			$confirm = mysql_query($query);
			$error = mysql_errno().": ".mysql_error();

			if($confirm == FALSE){
				echo "Entry not deleted. <br />";
				echo "Error no. ".$error."<br />"; 	
				$pageTitle = "Error: Error Deleting Entry";
				return;
			}
			else{
				echo "Entry deleted. <br />";
				$pageTitle = "Entry Deleted Successfully";
			}
		}
		return;
	}
?>