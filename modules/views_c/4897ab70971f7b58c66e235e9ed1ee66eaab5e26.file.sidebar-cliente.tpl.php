<?php /* Smarty version Smarty-3.1.19, created on 2014-09-18 22:33:00
         compiled from "C:\xampp\htdocs\location\modules\views\inc\sidebar-cliente.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16530540f3c26e4a0d4-21719404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4897ab70971f7b58c66e235e9ed1ee66eaab5e26' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\inc\\sidebar-cliente.tpl',
      1 => 1411072379,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16530540f3c26e4a0d4-21719404',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_540f3c26e617e8_11457095',
  'variables' => 
  array (
    'Permissao' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540f3c26e617e8_11457095')) {function content_540f3c26e617e8_11457095($_smarty_tpl) {?><aside>
	<img src="<?php echo @constant('HTML_PUBLIC');?>
images/logo.gif" height="130" width="170" class="logo">
	<ul>
		<li><span class="icon-mkt icon-sair"></span> <a href="?action=deslogar">Sair do sistema</a></li>
		<li class="separator"></li>
		<li><span class="icon-mkt icon-comerciais"></span> <a href="?controller=cliente&action=atualizar-dados">Atualizar dados</a></li>
		<li><span class="icon-mkt icon-pessoais"></span> <a href="?controller=cliente&action=relatorios">Relatórios</a></li>
		<?php if ($_smarty_tpl->tpl_vars['Permissao']->value=="G") {?>
		<li><span class="icon-mkt icon-saldo"></span> <a href="?controller=cliente&action=faturas">Faturas</a></li>
		<?php }?>
	</ul>
</aside><?php }} ?>
