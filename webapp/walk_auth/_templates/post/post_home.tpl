<html>
<head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../../../js/jquery.dform/dist/jquery.dform-1.1.0.min.js"></script>
<script type="text/javascript" src="../../../../js/ajax_dform.js"></script>

<script type="text/javascript" >
function go() {
//	dbg ('enter go');
}

</script>

</head>

<style type="text/css">
input,label {
	display: block;
	margin-bottom: 5px;
}
</style>

<body onload="go()"">

<div>
Status: {$statusMsg}
</div>

<h1>Post Start</h1>


<a href="./new">Add New Post</a>

<br/>
<br/>
Table Contents:
{foreach $items as $item}
<br/>
{$item->id} 
{$item->title} 
{$item->body} 
{$item->status} 
{/foreach}




</body>
</html>
