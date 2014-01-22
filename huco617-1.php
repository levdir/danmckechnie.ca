<?php 
	require 'php/header.php';
?>
<div id="contentwrapper">
	<h1>HUCO 617, Fall Term</h1>
	<hr/>
	<?php
	    $request_url = "http://agovernmentman.tumblr.com/api/read?type=regular"; //get xml file
	    $xml = simplexml_load_file($request_url); //load it
	    foreach($xml->posts->children() as $i){
	    	for($n = 0; $n <= count($i); $n++){
	    		//echo $i->tag[$n]." test test<br />";
				if($i->tag[$n] == 'games'){
		    		$title = $i->{'regular-title'};
				    $post = $i->{'regular-body'}; 
				    $postURL = $i['url'];
				    echo
			        '<div>
			            <h2';
			            if(strlen($title) > 30){
			            	echo ' style="letter-spacing:1px;"';
			            }
			            echo '>'.$title.'</h2>'
			            .'<p>'.$post.'</p>'
			            .'<div style="text-align:right; vertical-align:middle; margin: 0 15px 70px 0; font-size:0.5rem;">'
			            .'<h3><a href="'.$postURL.'" target="_blank">Permalink</a></h3></div>'
			        .'</div>';
			        break;
		    	}
		    }
	  	}
	?>
</div>
<?php 
	require 'php/footer.php';
?>