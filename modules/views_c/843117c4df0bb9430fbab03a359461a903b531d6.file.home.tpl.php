<?php /* Smarty version Smarty-3.1.19, created on 2014-08-05 17:01:46
         compiled from "C:\xampp\htdocs\location\modules\views\painel\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2312553d262463e2c50-64624064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '843117c4df0bb9430fbab03a359461a903b531d6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\painel\\home.tpl',
      1 => 1407250889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2312553d262463e2c50-64624064',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53d262464cd268_27765805',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d262464cd268_27765805')) {function content_53d262464cd268_27765805($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ('inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ('inc/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<section id="main">
				<?php echo $_smarty_tpl->getSubTemplate ('inc/search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				<h1>Resultado</h1>
				<section id="search-result">
					<header id="info-cpf">
						<dl>
							<dt>Nome</dt>
							<dd>Ronaldo Luís Nazário de Lima</dd>
						</dl>
						<dl>
							<dt>Cpf</dt>
							<dd>123.123.123-95</dd>
						</dl>
						<div class="clear"></div>
					</header>
					<div id="content-main">
						<h2>Dados Pessoais</h2>
						<section id="first">
							<div class="address">
								<span class="title">Endereço</span>
								Av Dom Pedro II, 2715 - Alto Caiçaras
							</div>
							<div class="phone">
								<span class="title">Telefone fixo</span>
								(31) 3382-2033<br>
								(31) 3391-2290<br>
								(34) 3541-1441
							</div>
							<div class="mobile">
								<span class="title">Telefone celular</span>
								(31) 3382-2033<br>
								(31) 3391-2290
							</div>
							<div class="clear"></div>
						</section>
						<section id="second">
							<div class="mail">
								<span class="title">Email</span>
								email@yahoo.com.br<br>
								email@hotmail.com
							</div>
							<div class="mother">
								<span class="title">Mãe</span>
								Sônia Nazário de Lima
							</div>
						</section>
					</div>
				</section>
			</section>
			<?php echo $_smarty_tpl->getSubTemplate ('inc/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
