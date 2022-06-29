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

    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/bordermodels/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/bordermodels/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/bordermodels/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/bordermodels/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/bordermodels/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/bordermodels/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/bordermodels/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/bordermodels/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/bordermodels/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/bordermodels/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/bordermodels/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/bordermodels/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/bordermodels/favicon-16x16.png">
    <link rel="manifest" href="/favicon/bordermodels/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/bordermodels/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link href="https://plus.google.com/108937195139060877177" rel="publisher">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="/css/site/featherlight.min.css" title="Featherlight Styles" />
    <link rel="stylesheet" href="/css/site/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/css/site/jquery.fancybox-buttons.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/css/site/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/site/slick.css"/>

    <link href="/css/borderfield/style.css" rel="stylesheet" media="all">
    <link href="/css/borderfield/style-new.css" rel="stylesheet" media="all">

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
    <script type="text/javascript" src="/js/site/new-design/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="/js/borderfield/main.js"></script>
</head>
<body>
    {block name=loading}
        <div class="loading">
            <div id="loading" class="background-white-color">
                {include file="borderfield/loader.tpl"}
            </div>
        </div>
    {/block}
    <div class="body-wrapper {$pageTitle|lower}">
        {include file="borderfield/header/offcanvas.tpl"}
        <div class="container">
            {block name=header}
                {include file="borderfield/header_new.tpl"}
            {/block}
        </div>
        {if ($pageTitle|lower) === 'homepage'}
            <div class="container">
        {else}
            <div class="container-full">
        {/if}
            {block name=content}{/block}
        </div>
    </div>
</body>
</html>