<?php /* Smarty version Smarty-3.1.19, created on 2014-09-18 17:54:16
         compiled from "C:\xampp\htdocs\location\modules\views\cliente\relatorios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10851540f450bb31f77-67221610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a03e23002e2f5af1b53169f6a8fb2d09cef5a57' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\cliente\\relatorios.tpl',
      1 => 1411055651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10851540f450bb31f77-67221610',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_540f450bb35df8_41078102',
  'variables' => 
  array (
    'h2_title' => 0,
    'Relatorios' => 0,
    'Relatorio' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540f450bb35df8_41078102')) {function content_540f450bb35df8_41078102($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar-cliente.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<section id="main">
		<h1>Relatórios</h1>
			<h2>Gerar</h2>
			<form method="post" class="frm-cadastro">
				<div class="form-label">
					<label>Data início</label>
					<input type="text" name="inicio" size="13" class="datepicker">
				</div>
				<div class="form-label">
					<label>Data final</label>
					<input type="text" name="final" size="13" class="datepicker">
				</div>
				<div class="clear"></div>
					<button>Gerar</button>
			</form>

			<hr>

			<h2><?php echo $_smarty_tpl->tpl_vars['h2_title']->value;?>
</h2>
			<table id="tblRelatorios" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
				<th>Data</th>
				<th>Hora</th>
				<th>Usuário</th>
				<th>Cpf pesquisado</th>
				<th>Retornou</th>
            </tr>
        </thead>
 
        <tbody>
			<?php  $_smarty_tpl->tpl_vars['Relatorio'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Relatorio']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Relatorios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Relatorio']->key => $_smarty_tpl->tpl_vars['Relatorio']->value) {
$_smarty_tpl->tpl_vars['Relatorio']->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['Relatorio']->value['data']->format("d/m/Y");?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['Relatorio']->value['data']->format("H:i");?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['Relatorio']->value['usuario'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['Relatorio']->value['cpf_pesquisado'];?>
</td>
				<td><?php echo ($_smarty_tpl->tpl_vars['Relatorio']->value['retorno']==0 ? "<font color=red>Não</font>" : "<font color=blue>Sim</font>");?>
</td>
			</tr>
			<?php } ?>
        </tbody>
    </table>
    <br>
	</section>
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
