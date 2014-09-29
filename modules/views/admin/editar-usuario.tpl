{include file='inc/head.tpl'}
{include file='inc/header.tpl'}
{include file='inc/sidebar-admin.tpl'}
	<section id="main">
		<h1>Editar usuario: {$smarty.get.usuario}</h1>
		{if isset($Error)}
			<div class="erro radius10 sombra caixa">
				{$Error}
			</div>
		{/if}
		{if isset($Cadastrado)}
			<div class="sucesso radius10 sombra caixa">
				{$Cadastrado}
			</div>
		{/if}
		<form class="frm-cadastro" method="post">
			<h3>Dados pessoais</h3>
			<div class="form-label">
				<label>Usuário</label>
				<input type="text" name="usuario" size="20" readonly="readonly" value="{$Usuario->usuario}">
			</div>
			<div class="form-label">
				<label>Nome</label>
				<input type="text" name="nome" size="35" value="{$Usuario->nome}">
			</div>
			<div class="form-label">
				<label>Email</label>
				<input type="text" name="email" size="69" value="{$Usuario->email}">
			</div>
			<div class="form-label">
				<label>Limite consultas</label>
				<input type="text" name="limite" size="3" maxlength="5" value="{$Usuario->limite}">
			</div>
			<div class="form-label">
				<label>Status</label>
				<select name="ativo">
					<option value="0" {if $Usuario->ativo == 0} selected="selected" {/if}>Ativo</option>
					<option value="1" {if $Usuario->ativo == 1} selected="selected" {/if}>Inativo</option>
				</select>
			</div>
			<div class="form-label">
				<label>Tipo conta</label>
				<select name="tipo">
					<option value="U" {if $Usuario->tipo == 'U'} selected="selected" {/if}>Usuário</option>
					<option value="S" {if $Usuario->tipo == 'S'} selected="selected" {/if}>Supervisor</option>
					<option value="G" {if $Usuario->tipo == 'G'} selected="selected" {/if}>Gestor</option>
					<option value="A" {if $Usuario->tipo == 'A'} selected="selected" {/if}>Admin</option>
				</select>
			</div>
			<div class="clear"></div>
			<h3>Alterar senha</h3>
			<div class="form-label">
				<label>Senha</label>
				<input type="password" name="senha" size="20" maxlength="12">
			</div>
			<div class="form-label">
				<label>Confirmar senha</label>
				<input type="password" name="resenha" size="20" maxlength="12">
			</div>
			
			<div class="clear"></div>
			<button>Alterar dados</button>
			</form>
	</section>
{include file='inc/footer.tpl'}