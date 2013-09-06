{include file="../_general/header.tpl" title={$title}}


{* no if isset($dFormJSON) required, since we know this view expects that token *}
{include file="../_general/dForm_block.tpl" }


<br/> 
<a href='http://localhost/dev/walkMVC/webapp/walk_auth/access/public/register'>Register</a><br />
<a onclick='alert("pending")' href='#' x='http://localhost/dev/walkMVC/webapp/walk_auth/access/public/recover' >Forgot password?</a>


<script type="text/javascript" >
$('#{$dFormId}').on('submit', function(ev) {
	// console.log('we can hash the data');
});
</script>


{include file="../_general/footer.tpl"}