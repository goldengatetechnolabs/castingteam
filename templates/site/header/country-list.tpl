{*<!-- <ul class="locationmenu__list">
	<i class="locationmenu__arrow fas fa-angle-double-down"></i>

	{if $smarty.session.country eq 'belgie'}
		<li value="belgie" class="locationmenu__list-item locationmenu__list-item--active">
	{else}
		<li value="belgie" class="locationmenu__list-item">
	{/if}
		<a href="/nl/belgie">Vlaanderen</a>
		<a class="mobile" href="/nl/belgie">VL</a>
	</li>

	{if $smarty.session.country eq 'belgique'}
		<li value="belgique" class="locationmenu__list-item locationmenu__list-item--active">
	{else}
		<li value="belgique" class="locationmenu__list-item">
	{/if}
		<a href="/fr/belgique">Bruxelles</a>
		<a class="mobile" href="/fr/belgique">BXL</a>
	</li>

	{if $smarty.session.country eq 'nederland'}
		<li value="nederland" class="locationmenu__list-item locationmenu__list-item--active">
	{else}
		<li value="nederland" class="locationmenu__list-item">
	{/if}
		<a href="/nl/nederland">Nederland</a>
		<a class="mobile" href="/nl/nederland">NL</a>
	</li>

</ul> -->*}

<ul class="locationmenu__list">

	<li class="locationmenu__list-item">
		{if $smarty.session.country eq 'vlaanderen'}
			<a value="vlaanderen" href="/nl/vlaanderen" class="active">
		{else}
			<a value="vlaanderen" href="/nl/vlaanderen">
		{/if}
				Vlaanderen
			</a>
	</li>

	<li class="locationmenu__list-item">
		{if $smarty.session.country eq 'bruxelles'}
			<a href="/fr/bruxelles" class="active">
		{else}
			<a href="/fr/bruxelles">
		{/if}
				Bruxelles
			</a>
		 / 
		{if $smarty.session.country eq 'brussel'}
			<a href="/nl/brussel" class="active">
		{else}
			<a href="/nl/brussel">
		{/if}
				Brussel
			</a>
	</li>

	<li class="locationmenu__list-item">
		{if $smarty.session.country eq 'nederland'}
			<a value="nederland" href="/nl/nederland" class="active">
		{else}
			<a value="nederland" href="/nl/nederland">
		{/if}
				Nederland
			</a>
	</li>

</ul>

{*<!-- <ul class="locationmenu__links">
	{if $smarty.session.country neq 'vlaanderen'}
		<li><a value="vlaanderen" href="/nl/vlaanderen">Vlaanderen</a></li>
	{/if}
	<li>
		{if $smarty.session.country neq 'brussel'}
			<a value="brussel" href="/nl/brussel">Brussel</a>
		{/if}
		{if $smarty.session.country neq 'brussel' && $smarty.session.country neq 'bruxelles'}
		 / 
		{/if}
		{if $smarty.session.country neq 'bruxelles'}
			<a value="bruxelles" href="/fr/bruxelles">Bruxelles (FR)</a>
		{/if}
	</li>
	{if $smarty.session.country neq 'nederland'}
		<li><a value="nederland" href="/nl/nederland">Nederland</a></li>
	{/if}
	<li><a value="deutschland" href="/de/deutschland">Deutschland (DE)</a> / <a value="germany" href="/en/germany">Germany (EN)</a></li>
</ul> -->*}