<html>

	<head>
		<title>Loops</title>

		<style>
			body {
				height:100%;
				color:#fff;
				font-size:16pt;
				font-family:Helvetica,Arial,sans-serif;
				background: #45484d; /* Old browsers */
				background: -moz-linear-gradient(top, #45484d 0%, #000000 100%); /* FF3.6+ */
				background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#45484d), color-stop(100%,#000000)); /* Chrome,Safari4+ */
				background: -webkit-linear-gradient(top, #45484d 0%,#000000 100%); /* Chrome10+,Safari5.1+ */
				background: -o-linear-gradient(top, #45484d 0%,#000000 100%); /* Opera 11.10+ */
				background: -ms-linear-gradient(top, #45484d 0%,#000000 100%); /* IE10+ */
				background: linear-gradient(to bottom, #45484d 0%,#000000 100%); /* W3C */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#45484d', endColorstr='#000000',GradientType=0 ); /* IE6-9 */
			}
			
			h1{
				font-size:3rem;
			}
		</style>
	</head>

	<body>
		<h1>Loops</h1>
		<?php
			echo "A <strong>while</strong> loop.<br/>\n";
			$count = 1;
			while ($count < 4){
				echo "$count <br/>\n";
				$count++;
			}
		?>
		<br />
		<?php
			define("MAX_RUN",1000);
			define("HEADS",0);
			define("TAILS",1);
			echo "An <strong>if</strong> loop nested in a while loop.<br />\n";
			$heads = 0;
			$totalFlips = 0;

			while($totalFlips < MAX_RUN){
				if (rand(HEADS,TAILS) == HEADS){
					$heads++;
				}
				$totalFlips++;
			}

			$headPercent = round(($heads/$totalFlips)*100, 10);	
			echo "The number of heads in $totalFlips coin flips is $heads. <br/>\n The percentage of heads is $headPercent%. </br>\n"
		?>
		<br />
		<?php
			echo "A <strong>for</strong> loop.<br/>\n";

			$heads = 0;
			$tails = 0;

			for($totalFlips = 0; $totalFlips < MAX_RUN; $totalFlips++){
				if(rand(HEADS,TAILS) == HEADS){
					$heads++;
				}
				else{
					$tails++;
				}
			}

			$headPercent = round(($heads/$totalFlips)*100, 10);	
			echo "The number of heads in $totalFlips coin flips is $heads. <br/>\n The percentage of heads is $headPercent%. </br>\n";
		?>
		<br />
		<?php 
			echo "A for loop that counts to 100 by twos.<br />\n";
			for($n = 0; $n < 100; $n += 2){
				echo $n." ";
			}
		?>
	</body>
</html>
