<?php

/**
 * Defined in <root>/utils so that:
 * a) This module is decoupled as much as possible
 * b) test script can have easy access
 *  
 *  Integration points:
 *  
 *  1. Render the html/javascript for FB login button : FacebookUtil::authJs ()
 *  
 *  2. Handle FB login success: 
 *  
 *  	a) Define a REST path for handling this
 *  
 *  	b) The function that handles that request will 
 *  			- call: FacebookUtil::setFacebookUserLogin();
 *              - gets the FB UserId and retrieves the user:
 *  				> If user exists in local db - log them in
 *  				> If new user - register their info , then go back to a)
 *  
 *  
 *  3.  Registration FB Logic 
 *  
 *  	a) Generate new user id
 *  	b) Get the FB user profile for any fields we need to add to registration
 *  
 *  
 *  4. Add a field to the user table for fb_userid
 *  
 *  // =========================
 *  // =========================
 *  
 *  Related files to this: under ./app/, rest_facebook.php
 *  
 */

class FacebookApiUtil
{
	private static $APP_ID = null;
	private static $SECRET = null;
	
	// =========================
	// ====  INIT HANDLERS =====
	
	public static function init($appId, $secret)
	{
		self::$APP_ID = $appId;
		self::$SECRET = $secret;
	}
	
	private static function verifyInit()
	{
		if ( self::$APP_ID == null )
		{
			die("FacebookUtil::APP_ID must be set with FacebookUtil::init(appId, secret) ");
		}
		
		if ( self::$SECRET == null )
		{
			die("FacebookUtil::SECRET must be set with FacebookUtil::init(appId, secret) ");
		}
	}
	

	// =========================
	// ====  GET FB API DATA  =====

	public static function getFbUserId()
	{
		if ( $fb_user_profile = FacebookUtil::getFacebookUserProfile() )
		{
			return  $fb_user_profile['id'];
		}
		 
		return null;
	}
		
    /**
     * Loads the FB $facebook_user if logged in and has approved this app
     */
   public static function getFacebookUserProfile()
    {
        global $facebook_user, $facebook_api, $fb_user_profile, $permissions;
    
        $facebook_api = self::getFacebookApi();
        
        // See if there is a user from a cookie
        $facebook_user = $facebook_api->getUser();
        
        if ($facebook_user) 
        {
          try {
            // Proceed knowing you have a logged in user who's authenticated.
            $fb_user_profile = $facebook_api->api('/me');
            
            $permissions = $facebook_api->api("/me/permissions");
            
            return $fb_user_profile;
          } 
          catch (FacebookApiException $e) 
          {
            echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
            $facebook_user = null;
            return null;
          }
        }
    
    }

    
    // ==============================
    // ====  GENERATE LOGIN CONTENT  =====
    
    /**
     * Call this HTML content if FB $user is NOT logged in with approval
     */
    public static function authJs ($loginUrl=null) 
    { 
    	    $facebook_api = self::getFacebookApi();
    	       
       // We don't have a user so showing Login Button with Facebook
       
           ob_start(); 
?>
&nbsp;
&nbsp;
            <fb:login-button 
                xstyle='padding-left: 20px; margin-top: 10px;  xmargin-left: 150px;'
                xstyle='background-color: white; padding: 2px;  border: 2px solid #777777;  '  
                on-login="top.location = '<?php echo $loginUrl ?>'; "size="large" >Log In w/Facebook</fb:login-button>

    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId: '<?php echo $facebook_api->getAppID() ?>',
          access_token: '<?php echo $facebook_api->getAppID() ?>',
          
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

<?php
        return ob_get_clean();
    } 


    // ===================================
    // ====  PRIVATE API REFERENCE - encapsulation  =====

    /**
     * Loads the FB $facebook_user if logged in and has approved this app
     */
    private static function getFacebookApi()
    {
	    	self::verifyInit();
	    	 
	    	global $facebook_api;
	    
	    	if ( $facebook_api != null)
	    	{
	    		return $facebook_api;
	    	}
	    
	    	$facebook_api = new Facebook(
	    			array(
	    					'appId'  => self::$APP_ID,
	    					'secret' => self::$SECRET,
	    			)
	    	);
	    
	    	return $facebook_api;
    }    
}

/**
 * Helper class for tracking FB session data
 * 
 * session_start() - should have been set "upstream"; nec. in order to use $_SESSION
 * 
 */
class FbSession
{
	function getSystemUsernameForCurrentFacebookUser()
	{
		return $_SESSION['sys_username_of_cur_fb_user'];
	}
	
	function setSystemUsernameForCurrentFacebookUser($sysUsername=null)
	{
		$_SESSION['sys_username_of_cur_fb_user'] = $sysUsername;
	}	
	
	function isDoFacebookRegisteration()
	{
		return $_SESSION['do_fb_reg'];
	}
	
	function setDoFacebookRegisteration($flag=true)
	{
		$_SESSION['do_fb_reg'] = $flag;
	}	
	
}

/**
 * Helper class based on model in map_user.php that support fb elements  
 *
 */
class UserFacebookLogic
{
	public static function getExistingUserProfile($fbUserId=null)
	{
		$adapter = getDbAdapter();
		$userMapper = new UserMapper($adapter);

		$userProfile = $userMapper->first(
				array(
						'fb_userid' => $fbUserId
				)
		);

		return $userProfile;
	}

	public static function handleFbUser($userProfile=null)
	{

	
		xlog ("Setting user name with " . $user->username);

		// set the flag for a known fb_user
		FbSession::setSystemUsernameForCurrentFacebookUser ($userProfile->login);
		$this->redirect(array('user/login'));
	
		return Msg::UNEXPECTED_FACEBOOK_ERROR;
	}
	
}


?>