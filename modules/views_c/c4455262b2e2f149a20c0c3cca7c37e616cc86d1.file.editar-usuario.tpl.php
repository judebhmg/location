<?php /* Smarty version Smarty-3.1.19, created on 2014-09-18 20:50:31
         compiled from "C:\xampp\htdocs\location\modules\views\cliente\editar-usuario.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155305411ab72dfdfb5-60304833%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4455262b2e2f149a20c0c3cca7c37e616cc86d1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\cliente\\editar-usuario.tpl',
      1 => 1411066228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155305411ab72dfdfb5-60304833',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5411ab72e01e30_95252591',
  'variables' => 
  array (
    'Error' => 0,
    'Cadastrado' => 0,
    'Usuario' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5411ab72e01e30_95252591')) {function content_5411ab72e01e30_95252591($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar-cliente.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
