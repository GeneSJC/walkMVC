<?php /* Smarty version Smarty-3.1.14, created on 2013-08-08 15:32:50
         compiled from "/Library/WebServer/Documents/dev/jq.dform_demo/app1/smarty/templates/post/post_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:163096040552041c929aeed0-60179311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '181574fa156c74cc5ef69903e7937074a1463b6b' => 
    array (
      0 => '/Library/WebServer/Documents/dev/jq.dform_demo/app1/smarty/templates/post/post_edit.tpl',
      1 => 1375999335,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163096040552041c929aeed0-60179311',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'formJSON' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52041c929e2675_80509279',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52041c929e2675_80509279')) {function content_52041c929e2675_80509279($_smarty_tpl) {?><html>
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