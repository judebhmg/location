<aside>
	<img src="{$smarty.const.HTML_PUBLIC}images/logo.gif" height="130" width="170" class="logo">
	<ul>
		<li><span class="icon-mkt icon-sair"></span> <a href="?action=deslogar">Sair do sistema</a></li>
		<li class="separator"></li>
		<li><span class="icon-mkt icon-comerciais"></span> <a href="?controller=cliente&action=atualizar-dados">Atualizar dados</a></li>
		<li><span class="icon-mkt icon-pessoais"></span> <a href="?controller=cliente&action=relatorios">Relatórios</a></li>
		{if $Permissao == "G"}
		<li><span class="icon-mkt icon-saldo"></span> <a href="?controller=cliente&action=faturas">Faturas</a></li>
		{/if}
	</ul>
</aside>