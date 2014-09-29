{include file='inc/head.tpl'}
{include file='inc/header.tpl'}
{include file='inc/sidebar-admin.tpl'}
	<section id="main">

		<h1>Usuários<h1>
			<a href="?controller=admin&action=cadusuarios">+ Cadastrar usuário</a>
			
			<h3>Buscar usuario</h3>
			<form method="post">
				<input type="text" name="param">
				<select name="where">
					<option value="0">Email</option>
					<option value="1">Nome</option>
					<option value="2">Usuário</option>
					<option value="3">Empresa</option>
				</select>
				<button>Buscar</button>
			</form>
			<br>
			<hr>
			<table width="98%" class="casa">
				<thead>
					<tr>
						<th>Usuário</th>
						<th>Empresa</th>
						<th>Email</th>                                           
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>
					{foreach $Usuario as $User}
					<tr>
						<td>{$User->usuario}</td>
						<td>{$User->razao}</td>
						<td>{$User->email}</td>
						<td><a href="javascript:;" onclick="ushow_modal('{$User->nome}','{$User->limite}','{$User->tipo}','{mask($User->empresa, '##.###.###/####-##')}','{$User->razao}');"><img src="{$smarty.const.HTML_PUBLIC}images/icones/ver.png" height="16" width="16" title="Visualziar consultas" alt="Visualziar consultas"></a> <span class="sprt">|</span> <a href="?controller=admin&action=editar-usuario&usuario={$User->usuario}">
											<img src="{$smarty.const.HTML_PUBLIC}images/icones/editar.png" alt="Editar" title="Editar">
										</a> <span class="sprt">|</span> <a onclick="confirmarAcao('Deseja remover esse usuário?','?controller=admin&action=deletar-usuario&usuario={$User->usuario}');" href="javascript:;"> 
											<img src="{$smarty.const.HTML_PUBLIC}images/icones/remover.png" alt="Remover" title="Remover"></td>
										</a></td>
					</tr>
					{foreachelse}
					<tr>
						<td colspan="5">Nenhum resultado</td>
					</tr>
					{/foreach}

				</tbody>
			</table>
	</section>
	<div id="modalContent" style="display: none;">
		    
		<div class="modal-info">
			<dl>
				<dt>Nome</dt>
				<dd class="nome"></dd>
			</dl>
			<dl>
				<dt>Limite</dt>
				<dd class="limite"></dd>
			</dl>
			<dl>
				<dt>Tipo</dt>
				<dd class="tipo"></dd>
			</dl>
			<dl>
				<dt>Empresa</dt>
				<dd class="empresa"></dd>
			</dl>
			<dl>
				<dt>CnpJ</dt>
				<dd class="cnpj"></dd>
			</dl>
		</div>
		
	</div>
{include file='inc/footer.tpl'}