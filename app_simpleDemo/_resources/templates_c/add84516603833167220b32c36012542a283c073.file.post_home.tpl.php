<?php /* Smarty version Smarty-3.1.14, created on 2013-10-10 15:50:25
         compiled from "./_templates/post/post_home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97367136252572f31586fa7-56120488%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'add84516603833167220b32c36012542a283c073' => 
    array (
      0 => './_templates/post/post_home.tpl',
      1 => 1381445242,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97367136252572f31586fa7-56120488',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'items' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52572f315dd071_68534284',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52572f315dd071_68534284')) {function content_52572f315dd071_68534284($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../_general/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<div>

</div>

<h1>Post Start</h1>


<a href="./edit">Add New Post</a>
<br/>
<br/>
<br/>

Table Contents:
<table cellpadding='5' border='1' >
<tr>
<th>
id
</th>
<th>
title
</th>
<th>
body
</th>
<th>
status
</th>
<th>
Acion
</th>
</tr>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<tr>
<td>
<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
 
</td>
<td>
<?php echo $_smarty_tpl->tpl_vars['item']->value->title;?>
 
</td>
<td>
<?php echo $_smarty_tpl->tpl_vars['item']->value->body;?>
 
</td>
<td>
<?php echo $_smarty_tpl->tpl_vars['item']->value->status;?>
 
</td>
<td>
<a href='../post/edit/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
'>View</a>

<a href='../post/delete/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
'>Delete</a>
</td>
</tr>
<?php } ?>
</table>


<?php echo $_smarty_tpl->getSubTemplate ("../_general/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>