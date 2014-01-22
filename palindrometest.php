<!DOCTYPE html>

<html>

<head>

<title>Palindrome Script</title>

	<link rel="stylesheet" type="text/css" href="../css/dmckechn.css" />

</head>

<body>
	<div id="header">
			<h1 class="hellohead">CSS, SQL, php.</h1>
			<p>Oh my.</p>
			<ul>
				<li><a href="http://urbanobscure.com" target="_blank">portfolio</a></li>
				<li><a href="../cv.php">curriculum vitae</a></li>
				<li><a href="http://agovernmentman.tumblr.com/tagged/huco-617" target="_blank">HUCO 617 responses</a></li>
				<li><a href="../huco520.php">HUCO 520</a></li>
				<li><a href="../unity.php">game experiments</a></li>
				<li><a href="../index.php">~</a></li>
			</ul>
		</div>
		
		<div id="content">
			<?php
				$illegalChars = array(" ","\t","\n","\0","\x0B",",",".","?","/",";",":","|","!","@","#","$","%","^","&","*","(",")","-","_","+","=");
				$stringForward = $_POST["testtext"]; //the string frontways
				$stringForwardTrimmed = strtolower(str_replace($illegalChars, "", $stringForward));
				$stringBackward = strrev($stringForward);
				$stringBackwardTrimmed = strrev($stringForwardTrimmed); //the string backward for comparison purposes

				echo 'Forward:  '.$stringForward."<br />\n";
				echo 'Backward: '.$stringBackward."<br />\n";
				echo 'Stripped forward:  '.$stringForwardTrimmed."<br />\n";
				echo 'Stripped backward: '.$stringBackwardTrimmed."<br />\n";

				if($stringForwardTrimmed === $stringBackwardTrimmed){
					echo "Yep, that's a palindrome.<br />\n";
				}
				else{
					echo "That's not a palindrome, you goof!<br />\n";
				}
				echo print_r($_POST)."<br />\n";
				echo $stringForward."\n";
			?>
		</div>

</body>


</html>