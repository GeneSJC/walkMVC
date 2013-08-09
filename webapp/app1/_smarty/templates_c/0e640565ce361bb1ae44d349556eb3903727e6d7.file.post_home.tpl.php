<?php /* Smarty version Smarty-3.1.14, created on 2013-08-08 15:45:38
         compiled from "/Library/WebServer/Documents/dev/jq.dform_demo/app1/_smarty/templates/post/post_home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82118838852041f9295bb03-13030558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e640565ce361bb1ae44d349556eb3903727e6d7' => 
    array (
      0 => '/Library/WebServer/Documents/dev/jq.dform_demo/app1/_smarty/templates/post/post_home.tpl',
      1 => 1375999458,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82118838852041f9295bb03-13030558',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52041f9298d384_47240441',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52041f9298d384_47240441')) {function content_52041f9298d384_47240441($_smarty_tpl) {?><html>
<head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../js/jquery.dform/dist/jquery.dform-1.1.0.min.js"></script>
<script type="text/javascript" src="../../js/ajax_dform.js"></script>

<script type="text/javascript" >
function go() {
	dbg ('enter go');
	// jqueryAjax(null, 'http://localhost/dev/jq.dform_demo/app1/post/post_ctrl.php', submitNewPost);
}

function submitNewPost(responseJSON) 
{
	dbg ('enter submitNewPost');
	// dbg('enter handle1. responseJSON : ' + responseJSON);
	$(function() {
		// Create a form from some JSON
		$("#new-post-form").dform(
			responseJSON
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

Post Start

<form id="new-post-form"></form>



</body>
</html>
<?php }} ?>