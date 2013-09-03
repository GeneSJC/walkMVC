{assign var="debug1" value=true nocache}

{if $debug1 }
<div style='padding: 5px; border: 5px orange solid' >
debug formJSON: {$dFormJSON}
</div>
{/if}



<form id="{$dFormId}"></form>

<script type="text/javascript" >
function viewOnLoad() 
{
	load_dForm();
}

function load_dForm() 
{
	dbg ('enter go');
	// jqueryAjax(null, 'http://localhost/dev/jq.dform_demo/app1/post/post_ctrl.php', submitNewPost);
	var dFormId = '{$dFormId}';
	var dFormJson = {$dFormJSON};
	set_dForm(dFormId, dFormJson);
}
</script>