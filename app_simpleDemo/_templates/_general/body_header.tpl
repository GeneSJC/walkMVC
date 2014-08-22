
{if isset($message) }
<div>
message = {$message}
</div>
{/if}
    <div style='padding: 5px ; background-color: xorange; 
    						font-size: 2em; font-weight: bold; ' >
   
	{$title}
	    
    {if isset($error_msg) }
	<div style='border: red solid 2px'>
	ERROR: {$error_msg}
	</div>
	{/if}
    
    
    </div>
    <hr/>

    <br/>