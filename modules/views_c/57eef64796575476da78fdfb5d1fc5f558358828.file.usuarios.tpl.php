<?php /* Smarty version Smarty-3.1.19, created on 2014-09-23 14:59:07
         compiled from "C:\xampp\htdocs\location\modules\views\admin\usuarios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:322245400849fd671d4-02223964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57eef64796575476da78fdfb5d1fc5f558358828' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\admin\\usuarios.tpl',
      1 => 1411495113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322245400849fd671d4-02223964',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5400849fe0f181_52587362',
  'variables' => 
  array (
    'Usuario' => 0,
    'User' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5400849fe0f181_52587362')) {function content_5400849fe0f181_52587362($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar-admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<section id="main">

		<h1>Usuários<h1>
			<a href="?controller=admin&action=cadusuarios">+ Cadastrar usuário</a>
			
			<h3>Buscar usuario</h3>
			<form method="post">
				<input type="text" name="param">
				<select name="where">
					<option value="0">Email</option>
					<option value="1">Nome</option>
					<option value="2">Usuário</option>
					<option value="3">Empresa</option>
				</select>
				<button>Buscar</button>
			</form>
			<br>
			<hr>
			<table width="98%" class="casa">
				<thead>
					<tr>
						<th>Usuário</th>
						<th>Empresa</th>
						<th>Email</th>                                           
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['User'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['User']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Usuario']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['User']->key => $_smarty_tpl->tpl_vars['User']->value) {
$_smarty_tpl->tpl_vars['User']->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['User']->value->usuario;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['User']->value->razao;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['User']->value->email;?>
</td>
						<td><a href="javascript:;" onclick="ushow_modal('<?php echo $_smarty_tpl->tpl_vars['User']->value->nome;?>
','<?php echo $_smarty_tpl->tpl_vars['User']->value->limite;?>
','<?php echo $_smarty_tpl->tpl_vars['User']->value->tipo;?>
','<?php echo mask($_smarty_tpl->tpl_vars['User']->value->empresa,'##.###.###/####-##');?>
','<?php echo $_smarty_tpl->tpl_vars['User']->value->razao;?>
');"><img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/ver.png" height="16" width="16" title="Visualziar consultas" alt="Visualziar consultas"></a> <span class="sprt">|</span> <a href="?controller=admin&action=editar-usuario&usuario=<?php echo $_smarty_tpl->tpl_vars['User']->value->usuario;?>
">
											<img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/editar.png" alt="Editar" title="Editar">
										</a> <span class="sprt">|</span> <a onclick="confirmarAcao('Deseja remover esse usuário?','?controller=admin&action=deletar-usuario&usuario=<?php echo $_smarty_tpl->tpl_vars['User']->value->usuario;?>
');" href="javascript:;"> 
											<img src="<?php echo @constant('HTML_PUBLIC');?>
images/icones/remover.png" alt="Remover" title="Remover"></td>
										</a></td>
					</tr>
					<?php }
if (!$_smarty_tpl->tpl_vars['User']->_loop) {
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
				<dt>Nome</dt>
				<dd class="nome"></dd>
			</dl>
			<dl>
				<dt>Limite</dt>
				<dd class="limite"></dd>
			</dl>
			<dl>
				<dt>Tipo</dt>
				<dd class="tipo"></dd>
			</dl>
			<dl>
				<dt>Empresa</dt>
				<dd class="empresa"></dd>
			</dl>
			<dl>
				<dt>CnpJ</dt>
				<dd class="cnpj"></dd>
			</dl>
		</div>
		
	</div>
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
