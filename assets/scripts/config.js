//Google Login
function onSignIn(googleUser)
		{
		  var profile = googleUser.getBasicProfile();
		  localStorage.setItem('userName', profile.getName());
		  localStorage.setItem('userPhoto', profile.getImageUrl());
		  localStorage.setItem('userEmail', profile.getEmail());

			//Captura informações do PHP
		  jQuery.ajax({
				url : 'http://localhost/dengue-em-foco/index.php/pages/login/validar',
				type : 'POST', 
				data : {
					'userName' : JSON.stringify(profile.getName()),
					'userPhoto' : JSON.stringify(profile.getImageUrl()),
					'userEmail' : JSON.stringify(profile.getEmail())
				},
				dataType: 'json',
				success : function(data){ 
					window.location.href='http://localhost/dengue-em-foco/pages/login/redirecionar'
				}
			});
		}
		function signOut()
		{
			var auth2 = gapi.auth2.getAuthInstance();
			auth2.disconnect().then(function () {
			  console.log('User signed out.');
			});
							
				
		}

	//Facebook login

		 // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.login(function(response) {
        if (response.authResponse) {
            // usuario aceitou o app
			testAPI();
        }
    }, {
        scope: 'email, publish_actions,user_photos'
    });

  }

  window.fbAsyncInit = function()
  {
	  FB.init({
		appId      : '803156286438464',
		cookie     : true,  // enable cookies to allow the server to access 
							// the session
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.2' // use version 2.2
	  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

	  FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	  });

  };
  // Load the SDK asynchronously
  (function(d, s, id)
  {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }
  (document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
		//Captura informações do PHP
         $.ajax({
           type: 'POST',
           url: "http://localhost/dengue-em-foco/index.php/pages/login/autenticar",
           data: { 'userName' : response.name, 'userPhoto' : 'http://graph.facebook.com/' + response.id + '/picture', 'userEmail' : response.email }
         }).done(function(data) {
         	if(data)
         		window.location.href='http://localhost/dengue-em-foco/index.php/pages/view/mapa';
         	else
         		window.location.href='http://localhost/dengue-em-foco/index.php/pages/view/';
         });
    });
  }
	function logout()
	{
		FB.logout(function(response) {
				// Person is now logged out
				
		});
		document.getElementById('in').setAttribute('style', 'display: inline');
		document.getElementById('out').setAttribute('style', 'display: none');
		document.getElementById('email').innerHTML = "";
		document.getElementById('sexo').innerHTML = "";
		document.getElementById('id').innerHTML = "";
		document.getElementById('foto').innerHTML ="";
		document.getElementById('status').innerHTML ="";

	}
