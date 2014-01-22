<?php 
	require 'php/header.php';
?>
<div id="contentwrapper">
	<h1>Photoblog</h1>
	<hr/>
	<?php
	    $request_url = "http://thisisnotmybeautifulhouse.tumblr.com/api/read?type=photo&num=10"; //get xml file
	    $xml = simplexml_load_file($request_url); //load it
	    foreach($xml->posts->children() as $i){
	    	for($n = 0; $n <= count($i); $n++){
	    		//echo $i->tag[$n]." test test<br />";
		    	$desc = $i->{'photo-caption'};
				$photo = $i->{'photo-url'}; 
				$postURL = $i['url'];
				$postDate = substr($i['date'], 0, 16);
			    echo
		        '<div class="photoblog">
		        	<img src="'.$photo.'" />
		        	<div class="photoblogdesc">
			            <h3 class="photoblogdate">'.$postDate.'</h3>
			            <p>'.$desc.'</p>
			        </div>
			        <div class="photoblogpermalink">
			        	<h3><a href="'.$postURL.'" target="_blank">Permalink</a></h3>
			        </div>
		        </div>';
		        break;
		    }
	  	}
	?>
</div>
<?php 
	require 'php/footer.php';
?>