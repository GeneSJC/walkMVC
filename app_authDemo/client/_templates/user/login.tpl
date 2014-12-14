{include file="../_general/header.tpl" }
{* title={$title}  *}
{if isset($fbAppId) }
	{include file="../_general/facebook_login_button.tpl"}
{/if}
<br/>

{* no if isset($dFormJSON) required, since we know this view expects that token *}
{include file="../_general/dForm_element.tpl" }


<br/> 
<a href='{$APP_REST_ROOT}/public/register'>Register</a><br />
<a href='{$APP_REST_ROOT}/public/recover' >Forgot password?</a>


<script type="text/javascript" >
$('#{$dFormId}').on('submit', function(ev) {
	// console.log('we can hash the data');
});
</script>


{include file="../_general/footer.tpl"}
