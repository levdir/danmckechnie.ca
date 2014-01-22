$(window).bind("load", function() {
	if ((window.location.pathname.split('/').slice(-1)[0] == "index.php") 
	    || (window.location.pathname.split('/').slice(-1)[0] == "")){
		var contentLoaded = $("content").css("display");
		if(contentLoaded == "none"){
			return false;
		}
		else{
			$("#content").fadeTo(1200, 0.0);
			$("#content").css("display","none");
			window.console.log('Fade out!');
			return;
		}
	}
	else{
		var contentLoaded = $("#content").css("display");
		if(contentLoaded == "none"){
			$("#content").css("display","block");
			$("#content").fadeTo(1200,1.0);
			window.console.log('Fade in!');
			return;
		}
		else{
			return false;
		}
	}	
});

/*$(document).ready(function() {
	$('#button').click(function(){
		$('#update').slideDown(1000);
	});
});*/