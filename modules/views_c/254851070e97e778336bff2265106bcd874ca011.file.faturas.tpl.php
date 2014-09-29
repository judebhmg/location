<?php /* Smarty version Smarty-3.1.19, created on 2014-09-18 22:47:59
         compiled from "C:\xampp\htdocs\location\modules\views\cliente\faturas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48755418561b3b97a9-41177405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '254851070e97e778336bff2265106bcd874ca011' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\cliente\\faturas.tpl',
      1 => 1411073278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48755418561b3b97a9-41177405',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5418561b478e52_95647338',
  'variables' => 
  array (
    'Faturas' => 0,
    'Fat' => 0,
    'FaturasF' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418561b478e52_95647338')) {function content_5418561b478e52_95647338($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include 'C:\\xampp\\htdocs\\location\\library\\Smarty\\plugins\\function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar-cliente.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<section id="main">
		<h1>Faturas</h1>

			<h2>Filtrar</h2>
			<form method="post" class="frm-cadastro">
				<div class="form-label">
					<label>Data início</label>
					<input type="text" name="inicio" size="20" class="datepicker">
				</div>
				<div class="form-label">
					<label>Data final</label>
					<input type="text" name="final" size="20" class="datepicker">
				</div>
				<div class="form-label">
					<label>Valor</label>
					<select name="order">
						<option disabled="disabled" selected="selected" value="">Selecione</option>
						<option value="0">Crescente</option>
						<option value="1">Decrescente</option>
					</select>
				</div>
				<div class="clear"></div>
					<button>Gerar</button>
			</form>

			<hr>

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
										<a href="?controller=cliente&action=ver-consultas&id=<?php echo $_smarty_tpl->tpl_vars['Fat']->value->id;?>
">
											<img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/ver.png" height="16" width="16" title="Visualziar consultas" alt="Visualziar consultas">
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
										<a href="?controller=cliente&action=ver-consultas&id=<?php echo $_smarty_tpl->tpl_vars['Fat']->value->id;?>
">
											<img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/ver.png" height="16" width="16" title="Visualziar consultas" alt="Visualziar consultas">
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
