<?php /* Smarty version Smarty-3.1.19, created on 2014-09-23 17:42:53
         compiled from "C:\xampp\htdocs\location\modules\views\cliente\atualizar-dados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26208540f45af4b7330-45642590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf1810fd9cd4ececdbf3828dbf2f9d74e969331b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\cliente\\atualizar-dados.tpl',
      1 => 1411504962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26208540f45af4b7330-45642590',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_540f45af4bb1b5_07703520',
  'variables' => 
  array (
    'Error' => 0,
    'Cadastrado' => 0,
    'Empresa' => 0,
    'usuariosAtivos' => 0,
    'Usuario' => 0,
    'Permissao' => 0,
    'usuariosInativos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540f45af4bb1b5_07703520')) {function content_540f45af4bb1b5_07703520($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar-cliente.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<section id="main">
		<h1>Atualizar dados</h1>
		<?php if (isset($_smarty_tpl->tpl_vars['Error']->value)) {?>
			<div class="erro radius10 sombra caixa">
				<?php echo $_smarty_tpl->tpl_vars['Error']->value;?>

			</div>
		<?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['Cadastrado']->value)) {?>
			<div class="sucesso radius10 sombra caixa">
				<?php echo $_smarty_tpl->tpl_vars['Cadastrado']->value;?>

			</div>
		<?php }?>
			<div id="TabbedPanels1" class="TabbedPanels">
				<ul class="TabbedPanelsTabGroup">
					<li class="TabbedPanelsTab">Dados empresa</li>
					<li class="TabbedPanelsTab">Usuários ativos</li>
					<li class="TabbedPanelsTab">Usuários inativos</li>
				</ul>
				<div class="TabbedPanelsContentGroup">
					<div class="TabbedPanelsContent">
						<?php if (count($_smarty_tpl->tpl_vars['Empresa']->value)>0) {?>
						<form class="frm-cadastro" method="post">
							<div class="form-label">
								<label>Razão</label>
								<input type="text" name="razao" size="60" value="<?php echo $_smarty_tpl->tpl_vars['Empresa']->value->razao;?>
">
							</div>
							<div class="form-label">
								<label>CNPJ</label>
								<input type="text" name="cnpj" size="20" id="cnpj" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['Empresa']->value->cnpj;?>
">
							</div>
							<div class="form-label">
								<label>Endereço</label>
								<input type="text" name="endereco" size="50" value="<?php echo $_smarty_tpl->tpl_vars['Empresa']->value->endereco;?>
">
							</div>
							<div class="form-label">
								<label>Nº</label>
								<input type="text" name="numero" size="5" value="<?php echo $_smarty_tpl->tpl_vars['Empresa']->value->numero;?>
">
							</div>
							<div class="form-label">
								<label>Complemento</label>
								<input type="text" name="complemento" size="19" value="<?php echo $_smarty_tpl->tpl_vars['Empresa']->value->complemento;?>
">
							</div>
							<div class="form-label">
								<label>Bairro</label>
								<input type="text" name="bairro" size="30" value="<?php echo $_smarty_tpl->tpl_vars['Empresa']->value->bairro;?>
">
							</div>
							<div class="form-label">
								<label>Cidade</label>
								<input type="text" name="cidade" size="30" value="<?php echo $_smarty_tpl->tpl_vars['Empresa']->value->cidade;?>
">
							</div>
							<div class="form-label">
								<label>Estado</label>
								<input type="text" name="estado" size="15" value="<?php echo $_smarty_tpl->tpl_vars['Empresa']->value->estado;?>
">
							</div>
							<div class="form-label">
								<label>CEP</label>
								<input type="text" name="cep" size="10" id="cep" value="<?php echo $_smarty_tpl->tpl_vars['Empresa']->value->cep;?>
">
							</div>
							<div class="form-label">
								<label>Telefone</label>
								<input type="tel" name="telefone" size="20" id="phone" value="<?php echo $_smarty_tpl->tpl_vars['Empresa']->value->telefone;?>
">
							</div>
							<div class="form-label">
								<label>Email</label>
								<input type="text" name="email" size="45" value="<?php echo $_smarty_tpl->tpl_vars['Empresa']->value->email;?>
">
							</div>
							<div class="form-label">
								<label>Responsável</label>
								<input type="text" name="responsavel" size="60" value="<?php echo $_smarty_tpl->tpl_vars['Empresa']->value->responsavel;?>
">
							</div>
							
							<div class="clear"></div>
							<button name="Atualizar">Atualizar</button>
						</form>
						<?php } else { ?>
							<p>Empresa sem dados cadastrados, ou você não tem permissão para edição.</p>
						<?php }?>
					</div>
					<div class="TabbedPanelsContent">
						<form action="#" method="post" id="frmDesativar">
							<table width="100%" class="casa">
								<thead>
									<tr>
										<th>#</th>
										<th>Usuário</th>
										<th>Nome</th>
										<th>Email</th>
										<th>Limite</th>
										<th>Opções</th>
									</tr>
								</thead>
								<tbody>
									<?php  $_smarty_tpl->tpl_vars['Usuario'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Usuario']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuariosAtivos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Usuario']->key => $_smarty_tpl->tpl_vars['Usuario']->value) {
$_smarty_tpl->tpl_vars['Usuario']->_loop = true;
?>
									<tr>
										<td><input type="checkbox" name="iptUsuarios[]" value="<?php echo $_smarty_tpl->tpl_vars['Usuario']->value->usuario;?>
"></td>
										<td><?php echo $_smarty_tpl->tpl_vars['Usuario']->value->usuario;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['Usuario']->value->nome;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['Usuario']->value->email;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['Usuario']->value->limite;?>
</td>
										<td>
											<a onclick="confirmarAcao('Deseja desativar esse usuário?','?controller=cliente&action=desativar-usuario&usuario=<?php echo $_smarty_tpl->tpl_vars['Usuario']->value->usuario;?>
');" href="javascript:;"><img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/inativo.png" alt="Desativar usuário" title="Desativar usuário"></a>
											<?php if ($_smarty_tpl->tpl_vars['Permissao']->value=="G") {?>
											<span class="sprt">|</span>
											<a href="?controller=cliente&action=editar-usuario&usuario=<?php echo $_smarty_tpl->tpl_vars['Usuario']->value->usuario;?>
">
												<img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/editar.png" alt="Editar" title="Editar">
											</a>
											<?php }?>
									</tr>
									<?php }
if (!$_smarty_tpl->tpl_vars['Usuario']->_loop) {
?>
									<tr>
										<td colspan="5">Nenhum usuário</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<br>
							<label>Com selecionados:</label>
							<select name="acao">
								<option selected="selected" disabled="disabled">Selecione...</option>
								<option value="1">Desativar usuários</option>
							</select>
							<input type="hidden" name="prosseguir" value="true">
							<input type="button" class="prosseguir" meta-id="#frmDesativar" value="Prosseguir">
						</form>
					</div>
					<div class="TabbedPanelsContent">
						<form action="#" method="post" id="frmAtivar">
							<table width="100%" class="casa">
								<thead>
									<tr>
										<th>#</th>
										<th>Usuário</th>
										<th>Nome</th>
										<th>Email</th>
										<th>Limite</th>
										<th>Opções</th>
									</tr>
								</thead>
								<tbody>
									<?php  $_smarty_tpl->tpl_vars['Usuario'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Usuario']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuariosInativos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Usuario']->key => $_smarty_tpl->tpl_vars['Usuario']->value) {
$_smarty_tpl->tpl_vars['Usuario']->_loop = true;
?>
									<tr>
										<td><input type="checkbox" name="iptUsuarios[]" value="<?php echo $_smarty_tpl->tpl_vars['Usuario']->value->usuario;?>
"></td>
										<td><?php echo $_smarty_tpl->tpl_vars['Usuario']->value->usuario;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['Usuario']->value->nome;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['Usuario']->value->email;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['Usuario']->value->limite;?>
</td>
										<td>
											<a onclick="confirmarAcao('Deseja ativar esse usuário?','?controller=cliente&action=ativar-usuario&usuario=<?php echo $_smarty_tpl->tpl_vars['Usuario']->value->usuario;?>
');" href="javascript:;"><img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/ativo.png" alt="Ativar usuário" title="Ativar usuário"></a>
											<?php if ($_smarty_tpl->tpl_vars['Permissao']->value=="G") {?>
											<a href="?controller=cliente&action=editar-usuario&usuario=<?php echo $_smarty_tpl->tpl_vars['Usuario']->value->usuario;?>
">
												<img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/editar.png" alt="Editar" title="Editar">
											</a>
											<?php }?>
									</tr>
									<?php }
if (!$_smarty_tpl->tpl_vars['Usuario']->_loop) {
?>
									<tr>
										<td colspan="5">Nenhum usuário</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<br>
							<label>Com selecionados:</label>
							<select name="acao">
								<option selected="selected" disabled="disabled">Selecione...</option>
								<option value="0">Ativar usuários</option>
							</select>
							<input type="hidden" name="prosseguir" value="true">
							<input type="button" class="prosseguir" meta-id="#frmAtivar" value="Prosseguir">
						</form>
					</div>
				</div>
			</div>
	</section>
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
