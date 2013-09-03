{include file="../_general/header.tpl" title={$title}}

<h2>Login Home</h2>

<form method="post" action="../user/login"> 
    <div>
        <div>Login: <input type="text" name="login" id="login"></div>
        <div>Password: <input type="password" name="password" id="password"></div>
        <div><input type="submit" name="submit" value="Go!"></div>
    </div>
</form>

<br/> 
<a href='http://localhost/dev/walkMVC/webapp/walk_auth/access/public/register'>Register</a><br />
<a onclick='alert("pending")' href='#' x='http://localhost/dev/walkMVC/webapp/walk_auth/access/public/recover' >Forgot password?</a>
   

{include file="../_general/footer.tpl"}