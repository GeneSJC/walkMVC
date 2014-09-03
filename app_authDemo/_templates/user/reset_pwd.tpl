{include file="../_general/header.tpl" title={$title}}

{* no if isset($dFormJSON) required, since we know this view expects that token *}
{include file="../_general/dForm_element.tpl" }

{include file="../_general/footer.tpl"}

{*
<hr/>
<hr/>

Here's the view for the Recover link

<pre>
User will have to provide the key,
then we:
- look up the email for the key
- make sure it's no more than 1 hour old; if it is, resend link
- if ok, show password reset and associate it with the user id

</pre>
*}