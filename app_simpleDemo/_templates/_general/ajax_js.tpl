{literal}

<script type="text/javascript" >

	// =====================
	// =====================
	// AJAX
	// -------------------
	// -------------------
	
	
	// =====================
	// jQuery way of AJAX
	// -------------------

	// theData

	
	function jqueryAjaxGet (baseUrl, successFunction)
	{
		jqueryAjax(baseUrl, successFunction, "GET");		
	}	
	
	function jqueryAjaxPost (baseUrl, successFunction)
	{
		jqueryAjax(baseUrl, successFunction, "POST");		
	}	
	
	function jqueryAjax (baseUrl, successFunction, method)
	{
		if ( ! method )
		{
			method = "GET";
		}
		
		request = $.ajax({
			type: method,
			url: baseUrl,
		    // dataType: "json",
			// data: { data :  JSON.stringify(theData) },
			success: function(responseJSON) 
			{
				console.log ('calling successFunction');
				successFunction(responseJSON);
			},
			error: function(response) 
			{
				console.log("ajax error. response:  "  + response);
			},
			complete: function () 
			{
		        console.log("ajax completed " );
		      }
		});		
	}	
		
	
	// =====================
	// Non-jquery way of AJAX
	// -------------------
	

	var AJAX_REQUEST;
	
	function doAjaxRequest(url, showResultFunction) 
	{
		// alert ('doAjaxRequest gets url = ' + url);
		
		if (window.ActiveXObject) 
		{
			AJAX_REQUEST = new ActiveXObject("Microsoft.XMLHTTP");
		} 
		else if (window.XMLHttpRequest) 
		{
			AJAX_REQUEST = new XMLHttpRequest();
		}
		
		AJAX_REQUEST.onreadystatechange = showResultFunction;
		AJAX_REQUEST.open("GET", url, true);
		
		console.log('issuing request: ' + url);
		
		AJAX_REQUEST.send();
	}
	
	function getAjaxResponse()
	{
			// has to == 4 in order for SUCCESS - all other values, we do nothing
		if (AJAX_REQUEST.readyState != 4) 
			return null;
		else
		{
			console.log('AJAX_REQUEST.readyState: ' + AJAX_REQUEST.readyState);
			var response = AJAX_REQUEST.responseXML;
			console.log('doAjaxRequest gets response = ' + response);
		}
	
		
		return response;
	}
	
	

	
</script>
        		
        		{/literal}
        		