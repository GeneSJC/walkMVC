	function set_dForm(formId, formJson) 
	{
		dbg ('enter submitNewPost');
	
		var formId = '#' + formId;
		
		// dbg('enter handle1. responseJSON : ' + responseJSON);
		$(function() {
			// Create a form from some JSON
			$(formId).dform(
					formJson
			);
		});
	
	}


	function dbg(msg) {
		console.log(msg);
		// alert(msg);
	}

	function setDiv (divElementId, value)
	{
		var divTag = document.getElementById(divElementId);
		if ( divTag != null)
		{
			divTag.innerHTML = value;
		}
		
	}

// =====================
// STRING UTILS

var MAX_DUMP_DEPTH = 10;

function dumpObj(obj, name, indent, depth) {
	if (depth > MAX_DUMP_DEPTH) {
		return indent + name + ": <Maximum Depth Reached>\n";
	}
	if (typeof obj == "object") {
		var child = null;
		var output = indent + name + "\n";
		indent += "\t";
		for ( var item in obj) {
			try {
				child = obj[item];
			} catch (e) {
				child = "<Unable to Evaluate>";
			}
			if (typeof child == "object") {
				output += dumpObj(child, item, indent, depth + 1);
			} else {
				output += indent + item + ": " + child + "\n";
			}
		}
		return output;
	} else {
		return obj;
	}
}

function startsWith(data, input)
{
	return (data.substring(0, input.length) === input);
}

function getNumFromString(thestring)
{
	var thenum = thestring.match(/\d+$/)[0];

	return thenum;
}

/**
 * 
 * @param inputString what will be updated & returned
 * @param oldStr what will be REPLACED
 * @param newStr what will be REPLACED-WITH
 */
function replaceAllOccurrences(inputString, oldStr, newStr) 
{
	var i = 0;
	
//	console.log('replaceAllOccurrences gets inputString =  ' + inputString );
//	console.log('replaceAllOccurrences gets oldStr =  ' + oldStr );
	
	while (inputString.indexOf(oldStr) >= 0)
	{
		inputString = inputString.replace(oldStr, newStr);
		i++;
		// console.log('in loop ' + i );
	}
	
	return inputString;
}

