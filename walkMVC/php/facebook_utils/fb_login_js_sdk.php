<?php

require './facebook/facebook.php';
require './util_facebook.php';

 // global $user, $facebook, $user_profile, $permissions;
 
$fbAppId = 'a';
$fbSecret = 'b';
FacebookApiUtil::init($fbAppId, $fbSecret);

$fb_user_profile = FacebookApiUtil::getFacebookUserProfile(); // see function for global params accessible after this call

?>
<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <body>

    <?php 

    if ($fb_user_profile) 
    {
        echo handleLoggedIn();
        // here we have to redirect to login processor action and:
        /*
         * 1. Check for fb_userid in tbl_profiles
         * 2. If it exist do login
         * 3. If not, Register & then do login
         * 
         */
        
        $loc = 'http://localhost/dev/zz';
        
        echo "This is where we *would* redirect to: $loc" ;
        
       //  header( 'Location: ' . $loc ) ;
        
    }
    else
    {
    		$loginUrl = '../public/fbLogin';
    		 
        	echo FacebookApiUtil::authJs($loginUrl);
    }

    ?>

  </body>
</html>

<?php 



/**
 * Call this HTML content if FB $user is logged in with approval
 */
function handleLoggedIn () 
{ 
    global $facebook_user, $fb_user_profile, $permissions;
	
	ob_start(); 
?>

     <?php print 'PERMS: <pre>'.htmlspecialchars(print_r($permissions, true)).'</pre>'; ?>
      Your user profile is
      <pre>
        <?php print htmlspecialchars(print_r($fb_user_profile, true)) ?>
      </pre>
      
<?php
    return ob_get_clean();
} 
?>
