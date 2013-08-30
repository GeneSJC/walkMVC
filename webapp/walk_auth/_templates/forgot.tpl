{include file="header.tpl" title={$title}}
<form method="post" action="forgot.php"> 
    <div>
        <span>Forgot password?</span>
        <div>Email: <input type="text" name="email" id="email"></div>
        <div><input type="submit" name="submit" value="Go!"></div>
    </div>
</form>
{include file="footer.tpl"}