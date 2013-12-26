

// =====================
// AJAX

	function jqueryAjax (theData, baseUrl, successFunction)
	{
		request = $.ajax({
			type: "POST",
			url: baseUrl,
		    dataType: "json",
			data: { data :  JSON.stringify(theData) },
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
	
	

// Non-jquery way of AJAX

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
	AJAX_REQUEST.open("POST", url, true);
	AJAX_REQUEST.send();
}

function getAjaxResponse()
{
		// has to == 4 in order for SUCCESS - all other values, we do nothing
	if (AJAX_REQUEST.readyState != 4) 
		return null;

	var response = AJAX_REQUEST.responseXML;

	// alert ('doAjaxRequest gets response = ' + response);
	
	return response;
}


