<?php /* Smarty version Smarty-3.1.19, created on 2014-09-23 16:01:18
         compiled from "C:\xampp\htdocs\location\modules\views\admin\cadempresa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1458353ff410d17a498-28676591%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01b9a10ff2b3bfeb36d19bb38c1c461aa0867523' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\admin\\cadempresa.tpl',
      1 => 1411498875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1458353ff410d17a498-28676591',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53ff410d1e7aa1_00746504',
  'variables' => 
  array (
    'Error' => 0,
    'Cadastrado' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ff410d1e7aa1_00746504')) {function content_53ff410d1e7aa1_00746504($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar-admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<section id="main">

		<h1>Empresas<h1>
			<?php if (isset($_smarty_tpl->tpl_vars['Error']->value)) {?>
			<div class="erro radius10 sombra caixa">
				<?php echo $_smarty_tpl->tpl_vars['Error']->value;?>

			</div>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['Cadastrado']->value)) {?>
			<div class="sucesso radius10 sombra caixa">
				Empresa cadastrada com sucesso!
			</div>
			<?php }?>
			<form class="frm-cadastro" method="post">
				<div class="form-label">
					<label>Razão</label>
					<input type="text" name="razao" size="60">
				</div>
				<div class="form-label">
					<label>CNPJ</label>
					<input type="text" name="cnpj" size="20" id="cnpj">
				</div>
				<div class="form-label">
					<label>Endereço</label>
					<input type="text" name="endereco" size="50">
				</div>
				<div class="form-label">
					<label>Nº</label>
					<input type="text" name="numero" size="5">
				</div>
				<div class="form-label">
					<label>Complemento</label>
					<input type="text" name="complemento" size="19">
				</div>
				<div class="form-label">
					<label>Bairro</label>
					<input type="text" name="bairro" size="30">
				</div>
				<div class="form-label">
					<label>Cidade</label>
					<input type="text" name="cidade" size="30">
				</div>
				<div class="form-label">
					<label>Estado</label>
					<input type="text" name="estado" size="15">
				</div>
				<div class="form-label">
					<label>CEP</label>
					<input type="text" name="cep" size="10" id="cep">
				</div>
				<div class="form-label">
					<label>Telefone</label>
					<input type="tel" name="telefone" size="20" id="phone">
				</div>
				<div class="form-label">
					<label>Email</label>
					<input type="text" name="email" size="45">
				</div>
				<div class="form-label">
					<label>Responsável</label>
					<input type="text" name="responsavel" size="60">
				</div>
				<div class="form-label">
					<label>Preço consulta <span>Ex: 0.50</span></label>
					<input type="text" name="preco_consulta" size="14" id>
				</div>
				<div class="clear"></div>
				<button>Cadastrar</button> <button type="reset">Limpar dados</button>
			</form>
	</section>
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
