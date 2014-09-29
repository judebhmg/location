{include file='inc/head.tpl'}
{include file='inc/header.tpl'}
{include file='inc/sidebar-cliente.tpl'}
	<section id="main">
		<h1>Relatórios</h1>
			<h2>Gerar</h2>
			<form method="post" class="frm-cadastro">
				<div class="form-label">
					<label>Data início</label>
					<input type="text" name="inicio" size="13" class="datepicker">
				</div>
				<div class="form-label">
					<label>Data final</label>
					<input type="text" name="final" size="13" class="datepicker">
				</div>
				<div class="clear"></div>
					<button>Gerar</button>
			</form>

			<hr>

			<h2>{$h2_title}</h2>
			<table id="tblRelatorios" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
				<th>Data</th>
				<th>Hora</th>
				<th>Usuário</th>
				<th>Cpf pesquisado</th>
				<th>Retornou</th>
            </tr>
        </thead>
 
        <tbody>
			{foreach $Relatorios as $Relatorio}
			<tr>
				<td>{$Relatorio.data->format("d/m/Y")}</td>
				<td>{$Relatorio.data->format("H:i")}</td>
				<td>{$Relatorio.usuario}</td>
				<td>{$Relatorio.cpf_pesquisado}</td>
				<td>{(($Relatorio.retorno == 0) ? "<font color=red>Não</font>" : "<font color=blue>Sim</font>")}</td>
			</tr>
			{/foreach}
        </tbody>
    </table>
    <br>
	</section>
{include file='inc/footer.tpl'}