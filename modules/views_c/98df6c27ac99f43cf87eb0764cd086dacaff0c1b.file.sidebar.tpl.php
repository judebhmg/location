<?php /* Smarty version Smarty-3.1.19, created on 2014-09-18 20:21:04
         compiled from "C:\xampp\htdocs\location\modules\views\inc\sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2173053dfee9bbc9227-89275140%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98df6c27ac99f43cf87eb0764cd086dacaff0c1b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\inc\\sidebar.tpl',
      1 => 1411064458,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2173053dfee9bbc9227-89275140',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53dfee9bbd4da5_58911961',
  'variables' => 
  array (
    'ultimas' => 0,
    'ultima' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53dfee9bbd4da5_58911961')) {function content_53dfee9bbd4da5_58911961($_smarty_tpl) {?><aside>
				<img src="<?php echo @constant('HTML_PUBLIC');?>
images/logo.gif" height="130" width="170" class="logo">
				<ul>
					<li><span class="icon-mkt icon-sair"></span> <a href="?action=deslogar">Sair do sistema</a></li>
				</ul>
				<br>
				<h3>Últimas pesquisas</h3>
				<ul class="last-search">
					<?php  $_smarty_tpl->tpl_vars['ultima'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ultima']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ultimas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ultima']->key => $_smarty_tpl->tpl_vars['ultima']->value) {
$_smarty_tpl->tpl_vars['ultima']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['ultima']->value->sessao==session_id()) {?>
						<li><a href="?action=pessoais&token=<?php echo $_smarty_tpl->tpl_vars['ultima']->value->token;?>
"><?php echo $_smarty_tpl->tpl_vars['ultima']->value->nome;?>
</a></li>
					<?php } else { ?>
						<li><?php echo $_smarty_tpl->tpl_vars['ultima']->value->nome;?>
</li>
					<?php }?>
					<?php }
if (!$_smarty_tpl->tpl_vars['ultima']->_loop) {
?>
					<li>Nenhuma</li>
					<?php } ?>
				</ul>
			</aside><?php }} ?>
