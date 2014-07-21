{if ! isset($title) }
	{assign var="title" value="Our App" nocache}
{/if}


<html>
    <head>
        <title>{$title}</title>
        
		    {include file="../_general/css.tpl" }        
        		
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			<script type="text/javascript" src="{$APP_FRAMEWORK_ROOT}/js/jquery.dform/dist/jquery.dform-1.1.0.min.js"></script>
			<script type="text/javascript" src="{$APP_FRAMEWORK_ROOT}/js/ajax_util.js"></script>
			<script type="text/javascript" src="{$APP_FRAMEWORK_ROOT}/js/misc_util.js"></script>

    </head>

{* if present, run JS specific to the current view *}

				{* >>>  WAS HERE BEFORE 
				include file="../_general/body_dForm_onload.tpl" }
				{ include file="../_general/body_header.tpl" 
				*}


{* NEW CODE  *}
{* if present, run JS specific to the current view *}
{if isset($dFormJSON) }
	<body onload="viewOnLoad()"">
	
{else}
    <body>
{/if}
       
{if isset($message) }
<div>
message = {$message}
</div>
{/if}
    <div style='padding: 5px ; background-color: orange ' >
    Welcome to our template header
    
    {if isset($error_msg) }
	<div style='border: red solid 2px'>
	ERROR: {$error_msg}
	</div>
	{/if}
    
    
    </div>
    <hr/>
    <br/>