<?php /* Smarty version Smarty-3.1.19, created on 2014-08-14 16:52:11
         compiled from "C:\xampp\htdocs\location\modules\views\painel\comerciais.tpl" */ ?>
<?php /*%%SmartyHeaderCode:814353e0f29e311168-56240928%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30844fd360b50e2c674eb187d8863daca887c275' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\painel\\comerciais.tpl',
      1 => 1408027740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '814353e0f29e311168-56240928',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53e0f29e35f361_28743398',
  'variables' => 
  array (
    'Empresa' => 0,
    'emp' => 0,
    'end' => 0,
    'fixo' => 0,
    'cel' => 0,
    'Colegas' => 0,
    'Colega' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e0f29e35f361_28743398')) {function content_53e0f29e35f361_28743398($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<section id="main">
				<?php echo $_smarty_tpl->getSubTemplate ('inc/search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				<h1>Resultado</h1>
				<section id="search-result">
					<div id="content-main">
						<h2>Dados Comerciais</h2>


						<?php  $_smarty_tpl->tpl_vars['emp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['emp']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Empresa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['emp']->key => $_smarty_tpl->tpl_vars['emp']->value) {
$_smarty_tpl->tpl_vars['emp']->_loop = true;
?>
						<fieldset>
							<legend><?php echo $_smarty_tpl->tpl_vars['emp']->value->Nome;?>
<a href="javascript:;" class="show-business" meta-open=".div-0">[ Exibir info ]</a></legend>
						 	<div class="business-info div-0">
						 		<ul class="plus">
									<?php  $_smarty_tpl->tpl_vars['end'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['end']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['emp']->value->End; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['end']->key => $_smarty_tpl->tpl_vars['end']->value) {
$_smarty_tpl->tpl_vars['end']->_loop = true;
?>
									<li>
										<a href="javascript:;" class="open-span"><?php echo $_smarty_tpl->tpl_vars['end']->value['rua'];?>
, nº <?php echo $_smarty_tpl->tpl_vars['end']->value['numero'];?>
 - <?php echo $_smarty_tpl->tpl_vars['end']->value['cidade'];?>
 - <?php echo $_smarty_tpl->tpl_vars['end']->value['estado'];?>
</a>
										<span>
											<div class="endereco-info">
												<dl>
													<dt>COMPLEMENTO</dt>
													<dd><?php echo $_smarty_tpl->tpl_vars['end']->value['complemento'];?>
</dd>
												</dl>
												<dl>
													<dt>BAIRRO</dt>
													<dd><?php echo $_smarty_tpl->tpl_vars['end']->value['bairro'];?>
</dd>
												</dl>
												<dl>
													<dt>CIDADE</dt>
													<dd><?php echo $_smarty_tpl->tpl_vars['end']->value['cidade'];?>
</dd>
												</dl>
												<dl>
													<dt>ESTADO</dt>
													<dd><?php echo $_smarty_tpl->tpl_vars['end']->value['estado'];?>
</dd>
												</dl>
												<dl>
													<dt>CEP</dt>
													<dd><?php echo $_smarty_tpl->tpl_vars['end']->value['cep'];?>
</dd>
												</dl>
											</div>
										</span>
									</li>
									<?php } ?>
								</ul>
								
								<div class="cpf">
									<span class="title">CNPJ</span>
									<?php echo mask($_smarty_tpl->tpl_vars['emp']->value->Cpf,"##.###.###/####-##");?>

								</div>
								<div class="phone">
									<span class="title">Telefone fixo</span>
									<?php  $_smarty_tpl->tpl_vars['fixo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fixo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['emp']->value->Fixo; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fixo']->key => $_smarty_tpl->tpl_vars['fixo']->value) {
$_smarty_tpl->tpl_vars['fixo']->_loop = true;
?>
										<?php echo mask($_smarty_tpl->tpl_vars['fixo']->value,"(##) ####-#####");?>
<br>
									<?php } ?>
								</div>
								<div class="mobile">
									<span class="title">Telefone celular</span>
									<?php  $_smarty_tpl->tpl_vars['cel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['emp']->value->Cel; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cel']->key => $_smarty_tpl->tpl_vars['cel']->value) {
$_smarty_tpl->tpl_vars['cel']->_loop = true;
?>
										<?php echo mask($_smarty_tpl->tpl_vars['cel']->value,"(##) ####-#####");?>
<br>
									<?php } ?>
								</div>
								<div class="clear"></div>
							</div>
						 </fieldset>
						 <?php }
if (!$_smarty_tpl->tpl_vars['emp']->_loop) {
?>
						 Nenhuma empresa
						 <?php } ?>

						 <h2>Colegas</h2>
						 <table width="500" class="colegas" cellspacing="0" alight="center">
							<thead>
								<tr>
									<th class="left">Colegas</th>
									<th class="left">CPF</th>
								</tr>
							</thead>
							<tbody>
								<?php  $_smarty_tpl->tpl_vars['Colega'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Colega']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Colegas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Colega']->key => $_smarty_tpl->tpl_vars['Colega']->value) {
$_smarty_tpl->tpl_vars['Colega']->_loop = true;
?>
								<tr>
									<td><a href="javascript:;" onclick="novaConsulta();"><?php echo $_smarty_tpl->tpl_vars['Colega']->value->nome;?>
</a></td>
									<td><?php echo mask($_smarty_tpl->tpl_vars['Colega']->value->Cpf,"###.###.###-##");?>
</td>
								</tr>
								<?php }
if (!$_smarty_tpl->tpl_vars['Colega']->_loop) {
?>
									<tr>
										<td colspan="2">Não encontrado.</td>
									</tr>
								<?php } ?>
							</tbody>
						 </table>

					</div>
				</section>
			</section>
			<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
