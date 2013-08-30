<html>
<head>

<script type="text/javascript" src="../../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../../js/jquery.dform/dist/jquery.dform-1.1.0.min.js"></script>
<script type="text/javascript" src="../../../../js/ajax_util.js"></script>
<script type="text/javascript" src="../../../../js/misc_util.js"></script>

</head>

<style type="text/css">
input,label {
	display: block;
	margin-bottom: 5px;
}
</style>

<body onload="go()"">

formJSON: {$formJSON}
<br/>
<br/>

<h2>Add Post</h2> 
<form id="new-post-form"></form>

<script type="text/javascript" >
function go() {
	dbg ('enter go');
	// jqueryAjax(null, 'http://localhost/dev/jq.dform_demo/app1/post/post_ctrl.php', submitNewPost);
	var formId = 'new-post-form';
	var formJson = {$formJSON};
	set_dForm(formId, formJson);
}
</script>




</body>
</html>

