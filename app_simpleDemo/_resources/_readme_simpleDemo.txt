
These instructions assume you have some kind of LAMP stack (EasyPHP, XAMPP, etc)

===================================
1) SETUP STEPS
------------------------------


1. Set your environment constants (db info, url info, etc) in app_cfg.php

2. Rename _index.php ... remove the '_' symbol. Verify the redirect path there goes to the REST call you want as default




===================================
2) GOTCHYA'S : Things to watch out for
------------------------------

URL REWRITES

On the Unix-based Mac OS, we're able to successfully configure the .htaccess file for an app so that the access.php file is not in the url.
It just goes <app_root>/<rest_root> .  

However, in Windows (with XAMPP and EasyPHP so far), the .htaccess doesn't work.  
In that case, you need to include the "access point" php file

	eg: <app_root>/access.php/<rest_root>

	
WRITE PERMISSION ON /_resources

/_resources needs full write permission. 

UNIX command: chmod -R 777 ./_resources
In Windows: right-click folder and turn off Read-Only, and then select for all sub-folders

