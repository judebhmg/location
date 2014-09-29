<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel='shortcut icon' type='image/x-icon' href='{$smarty.const.HTML_PUBLIC}images/icones/favicon.ico' />
<title>Location - MarketList</title>
<link rel="stylesheet" type="text/css" href="{$smarty.const.HTML_PUBLIC}css/location-marketlist.css">
</head>

<body>
{if Message::getMessage() != null}
<script type="text/javascript">alert('{Message::getMessage()}');</script>
{Message::deleteMessage()}
{/if}
<div id="main-login">
	<div class="logo">
		<img src="{$smarty.const.HTML_PUBLIC}images/logo.gif" height="130" width="170">
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
<script type="text/javascript" src="{$smarty.const.HTML_PUBLIC}js/jquery-1.11.1.min.js"></script>
</body>
</html>