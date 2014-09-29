{include file='inc/head.tpl'}
{include file='inc/header.tpl'}
{include file='inc/sidebar-admin.tpl'}
	<section id="main">
		<h1>Faturas<h1>
			<a href="?controller=admin&action=gerarfaturas">+ Gerar Faturas</a>
			
			<h3>Filtrar faturas</h3>
			<form method="post">
				
				<div class="left-block">
					<label>Data</label>
					<input type="text" placeholder="Fim" name="inicio" class="datepicker" size="10">
					<input type="text" placeholder="Início" name="final" class="datepicker" size="10">
				</div>

				<div class="left-block">
					<label>Nome empresa</label>
					<input type="text" name="empresa" placeholder="Nome empresa">
				</div>

				<div class="left-block">
					<label>Valor</label>
					<select name="order">
						<option disabled="disabled" selected="selected" value="">Selecione</option>
						<option value="0">Crescente</option>
						<option value="1">Decrescente</option>
					</select>
				</div>
	
				<div class="clear"></div>
				<button>Filtrar</button>
			</form>
			<br>
			<hr>
			<h2>Últimas faturas</h2>

			<div id="TabbedPanels1" class="TabbedPanels">
				<ul class="TabbedPanelsTabGroup">
					<li class="TabbedPanelsTab">Abertas</li>
					<li class="TabbedPanelsTab">Fechadas</li>
				</ul>
				<div class="TabbedPanelsContentGroup">
					<div class="TabbedPanelsContent">
						<table width="98%" class="casa">
							<thead>
								<tr>
									<th>#</th>
									<th>Data inicial</th>
									<th>Data final</th>
									<th>Valor</th>
									<th>Empresa</th>
									<th>Opções</th>
								</tr>
							</thead>
							<tbody>
								{counter start=0 skip=1 print=FALSE}
								{foreach $Faturas as $Fat}
								<tr>
									<td>{counter}</td>
									<td>{$Fat->periodo_inicial->format('d-m-Y')}</td>
									<td>{$Fat->periodo_final->format('d-m-Y')}</td>
									<td>R$ {number_format($Fat->valor_total,2,",",".")}</td>
									<td>{$Fat->razao}</td>
									<td>
										<a href="?controller=admin&action=ver-consultas&id={$Fat->id}">
											<img src="{$smarty.const.HTML_PUBLIC}images/icones/ver.png" height="16" width="16" title="Visualziar consultas" alt="Visualziar consultas">
										</a>
										<span class="sprt">|</span>
										<a href="javascript:;" onclick="confirmarAcao('Deseja fechar essa fatura?','?controller=admin&action=faturaStatus&s=0&id={$Fat->id}');">
											<img src="{$smarty.const.HTML_PUBLIC}images/icones/13.png" height="16" width="16" title="Fechar fatura" alt="Fechar fatura">
										</a>
										<span class="sprt">|</span>
										<a href="javascript:;" onclick="confirmarAcao('Deseja remover essa fatura?','?controller=admin&action=faturaStatus&s=1&id={$Fat->id}');">
											<img src="{$smarty.const.HTML_PUBLIC}images/icones/12.png" height="16" width="16" title="Deletar fatura" alt="Deletar fatura">
										</a>
										
									</td>
								</tr>
								{foreachelse}
								<tr>
									<td colspan="5">Nenhum resultado</td>
								</tr>
								{/foreach}

							</tbody>
						</table>
					</div>
					<div class="TabbedPanelsContent">
						<table width="98%" class="casa">
							<thead>
								<tr>
									<th>#</th>
									<th>Data inicial</th>
									<th>Data final</th>
									<th>Valor</th>
									<th>Empresa</th>
									<th>Opções</th>
								</tr>
							</thead>
							<tbody>
								{counter start=0 skip=1 print=FALSE}
								{foreach $FaturasF as $Fat}
								<tr>
									<td>{counter}</td>
									<td>{$Fat->periodo_inicial->format('d-m-Y')}</td>
									<td>{$Fat->periodo_final->format('d-m-Y')}</td>
									<td>R$ {number_format($Fat->valor_total,2,",",".")}</td>
									<td>{$Fat->razao}</td>
									<td>

										<a href="?controller=admin&action=ver-consultas&id={$Fat->id}">
											<img src="{$smarty.const.HTML_PUBLIC}images/icones/ver.png" height="16" width="16" title="Visualziar consultas" alt="Visualziar consultas">
										</a>
										<span class="sprt">|</span>
										<a href="javascript:;" onclick="confirmarAcao('Deseja remover essa fatura?','?controller=admin&action=faturaStatus&s=1&id={$Fat->id}');">
											<img src="{$smarty.const.HTML_PUBLIC}images/icones/12.png" height="16" width="16" title="Deletar fatura" alt="Deletar fatura">
										</a>
									</td>
								</tr>
								{foreachelse}
								<tr>
									<td colspan="5">Nenhum resultado</td>
								</tr>
								{/foreach}

							</tbody>
						</table>
					</div>
				</div>
			</div>


	</section>
{include file='inc/footer.tpl'}