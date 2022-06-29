{* {extends file="borderfield/base_layout.tpl"} *}
{extends file="borderfield/base_layout_new.tpl"}
{block name=saved_selection_button}{/block}
{block name=saved_selection_button_mobile}{/block}
{block name=content}
    <div class="selection-block">
        <div class="container">
            <div class="model_title clearfix">
                <header class="page_title red-color">
                    {if isset($currentSelection)}
                        <span class="web selection_name">( <input type="text" class="selection-title-input" data-id="{$currentSelection->getCode()}" readonly disabled value="{$currentSelection->getName()}"> {if isset($isUserSelection) && $isUserSelection == true}<i class="edit fa fa-pencil-square-o" aria-hidden="true"></i>{/if})</span>
                        <h1>{$languageContent.borderfield.selection.title}</h1>
                        <span class="mobile selection_name">( <input type="text" class="selection-title-input" data-id="{$currentSelection->getCode()}" readonly disabled value="{$currentSelection->getName()}"> {if isset($isUserSelection) && $isUserSelection == true}<i class="edit fa fa-pencil-square-o" aria-hidden="true"></i>{/if})</span>
                    {else}
                        <h1>{$languageContent.borderfield.selection.title_second}</h1>
                    {/if}
                </header>
                {if isset($currentSelection)}
                <div class="selection-selection-block">
                    {if !empty($selections)}
                        <label class="label1">
                            <select id="selection" class="filter">
                                {if isset($isUserSelection)}
                                    {if $isUserSelection == false}
                                        <option class="private_selection" value="{$currentSelection->getCode()}">{$currentSelection->getName()}</option>
                                    {/if}
                                {/if}
                                {foreach from=$selections item=selection}
                                    <option data-id="{$selection->getId()}" value="{$selection->getCode()}" {if $currentSelection->getId() == $selection->getId()}selected{/if}>{$selection->getName()}</option>
                                {/foreach}
                            </select>
                        </label>
                    {else}
                        <label class="label1 dsp_none">
                            <select id="selection" class="filter reffered">
                                <option value="{$currentSelection->getCode()}">{$currentSelection->getName()}</option>
                            </select>
                        </label>
                    {/if}
                    <div class="send-selection-button-wrapper">
                        <div class="upward-triangle"></div>
                        <a id="send_selection_button" href="#send_selection_form_email" class="background-red-color white-color button">{$languageContent.borderfield.selection.send_selection_button}</a>
                    </div>
                    {if !empty($selections) or isset($smarty.get.selection)}
                        <div class="filter_top clearfix view-choose-section web">
                            <div class="filter_top_rht">
                                <span class="head_cont"> {$languageContent.borderfield.selection.view}: </span>
                                <a href="#" class="list_view diff_view {if $modelView=='list'}active{/if}" data-value="list">
                                    <span class="list_view_img"></span>
                                    <span class="list_cont">{$languageContent.borderfield.selection.row}</span>
                                </a>
                                <a href="#" class="grid_view diff_view {if $modelView=='grid'}active{/if}" data-value="grid">
                                    <span class="grid_view_img"></span>
                                    <span class="list_cont">{$languageContent.borderfield.selection.grid}</span>
                                </a>
                            </div>
                        </div>
                    {/if}
                </div>
                {/if}
            </div>
        </div>
        {include file='borderfield/send_selection.tpl'}
        {if !empty($selections) or isset($smarty.get.selection)}
            <div class="filter_top clearfix view-choose-section mobile">
                <div class="filter_top_rht">
                    <span class="head_cont"> {$languageContent.borderfield.selection.view}: </span>
                    <a href="#" class="list_view diff_view {if $modelView=='list'}active{/if}" data-value="list">
                        <span class="list_view_img"></span>
                        <span class="list_cont">{$languageContent.borderfield.selection.row}</span>
                    </a>
                    <a href="#" class="grid_view diff_view {if $modelView=='grid'}active{/if}" data-value="grid">
                        <span class="grid_view_img"></span>
                        <span class="list_cont">{$languageContent.borderfield.selection.grid}</span>
                    </a>
                </div>
            </div>
        {/if}
    </div>
    {if isset($currentSelection)}
    <div class="models white-color " {if $modelView=='list'}style="display: none;"{/if}>

    </div>
    <div class="models-list white-color " {if $modelView=='grid'}style="display: none;"{/if}>

    </div>
    {/if}
{/block}