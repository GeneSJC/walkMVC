<?php /* Smarty version Smarty-3.1.14, created on 2013-08-09 14:20:43
         compiled from "/Library/WebServer/Documents/dev/jq.dform_demo/app1/_templates/post/post_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58627571852055300734b21-64255938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '669f3d6501f3502d4aea7ae1599e67509e75495f' => 
    array (
      0 => '/Library/WebServer/Documents/dev/jq.dform_demo/app1/_templates/post/post_edit.tpl',
      1 => 1376083242,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58627571852055300734b21-64255938',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520553007ae3a8_82696768',
  'variables' => 
  array (
    'formJSON' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520553007ae3a8_82696768')) {function content_520553007ae3a8_82696768($_smarty_tpl) {?><html>
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