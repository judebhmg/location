{include file='inc/head.tpl'}
{include file='inc/header.tpl'}
{include file='inc/sidebar-admin.tpl'}
	<section id="main">
		<h1>Gerar Faturas</h1>
			{if isset($Error)}
			<div class="erro radius10 sombra caixa">
				{$Error}
			</div>
			{/if}
			{if isset($Cadastrado)}
			<div class="sucesso radius10 sombra caixa">
				Faturas geradas com sucesso!
			</div>
			{/if}
			<p>Entre com a data inicial e a final do periodo desejado.</p>
			<form method="post">
				<input placeholder="Início" name="inicio" class="datepicker">
				<input placeholder="Fim" name="final" class="datepicker">
				<button>Gerar!</button>
			</form>
			

			<div id="TabbedPanels1" class="TabbedPanels" style="display:none;">
				<ul class="TabbedPanelsTabGroup">
					<li class="TabbedPanelsTab">Abertas</li>
					<li class="TabbedPanelsTab">Fechadas</li>
				</ul>
				
			</div>


	</section>
{include file='inc/footer.tpl'}