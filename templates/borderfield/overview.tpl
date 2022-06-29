{* {extends file="borderfield/base_layout.tpl"} *}
{extends file="borderfield/base_layout_new.tpl"}
{block name=content}
    <div class="container">
        <div class="title-block">
            <div class="model_title clearfix">
                <header class="page_title red-color">
                        <h1>{if $currentGroup != ''}{$languageContent.borderfield.groups[$currentGroup->getName()]}{else}{$languageContent.borderfield.groups.new_talent}{/if}</h1>
                </header>
            </div>
        </div>
    </div>
    <div class="outline-block"></div>
    <div class="models white-color">

    </div>
{/block}