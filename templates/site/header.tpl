<!DOCTYPE html>
<html lang="{$taal}">
  <head>
    <title>{$taalContent['header']['title']} - {$pageTitle}</title>
    <meta http-equiv="Cache-Control" content="public" />
    <meta http-equiv="Cache-Control" content="max-age=3600, must-revalidate" />
    <meta charset="UTF-8">
    <meta name="description" content="{$taalContent['header']['description']}">
    <meta name="keywords" content="">
    <meta id="Viewport" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="all" />
    <link href="https://plus.google.com/108937195139060877177" rel="publisher">

    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    {if isset($model)}

      <meta property="og:url"         content="https://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" />
      <meta property="og:type"        content="website" />
      <meta property="og:title"       content="{$model['voornaam']} bij Castingteam" />
      <meta property="og:description" content="Castingteam is een casting -en modellenbureau met duizenden getalenteerde people, modellen, acteurs en actrices, kids & teens, seniors en specials. " />

      {if isset($model['images'][0])}

        <meta property="og:image"     content="https://{$smarty.server.HTTP_HOST}/models/{$model['model_id']}/website/thumbs/{$model['images'][0]['id']}.jpg" />

      {else}

        <meta property="og:image"     content="https://castingteam.com/images/Castingteam.jpg">

      {/if}
    {else}

      <meta property="og:url"         content="https://castingteam.com">
      <meta property="og:type"        content="website" />
      <meta property="og:title"       content="Castingteam is een casting -en modellenbureau | Vlaanderen | Brussel | Nederland">
      <meta property="og:description" content="Castingteam is een casting -en modellenbureau. Wij vertegenwoordigen duizenden getalenteerde people, modellen, acteurs en actrices, kids & teens, seniors… uit België en Nederland. Wij zijn casting directors uit Vlaanderen, Brussel en Nederland; een jong team van gedreven professionals die de juiste mensen zoeken - én vinden!">
      <meta property="og:image"       content="https://castingteam.com/images/Castingteam.jpg">

    {/if}

    {include file='site/css_links.tpl'}
    {include file='site/js_links.tpl'}

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    {include file='site/facebook/pixel.tpl'}
  </head>
  
  {if $current_page eq 'homepage'}
    {include file='site/header/preloader.tpl'}
  {/if}

  {* <body {if !isset($user)}class="copyright"{/if}> *}
  <body class="{if !isset($user)}copyright{/if} {if $current_page eq 'homepage'}isHomepage{/if}">

    {include file='site/analyticstracking.tpl'}
    {include file='site/social_detection_schema.tpl'}
    {include file='site/microdata.tpl'}
    {include file='site/components/notify-message.tpl'}

    <div id="fb-root"></div>
    <div class="wrapper">

      {literal}
        <script type="text/javascript">
          $(document).ready(function() {
            getEmails();
            displayNotifyMessage();
          });
        </script>
      {/literal}

      {if $current_page eq 'homepage'}
        <div class="top-bar FadeOut">
      {else}
        <div class="top-bar">
      {/if}
        <div class="top-bar--left">
          <a class="top-bar__element logo top-bar__logo" href="/">
            <img src="/images/logo_castingteam_pride.svg" alt="Happy pride month '22!" title="Happy pride month '22!">
            <!-- <svg viewBox="0 0 404.5 88.3">
              <path d="M145.6,7.6c0,3.6-3,6.6-6.6,6.6s-6.6-3-6.6-6.6c0-3.6,3-6.6,6.6-6.6S145.6,4,145.6,7.6z"/>
              <path d="M272.9,7.6c0,3.6-3,6.6-6.6,6.6c-3.6,0-6.6-3-6.6-6.6c0-3.6,3-6.6,6.6-6.6C269.9,1,272.9,4,272.9,7.6z"/>
              <path d="M30.1,37.3c-1.8-1.3-3.8-2.3-6.1-2.3c-4.6,0-8.1,3.5-8.1,8.1c0,4.8,3.4,8.2,8.3,8.2c2.1,0,4.4-0.8,5.9-2.3v10 c-2.6,1.3-5.5,1.9-8.3,1.9c-9.9,0-18.1-7.3-18.1-17.4c0-10.7,8.2-18.1,18.7-18.1c2.7,0,5.5,0.7,7.8,2V37.3z"/>
              <path d="M72.1,59.8H60.3v-3.7h-0.1c-2.1,3.3-6.2,4.8-10.1,4.8c-9.9,0-16.8-8.3-16.8-17.8s6.8-17.7,16.7-17.7 c3.8,0,7.9,1.4,10.3,4.4v-3.2h11.8V59.8z M45.5,43.1c0,4.2,2.8,7.5,7.6,7.5c4.8,0,7.6-3.3,7.6-7.5c0-4.1-2.8-7.5-7.6-7.5 C48.3,35.6,45.5,39,45.5,43.1z"/>
              <path d="M99.5,35c-1.8-1-4.4-1.6-6.4-1.6c-1.4,0-3.7,0.6-3.7,2.3c0,2.3,3.7,2.6,5.3,2.9c5.5,1.1,9.7,3.7,9.7,9.9 c0,8.8-8,12.4-15.7,12.4c-4.7,0-9.4-1.4-13.5-3.8l4.3-8.3c2.4,1.7,6.4,3.4,9.4,3.4c1.5,0,3.7-0.7,3.7-2.5c0-2.6-3.7-2.7-7.4-3.7 c-3.7-1-7.4-2.8-7.4-8.8c0-8.2,7.4-11.8,14.7-11.8c3.8,0,7.5,0.6,11,2.1L99.5,35z"/>
              <path d="M122.2,59.8h-11.8V36.2h-3.8v-9.8h3.8v-10h11.8v10h6.7v9.8h-6.7V59.8z"/>
              <rect x="133" y="26.4" width="11.8" height="33.3"/>
              <path d="M250.6,59.8h-11.8V36.2h-3.8v-9.8h3.8v-10h11.8v10h6.7v9.8h-6.7V59.8z"/>
              <path d="M295.8,43.8c0-11.4-6.7-18.5-18.3-18.5c-10.9,0-18.5,6.7-18.5,17.8c0,11.5,8.3,17.7,19.3,17.7c3.8,0,7.6-0.9,10.7-2.8 c3.1-1.9,5.4-4.7,6.3-8.6H284c-1.3,2.2-3.1,3.1-5.7,3.1c-4.9,0-7.4-2.6-7.4-7.4h24.9V43.8z M271.1,38.3c0.7-3.4,3.6-5.3,7-5.3 c3.2,0,6.1,2.1,6.7,5.3H271.1z"/>
              <path d="M337.6,59.8h-11.8v-3.7h-0.1c-2.1,3.3-6.2,4.8-10.1,4.8c-9.9,0-16.8-8.3-16.8-17.8s6.8-17.7,16.7-17.7 c3.8,0,7.9,1.4,10.3,4.4v-3.2h11.8V59.8z M311,43.1c0,4.2,2.8,7.5,7.6,7.5c4.8,0,7.6-3.3,7.6-7.5c0-4.1-2.8-7.5-7.6-7.5 C313.8,35.6,311,39,311,43.1z"/>
              <path d="M355.8,30.6h0.1c2.8-3.7,6.2-5.3,10.5-5.3c4.8,0,9,2,11.4,6.4c2.3-4.2,6.8-6.4,11.3-6.4c8.5,0,11.4,5.5,11.4,13.2v21.3 h-11.8V43.8c0-3.4,0.1-9.1-4.9-9.1c-5.5,0-5.7,5.1-5.7,9.1v15.9h-11.8V43.8c0-3.7,0-9.4-5.3-9.4s-5.3,5.7-5.3,9.4v15.9h-11.8V26.4 h11.8V30.6z"/>
              <path d="M218.9,26.4v3.5h-0.1c-2.3-3.3-5.9-4.6-9.8-4.6c-4.4,0-8.1,1.5-11,4c-3.8,3.4-6.1,8.5-6.1,14c0,0.5,0,1,0.1,1.4 c0.6,8.9,7.1,15.6,16.4,15.6c4.4,0,7.5-1.5,10.5-4.5c0,0.3,0,1.2,0,1.2c0,9-7.3,16.3-16.3,16.3c-9,0-16.3-7.3-16.3-16.3h0 c0,0,0,0,0,0l0,0l0,0V39.2c0-1.7-0.2-3.2-0.5-4.7c-1.2-5.6-4.9-9.2-12.1-9.2c-4.6,0-7.9,1.4-10.7,5.4H163v-4.3h-11.8v33.3H163V42.5 c0-4.2,1.4-7.7,6.2-7.7c5.9,0,5.3,5.6,5.3,8.8v13.6l0,0h0c0,15.5,12.6,28.1,28.1,28.1c15.4,0,27.8-12.3,28.1-27.6l0-31.1H218.9z M216.6,48.8c-1.3,1-2.9,1.6-4.9,1.6c-4.8,0-7.6-3.3-7.6-7.5c0-0.7,0.1-1.3,0.2-2c0.8-3.2,3.4-5.6,7.4-5.6c4.8,0,7.6,3.4,7.6,7.5 C219.3,45.3,218.3,47.4,216.6,48.8z"/>
            </svg> -->
          </a>
          <div class="top-bar__locationmenu top-bar__element locationmenu">
            {include file='site/header/country-list.tpl'}
          </div>
        </div>
        <div class="top-bar__menu top-bar__element">
          <a href="" class="main-menu__handle">
            <div class="main-menu__hamburger hamburger-icon">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
            <div class="main-menu__title">
              <span class="menu">menu</span>
              <span class="close">{$taalContent['header']['close']}</span>
            </div>
          </a>
          <div class="main-menu">
            {include file='site/header/page_links_block.tpl'}
          </div>
        </div>
        <div class="top-bar--right">
          <div class="top-bar__element top-bar__contact contact-us">
            <p>
              {$phones[$smarty.session.country]}<br>
              <a href="mailto:{$country_emails[$smarty.session.country]}">{$country_emails[$smarty.session.country]}</a>
            </p>
          </div>
          <div class="top-bar__element top-bar__subscribe subscribe">
            <a id="model_registration" href="/{$taal}/register/0" target="_blank" class="subscribe__button button">
              {$taalContent['header']['login']['registration']}
              <span>{$taalContent['header']['login']['registration_subtitle']}</span>
            </a>
          </div>
        </div>
      </div>

      {if $current_page eq 'homepage'}

      <header class="header">
        <h2 class="header__tagline">{$taalContent.homepage.title}</h2>
        <a href="/{$taal}/{$taalContent.navigation.specials}" class="header__discover discover button button--black FadeOut">{$taalContent.links.people_models_button}</a>
      </header>

      {/if}