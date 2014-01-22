<?php
	if(isset($_POST["submitted"])){
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
				echo "Enter a new string to test or click <strong>reset</strong> to start over.<br />\n";
				echo '<input type="button" value="Reset" onclick="window.location.reload()" />'."<br />\n";
			}
			else{
				echo '<strong>Forward:</strong>  '.$stringForward."<br />\n";
				echo '<strong>Backward:</strong> '.$stringBackward."<br />\n";
				echo '<strong>Stripped forward:</strong>  '.$stringForwardTrimmed."<br />\n";
				echo '<strong>Stripped backward:</strong> '.$stringBackwardTrimmed."<br />\n";
				echo "That's not a palindrome, <strong>you goof!</strong><br />\n";
				echo "Enter a new string to test or click <strong>reset</strong> to start over.<br />\n";
				echo '<input type="button" value="Reset" onclick="window.location.reload()" />'."<br />\n";
			}
		}
		else{
			echo "No input means <strong>no can do</strong>, chief.<br />\n";
			echo "Enter a new string to test or click <strong>reset</strong> to start over.<br />\n";
			echo '<input type="button" value="Reset" onclick="" />'."<br />\n";
		}
	}
?>