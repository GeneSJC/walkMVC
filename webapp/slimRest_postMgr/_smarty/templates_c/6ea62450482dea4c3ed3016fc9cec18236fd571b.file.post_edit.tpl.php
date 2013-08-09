<?php /* Smarty version Smarty-3.1.14, created on 2013-08-09 14:59:42
         compiled from "/Library/WebServer/Documents/dev/jq.dform_demo/app_netstats/_templates/post/post_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1765433645205664ef40288-59068195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ea62450482dea4c3ed3016fc9cec18236fd571b' => 
    array (
      0 => '/Library/WebServer/Documents/dev/jq.dform_demo/app_netstats/_templates/post/post_edit.tpl',
      1 => 1376083242,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1765433645205664ef40288-59068195',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'formJSON' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5205664f100d96_69126764',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5205664f100d96_69126764')) {function content_5205664f100d96_69126764($_smarty_tpl) {?><html>
<head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../js/jquery.dform/dist/jquery.dform-1.1.0.min.js"></script>
<script type="text/javascript" src="../../js/ajax_dform.js"></script>

<script type="text/javascript" >
function go() {
	dbg ('enter go');
	// jqueryAjax(null, 'http://localhost/dev/jq.dform_demo/app1/post/post_ctrl.php', submitNewPost);
	setForm();
}

function setForm() 
{
	dbg ('enter submitNewPost');
	// dbg('enter handle1. responseJSON : ' + responseJSON);
	$(function() {
		// Create a form from some JSON
		$("#new-post-form").dform(
			<?php echo $_smarty_tpl->tpl_vars['formJSON']->value;?>

		);
	});

}
</script>

</head>

<style type="text/css">
input,label {
	display: block;
	margin-bottom: 5px;
}
</style>

<body onload="go()"">

<h2>Add Post</h2> 
<form id="new-post-form"></form>



</body>
</html>
<?php }} ?>