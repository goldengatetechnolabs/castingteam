<ul class="main-menu__list--contact main-menu__list nobullets">
    <li class="main-menu__list-item"><p>{$phones[$smarty.session.country]}</p></li>
    <li class="main-menu__list-item"><a id={$mail_hook}" class="{$mail_hook}" href="mailto:">{$languageContent.borderfield.header.email}</a></li>
</ul>
<ul class="main-menu__list--language main-menu__list nobullets">
    <li class="main-menu__list-item"><p>Castingteam in:</p></li>
    {include file='site/header/country-list-mobile.tpl'}
</ul>
<ul class="main-menu__list--1 main-menu__list nobullets">
    {*<li class="main-menu__list-item"><p>{$taalContent['links']['people_models']}:</p></li>
    <!-- <li class="main-menu__list-item"><a href="/{$taal}/{$taalContent.navigation.people}">{$taalContent.title.201}</a></li>
    <li class="main-menu__list-item"><a href="/{$taal}/{$taalContent.navigation.modellen}">{$taalContent.title.202}</a></li>
    <li class="main-menu__list-item"><a href="/{$taal}/{$taalContent.navigation.acteurs}">{$taalContent.title.203}</a></li>
    <li class="main-menu__list-item"><a href="/{$taal}/{$taalContent.navigation.kids}">{$taalContent.title.204}</a></li>
    <li class="main-menu__list-item"><a href="/{$taal}/{$taalContent.navigation.specials}">{$taalContent.title.206}</a></li> -->*}
    <li class="main-menu__list-item"><a href="/{$taal}/{$taalContent.navigation.specials}"><b>{$taalContent.links.people_models_button}</b></a></li>
</ul>
<ul class="main-menu__list--2 main-menu__list nobullets">
    <li class="main-menu__list-item"><a href="/{$taal}">{$taalContent['links']['home']}</a></li>
    {if $current_page eq 'homepage'}
        <li class="main-menu__list-item"><a href="#about">{$taalContent['links']['overcastingteam']}</a></li>
    {else}
        <li class="main-menu__list-item"><a href="/#about">{$taalContent['links']['overcastingteam']}</a></li>
    {/if}
    <li class="main-menu__list-item"><a href="https://www.instagram.com/castingteam.be/" target="_blank" class="link">{$taalContent['links']['mycastingteam']}</a></li>
    <li class="main-menu__list-item"><a href="https://www.youtube.com/channel/UCKCd9ic0t94AcO1K7z2EjBw" target="_blank" class="link">{$taalContent['links']['clips']}</a></li>
</ul>
<ul class="main-menu__list--3 main-menu__list nobullets">
    <li class="main-menu__list-item"><a href="http://inschrijven.castingteam.com" target="_blank" class="link">{$taalContent['links']['registration']}</a></li>
    <li class="main-menu__list-item"><a href="http://inschrijven.castingteam.com" target="_blank" class="link">{$taalContent['links']['profile']}</a></li>
    <!-- <li class="main-menu__list-item"><a href="#bordermodels">{$taalContent['links']['bordermodels']}</a></li>
    <li class="main-menu__list-item"><a href="#vlambaar">{$taalContent['links']['vlambaar_people']}</a></li> -->
</ul>