<p class="menu_right-languages">	

	{if $smarty.session.country != 'germany'}
		{if $smarty.session.country eq 'belgium'}
			Belgium - 
		{else}
			<a href="/be" >Belgium</a> - 
		{/if}
		{if $smarty.session.country eq 'netherlands'}
			Netherlands - 
		{else}
			<a href="/nl">Netherlands</a> - 
		{/if}
		<a href="/de">Germany</a>
	{else}
		{if $smarty.session.country eq 'germany'}
			{if $smarty.session.lang eq 'de'}
				Germany Deutsch - 
			{else}
				<a href="/de" >Germany Deutsch</a> - 
			{/if}
			
			{if $smarty.session.lang eq 'en'}
				English
			{else}
				<a href="/en" >English</a>
			{/if}
		{/if}
	{/if}
</p>

<p>Call {$languageContent.borderfield.common.contact_phone} or <a href="mailto:{$languageContent.borderfield.common.contact_email}">{$languageContent.borderfield.header.email}</a></p>
<p><a href="https://castingteam.com/en/register/0" target="_blank">{$languageContent.borderfield.header.sign_up}</a></p>