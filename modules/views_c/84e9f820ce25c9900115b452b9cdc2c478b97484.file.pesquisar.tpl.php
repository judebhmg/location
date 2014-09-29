<?php /* Smarty version Smarty-3.1.19, created on 2014-08-06 17:47:56
         compiled from "C:\xampp\htdocs\location\modules\views\painel\pesquisar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2882053e24e2c040d69-21570134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84e9f820ce25c9900115b452b9cdc2c478b97484' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\painel\\pesquisar.tpl',
      1 => 1407340074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2882053e24e2c040d69-21570134',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53e24e2c215970_26571698',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e24e2c215970_26571698')) {function content_53e24e2c215970_26571698($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<section id="main">
				<?php echo $_smarty_tpl->getSubTemplate ('inc/search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			</section>
			<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
