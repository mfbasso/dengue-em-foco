<!doctype html>
<html>
<head>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/scripts/jquery-2.2.3.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="222265736998-tahov32p7ine94dj40f3f79ru140c00o.apps.googleusercontent.com">
</head>
<body>
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/scripts/config.js"></script>
	<div class="g-signin2" data-onsuccess="onSignIn"></div>
	<!--a href="#" onclick="signOut();">Sign out</a-->
	
	<div id="in">
		<!--fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
		</fb:login-button-->
		<div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="false" scope='public_profile, email, user_birthday' onLogin='checkLoginState();'></div>
	</div>
	<div id="out" style="display:none;">
		<button onclick="logout();">Sair</button>
	</div>
	<div id="status">
		
	</div>
	<div id="username">
	</div>
	<div id="email">
	</div>
	<div id="sexo">
	</div>
	<div id="id">
	</div>
	<div id="imagem">
		<img src="" id="foto" />
	</div>
</body></html>
