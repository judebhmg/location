<?php /* Smarty version Smarty-3.1.19, created on 2014-08-14 16:49:09
         compiled from "C:\xampp\htdocs\location\modules\views\painel\casa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1111353e0f4057166b3-36405515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1d382d25d1ada11b2267c2f6432ebb6515aa20c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\painel\\casa.tpl',
      1 => 1408027733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1111353e0f4057166b3-36405515',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53e0f40578b9b2_79049372',
  'variables' => 
  array (
    'Casa' => 0,
    'cas' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e0f40578b9b2_79049372')) {function content_53e0f40578b9b2_79049372($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<section id="main">
				<?php echo $_smarty_tpl->getSubTemplate ('inc/search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				<h1>Resultado</h1>
				<section id="search-result">
					<div id="content-main">
						<h2>Pessoas na mesma casa</h2>
						<table width="98%" class="casa" cellspacing="0">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Cpf</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
								<?php  $_smarty_tpl->tpl_vars['cas'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cas']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Casa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cas']->key => $_smarty_tpl->tpl_vars['cas']->value) {
$_smarty_tpl->tpl_vars['cas']->_loop = true;
?>
								<tr>
									<td><a href="javascript:;" onclick="novaConsulta();"><?php echo $_smarty_tpl->tpl_vars['cas']->value->Nome;?>
</a></td>
									<td><?php echo mask($_smarty_tpl->tpl_vars['cas']->value->Cpf,"###.###.###-##");?>
</td>
									<td width="5%"><img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/pesquisar.png" height="16" width="16"></td>
								</tr>
								<?php }
if (!$_smarty_tpl->tpl_vars['cas']->_loop) {
?>
								<tr>
									<td colspan="3">Não encontrado.</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</section>
			</section>
			<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
