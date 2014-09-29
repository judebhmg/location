{include file='inc/head.tpl'}
{include file='inc/header.tpl'}
{include file='inc/sidebar-admin.tpl'}
	<section id="main">

		<h1>Empresas<h1>
			{if isset($Error)}
			<div class="erro radius10 sombra caixa">
				{$Error}
			</div>
			{/if}
			{if isset($Cadastrado)}
			<div class="sucesso radius10 sombra caixa">
				Empresa cadastrada com sucesso!
			</div>
			{/if}
			<form class="frm-cadastro" method="post">
				<div class="form-label">
					<label>Razão</label>
					<input type="text" name="razao" size="60">
				</div>
				<div class="form-label">
					<label>CNPJ</label>
					<input type="text" name="cnpj" size="20" id="cnpj">
				</div>
				<div class="form-label">
					<label>Endereço</label>
					<input type="text" name="endereco" size="50">
				</div>
				<div class="form-label">
					<label>Nº</label>
					<input type="text" name="numero" size="5">
				</div>
				<div class="form-label">
					<label>Complemento</label>
					<input type="text" name="complemento" size="19">
				</div>
				<div class="form-label">
					<label>Bairro</label>
					<input type="text" name="bairro" size="30">
				</div>
				<div class="form-label">
					<label>Cidade</label>
					<input type="text" name="cidade" size="30">
				</div>
				<div class="form-label">
					<label>Estado</label>
					<input type="text" name="estado" size="15">
				</div>
				<div class="form-label">
					<label>CEP</label>
					<input type="text" name="cep" size="10" id="cep">
				</div>
				<div class="form-label">
					<label>Telefone</label>
					<input type="tel" name="telefone" size="20" id="phone">
				</div>
				<div class="form-label">
					<label>Email</label>
					<input type="text" name="email" size="45">
				</div>
				<div class="form-label">
					<label>Responsável</label>
					<input type="text" name="responsavel" size="60">
				</div>
				<div class="form-label">
					<label>Preço consulta <span>Ex: 0.50</span></label>
					<input type="text" name="preco_consulta" size="14" id>
				</div>
				<div class="clear"></div>
				<button>Cadastrar</button> <button type="reset">Limpar dados</button>
			</form>
	</section>
{include file='inc/footer.tpl'}