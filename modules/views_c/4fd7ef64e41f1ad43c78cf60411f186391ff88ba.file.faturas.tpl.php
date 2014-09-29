<?php /* Smarty version Smarty-3.1.19, created on 2014-09-23 14:08:13
         compiled from "C:\xampp\htdocs\location\modules\views\admin\faturas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:252865404c91045a969-68676486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fd7ef64e41f1ad43c78cf60411f186391ff88ba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\admin\\faturas.tpl',
      1 => 1411491647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '252865404c91045a969-68676486',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5404c9105f4c49_38128201',
  'variables' => 
  array (
    'Faturas' => 0,
    'Fat' => 0,
    'FaturasF' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5404c9105f4c49_38128201')) {function content_5404c9105f4c49_38128201($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include 'C:\\xampp\\htdocs\\location\\library\\Smarty\\plugins\\function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar-admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<section id="main">
		<h1>Faturas<h1>
			<a href="?controller=admin&action=gerarfaturas">+ Gerar Faturas</a>
			
			<h3>Filtrar faturas</h3>
			<form method="post">
				
				<div class="left-block">
					<label>Data</label>
					<input type="text" placeholder="Fim" name="inicio" class="datepicker" size="10">
					<input type="text" placeholder="Início" name="final" class="datepicker" size="10">
				</div>

				<div class="left-block">
					<label>Nome empresa</label>
					<input type="text" name="empresa" placeholder="Nome empresa">
				</div>

				<div class="left-block">
					<label>Valor</label>
					<select name="order">
						<option disabled="disabled" selected="selected" value="">Selecione</option>
						<option value="0">Crescente</option>
						<option value="1">Decrescente</option>
					</select>
				</div>
	
				<div class="clear"></div>
				<button>Filtrar</button>
			</form>
			<br>
			<hr>
			<h2>Últimas faturas</h2>

			<div id="TabbedPanels1" class="TabbedPanels">
				<ul class="TabbedPanelsTabGroup">
					<li class="TabbedPanelsTab">Abertas</li>
					<li class="TabbedPanelsTab">Fechadas</li>
				</ul>
				<div class="TabbedPanelsContentGroup">
					<div class="TabbedPanelsContent">
						<table width="98%" class="casa">
							<thead>
								<tr>
									<th>#</th>
									<th>Data inicial</th>
									<th>Data final</th>
									<th>Valor</th>
									<th>Empresa</th>
									<th>Opções</th>
								</tr>
							</thead>
							<tbody>
								<?php echo smarty_function_counter(array('start'=>0,'skip'=>1,'print'=>false),$_smarty_tpl);?>

								<?php  $_smarty_tpl->tpl_vars['Fat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Fat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Faturas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Fat']->key => $_smarty_tpl->tpl_vars['Fat']->value) {
$_smarty_tpl->tpl_vars['Fat']->_loop = true;
?>
								<tr>
									<td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['Fat']->value->periodo_inicial->format('d-m-Y');?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['Fat']->value->periodo_final->format('d-m-Y');?>
</td>
									<td>R$ <?php echo number_format($_smarty_tpl->tpl_vars['Fat']->value->valor_total,2,",",".");?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['Fat']->value->razao;?>
</td>
									<td>
										<a href="?controller=admin&action=ver-consultas&id=<?php echo $_smarty_tpl->tpl_vars['Fat']->value->id;?>
">
											<img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/ver.png" height="16" width="16" title="Visualziar consultas" alt="Visualziar consultas">
										</a>
										<span class="sprt">|</span>
										<a href="javascript:;" onclick="confirmarAcao('Deseja fechar essa fatura?','?controller=admin&action=faturaStatus&s=0&id=<?php echo $_smarty_tpl->tpl_vars['Fat']->value->id;?>
');">
											<img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/13.png" height="16" width="16" title="Fechar fatura" alt="Fechar fatura">
										</a>
										<span class="sprt">|</span>
										<a href="javascript:;" onclick="confirmarAcao('Deseja remover essa fatura?','?controller=admin&action=faturaStatus&s=1&id=<?php echo $_smarty_tpl->tpl_vars['Fat']->value->id;?>
');">
											<img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/12.png" height="16" width="16" title="Deletar fatura" alt="Deletar fatura">
										</a>
										
									</td>
								</tr>
								<?php }
if (!$_smarty_tpl->tpl_vars['Fat']->_loop) {
?>
								<tr>
									<td colspan="5">Nenhum resultado</td>
								</tr>
								<?php } ?>

							</tbody>
						</table>
					</div>
					<div class="TabbedPanelsContent">
						<table width="98%" class="casa">
							<thead>
								<tr>
									<th>#</th>
									<th>Data inicial</th>
									<th>Data final</th>
									<th>Valor</th>
									<th>Empresa</th>
									<th>Opções</th>
								</tr>
							</thead>
							<tbody>
								<?php echo smarty_function_counter(array('start'=>0,'skip'=>1,'print'=>false),$_smarty_tpl);?>

								<?php  $_smarty_tpl->tpl_vars['Fat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Fat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['FaturasF']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Fat']->key => $_smarty_tpl->tpl_vars['Fat']->value) {
$_smarty_tpl->tpl_vars['Fat']->_loop = true;
?>
								<tr>
									<td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['Fat']->value->periodo_inicial->format('d-m-Y');?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['Fat']->value->periodo_final->format('d-m-Y');?>
</td>
									<td>R$ <?php echo number_format($_smarty_tpl->tpl_vars['Fat']->value->valor_total,2,",",".");?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['Fat']->value->razao;?>
</td>
									<td>

										<a href="?controller=admin&action=ver-consultas&id=<?php echo $_smarty_tpl->tpl_vars['Fat']->value->id;?>
">
											<img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/ver.png" height="16" width="16" title="Visualziar consultas" alt="Visualziar consultas">
										</a>
										<span class="sprt">|</span>
										<a href="javascript:;" onclick="confirmarAcao('Deseja remover essa fatura?','?controller=admin&action=faturaStatus&s=1&id=<?php echo $_smarty_tpl->tpl_vars['Fat']->value->id;?>
');">
											<img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/12.png" height="16" width="16" title="Deletar fatura" alt="Deletar fatura">
										</a>
									</td>
								</tr>
								<?php }
if (!$_smarty_tpl->tpl_vars['Fat']->_loop) {
?>
								<tr>
									<td colspan="5">Nenhum resultado</td>
								</tr>
								<?php } ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>


	</section>
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
