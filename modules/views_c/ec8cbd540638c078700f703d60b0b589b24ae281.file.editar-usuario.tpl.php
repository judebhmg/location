<?php /* Smarty version Smarty-3.1.19, created on 2014-09-19 19:50:56
         compiled from "C:\xampp\htdocs\location\modules\views\admin\editar-usuario.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16520541c62e92c23b1-46632468%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec8cbd540638c078700f703d60b0b589b24ae281' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\admin\\editar-usuario.tpl',
      1 => 1411149052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16520541c62e92c23b1-46632468',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_541c62e9375ed6_92780514',
  'variables' => 
  array (
    'Error' => 0,
    'Cadastrado' => 0,
    'Usuario' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541c62e9375ed6_92780514')) {function content_541c62e9375ed6_92780514($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar-admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<section id="main">
		<h1>Editar usuario: <?php echo $_GET['usuario'];?>
</h1>
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
		<form class="frm-cadastro" method="post">
			<h3>Dados pessoais</h3>
			<div class="form-label">
				<label>Usuário</label>
				<input type="text" name="usuario" size="20" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['Usuario']->value->usuario;?>
">
			</div>
			<div class="form-label">
				<label>Nome</label>
				<input type="text" name="nome" size="35" value="<?php echo $_smarty_tpl->tpl_vars['Usuario']->value->nome;?>
">
			</div>
			<div class="form-label">
				<label>Email</label>
				<input type="text" name="email" size="69" value="<?php echo $_smarty_tpl->tpl_vars['Usuario']->value->email;?>
">
			</div>
			<div class="form-label">
				<label>Limite consultas</label>
				<input type="text" name="limite" size="3" maxlength="5" value="<?php echo $_smarty_tpl->tpl_vars['Usuario']->value->limite;?>
">
			</div>
			<div class="form-label">
				<label>Status</label>
				<select name="ativo">
					<option value="0" <?php if ($_smarty_tpl->tpl_vars['Usuario']->value->ativo==0) {?> selected="selected" <?php }?>>Ativo</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['Usuario']->value->ativo==1) {?> selected="selected" <?php }?>>Inativo</option>
				</select>
			</div>
			<div class="form-label">
				<label>Tipo conta</label>
				<select name="tipo">
					<option value="U" <?php if ($_smarty_tpl->tpl_vars['Usuario']->value->tipo=='U') {?> selected="selected" <?php }?>>Usuário</option>
					<option value="S" <?php if ($_smarty_tpl->tpl_vars['Usuario']->value->tipo=='S') {?> selected="selected" <?php }?>>Supervisor</option>
					<option value="G" <?php if ($_smarty_tpl->tpl_vars['Usuario']->value->tipo=='G') {?> selected="selected" <?php }?>>Gestor</option>
					<option value="A" <?php if ($_smarty_tpl->tpl_vars['Usuario']->value->tipo=='A') {?> selected="selected" <?php }?>>Admin</option>
				</select>
			</div>
			<div class="clear"></div>
			<h3>Alterar senha</h3>
			<div class="form-label">
				<label>Senha</label>
				<input type="password" name="senha" size="20" maxlength="12">
			</div>
			<div class="form-label">
				<label>Confirmar senha</label>
				<input type="password" name="resenha" size="20" maxlength="12">
			</div>
			
			<div class="clear"></div>
			<button>Alterar dados</button>
			</form>
	</section>
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
