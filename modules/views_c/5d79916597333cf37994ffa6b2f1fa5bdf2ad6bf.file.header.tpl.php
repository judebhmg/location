<?php /* Smarty version Smarty-3.1.19, created on 2014-09-12 16:37:17
         compiled from "C:\xampp\htdocs\location\modules\views\inc\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:912953dfeefe2328c6-10016338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d79916597333cf37994ffa6b2f1fa5bdf2ad6bf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\inc\\header.tpl',
      1 => 1410532636,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '912953dfeefe2328c6-10016338',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53dfeefe274f55_99598151',
  'variables' => 
  array (
    'userHeader' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53dfeefe274f55_99598151')) {function content_53dfeefe274f55_99598151($_smarty_tpl) {?><header id="nav-top">
	       		<span class="hello">
	       			Olá <?php echo $_smarty_tpl->tpl_vars['userHeader']->value->nome;?>
 - <span class="color-emp"> <?php echo $_smarty_tpl->tpl_vars['userHeader']->value->razao;?>
 </span>, seja bem vindo.
	       		</span>
				<div class="separator">
	       			<a href="?action=deslogar">Deslogar do sistema</a>
	       		</div>
			</header><?php }} ?>
