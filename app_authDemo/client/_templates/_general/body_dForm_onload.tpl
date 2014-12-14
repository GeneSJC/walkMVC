

{* if present, run JS specific to the current view *}
{if isset($loadFormFuncArr) }
	<body onload="doOnLoad()" style='' >
	
	<script type="text/javascript" >
	
	function doOnLoad() 
	{
		{foreach $loadFormFuncArr as $loadFormFunc}	
		
		{$loadFormFunc};
		
		{/foreach}
		
	}
	
	</script>
	
{else}
    <body>
{/if}
       

