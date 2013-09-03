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
Welcome user: TBD
<br/>
<a href="../public/logout">Exit</a>
{include file="footer.tpl"}