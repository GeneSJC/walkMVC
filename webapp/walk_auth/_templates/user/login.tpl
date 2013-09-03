{include file="../_general/header.tpl" title={$title}}


{* no if isset($dFormJSON) required, since we know this view expects that token *}
{include file="../_general/dForm_block.tpl" }


<br/> 
<a href='http://localhost/dev/walkMVC/webapp/walk_auth/access/public/register'>Register</a><br />
<a onclick='alert("pending")' href='#' x='http://localhost/dev/walkMVC/webapp/walk_auth/access/public/recover' >Forgot password?</a>
   

{include file="../_general/footer.tpl"}