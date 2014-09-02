<fb:login-button scope="public_profile,email"
     style='margin-left: 40px; xpadding-right: 120px; xmargin-top: 10px;  xmargin-right: 150px; ; float: center; right; '
     xstyle='background-color: white; padding: 2px;  border: 2px solid #777777;  '  
     on-login="top.location = '{$loginUrl}'; "size="large" >Log In w/Facebook</fb:login-button>

    <div id="fb-root"></div>
    <script>

    function statusChangeCallback(response) {
  	    console.log('statusChangeCallback');
  	    console.log(response);
  	    // The response object is returned with a status field that lets the
  	    // app know the current login status of the person.
  	    // Full docs on the response object can be found in the documentation
  	    // for FB.getLoginStatus().
  	    if (response.status === 'connected') 
  	  	{
  	      // Logged into your app and Facebook.
  	      testAPI();
  	    } 
  	    else if (response.status === 'not_authorized') 
  	  	{
  	      // The person is logged into Facebook, but not your app.
  	      var msg = 'Please log into FB app.';
  	    	  console.log(msg);
  	    } 
  	    else 
  	  	{
  	      // The person is not logged into Facebook, so we're not sure if
  	      // they are logged into this app or not.
  	      var msg = 'Please log into FB.';
	    	  console.log(msg);
  	    }
  	  }

  	  // This function is called when someone finishes with the Login
  	  // Button.  See the onlogin handler attached to it in the sample
  	  // code below.
  	  function checkLoginState() {
  	    FB.getLoginStatus(function(response) {
  	      statusChangeCallback(response);
  	    });
  	  }

  	  window.fbAsyncInit = function() {
  	  FB.init({
  	    appId      : '{$fbAppId}',
  	    cookie     : true,  // enable cookies to allow the server to access 
  	                        // the session
  	    xfbml      : true,  // parse social plugins on this page
  	    version    : 'v2.1' // use version 2.1
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
  	  (function(d, s, id) {
  	    var js, fjs = d.getElementsByTagName(s)[0];
  	    if (d.getElementById(id)) return;
  	    js = d.createElement(s); js.id = id;
  	    js.src = "//connect.facebook.net/en_US/sdk.js";
  	    fjs.parentNode.insertBefore(js, fjs);
  	  }(document, 'script', 'facebook-jssdk'));

  	  // Here we run a very simple test of the Graph API after login is
  	  // successful.  See statusChangeCallback() for when this call is made.
  	  function testAPI() {
  	    console.log('Welcome!  Fetching your information.... ');
  	    FB.api('/me', function(response) {
  	      console.log('Successful login for: ' + response.name);
  	      // document.getElementById('status').innerHTML =
  	      //  'Thanks for logging in, ' + response.name + '!';
  	    });
  	  }
  	  

    </script>
