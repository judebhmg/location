{include file='inc/head.tpl'}
{include file='inc/header.tpl'}
{include file='inc/sidebar-cliente.tpl'}
	<section id="main">
		<h1>Atualizar dados</h1>
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
			<div id="TabbedPanels1" class="TabbedPanels">
				<ul class="TabbedPanelsTabGroup">
					<li class="TabbedPanelsTab">Dados empresa</li>
					<li class="TabbedPanelsTab">Usuários ativos</li>
					<li class="TabbedPanelsTab">Usuários inativos</li>
				</ul>
				<div class="TabbedPanelsContentGroup">
					<div class="TabbedPanelsContent">
						{if count($Empresa) > 0}
						<form class="frm-cadastro" method="post">
							<div class="form-label">
								<label>Razão</label>
								<input type="text" name="razao" size="60" value="{$Empresa->razao}">
							</div>
							<div class="form-label">
								<label>CNPJ</label>
								<input type="text" name="cnpj" size="20" id="cnpj" readonly="readonly" value="{$Empresa->cnpj}">
							</div>
							<div class="form-label">
								<label>Endereço</label>
								<input type="text" name="endereco" size="50" value="{$Empresa->endereco}">
							</div>
							<div class="form-label">
								<label>Nº</label>
								<input type="text" name="numero" size="5" value="{$Empresa->numero}">
							</div>
							<div class="form-label">
								<label>Complemento</label>
								<input type="text" name="complemento" size="19" value="{$Empresa->complemento}">
							</div>
							<div class="form-label">
								<label>Bairro</label>
								<input type="text" name="bairro" size="30" value="{$Empresa->bairro}">
							</div>
							<div class="form-label">
								<label>Cidade</label>
								<input type="text" name="cidade" size="30" value="{$Empresa->cidade}">
							</div>
							<div class="form-label">
								<label>Estado</label>
								<input type="text" name="estado" size="15" value="{$Empresa->estado}">
							</div>
							<div class="form-label">
								<label>CEP</label>
								<input type="text" name="cep" size="10" id="cep" value="{$Empresa->cep}">
							</div>
							<div class="form-label">
								<label>Telefone</label>
								<input type="tel" name="telefone" size="20" id="phone" value="{$Empresa->telefone}">
							</div>
							<div class="form-label">
								<label>Email</label>
								<input type="text" name="email" size="45" value="{$Empresa->email}">
							</div>
							<div class="form-label">
								<label>Responsável</label>
								<input type="text" name="responsavel" size="60" value="{$Empresa->responsavel}">
							</div>
							
							<div class="clear"></div>
							<button name="Atualizar">Atualizar</button>
						</form>
						{else}
							<p>Empresa sem dados cadastrados, ou você não tem permissão para edição.</p>
						{/if}
					</div>
					<div class="TabbedPanelsContent">
						<form action="#" method="post" id="frmDesativar">
							<table width="100%" class="casa">
								<thead>
									<tr>
										<th>#</th>
										<th>Usuário</th>
										<th>Nome</th>
										<th>Email</th>
										<th>Limite</th>
										<th>Opções</th>
									</tr>
								</thead>
								<tbody>
									{foreach $usuariosAtivos as $Usuario}
									<tr>
										<td><input type="checkbox" name="iptUsuarios[]" value="{$Usuario->usuario}"></td>
										<td>{$Usuario->usuario}</td>
										<td>{$Usuario->nome}</td>
										<td>{$Usuario->email}</td>
										<td>{$Usuario->limite}</td>
										<td>
											<a onclick="confirmarAcao('Deseja desativar esse usuário?','?controller=cliente&action=desativar-usuario&usuario={$Usuario->usuario}');" href="javascript:;"><img src="{$smarty.const.HTML_PUBLIC}images/icones/inativo.png" alt="Desativar usuário" title="Desativar usuário"></a>
											{if $Permissao == "G"}
											<span class="sprt">|</span>
											<a href="?controller=cliente&action=editar-usuario&usuario={$Usuario->usuario}">
												<img src="{$smarty.const.HTML_PUBLIC}images/icones/editar.png" alt="Editar" title="Editar">
											</a>
											{/if}
									</tr>
									{foreachelse}
									<tr>
										<td colspan="5">Nenhum usuário</td>
									</tr>
									{/foreach}
								</tbody>
							</table>
							<br>
							<label>Com selecionados:</label>
							<select name="acao">
								<option selected="selected" disabled="disabled">Selecione...</option>
								<option value="1">Desativar usuários</option>
							</select>
							<input type="hidden" name="prosseguir" value="true">
							<input type="button" class="prosseguir" meta-id="#frmDesativar" value="Prosseguir">
						</form>
					</div>
					<div class="TabbedPanelsContent">
						<form action="#" method="post" id="frmAtivar">
							<table width="100%" class="casa">
								<thead>
									<tr>
										<th>#</th>
										<th>Usuário</th>
										<th>Nome</th>
										<th>Email</th>
										<th>Limite</th>
										<th>Opções</th>
									</tr>
								</thead>
								<tbody>
									{foreach $usuariosInativos as $Usuario}
									<tr>
										<td><input type="checkbox" name="iptUsuarios[]" value="{$Usuario->usuario}"></td>
										<td>{$Usuario->usuario}</td>
										<td>{$Usuario->nome}</td>
										<td>{$Usuario->email}</td>
										<td>{$Usuario->limite}</td>
										<td>
											<a onclick="confirmarAcao('Deseja ativar esse usuário?','?controller=cliente&action=ativar-usuario&usuario={$Usuario->usuario}');" href="javascript:;"><img src="{$smarty.const.HTML_PUBLIC}images/icones/ativo.png" alt="Ativar usuário" title="Ativar usuário"></a>
											{if $Permissao == "G"}
											<a href="?controller=cliente&action=editar-usuario&usuario={$Usuario->usuario}">
												<img src="{$smarty.const.HTML_PUBLIC}images/icones/editar.png" alt="Editar" title="Editar">
											</a>
											{/if}
									</tr>
									{foreachelse}
									<tr>
										<td colspan="5">Nenhum usuário</td>
									</tr>
									{/foreach}
								</tbody>
							</table>
							<br>
							<label>Com selecionados:</label>
							<select name="acao">
								<option selected="selected" disabled="disabled">Selecione...</option>
								<option value="0">Ativar usuários</option>
							</select>
							<input type="hidden" name="prosseguir" value="true">
							<input type="button" class="prosseguir" meta-id="#frmAtivar" value="Prosseguir">
						</form>
					</div>
				</div>
			</div>
	</section>
{include file='inc/footer.tpl'}