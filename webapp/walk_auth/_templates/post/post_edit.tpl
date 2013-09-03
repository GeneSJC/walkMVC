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

formJSON: {$dFormJSON}
<br/>
<br/>

<form id="{$dFormId}"></form>

<script type="text/javascript" >
function go() {
	dbg ('enter go');
	// jqueryAjax(null, 'http://localhost/dev/jq.dform_demo/app1/post/post_ctrl.php', submitNewPost);
	var dFormId = '{$dFormId}';
	var dFormJson = {$dFormJSON};
	set_dForm(dFormId, dFormJson);
}
</script>




</body>
</html>

