<?php /* Smarty version Smarty-3.1.14, created on 2013-08-09 14:52:23
         compiled from "/Library/WebServer/Documents/dev/jq.dform_demo/app_netstats/_templates/post/post_home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:43092295152056438b9dec1-60060506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bca846033316f287fd5db2deac441e0ec9f9c9a6' => 
    array (
      0 => '/Library/WebServer/Documents/dev/jq.dform_demo/app_netstats/_templates/post/post_home.tpl',
      1 => 1376085103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43092295152056438b9dec1-60060506',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52056438c2c031_59674930',
  'variables' => 
  array (
    'statusMsg' => 0,
    'items' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52056438c2c031_59674930')) {function content_52056438c2c031_59674930($_smarty_tpl) {?><html>
<head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../js/jquery.dform/dist/jquery.dform-1.1.0.min.js"></script>
<script type="text/javascript" src="../../js/ajax_dform.js"></script>

<script type="text/javascript" >
function go() {
	dbg ('enter go');
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

<div>
Status: <?php echo $_smarty_tpl->tpl_vars['statusMsg']->value;?>

</div>

<h1>Post Start</h1>


Table Contents:
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<br/>
<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
 
<?php echo $_smarty_tpl->tpl_vars['item']->value->title;?>
 
<?php echo $_smarty_tpl->tpl_vars['item']->value->status;?>
 
<?php } ?>



<form id="new-post-form"></form>

<a href="./new">Add New Post</a>

</body>
</html>
<?php }} ?>