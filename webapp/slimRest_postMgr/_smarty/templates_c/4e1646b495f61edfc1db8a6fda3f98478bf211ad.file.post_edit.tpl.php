<?php /* Smarty version Smarty-3.1.14, created on 2013-08-09 15:56:46
         compiled from "/Library/WebServer/Documents/dev/walkMVC/webapp/slimRest_postMgr/_templates/post/post_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:522414507520573ae733e11-96907520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e1646b495f61edfc1db8a6fda3f98478bf211ad' => 
    array (
      0 => '/Library/WebServer/Documents/dev/walkMVC/webapp/slimRest_postMgr/_templates/post/post_edit.tpl',
      1 => 1376087642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '522414507520573ae733e11-96907520',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'formJSON' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520573ae768ea3_65683817',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520573ae768ea3_65683817')) {function content_520573ae768ea3_65683817($_smarty_tpl) {?><html>
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