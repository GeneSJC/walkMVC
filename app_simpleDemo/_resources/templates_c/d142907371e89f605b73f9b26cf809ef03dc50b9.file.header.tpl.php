<?php /* Smarty version Smarty-3.1.14, created on 2013-12-20 23:05:08
         compiled from "/Library/WebServer/Documents/dev/walkMVC/app_simpleDemo/_templates/_general/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100054035152b4bf145314d6-51863380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd142907371e89f605b73f9b26cf809ef03dc50b9' => 
    array (
      0 => '/Library/WebServer/Documents/dev/walkMVC/app_simpleDemo/_templates/_general/header.tpl',
      1 => 1381445439,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100054035152b4bf145314d6-51863380',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'APP_FRAMEWORK_ROOT' => 0,
    'dFormJSON' => 0,
    'message' => 0,
    'error_msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52b4bf145b1605_48852926',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b4bf145b1605_48852926')) {function content_52b4bf145b1605_48852926($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['title']->value)){?>
	<?php $_smarty_tpl->tpl_vars["title"] = new Smarty_variable("Our App", true, 0);?>
<?php }?>


<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        
            
            <style type="text/css">
            
                body{
                    font-family:Arial, Helvetica, sans-serif;
                    font-size:12px;
                    color:#333333;
                } 
                
				body {
				    font-family: sans-serif;
				    padding: 10px;
				}
				
				label, input {
				    display: block;
				    margin-top: 10px;
				}
				
				form {
				 width: 400px;
				 overflow:hidden;}
				
				label {
				 clear: both;
				 float: left;
				 width: 20%;
				}
				
				input {
				 float: left;
				 width: 70%;
				}
                
            </style>
            
        		
        		
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['APP_FRAMEWORK_ROOT']->value;?>
/js/jquery.dform/dist/jquery.dform-1.1.0.min.js"></script>
			<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['APP_FRAMEWORK_ROOT']->value;?>
/js/ajax_util.js"></script>
			<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['APP_FRAMEWORK_ROOT']->value;?>
/js/misc_util.js"></script>

    </head>


<?php if (isset($_smarty_tpl->tpl_vars['dFormJSON']->value)){?>
	<body onload="viewOnLoad()"">
<?php }else{ ?>
    <body>
<?php }?>
       
<?php if (isset($_smarty_tpl->tpl_vars['message']->value)){?>
<div>
message = <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

</div>
<?php }?>
    <div style='padding: 5px ; background-color: orange ' >
    Welcome to our template header
    
    <?php if (isset($_smarty_tpl->tpl_vars['error_msg']->value)){?>
	<div style='border: red solid 2px'>
	ERROR: <?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>

	</div>
	<?php }?>
    
    
    </div>
    <hr/>
    <br/><?php }} ?>