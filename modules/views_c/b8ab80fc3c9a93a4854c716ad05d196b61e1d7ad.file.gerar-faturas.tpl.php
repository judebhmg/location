<?php /* Smarty version Smarty-3.1.19, created on 2014-09-03 22:51:55
         compiled from "C:\xampp\htdocs\location\modules\views\admin\gerar-faturas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2105754077153431235-33550393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8ab80fc3c9a93a4854c716ad05d196b61e1d7ad' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\admin\\gerar-faturas.tpl',
      1 => 1409777504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2105754077153431235-33550393',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_540771534a6534_93068844',
  'variables' => 
  array (
    'Error' => 0,
    'Cadastrado' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540771534a6534_93068844')) {function content_540771534a6534_93068844($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar-admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<section id="main">
		<h1>Gerar Faturas</h1>
			<?php if (isset($_smarty_tpl->tpl_vars['Error']->value)) {?>
			<div class="erro radius10 sombra caixa">
				<?php echo $_smarty_tpl->tpl_vars['Error']->value;?>

			</div>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['Cadastrado']->value)) {?>
			<div class="sucesso radius10 sombra caixa">
				Faturas geradas com sucesso!
			</div>
			<?php }?>
			<p>Entre com a data inicial e a final do periodo desejado.</p>
			<form method="post">
				<input placeholder="Início" name="inicio" class="datepicker">
				<input placeholder="Fim" name="final" class="datepicker">
				<button>Gerar!</button>
			</form>
			

			<div id="TabbedPanels1" class="TabbedPanels" style="display:none;">
				<ul class="TabbedPanelsTabGroup">
					<li class="TabbedPanelsTab">Abertas</li>
					<li class="TabbedPanelsTab">Fechadas</li>
				</ul>
				
			</div>


	</section>
<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
