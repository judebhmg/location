<?php /* Smarty version Smarty-3.1.19, created on 2014-08-25 20:46:55
         compiled from "C:\xampp\htdocs\location\modules\views\inc\search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2083753dff3c6d2f3e0-42450990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f50885fb8eea88660099646bd99b8b1897ce074' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\inc\\search.tpl',
      1 => 1408991707,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2083753dff3c6d2f3e0-42450990',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53dff3c6d33268_22601799',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53dff3c6d33268_22601799')) {function content_53dff3c6d33268_22601799($_smarty_tpl) {?><h1>Realizar Pesquisa</h1>
				<header id="search-cpf">
					<form action="?action=pesquisar" method="post">
						<input type="text" placeholder="DIGITE O CPF" id="cpf" name="cpf">
						<button>Buscar</button>
					</form>
				</header><?php }} ?>
