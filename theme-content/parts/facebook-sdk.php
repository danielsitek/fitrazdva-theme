<?php
/**
 * Facebook-sdk php
 *
 * @package FitRazDva Theme
 */

?>
<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId      		 : '125723587609346',
			autoLogAppEvents : true,
			xfbml            : true,
			version          : 'v2.12'
		});
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "https://connect.facebook.net/cs_CZ/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
