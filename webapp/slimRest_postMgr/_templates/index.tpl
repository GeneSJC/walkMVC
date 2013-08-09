{* config_load file="/Library/WebServer/Documents/dev/Smarty-3.1.14/demo/configs/test.conf" section="setup" *}
{include file="header.tpl" title=foo}

{* assign var="cutoff_size" value="40" *}
{* assign var="bold" value="true" *}



<PRE>

{* bold and title are read from the config file *}
{if #bold#}<b>{/if}
{* capitalize the first letters of each word of the title *}
Title: {#title#|capitalize}
{if #bold#}</b>{/if}

The current date and time is {$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}

The value of global assigned variable $SCRIPT_NAME is {$SCRIPT_NAME}

Example of accessing server environment variable SERVER_NAME: {$smarty.server.SERVER_NAME}



{include file="footer.tpl"}
