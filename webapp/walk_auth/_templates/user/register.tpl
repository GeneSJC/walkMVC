

{include file="../_general/header.tpl" title={$title}}

Register Form
<form method="post" action="../user/register"> 
    <div>
        <div>User Id: <input type="text" name="login" id="login"></div>
        <div>Email: <input type="text" name="email" id="email"></div>
        <div>Password: <input type="password" name="password" id="password"></div>
        <div><input type="submit" name="submit" value="Go!"></div>
    </div>
</form>

<br/>

{* no if isset($dFormJSON) required, since we know this view expects that token *}
{include file="../_general/dForm_block.tpl" }


{include file="../_general/footer.tpl"}