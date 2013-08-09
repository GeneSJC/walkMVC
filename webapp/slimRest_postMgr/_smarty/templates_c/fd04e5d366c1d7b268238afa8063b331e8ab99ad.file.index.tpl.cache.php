<?php /* Smarty version Smarty-3.1.14, created on 2013-08-09 13:37:22
         compiled from "/Library/WebServer/Documents/dev/jq.dform_demo/app1/_templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173921862152055302d28710-47872837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd04e5d366c1d7b268238afa8063b331e8ab99ad' => 
    array (
      0 => '/Library/WebServer/Documents/dev/jq.dform_demo/app1/_templates/index.tpl',
      1 => 1375997631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173921862152055302d28710-47872837',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52055302e06e13_74813111',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52055302e06e13_74813111')) {function content_52055302e06e13_74813111($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include '/Library/WebServer/Documents/dev/jq.dform_demo/php/smarty/libs/plugins/modifier.capitalize.php';
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