function jqueryAjax(theData, baseUrl, successFunction) 
{
	request = $.ajax({
		type : "POST",
		url : baseUrl,

		 dataType: "json",
		 data: { data :  JSON.stringify(theData) },

		success : function(responseJSON) {
			console.log('calling successFunction');
			successFunction(responseJSON);
		},
		error : function(response) {
			dbg("ajax error. response:  " + response);
		},
		complete : function() {
			console.log("ajax completed ");
		}
	});
}

function dbg(msg) {
	console.log(msg);
	// alert(msg);
}


