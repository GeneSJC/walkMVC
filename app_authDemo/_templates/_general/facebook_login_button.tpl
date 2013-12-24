<fb:login-button 
     xstyle='padding-left: 20px; margin-top: 10px;  xmargin-left: 150px;'
     xstyle='background-color: white; padding: 2px;  border: 2px solid #777777;  '  
     on-login="top.location = '{$loginUrl}'; "size="large" >Log In w/Facebook</fb:login-button>

    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId: '{$fbAppId}',
          access_token: '{$fbAppId}',
          
          cookie: true,
          xfbml: true,
          oauth: true
        });
        FB.Event.subscribe('auth.login', function(response) {
          window.location.reload();
        });
        FB.Event.subscribe('auth.logout', function(response) {
          window.location.reload();
        });
      };
      (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol +
          '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
      }());
    </script>
