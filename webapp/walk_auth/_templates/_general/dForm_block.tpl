
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