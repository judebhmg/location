{include file='inc/head.tpl'}
{include file='inc/header.tpl'}
{include file='inc/sidebar-admin.tpl'}
	<section id="main">

		<h1>Usuários<h1>
			{if isset($Error)}
			<div class="erro radius10 sombra caixa">
				{$Error}
			</div>
			{/if}
			{if isset($Cadastrado)}
			<div class="sucesso radius10 sombra caixa">
				Usuário cadastrado com sucesso!
			</div>
			{/if}
			<form class="frm-cadastro" method="post">
				<div class="form-label">
					<label>Usuário</label>
					<input type="text" name="usuario" size="20">
				</div>
				<div class="form-label">
					<label>Senha</label>
					<input type="password" name="senha" size="20" maxlength="12">
				</div>
				<div class="form-label">
					<label>Nome</label>
					<input type="text" name="nome" size="35">
				</div>
				<div class="form-label">
					<label>Email</label>
					<input type="text" name="email" size="35">
				</div>
				
				<div class="form-label">
					<label>Empresa</label>
					<select name="empresa">
						<option selected disabled>Selecione</option>

						{foreach $Empresas as $Emp}
						<option value="{$Emp->cnpj}">{$Emp->razao}</option>
						{/foreach}
					</select>
				</div>
				<div class="form-label">
					<label>Limite cosultas</label>
					<input type="text" name="limite" size="5" onkeypress='return SomenteNumero(event)'>
				</div>
				<div class="form-label">
					<label>Tipo</label>
					<select name="tipo">
						<option selected disabled>Selecione</option>
						<option value="0">U - Usuário</option>
						<option value="1">S - Supervisor</option>
						<option value="2">G - Gestor</option>
	
					</select>
				</div>
				<div class="clear"></div>
				<button>Cadastrar</button> <button type="reset">Limpar dados</button>
			</form>
	</section>
{include file='inc/footer.tpl'}