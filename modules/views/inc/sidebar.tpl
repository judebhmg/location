<aside>
				<img src="{$smarty.const.HTML_PUBLIC}images/logo.gif" height="130" width="170" class="logo">
				<ul>
					<li><span class="icon-mkt icon-sair"></span> <a href="?action=deslogar">Sair do sistema</a></li>
				</ul>
				<br>
				<h3>Últimas pesquisas</h3>
				<ul class="last-search">
					{foreach $ultimas as $ultima}
					{if $ultima->sessao == session_id()}
						<li><a href="?action=pessoais&token={$ultima->token}">{$ultima->nome}</a></li>
					{else}
						<li>{$ultima->nome}</li>
					{/if}
					{foreachelse}
					<li>Nenhuma</li>
					{/foreach}
				</ul>
			</aside>