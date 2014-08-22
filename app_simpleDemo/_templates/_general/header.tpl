{if ! isset($title) }
	{assign var="title" value="Our App" nocache}
{/if}


<html>
    <head>
        <title>{$title}</title>
        
            {literal}
            <style type="text/css">
            
                body{
                    font-family:Arial, Helvetica, sans-serif;
                    font-size:12px;
                    color:#333333;
                } 
                
				body {
				    font-family: sans-serif;
				    padding: 10px;
				}


.ui-dform-form {
	padding: 5px;
	margin: 5px;
	border: 1px solid gray;
	width: 300px;
	overflow: hidden;
}

.ui-dform-label {
	float: left;
	padding: 0 5px;
	margin: 4px 0;
	clear: both;
}

.ui-dform-text   
{
	float: leftt;
	margin: 20px 0;
	display: block;
}

.ui-dform-select   
{
    margin: 20px 0;
    display: block;
}

.ui-dform-submit {
	display: block;
	margin-top: 10px;
	font-size: 2em;
}
				
            </style>

        		{/literal}

			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			<script type="text/javascript" src="{$APP_FRAMEWORK_ROOT}/js/jquery.dform/dist/jquery.dform-1.1.0.min.js"></script>
			<script type="text/javascript" src="{$APP_FRAMEWORK_ROOT}/js/misc_util.js"></script>

        		{include file="../_general/ajax_js.tpl" }
			
    </head>

{include file="../_general/body_dForm_onload.tpl" }
{include file="../_general/body_header.tpl" }
    
{* if present, run JS specific to the current view *}
{*
			{if isset($dFormJSON) }
				<body onload="viewOnLoad()"">
			{else}
			    <body>
			{/if}
 *}
       
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