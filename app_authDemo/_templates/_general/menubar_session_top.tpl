
<style>
#header {
    margin-top: 0;
    height: 30px;
    background-color: #494949;
    padding: 10px 0 0 10px; 
}

#header a {
    
    color: orange;
}

#header a
{
	text-decoration: underline;
}

#header a:hover
{
	text-decoration: none;
}
</style>

    {if isset($USER_NAME) }
<div id="header" style='color: white;'>
    
		User: <b>{$USER_NAME}</b> 
		&nbsp;
		&nbsp;
		&nbsp;
		<a href="{$APP_REST_ROOT}/public/logout">Logout</a>  
		&nbsp;
		&nbsp;
		<a href="{$APP_REST_ROOT}/user/home">My Profile</a>  
		&nbsp;
		&nbsp;
		
		| DEBUG :: 
		 user-id : {$USER_ID}
</div>
	 {/if}
