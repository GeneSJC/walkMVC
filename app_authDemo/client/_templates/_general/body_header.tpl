       
    <div style='padding: 5px ; background-color: orange ' >
    Welcome to our template header
    </div>
    {if ! isset($USER_NAME) }
    <br/>
    <a href="{$APP_REST_ROOT}/public/login">Login</a>
    {/if}
    <hr/>
	
{include file="../_general/menubar_session_top.tpl" }    
	
    
    	{if isset($message) }
	<div style='color: black; border: 2px solid green; 
	padding: 5px ; margin: 10px; width: 400px; '>
	{$message}
	</div>
	{/if}

	{if isset($error_msg) }
	<div style='color: red; border: 2px solid red; 
	padding: 5px ; margin: 10px; width: 400px; '>
	ERROR:
	<br/> 
	<span style='color: black' >{$error_msg}</span> 
	</div>
	{/if}
	
    <br/>