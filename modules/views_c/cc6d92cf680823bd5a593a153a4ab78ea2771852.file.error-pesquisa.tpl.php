<?php /* Smarty version Smarty-3.1.19, created on 2014-08-22 17:04:34
         compiled from "C:\xampp\htdocs\location\modules\views\painel\error-pesquisa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133353f75aa009ec87-44655255%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc6d92cf680823bd5a593a153a4ab78ea2771852' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\painel\\error-pesquisa.tpl',
      1 => 1408719836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133353f75aa009ec87-44655255',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53f75aa051b492_34673874',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f75aa051b492_34673874')) {function content_53f75aa051b492_34673874($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<section id="main">
				<?php echo $_smarty_tpl->getSubTemplate ('inc/search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				<h1>Ocorreu um erro</h1>
				<p>Infelizmente aconteceu um erro inesperado. Utilize o campo de pesquisa.</p>
				<p>Se o erro persistir, contate nosso suporte.</p>

			</section>
			<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>