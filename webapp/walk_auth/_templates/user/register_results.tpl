{include file="header.tpl" title={$title}}
RESULT = {$result}
{if {$result eq 'success' }}
    <p>Good job!</p>
    <a href="http://localhost/dev/walkMVC/webapp/AuthRegSmarty_app/auth_ctrl/login.php">Go login!</a>
{else}
    <p>Failed!</p>
    <a href="/">Try again!</a>
{/if}

{include file="footer.tpl"}