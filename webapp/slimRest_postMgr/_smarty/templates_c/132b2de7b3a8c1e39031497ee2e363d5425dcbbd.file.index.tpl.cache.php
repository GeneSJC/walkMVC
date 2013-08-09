<?php /* Smarty version Smarty-3.1.14, created on 2013-08-08 15:45:49
         compiled from "/Library/WebServer/Documents/dev/jq.dform_demo/app1/_smarty/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45113847352041f9df0bfc4-13201401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '132b2de7b3a8c1e39031497ee2e363d5425dcbbd' => 
    array (
      0 => '/Library/WebServer/Documents/dev/jq.dform_demo/app1/_smarty/templates/index.tpl',
      1 => 1375997631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45113847352041f9df0bfc4-13201401',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52041f9e023388_91492665',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52041f9e023388_91492665')) {function content_52041f9e023388_91492665($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include '/Library/WebServer/Documents/dev/jq.dform_demo/php/smarty/libs/plugins/modifier.capitalize.php';
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