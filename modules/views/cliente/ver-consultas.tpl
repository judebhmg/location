{include file='inc/head.tpl'}
{include file='inc/header.tpl'}
{include file='inc/sidebar-cliente.tpl'}
	<section id="main">
		<h1>Consultas feitas -  ID Fatura: {$smarty.get.id}</h1>		
			<hr>
				De: 01/09/2014 &nbsp;&nbsp;/&nbsp;&nbsp; Até: 31/09/2014
			<hr>
			<table class="casa" width="100%" id="tblRelatorios">
				<thead>
					<tr>
						<th>Data</th>
						<th>Usuário</th>
						<th>CPF Pesquisado</th>
						<th>Retornou</th>
						<th>Preço</th>
					</tr>
				</thead>
				<tbody>
					{foreach $Consultas as $Consulta}
					<tr>
						<td>{$Consulta['data']->format("d/m/Y")}</td>
						<td>{$Consulta['usuario']}</td>
						<td>{$Consulta['cpf_pesquisado']}</td>
						<td>{(($Consulta['retorno'] == 0) ? "<font color=red>Não retornado</font>" : "<font color=blue>Retornado</font>")}</td>
						<td>
							{if $Consulta['retorno'] == 1}
							R$ {number_format($Consulta['preco_consulta'],2,",",".")}
							{else}
							R$ 0,00
							{/if}
						</td>
					</tr>
					{/foreach}
				</tbody>
			</table>
			<p><a href="?controller=cliente&action=faturas">Voltar</a></p>
	</section>
{include file='inc/footer.tpl'}