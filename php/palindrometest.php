<!DOCTYPE html>

<html>

<head>

<title>Palindrome Script</title>

	<link rel="stylesheet" type="text/css" href="../css/dmckechn.css" />

</head>

<body>
	<div id="header">
		<h1 class="hellohead">&nbsp;Is it?</h1>
		<p>Is it a palindrome? I must know.</p>
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
		<p>
			<?php
				$illegalChars = array(" ","\t","\n","\0","\x0B","\"","'",",",".","?","/",";",":","|","!","@","#","$","%","^","&","*","(",")","-","_","+","=");
				$stringForward = $_POST["testtext"]; //the string frontways
				$stringForwardTrimmed = strtolower(str_replace($illegalChars, "", $stringForward));
				$stringBackward = strrev($stringForward);
				$stringBackwardTrimmed = strrev($stringForwardTrimmed); //the string backward for comparison purposes

				if(!empty($stringForward)){
					if($stringForwardTrimmed === $stringBackwardTrimmed){
						echo '<strong>Forward:</strong>  '.$stringForward."<br />\n";
						echo '<strong>Backward:</strong> '.$stringBackward."<br />\n";
						echo '<strong>Stripped forward:</strong>  '.$stringForwardTrimmed."<br />\n";
						echo '<strong>Stripped backward:</strong> '.$stringBackwardTrimmed."<br />\n";
						echo "<strong>Yep</strong>, that's a palindrome.<br />\n";
					}
					else{
						echo '<strong>Forward:</strong>  '.$stringForward."<br />\n";
						echo '<strong>Backward:</strong> '.$stringBackward."<br />\n";
						echo '<strong>Stripped forward:</strong>  '.$stringForwardTrimmed."<br />\n";
						echo '<strong>Stripped backward:</strong> '.$stringBackwardTrimmed."<br />\n";
						echo "That's not a palindrome, <strong>you goof!</strong><br />\n";
					}
				}
				else{
					echo "No input means <strong>no can do</strong>, chief.<br />\n";
					echo '<a href="../huco520.php">Go back</a><br />'."\n";
				}
			?>
		</p>
	</div>

</body>


</html>