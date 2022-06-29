<!DOCTYPE html>
<html lang="{$language}">
<head>
    <title>Bordermodels - {$pageTitle}</title>
    <meta content="public" />
    <meta content="max-age=3600, must-revalidate" />
    <meta charset="UTF-8">
    <meta name="description" content="Borderfield">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="all" />

    <link href="https://plus.google.com/108937195139060877177" rel="publisher">
    <link href="/css/borderfield/style.css" rel="stylesheet" media="all">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/css/site/featherlight.min.css" title="Featherlight Styles" />
    <link rel="stylesheet" href="/css/site/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/css/site/jquery.fancybox-buttons.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/css/site/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/site/slick.css"/>

    <script type="text/javascript">var taal = '{$taal}'</script>
    <script type="text/javascript">var currentGroup = {if isset($currentGroup) && $currentGroup != ''}{$currentGroup->getId()}{else}0{/if};</script>
    <script type="text/javascript">var currentGroupShortName = {if isset($currentGroup) && $currentGroup != ''}'{$currentGroup->getShortName()}'{else}'new_talent_models'{/if};</script>

    <script type="text/javascript" src="/js/parse_url.js"></script>
    <script type="text/javascript" src="/js/site/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/js/borderfield/slick.min.js"></script>
    <script type="text/javascript" src="/js/site/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="/js/site/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="/js/site/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="/js/site/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript" src="/js/borderfield/main.js"></script>
</head>
<body>
<div class="slide-up-menu mobile background-red-color white-color">
    <ul>
        <li class="display_menu light-up-element" style="opacity: 1;">
            <span>{$languageContent.borderfield.header.city}</span>
        </li>
        <li class="light-up-element" style="opacity: 1;">Call {$contactPhone}</li>
        <li>
            <span class="underlined_text">
                <a id="info_com" class="info_com" href="mailto:">{$languageContent.borderfield.header.email}</a>
            </span>
        </li>
        <li>
            <span>
                <a href="/{$taal}/creative_trials">{$languageContent.borderfield.header.trial}</a>
            </span>
        </li>
        <li class="model-registration-link light-up-element" style="opacity: 1;">
            <a href="https://signup.bordermodels.com" target="_blank" class="underlined_text">{$languageContent.borderfield.header.sign_up}</a>
        </li>
    </ul>
</div>
<div class="body-wrapper {$pageTitle|lower}">
{block name=header}{include file="borderfield/header.tpl"}{/block}
{block name=loading}
    <div class="loading">
        <div id="loading" class="background-white-color">
            {include file="borderfield/loader.tpl"}
        </div>
    </div>
{/block}
{block name=slides}{/block}
{block name=content}{/block}
{block name=footer}{/block}
</div>
</body>
</html>