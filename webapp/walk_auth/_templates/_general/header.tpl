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
            </style>
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			<script type="text/javascript" src="../../../../js/jquery.dform/dist/jquery.dform-1.1.0.min.js"></script>
			<script type="text/javascript" src="../../../../js/ajax_util.js"></script>
			<script type="text/javascript" src="../../../../js/misc_util.js"></script>
			
        		{/literal}


    </head>

{* if present, run JS specific to the current view *}
{if isset($viewJs) }
	<body onload="go()"">
{else}

    <body>
{/if}
       

    <div style='padding: 5px ; background-color: orange ' >
    Welcome to our template header
    </div>
    <hr/>