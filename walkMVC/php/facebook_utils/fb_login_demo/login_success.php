<?php 

require '../facebook_api/facebook.php';
require '../util_facebook.php';
require './cfg_facebook.php';

$fb_user_profile = FacebookApiUtil::getFacebookUserProfile(); // see function for global params accessible after this call

if (! $fb_user_profile) 
    {
	header ("Location: ./rsnpg_fb_demo.php ");
	return;
    }

 echo handleLoggedIn();

/**
 * Call this HTML content if FB $user is logged in with approval
 */
function handleLoggedIn () 
{ 
    global $facebook_user, $fb_user_profile, $permissions;
	
	ob_start(); 
?>
<h1>LOGIN SUCCESS</h1>

     <?php print 'PERMS: <pre>'.htmlspecialchars(print_r($permissions, true)).'</pre>'; ?>
      Your user profile is
      <pre>
        <?php print htmlspecialchars(print_r($fb_user_profile, true)) ?>
      </pre>
      
<?php
    return ob_get_clean();
} 
?>
