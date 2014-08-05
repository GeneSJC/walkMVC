{include file="../_general/header.tpl" }

<script type="text/javascript">

	function getSvc1Value()
	{
		var baseUrl = "../demo/ajaxSvc1";
		
		// doAjaxRequest(baseurl, showResult);

		jqueryAjaxGet (baseUrl, showResult)
	}
	
	function showResult(responseJSON) 
	{
		console.log(responseJSON);
	}

		
</script>

	<h2>GET svc1Value INFO</h2>
	<input type="button" value="Get dSvc1 Value" onclick="getSvc1Value();" />
	<br> Svc1 value :
	<span id="svc1Value"></span>
	<br>

{include file="../_general/footer.tpl"}