<!DOCTYPE html>
<html>
	<head>
		<title><..--''\\__//**B I R D C L U B   J U D G E M E N T   M A T R I X //**\\..--''></title>
		<style>
			.addresses{
				margin:15px;
				padding:15px;
				width:350px;
				height:auto;
				background-color:#ffcc33;
				border: 1px solid #ffcc33;
				border-radius:15px;
				box-shadow:2px 2px 20px 3px #ccc;
				font-family:Consolas, sans-serif;
				color:#000099;
				float:left;
				position:relative;
			}
			h1{
				color:red;
				margin:10px 0;
				font-size:36pt;
			}
			input[text]{
				color:#aaa;
			}
		</style>
	</head>
	<body>
		<section class="addresses">
			<h1>BIRDCLUB JUDGEMENT MATRIX</h1>
			<?php
			require 'library.php';
			//establish database connection
			MySQLConnection('localhost','huco520','huco520','birdclub');

			//send a query
			$query = "SELECT CONCAT(first, ' ', last) AS name FROM member";
			$cloud = mysql_query($query);

			$html = "<select>";
			while($row = mysql_fetch_assoc($cloud)){
				$html .= "<option value=\"".$row['id']."\">".$row['name']."</option>";
			}
			$html .= "</select>";
			echo "Members: ".$html."<br /><br />";

			$list = "SELECT CONCAT(first, ' ', last) AS name, email FROM member";
			$judgementlist = mysql_query($list);
			//get data from the mysqcloud
			while($row2 = mysql_fetch_assoc($judgementlist)){
				if($row2['email'] == NULL){
					echo "Name: ".$row2['name']."<br />\n";
					echo "Email: <h1>LUDDITE</h1><br />\n";
					echo "<hr />\n\n";
				}
				else{
					echo "Name: ".$row2['name']."<br />\n";
					echo "Email: <a href='mailto:".$row2['email']."'>".$row2['email']."</a><br />\n";
					echo "<hr />\n\n";
				}
			}
			?>
		</section>
		<section class="addresses">
			<form id="form" method="post" action="">
				<input type="text" id="username" label="username" value="username"/>
				<input type="text" id="password" label="password" value="password"/>
				<input type="submit" id="submit" label="submit" value="Submit"/>
			</form>
		</section>
	</body>
	<script type="text/javascript" src="../js/script.js"></script>
</html>