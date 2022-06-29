<li class="main-menu__list-item">
	{if $smarty.session.country eq 'vlaanderen'}
		<a value="vlaanderen" href="/nl/vlaanderen" class="active">
	{else}
		<a value="vlaanderen" href="/nl/vlaanderen">
	{/if}
			Vlaanderen
		</a>
</li>

<li class="main-menu__list-item">
	{if $smarty.session.country eq 'bruxelles'}
		<a href="/fr/bruxelles" class="active">
	{else}
		<a href="/fr/bruxelles">
	{/if}
			Bruxelles
		</a>
	 | 
	{if $smarty.session.country eq 'brussel'}
		<a href="/nl/brussel" class="active">
	{else}
		<a href="/nl/brussel">
	{/if}
			Brussel
		</a>
</li>

<li class="main-menu__list-item">
	{if $smarty.session.country eq 'nederland'}
		<a value="nederland" href="/nl/nederland" class="active">
	{else}
		<a value="nederland" href="/nl/nederland">
	{/if}
			Nederland
		</a>
</li>