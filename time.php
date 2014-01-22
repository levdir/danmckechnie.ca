<!DOCTYPE html>

<html>

	<head>
		<title>What Time Is It?</title>

		<style>
			body {
				height:100%;
				color:#fff;
				font-size:16pt;
				font-family:Helvetica,Arial,sans-serif;
				background: #45484d; /* Old browsers */
				background: -moz-linear-gradient(top,  #45484d 0%, #000000 100%); /* FF3.6+ */
				background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#45484d), color-stop(100%,#000000)); /* Chrome,Safari4+ */
				background: -webkit-linear-gradient(top,  #45484d 0%,#000000 100%); /* Chrome10+,Safari5.1+ */
				background: -o-linear-gradient(top,  #45484d 0%,#000000 100%); /* Opera 11.10+ */
				background: -ms-linear-gradient(top,  #45484d 0%,#000000 100%); /* IE10+ */
				background: linear-gradient(to bottom,  #45484d 0%,#000000 100%); /* W3C */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#45484d', endColorstr='#000000',GradientType=0 ); /* IE6-9 */
			}
			p{
				background: none;
			}
		</style>
	</head>

	<body>

		<p>

			<?php
				$name = 'Sir Not Appearing In This Film';
				$coin = rand(1,2);
				$countHead = 0;
				$countTail = 0;

				if ($coin==1){
					echo "<p>His name is Jonas; he's carrying the wheel.<br />Flip: $coin<br />Number of heads: $countHead<br />Number of tails: $countTail</p>\n";
					$countTail = $countTail++;
				}
				else{
					echo "<p>His name is $name. He's not appearing in this film.<br />Flip: $coin<br />Number of heads: $countHead<br />Number of tails: $countTail</p>\n";
					$countHead = $countHead++;
				}

				$score = rand(70,100);
				echo "Score: $score<br/>\n";

				switch ($score){
					case $score >= 90:
						echo "You got an A.<br />\n";
						break;
					case $score <= 89:
						echo "You got a B.<br />\n";
						break;
					default:
						echo "You failed.<br />\n";
				}
				
				echo date('r'). "\n";
				$first = "Homer";
				$last = "Simpson";
				$name = $first.' '.$last;
				echo '<p>My favourite character is '.$name."</p>\n";	
				$amount = '$15';
				$amountnum = 15;
				echo "\t<p>$name owes me \$$amountnum</p>\n";
			?>
			This is dummy text.
		</p>
	
	</body>

	</head>

</html>
