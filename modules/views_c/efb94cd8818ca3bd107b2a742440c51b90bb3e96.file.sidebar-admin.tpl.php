<?php /* Smarty version Smarty-3.1.19, created on 2014-09-16 21:15:52
         compiled from "C:\xampp\htdocs\location\modules\views\inc\sidebar-admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2520353fce602d86700-62459338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efb94cd8818ca3bd107b2a742440c51b90bb3e96' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\inc\\sidebar-admin.tpl',
      1 => 1410880730,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2520353fce602d86700-62459338',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53fce602defea3_76973029',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fce602defea3_76973029')) {function content_53fce602defea3_76973029($_smarty_tpl) {?><aside>
	<img src="<?php echo @constant('HTML_PUBLIC');?>
images/logo.gif" height="130" width="170" class="logo">
	<ul>
		<li><span class="icon-mkt icon-sair"></span> <a href="?action=deslogar">Sair do sistema</a></li>
		<li class="separator"></li>
		<li><span class="icon-mkt icon-comerciais"></span> <a href="?controller=admin&action=empresas">Gerenciar empresa</a></li>
		<li><span class="icon-mkt icon-pessoais"></span> <a href="?controller=admin&action=usuarios">Gerenciar usuário</a></li>
		<li><span class="icon-mkt icon-saldo"></span> <a href="?controller=admin&action=faturas">Gerenciar faturas</a></li>
	</ul>
</aside><?php }} ?>
