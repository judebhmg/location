{include file='inc/head.tpl'}
{include file='inc/header.tpl'}
{include file='inc/sidebar-admin.tpl'}
	<section id="main">

		<h1>Empresas<h1>
			<a href="?controller=admin&action=cadempresa">+ Cadastrar empresa</a>
			
			<h3>Buscar empresa</h3>
			<form method="post">
				<input type="text" name="param">
				<select name="where">
					<option value="0">CNPJ</option>
					<option value="1">Razão</option>
					<option value="2">Telefone</option>
				</select>
				<button>Buscar</button>
			</form>
			<br>
			<hr>
			<table width="98%" class="casa">
				<thead>
					<tr>
						<th>#</th>
						<th>Razão</th>
						<th>Cnpj</th>
						<th>Telefone</th>
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>
					{counter start=0 skip=1 print=FALSE}
					{foreach $Empresa as $Emp}
					<tr>
						<td>{counter}</td>
						<td>{$Emp->razao}</td>
						<td>{mask($Emp->cnpj, '##.###.###/####-##')}</td>
						<td>{Util::maskTel($Emp->telefone)}</td>
						<td><a href="javascript:;" onclick="show_modal('{$Emp->razao}', '{$Emp->endereco}', '{$Emp->numero}', '{$Emp->bairro}', '{$Emp->cidade}', '{$Emp->estado}', '{$Emp->cep}', '{$Emp->email}', '{$Emp->responsavel}', 'R$ {number_format($Emp->preco_consulta,2,",",".")}', '{$Emp->complemento}');"><img src="{$smarty.const.HTML_PUBLIC}images/icones/ver.png" height="16" width="16" title="Visualziar informações" alt="Visualziar informações"></a> <!--<span class="sprt">|</span> <a href="#">
											<img src="{$smarty.const.HTML_PUBLIC}images/icones/editar.png" alt="Editar" title="Editar">
										</a> --><span class="sprt">|</span> <a onclick="confirmarAcao('Deseja remover essa empresa?','?controller=admin&action=deletar-empresa&cnpj={$Emp->cnpj}');" href="javascript:;"> 
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
						<dt>Endereço</dt>
						<dd class="end"></dd>
					</dl>
					<dl>
						<dt>Numero</dt>
						<dd class="num"></dd>
					</dl>
					<dl>
						<dt>Complemento</dt>
						<dd class="cpl"></dd>
					</dl>
					<dl>
						<dt>Bairro</dt>
						<dd class="bairro"></dd>
					</dl>
					<dl>
						<dt>Cidade</dt>
						<dd class="cidade"></dd>
					</dl>
					<dl>
						<dt>Estado</dt>
						<dd class="estado"></dd>
					</dl>
					<dl>
						<dt>CEP</dt>
						<dd class="cep"></dd>
					</dl>
					<dl>
						<dt>Email</dt>
						<dd class="email"></dd>
					</dl>
					<dl>
						<dt>Responsavel</dt>
						<dd class="resp"></dd>
					</dl>
					<dl>
						<dt>Preço consulta</dt>
						<dd class="preco"></dd>
					</dl>
				</div>
		
		</div>
{include file='inc/footer.tpl'}