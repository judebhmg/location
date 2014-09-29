{include file='inc/head.tpl'}
{include file='inc/header.tpl'}
{include file='inc/sidebar-cliente.tpl'}
	<section id="main">
		<h1>Faturas</h1>

			<h2>Filtrar</h2>
			<form method="post" class="frm-cadastro">
				<div class="form-label">
					<label>Data início</label>
					<input type="text" name="inicio" size="20" class="datepicker">
				</div>
				<div class="form-label">
					<label>Data final</label>
					<input type="text" name="final" size="20" class="datepicker">
				</div>
				<div class="form-label">
					<label>Valor</label>
					<select name="order">
						<option disabled="disabled" selected="selected" value="">Selecione</option>
						<option value="0">Crescente</option>
						<option value="1">Decrescente</option>
					</select>
				</div>
				<div class="clear"></div>
					<button>Gerar</button>
			</form>

			<hr>

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
										<a href="?controller=cliente&action=ver-consultas&id={$Fat->id}">
											<img src="{$smarty.const.HTML_PUBLIC}images/icones/ver.png" height="16" width="16" title="Visualziar consultas" alt="Visualziar consultas">
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
										<a href="?controller=cliente&action=ver-consultas&id={$Fat->id}">
											<img src="{$smarty.const.HTML_PUBLIC}images/icones/ver.png" height="16" width="16" title="Visualziar consultas" alt="Visualziar consultas">
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