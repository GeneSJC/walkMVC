<?php /* Smarty version Smarty-3.1.14, created on 2013-08-09 15:23:53
         compiled from "/Library/WebServer/Documents/dev/jq.dform_demo/webapp/app1/_templates/post/post_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95972599852056bb67e2470-01648033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e39cdec3ca9fb7721da2ff140d7ef6dcd768db12' => 
    array (
      0 => '/Library/WebServer/Documents/dev/jq.dform_demo/webapp/app1/_templates/post/post_edit.tpl',
      1 => 1376087031,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95972599852056bb67e2470-01648033',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52056bb6818078_82231164',
  'variables' => 
  array (
    'formJSON' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52056bb6818078_82231164')) {function content_52056bb6818078_82231164($_smarty_tpl) {?><html>
<head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery.dform/dist/jquery.dform-1.1.0.min.js"></script>
<script type="text/javascript" src="../../../js/ajax_dform.js"></script>

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