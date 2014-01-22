<?php
	require 'php/header.php';
	require 'php/library.php';
	$test = MySQLConnection('localhost','dmckechn','7hr58jh5','dmckechn');
	if($test != NULL){
		echo "<h2>Error</h2><p>MySQL connection failed with error ".$test[0].": ".$test[1]."</p><br />";
		break;
	}
	$returnHeadings = mysql_query("SELECT c_id, kind FROM categories");
	$filterHeadings = mysql_query("SELECT type FROM posts WHERE type IS NOT NULL");
	$returnCats = mysql_query("SELECT * FROM posts");

	$categoryQuery = "SELECT * FROM categories";
	$categoriesActual = mysql_query($categoryQuery);
?>
<div id="contentwrapper">
<h1>Curriculum vitae</h1>
<hr />
<?php
	while($categoryRow = mysql_fetch_assoc($categoriesActual)) {

		echo "<h2>" . $categoryRow['kind'] . "s</h2>";

		$cvElementQuery = "SELECT * FROM posts WHERE type IS NOT NULL AND type=".$categoryRow['c_id'];
		$cvElementActual = mysql_query($cvElementQuery);

		while ($cvElementRow = mysql_fetch_assoc($cvElementActual)) {
			echo "<table>"
					."<tr>"
						."<td class=\"cvdate\">".$cvElementRow['date']."</td>"
						."<td class=\"cvcontent\">"
							."<strong>".$cvElementRow['name']."</strong><br />";
							if(strlen($cvElementRow['author']) > 0){
								echo "<h3>".$cvElementRow['author']."</h3>";}
							echo $cvElementRow['description']
						."</td>"
					."</tr>"
				."</table>";
		}
	}
?>
</div>
<?php
	require 'php/footer.php';
?>
