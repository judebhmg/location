<?php /* Smarty version Smarty-3.1.19, created on 2014-09-18 22:52:47
         compiled from "C:\xampp\htdocs\location\modules\views\cliente\ver-consultas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4537541204df1e07f2-32392698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18cf875b387102f45185852543bb30c322c54887' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\cliente\\ver-consultas.tpl',
      1 => 1411073562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4537541204df1e07f2-32392698',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_541204df2c3127_68409018',
  'variables' => 
  array (
    'Consultas' => 0,
    'Consulta' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541204df2c3127_68409018')) {function content_541204df2c3127_68409018($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar-cliente.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<section id="main">
		<h1>Consultas feitas -  ID Fatura: <?php echo $_GET['id'];?>
</h1>		
			<hr>
				De: 01/09/2014 &nbsp;&nbsp;/&nbsp;&nbsp; Até: 31/09/2014
			<hr>
			<table class="casa" width="100%" id="tblRelatorios">
				<thead>
					<tr>
						<th>Data</th>
						<th>Usuário</th>
						<th>CPF Pesquisado</th>
						<th>Retornou</th>
						<th>Preço</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['Consulta'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Consulta']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Consultas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Consulta']->key => $_smarty_tpl->tpl_vars['Consulta']->value) {
$_smarty_tpl->tpl_vars['Consulta']->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['Consulta']->value['data']->format("d/m/Y");?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['Consulta']->value['usuario'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['Consulta']->value['cpf_pesquisado'];?>
</td>
						<td><?php echo ($_smarty_tpl->tpl_vars['Consulta']->value['retorno']==0 ? "<font color=red>Não retornado</font>" : "<font color=blue>Retornado</font>");?>
</td>
						<td>
							<?php if ($_smarty_tpl->tpl_vars['Consulta']->value['retorno']==1) {?>
							R$ <?php echo number_format($_smarty_tpl->tpl_vars['Consulta']->value['preco_consulta'],2,",",".");?>

							<?php } else { ?>
							R$ 0,00
							<?php }?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<p><a href="?controller=cliente&action=faturas">Voltar</a></p>
	</section>
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
