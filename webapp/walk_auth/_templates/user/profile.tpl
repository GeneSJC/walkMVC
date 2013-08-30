{include file="header.tpl" title={$title}}
<h2>Profile Home</h2>
{literal}
    <script>
        jQuery(function(){
           $('#edit').click(function(){
               $('#form').toggle();
           });
        });
    </script>
{/literal}
<a id="edit" href="#">Edit login</a><br/>
<div id="form" style="display:none;">
Welcome user: TBD
</div>
<a href="http://localhost/dev/walkMVC/webapp/AuthRegSmarty_app/auth_ctrl/logout.php">Exit</a>
{include file="footer.tpl"}