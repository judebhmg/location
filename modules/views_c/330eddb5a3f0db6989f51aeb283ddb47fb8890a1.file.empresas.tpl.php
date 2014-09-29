<?php /* Smarty version Smarty-3.1.19, created on 2014-09-23 16:01:44
         compiled from "C:\xampp\htdocs\location\modules\views\admin\empresas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1300753fcee6c180ed9-19581723%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '330eddb5a3f0db6989f51aeb283ddb47fb8890a1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\admin\\empresas.tpl',
      1 => 1411498901,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1300753fcee6c180ed9-19581723',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53fcee6c1d6de9_61629615',
  'variables' => 
  array (
    'Empresa' => 0,
    'Emp' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fcee6c1d6de9_61629615')) {function content_53fcee6c1d6de9_61629615($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include 'C:\\xampp\\htdocs\\location\\library\\Smarty\\plugins\\function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar-admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<section id="main">

		<h1>Empresas<h1>
			<a href="?controller=admin&action=cadempresa">+ Cadastrar empresa</a>
			
			<h3>Buscar empresa</h3>
			<form method="post">
				<input type="text" name="param">
				<select name="where">
					<option value="0">CNPJ</option>
					<option value="1">Razão</option>
					<option value="2">Telefone</option>
				</select>
				<button>Buscar</button>
			</form>
			<br>
			<hr>
			<table width="98%" class="casa">
				<thead>
					<tr>
						<th>#</th>
						<th>Razão</th>
						<th>Cnpj</th>
						<th>Telefone</th>
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>
					<?php echo smarty_function_counter(array('start'=>0,'skip'=>1,'print'=>false),$_smarty_tpl);?>

					<?php  $_smarty_tpl->tpl_vars['Emp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Emp']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Empresa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Emp']->key => $_smarty_tpl->tpl_vars['Emp']->value) {
$_smarty_tpl->tpl_vars['Emp']->_loop = true;
?>
					<tr>
						<td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['Emp']->value->razao;?>
</td>
						<td><?php echo mask($_smarty_tpl->tpl_vars['Emp']->value->cnpj,'##.###.###/####-##');?>
</td>
						<td><?php echo Util::maskTel($_smarty_tpl->tpl_vars['Emp']->value->telefone);?>
</td>
						<td><a href="javascript:;" onclick="show_modal('<?php echo $_smarty_tpl->tpl_vars['Emp']->value->razao;?>
', '<?php echo $_smarty_tpl->tpl_vars['Emp']->value->endereco;?>
', '<?php echo $_smarty_tpl->tpl_vars['Emp']->value->numero;?>
', '<?php echo $_smarty_tpl->tpl_vars['Emp']->value->bairro;?>
', '<?php echo $_smarty_tpl->tpl_vars['Emp']->value->cidade;?>
', '<?php echo $_smarty_tpl->tpl_vars['Emp']->value->estado;?>
', '<?php echo $_smarty_tpl->tpl_vars['Emp']->value->cep;?>
', '<?php echo $_smarty_tpl->tpl_vars['Emp']->value->email;?>
', '<?php echo $_smarty_tpl->tpl_vars['Emp']->value->responsavel;?>
', 'R$ <?php echo number_format($_smarty_tpl->tpl_vars['Emp']->value->preco_consulta,2,",",".");?>
', '<?php echo $_smarty_tpl->tpl_vars['Emp']->value->complemento;?>
');"><img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/ver.png" height="16" width="16" title="Visualziar informações" alt="Visualziar informações"></a> <!--<span class="sprt">|</span> <a href="#">
											<img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/editar.png" alt="Editar" title="Editar">
										</a> --><span class="sprt">|</span> <a onclick="confirmarAcao('Deseja remover essa empresa?','?controller=admin&action=deletar-empresa&cnpj=<?php echo $_smarty_tpl->tpl_vars['Emp']->value->cnpj;?>
');" href="javascript:;"> 
											<img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/remover.png" alt="Remover" title="Remover"></td>
										</a></td>
					</tr>
					<?php }
if (!$_smarty_tpl->tpl_vars['Emp']->_loop) {
?>
					<tr>
						<td colspan="5">Nenhum resultado</td>
					</tr>
					<?php } ?>

				</tbody>
			</table>
	</section>
		<div id="modalContent" style="display: none;">
		    
		    	<div class="modal-info">
					<dl>
						<dt>Endereço</dt>
						<dd class="end"></dd>
					</dl>
					<dl>
						<dt>Numero</dt>
						<dd class="num"></dd>
					</dl>
					<dl>
						<dt>Complemento</dt>
						<dd class="cpl"></dd>
					</dl>
					<dl>
						<dt>Bairro</dt>
						<dd class="bairro"></dd>
					</dl>
					<dl>
						<dt>Cidade</dt>
						<dd class="cidade"></dd>
					</dl>
					<dl>
						<dt>Estado</dt>
						<dd class="estado"></dd>
					</dl>
					<dl>
						<dt>CEP</dt>
						<dd class="cep"></dd>
					</dl>
					<dl>
						<dt>Email</dt>
						<dd class="email"></dd>
					</dl>
					<dl>
						<dt>Responsavel</dt>
						<dd class="resp"></dd>
					</dl>
					<dl>
						<dt>Preço consulta</dt>
						<dd class="preco"></dd>
					</dl>
				</div>
		
		</div>
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
