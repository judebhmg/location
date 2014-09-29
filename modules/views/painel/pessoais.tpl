{include file='inc/head.tpl'}
			{include file='inc/header.tpl'}
			{include file='inc/sidebar.tpl'}
			<section id="main">
				{include file='inc/search.tpl'}
				<h1>Resultado</h1>
				<section id="search-result">
					<header id="info-cpf">
						<dl>
							<dt>Nome</dt>
							<dd>{$Pessoal[0]->Nome}</dd>
						</dl>
						<dl>
							<dt>Cpf</dt>
							<dd>{mask($Pessoal[0]->Cpf, '###.###.###-##')}</dd>
						</dl>
						<div class="clear"></div>
					</header>
					<div id="content-main">
						<h2>Dados Pessoais</h2>
						<section id="first">
							<div class="address">
								<span class="title">Endereço</span>
								<ul class="plus">
									{foreach $Pessoal[0]->End as $end}
									<li>
										<a href="javascript:;" class="open-span">{$end['rua']}, nº {$end['numero']} - {$end['cidade']} - {$end['estado']}</a>
										<span>
											<div class="endereco-info">
												<dl>
													<dt>COMPLEMENTO</dt>
													<dd>{$end['complemento']}</dd>
												</dl>
												<dl>
													<dt>BAIRRO</dt>
													<dd>{$end['bairro']}</dd>
												</dl>
												<dl>
													<dt>CIDADE</dt>
													<dd>{$end['cidade']}</dd>
												</dl>
												<dl>
													<dt>ESTADO</dt>
													<dd>{$end['estado']}</dd>
												</dl>
												<dl>
													<dt>CEP</dt>
													<dd>{$end['cep']}</dd>
												</dl>
											</div>
										</span>
									</li>
									{/foreach}
								</ul>
								<div class="clear"></div>
							</div>
							<div class="phone">
								<span class="title">Telefone fixo</span>
								<ul class="ul-list">
									{foreach $Pessoal[0]->Fixo as $fix}
										<li>
											{mask($fix, '(##) ####-#####')} 
											<div class="qualificar">
												Avalie:
												<a href="#"><img src="{$smarty.const.HTML_PUBLIC}images/icones/thumbs-up-16.png" height="16" width="16" alt="Contato efetuado" title="Contato efetuado"></a>
												<a href="#"><img src="{$smarty.const.HTML_PUBLIC}images/icones/thumbs-down-16.png" height="16" width="16" alt="Contato inválido" title="Contato inválido"></a>
												<a href="#"><img src="{$smarty.const.HTML_PUBLIC}images/icones/edit-6-16.png" height="16" width="16" alt="Apenas recado" title="Apenas recado"></a>
											</div>
										</li>
									{/foreach}
								</ul>
							</div>
							<div class="mobile">
								<span class="title">Telefone celular</span>
								<ul class="ul-list">
									{foreach $Pessoal[0]->Cel as $cel}
										<li>
											{if strlen($cel) > 10}
												{mask($cel, '(##) #####-####')}
											{else}
												{mask($cel, '(##) ####-####')}
											{/if}
											<div class="qualificar">
												Avalie:
												<a href="#"><img src="{$smarty.const.HTML_PUBLIC}images/icones/thumbs-up-16.png" height="16" width="16" alt="Contato efetuado" title="Contato efetuado"></a>
												<a href="#"><img src="{$smarty.const.HTML_PUBLIC}images/icones/thumbs-down-16.png" height="16" width="16" alt="Contato inválido" title="Contato inválido"></a>
												<a href="#"><img src="{$smarty.const.HTML_PUBLIC}images/icones/edit-6-16.png" height="16" width="16" alt="Apenas recado" title="Apenas recado"></a>
											</div>
										</li>
									{/foreach}
								</ul>
							</div>
							<div class="clear"></div>
						</section>
						<section id="second">
							<div class="mail">
								<span class="title">Email</span>
								{foreach $Pessoal[0]->Email as $email}
									{$email} <br>
								{/foreach}
							</div>
							<div class="mother">
								<span class="title">Mãe</span>
								{$Pessoal[0]->Mae}
							</div>
						</section>
					</div>
				</section>
			</section>
			{include file='inc/footer.tpl'}