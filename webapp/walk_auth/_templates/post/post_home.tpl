{include file="../_general/header.tpl" }


<div>
{* Status: {$statusMsg} *}
</div>

<h1>Post Start</h1>


<a href="./edit">Add New Post</a>
<br/>
<br/>
<br/>

Table Contents:
<table cellpadding='5' border='1' >
<tr>
<th>
id
</th>
<th>
title
</th>
<th>
body
</th>
<th>
status
</th>
<th>
Acion
</th>
</tr>
{foreach $items as $item}
<tr>
<td>
{$item->id} 
</td>
<td>
{$item->title} 
</td>
<td>
{$item->body} 
</td>
<td>
{$item->status} 
</td>
<td>
<a href='../post/edit/{$item->id}'>View</a>

<a href='../post/delete/{$item->id}'>Delete</a>
</td>
</tr>
{/foreach}
</table>


{include file="../_general/footer.tpl"}