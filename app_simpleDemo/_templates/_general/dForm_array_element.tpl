{if ! isset($debug1) }
	{assign var="debug1" value=99 nocache}
{/if}

{if ! isset($functionArrayIdx) }
	{assign var="functionArrayIdx" value=0 nocache}
{/if}

{assign var="functionData" value=$loadFormFuncArr[$functionArrayIdx] nocache}

<form id="{$functionData->dFormId}"></form>

<script type="text/javascript" >
		
function {$functionData->loadFunctionString} 
{
	dbg ('enter go');
	// jqueryAjax(null, 'http://localhost/dev/jq.dform_demo/app1/post/post_ctrl.php', submitNewPost);
	var dFormId = '{$functionData->dFormId}';
	var dFormJson = {$functionData->dFormJSON};
	set_dForm(dFormId, dFormJson);
}

</script>

{if ($debug1 eq 99 ) }
<div class='debug1' style='padding: 5px; border: 5px orange solid' >
debug formJSON: {$functionData->dFormJSON}
</div>
{/if}

