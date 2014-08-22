

{* if present, run JS specific to the current view *}
{if isset($loadFormFuncArr) }
	<body onload="doOnLoad()" style='' >
	
	<script type="text/javascript" >
	
	function doOnLoad() 
	{
		{foreach $loadFormFuncArr as $loadFormFunc}	

		{if ($loadFormFunc instanceof dFormBean ) }
		
			{$loadFormFunc->loadFunctionString};
			
		{else}

			{$loadFormFunc};
			
		{/if}
		
		{/foreach}
		
	}
	
	</script>
	
{else}
    <body>
{/if}
       

