{include file="../_general/header.tpl" }


<script type="text/javascript">

	var interval_value = 5;
	var pageRefreshMilliseconds = interval_value * 1000; // 2 seconds
	
	setInterval(loadSystemTime, (pageRefreshMilliseconds));

	function loadSystemTime()
	{
		var baseurl = "http://localhost/dev/cloudQA/app/access.php/access/_dev/systemTime";
		
		jqueryAjaxGet(baseurl, showResult);
	}
	
	function showResult(response) 
	{
		// var response = getAjaxResponse();
		
		console.log(response);
		
		$('#time_value').text( response );
		
	}
	
	   $(document)
       .ready(function() 
           {
				loadSystemTime();
				$('#interval_value').text(interval_value);
           }
       );
	
</script>

    Time field will update automatically every <span id='interval_value'></span> seconds
    <br/>
    <br/>

    Current Time: <span id="time_value"></span>
    
	
	<br/>
	<br/>

	<input style='font-size: 1em'  type="button" value="Manual Update" onclick="loadSystemTime();" />
	
	
{include file="../_general/footer.tpl"}