<?php /* Smarty version Smarty-3.1.14, created on 2013-08-08 15:32:49
         compiled from "/Library/WebServer/Documents/dev/jq.dform_demo/app1/smarty/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:145223732652041c91422d76-09141240%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd62c3b3f6e8ad6bf28133f6d61232afc8aec78c' => 
    array (
      0 => '/Library/WebServer/Documents/dev/jq.dform_demo/app1/smarty/templates/index.tpl',
      1 => 1375997631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145223732652041c91422d76-09141240',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52041c91478cf3_76853628',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52041c91478cf3_76853628')) {function content_52041c91478cf3_76853628($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include '/Library/WebServer/Documents/dev/jq.dform_demo/php/smarty/libs/plugins/modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/dev/jq.dform_demo/php/smarty/libs/plugins/modifier.date_format.php';
?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>'foo'), 0);?>







<PRE>


<?php if ($_smarty_tpl->getConfigVariable('bold')){?><b><?php }?>

Title: <?php echo smarty_modifier_capitalize($_smarty_tpl->getConfigVariable('title'));?>

<?php if ($_smarty_tpl->getConfigVariable('bold')){?></b><?php }?>

The current date and time is <?php echo smarty_modifier_date_format(time(),"%Y-%m-%d %H:%M:%S");?>


The value of global assigned variable $SCRIPT_NAME is <?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>


Example of accessing server environment variable SERVER_NAME: <?php echo $_SERVER['SERVER_NAME'];?>




<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php }} ?>