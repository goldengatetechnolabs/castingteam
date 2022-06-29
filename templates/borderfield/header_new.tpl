<header class="header clearfix">
    <div class="menu-mobile">
        <i class="fas fa-bars"></i>
    </div>
    <div class="menu_right red-color">
        {include file="borderfield/contacts.tpl"}
        {* {if $pageTitle != 'Homepage' && $pageTitle != 'Creative Trials'}
            {block name=saved_selection_button}
                <div class="saved-button-wrapper">
                    <a class="saved-button background-red-color white-color button" href="/{$taal}/selection">{$languageContent.borderfield.common.save_button} (<span class="saved-selection-number">{$selectionCount}</span>)</a>
                </div>
            {/block}
        {/if} *}
    </div>
    <div class="menu_left">
        <a class="logo" href="/{$smarty.session.lang}">
            <svg viewBox="0 0 307 441" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M183 192.8H165C178 173.2 185.6 149.6 185.6 124.3C185.6 56.1001 130.6 0.800049 62.5 0.300049H0.5V55.8001H61.7C99.5 55.8001 130.2 86.5 130.2 124.3C130.2 162.1 99.5 192.8 61.7 192.8H0.5V248.3H61.2C61.3 248.3 61.5 248.3 61.6 248.3C61.7 248.3 61.9 248.3 62 248.3H62.5H182.1C219.9 248.3 250.6 279 250.6 316.8C250.6 354.6 219.9 385.3 182.1 385.3H121V440.8H181.7C181.8 440.8 182 440.8 182.1 440.8C182.2 440.8 182.4 440.8 182.5 440.8H183C251.1 440.3 306.1 385 306.1 316.8C306.1 248.5 251.1 193.2 183 192.8Z" fill="#F05555"/>
            </svg>
        </a>
        {if $pageTitle != 'Intro' && $pageTitle != 'Creative Trials'}
            {block name=groups}
                <div class="groups">
                    {include file="borderfield/groups_new.tpl"}
                </div>
            {/block}
        {/if}
    </div>
</header>