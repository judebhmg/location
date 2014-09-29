<?php /* Smarty version Smarty-3.1.19, created on 2014-09-23 16:06:22
         compiled from "C:\xampp\htdocs\location\modules\views\login\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3029553d2a2ba825e72-49250014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52b42d2a81e65d70318138b06793b41692eedb4a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\location\\modules\\views\\login\\login.tpl',
      1 => 1411499176,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3029553d2a2ba825e72-49250014',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53d2a2ba985770_15683742',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d2a2ba985770_15683742')) {function content_53d2a2ba985770_15683742($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel='shortcut icon' type='image/x-icon' href='<?php echo @constant('HTML_PUBLIC');?>
images/icones/favicon.ico' />
<title>Location - MarketList</title>
<link rel="stylesheet" type="text/css" href="<?php echo @constant('HTML_PUBLIC');?>
css/location-marketlist.css">
</head>

<body>
<?php if (Message::getMessage()!=null) {?>
<script type="text/javascript">alert('<?php echo Message::getMessage();?>
');</script>
<?php echo Message::deleteMessage();?>

<?php }?>
<div id="main-login">
	<div class="logo">
		<img src="<?php echo @constant('HTML_PUBLIC');?>
images/logo.gif" height="130" width="170">
	</div>
	<div class="location">
		<h1>Location</h1>
		<p>Pesquisa de localização</p>
	</div>
	<div class="clear"></div>
	<div class="login">
		<h1>Login</h1>
		<p>Favor entrar com login e senha</p>
		<form method="post" action="">
			<input type="text" name="login" placeholder="Login">
			<input type="password" name="senha" placeholder="Senha">
			<button name="entrar">Entrar</button> <a href="lembrar-senha.php">Lembrar minha senha</a>
		</form>
	</div>
</div>
<script type="text/javascript" src="<?php echo @constant('HTML_PUBLIC');?>
js/jquery-1.11.1.min.js"></script>
</body>
</html><?php }} ?>
