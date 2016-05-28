<!DOCTYPE html>
<html>
  <head>
    <meta name="google-signin-client_id" content="222265736998-tahov32p7ine94dj40f3f79ru140c00o.apps.googleusercontent.com">
  </head>
  <body>

  	<div class="g-signin2" data-onsuccess="onSignIn"></div>

  	<div id="in">
  		<div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false" scope='public_profile, email, user_birthday' onLogin='checkLoginState();'></div>
  	</div>

  	<script type="text/javascript">
  		var usuario = {'userName' : localStorage.getItem('userName'), 'userEmail' : localStorage.getItem('userEmail'), 'userPhoto' : localStorage.getItem('userPhoto')};

  		$.ajax({
  			type: "POST",
  			url: "http://localhost/dengue-em-foco/login/oauth",
  			dataType: 'json',
  			data: {
  				'usuario' : JSON.stringify(usuario)
  			},
  			success: function(data){
  				console.log("success" + data);
  				window.location.href='http://localhost/dengue-em-foco/pages/view/mapa';
  			},
  			error: function(XMLHttpRequest, textStatus, errorThrown){
  			 	alert("Erro! " + textStatus + ' ' + errorThrown);
  			}
  		});
  	</script>
