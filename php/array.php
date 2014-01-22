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
		<?php
			echo "An <strong>array</strong>.<br/>\n";
			$hairColour[0] = 'yellow';
			$hairColour[1] = 'blue';
			$hairColour[2] = 'none';

			$total = count($hairColour);
			echo "There are $total customers:<br />\n";

			for($i = 0; $i < $total; $i++){
				echo 'What is in $hairColour['.$i."]?<br />\n";
				echo $hairColour[$i]."<br />\n";
			}

			echo $hairColour[4];
			$winner = rand(0,2);
			echo "Lottery winner: ".$hairColour[$winner]."<br />\n";
		?>
	</body>

	</html>