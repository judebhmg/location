<?php /* Smarty version Smarty-3.1.19, created on 2014-09-15 17:24:47
         compiled from "C:\xampp\htdocs\location\modules\views\admin\cadusuarios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:325835400e5b47baa15-93073467%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c57755ef6898abbc4136f9cadfff9cb6f91fb872' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\admin\\cadusuarios.tpl',
      1 => 1410794042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '325835400e5b47baa15-93073467',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5400e5b48a5012_97312674',
  'variables' => 
  array (
    'Error' => 0,
    'Cadastrado' => 0,
    'Empresas' => 0,
    'Emp' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5400e5b48a5012_97312674')) {function content_5400e5b48a5012_97312674($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar-admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<section id="main">

		<h1>Usuários<h1>
			<?php if (isset($_smarty_tpl->tpl_vars['Error']->value)) {?>
			<div class="erro radius10 sombra caixa">
				<?php echo $_smarty_tpl->tpl_vars['Error']->value;?>

			</div>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['Cadastrado']->value)) {?>
			<div class="sucesso radius10 sombra caixa">
				Usuário cadastrado com sucesso!
			</div>
			<?php }?>
			<form class="frm-cadastro" method="post">
				<div class="form-label">
					<label>Usuário</label>
					<input type="text" name="usuario" size="20">
				</div>
				<div class="form-label">
					<label>Senha</label>
					<input type="password" name="senha" size="20" maxlength="12">
				</div>
				<div class="form-label">
					<label>Nome</label>
					<input type="text" name="nome" size="35">
				</div>
				<div class="form-label">
					<label>Email</label>
					<input type="text" name="email" size="35">
				</div>
				
				<div class="form-label">
					<label>Empresa</label>
					<select name="empresa">
						<option selected disabled>Selecione</option>

						<?php  $_smarty_tpl->tpl_vars['Emp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Emp']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Empresas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Emp']->key => $_smarty_tpl->tpl_vars['Emp']->value) {
$_smarty_tpl->tpl_vars['Emp']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['Emp']->value->cnpj;?>
"><?php echo $_smarty_tpl->tpl_vars['Emp']->value->razao;?>
</option>
						<?php } ?>
					</select>
				</div>
				<div class="form-label">
					<label>Limite cosultas</label>
					<input type="text" name="limite" size="5" onkeypress='return SomenteNumero(event)'>
				</div>
				<div class="form-label">
					<label>Tipo</label>
					<select name="tipo">
						<option selected disabled>Selecione</option>
						<option value="0">U - Usuário</option>
						<option value="1">S - Supervisor</option>
						<option value="2">G - Gestor</option>
	
					</select>
				</div>
				<div class="clear"></div>
				<button>Cadastrar</button> <button type="reset">Limpar dados</button>
			</form>
	</section>
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
