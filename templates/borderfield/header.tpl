<header class="{block name=header_position}common-header{/block}">
    <div class="menu_right {block name=header-color}red-color{/block}">
        {include file="borderfield/contacts.tpl"}
        <div class="menu-button-wrapper mobile">
            <img class="display_menu" alt="Menu Image" id="menu_image" src="/images/{block name=menu_image_color_button}hamburger_button_red{/block}.png">
        </div>
        {if $pageTitle != 'Homepage' && $pageTitle != 'Creative Trials'}
            {block name=saved_selection_button}
                <div class="saved-button-wrapper">
                    <a class="saved-button background-red-color white-color button" href="/{$taal}/selection">{$languageContent.borderfield.common.save_button} (<span class="saved-selection-number">{$selectionCount}</span>)</a>
                </div>
            {/block}
        {/if}
    </div>
    <div class="menu_left">
        <a href="/"><img class="logo" alt="logo" src="/images/{block name=logo}b-logo-red.svg{/block}"></a>
        {if $pageTitle != 'Intro' && $pageTitle != 'Creative Trials'}
            {block name=groups}
                <div class="groups fl_lft">
                    {include file="borderfield/groups.tpl"}
                </div>
            {/block}
        {/if}
    </div>
    {if $pageTitle != 'Homepage' && $pageTitle != 'Creative Trials'}
        {block name=saved_selection_button_mobile}
            <div class="saved-button-wrapper-mobile">
                <a class="saved-button background-red-color white-color button" href="/{$taal}/selection">{$languageContent.borderfield.common.save_button} (<span class="saved-selection-number">{count($selections)}</span>)</a>
            </div>
        {/block}
    {/if}
</header>