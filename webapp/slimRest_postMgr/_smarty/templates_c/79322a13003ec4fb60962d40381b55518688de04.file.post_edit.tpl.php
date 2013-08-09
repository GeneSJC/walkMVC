<?php /* Smarty version Smarty-3.1.14, created on 2013-08-08 15:45:47
         compiled from "/Library/WebServer/Documents/dev/jq.dform_demo/app1/_smarty/templates/post/post_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109882156552041f9b52ca20-75385381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79322a13003ec4fb60962d40381b55518688de04' => 
    array (
      0 => '/Library/WebServer/Documents/dev/jq.dform_demo/app1/_smarty/templates/post/post_edit.tpl',
      1 => 1375999335,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109882156552041f9b52ca20-75385381',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'formJSON' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52041f9b55c707_58189483',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52041f9b55c707_58189483')) {function content_52041f9b55c707_58189483($_smarty_tpl) {?><html>
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

Hello 
<form id="new-post-form"></form>



</body>
</html>
<?php }} ?>