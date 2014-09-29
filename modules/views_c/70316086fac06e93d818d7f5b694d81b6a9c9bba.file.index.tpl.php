<?php /* Smarty version Smarty-3.1.19, created on 2014-08-05 17:10:57
         compiled from "C:\xampp\htdocs\location\modules\views\painel\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:927953d261b634f283-61065495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70316086fac06e93d818d7f5b694d81b6a9c9bba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\painel\\index.tpl',
      1 => 1407251455,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '927953d261b634f283-61065495',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53d261b640e930_20314888',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d261b640e930_20314888')) {function content_53d261b640e930_20314888($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<section id="main">
				<?php echo $_smarty_tpl->getSubTemplate ('inc/search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			</section>
			<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
