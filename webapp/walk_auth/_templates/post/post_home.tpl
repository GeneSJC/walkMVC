{include file="../_general/header.tpl" }


<div>
Status: {$statusMsg}
</div>

<h1>Post Start</h1>


<a href="./new">Add New Post</a>

<br/>
<br/>
Table Contents:
{foreach $items as $item}
<br/>
{$item->id} 
{$item->title} 
{$item->body} 
{$item->status} 
{/foreach}


{include file="../_general/footer.tpl"}