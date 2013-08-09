<?php /* Smarty version Smarty-3.1.14, created on 2013-08-08 15:30:15
         compiled from "/Library/WebServer/Documents/dev/jq.dform_demo/app1/smarty/templates/post/post_home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80808880252041bf7cc3de6-78962063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749ca08591626ad009ae57b4a6a388759d531579' => 
    array (
      0 => '/Library/WebServer/Documents/dev/jq.dform_demo/app1/smarty/templates/post/post_home.tpl',
      1 => 1375999458,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80808880252041bf7cc3de6-78962063',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52041bf7cf1966_63016166',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52041bf7cf1966_63016166')) {function content_52041bf7cf1966_63016166($_smarty_tpl) {?><html>
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