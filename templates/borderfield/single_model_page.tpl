{* {extends file="borderfield/base_layout.tpl"} *}
{extends file="borderfield/base_layout_new.tpl"}
{block name=content}
    <div class="outline-block"></div>
    <div class="center-block featherlight-content">
        {include file="borderfield/single_model.tpl"}
    </div>
{/block}