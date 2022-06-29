<!DOCTYPE>

<html>

  <head>

    <title>Castingteam CMS</title>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta http-equiv="content-language" content="nl" />

    <meta name="copyright" content="" />

    <meta name="keywords" content="" />

    <link rel="stylesheet" href="/css/icheck/green.css" type="text/css" />

    <link rel="stylesheet" href="/css/fonts.css" type="text/css" />

    <link rel="stylesheet" href="/css/style.css" type="text/css" />

    <link rel="stylesheet" href="/css/cms/style.css" type="text/css" />
    <link rel="stylesheet" href="/css/cms/select2.min.css" type="text/css" /> 

    <link rel="stylesheet" href="/css/cms/cms.css" type="text/css" />


    <link rel="stylesheet" href="/css/cms/jqueryui.css" type="text/css" />

    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" href="/css/site/featherlight.min.css" title="Featherlight Styles" />



    <link rel="stylesheet" href="/css/cms/cms-new-nav.css" type="text/css" />



    <script src="https://maps.google.com/maps/api/js" type="text/javascript"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script type="text/javascript" src="/js/cms/jqueryui.js"></script>

    <script type="text/javascript" src="/js/icheck.min.js"></script>

    <script type="text/javascript" src="/js/customselect.js"></script>

    <script type="text/javascript" src="https://fast.fonts.net/jsapi/95e5d435-d0b4-4e0f-b140-a24dc196269a.js"></script>

    <script type="text/javascript" src="/js/cms/main.js"></script>

    <script type="text/javascript" src="/js/cms/select2.min.js"></script>

    <script type="text/javascript" src="/js/cms/ajax.js"></script>



    <script type="text/javascript">



      function initSelect2(element = ".select2", elementParent = ".cms-select") {

        var element = $(element);

        if (element.data('select2')) {

          element.select2("destroy");

        }

        element.select2({

          dropdownParent: $(elementParent),

        });

      }

    </script>



    <script>var taal = '{$taal}'; </script>

  </head>

  <body>

  

    <!--<div id="popup-bg"></div>-->



    {*<div id="cms-menu-container">

      {if $admin.typeName!='updater'}

      <div id="cms-search-block" class="cms-menu-submit">

        <input type="text" name="zoeken" value="{if isset($smarty.get.search)}{$smarty.get.search}{/if}" />

        <a id="search-submit-button">Search</a>

      </div>

      {/if}

      <ul id="cms-menu-tabs">

        <li{if $hoofdmenu_actief=='homepage'} class="actief"{/if}><span class="icon-home icon"></span> <a href="/cms">Dashboard</a></li>

        {if $admin.typeName!='updater'}<li{if $hoofdmenu_actief=='modellen'} class="actief"{/if}><span class="icon-star icon"></span> <a href="/cms/models/models/lijst">People Database</a></li>{/if}

        <li{if $hoofdmenu_actief=='inschrijvingen'} class="actief"{/if}><span class="icon-uniF68D icon"></span> <a href="/cms/inschrijvingen/models/{if $admin.typeName!='updater'}nieuw{else}updates{/if}">Registrations &amp; updates</a></li>

        {if $admin.typeName!='updater'}<li{if $hoofdmenu_actief=='communicatie'} class="actief"{/if}><span class="icon-envelope icon"></span> <a href="/cms/communicatie/emails/lijst">Communication</a></li>{/if}

        {if $admin.typeName!='updater'}<li{if $hoofdmenu_actief=='vips'} class="actief"{/if}><span class="icon-drawer icon"></span> <a href="/cms/vips/vips/add">Vips</a></li>{/if}

        {if $admin.typeName=='admin'}<li{if $hoofdmenu_actief=='stats'} class="actief"{/if}><span class="icon-drawer icon"></span><a href="/cms/stats/stats/basic">Stats</a></li>{/if}

      </ul>

      

      <div style="clear:both"></div>

    </div>



    <div id="cms-content-container">

      

      <div id="cms-content">

        <div id="cms-header">

          <div id="cms-logo"><img src="/images/logo.jpg" alt="" /></div>

          

          <div class="float-right" id="userdata">

            <p style="text-align: right;">Welcome {$admin.voornaam} - {date('d/m/Y')} - <a href="/cms/login/uitloggen/uitloggen">Log out</a></p>

            <p style="text-align: right;">Access level: {$admin.typeName}</p>

            <h1 class="float-right">Dashboard</h1>

          </div>

          

          <div style="clear: both"></div>

        </div>

        

        {if isset($include_tabs) && $include_tabs !== ''}

        <div id="cms-tabs">

          {include "$include_tabs"}

        </div>

        {/if}

        

        <div id="cms-includes">

          {include "$include"}

        </div>

        

      </div>

      

    </div>*}

    

    <div class="cms-header">

      <div class="cms-header-logos">

        <div class="cms-logo">

          <img src="/images/logo-new-black.png" alt="" />

        </div>

        {*

        <div class="cms-logo">

          <img src="/images/logo-bordermodels.png" alt="" />

        </div>

        *}

      </div>

    </div>



    <section class="cms-section cms-section-container">

    

      <div class="cms-sidebar">

        {if $admin.typeName!='updater'}

          <div id="cms-search-block" class="cms-header-search cms-menu-submit">

            <input type="text" name="zoeken" value="{if isset($smarty.get.search)}{$smarty.get.search}{/if}" />

            <a id="search-submit-button" class="search-submit-button"><i class="fas fa-search"></i></a>

          </div>

        {/if}

        <div class="cms-header-menu">

          <ul>

            <li{if $hoofdmenu_actief=='homepage'} class="is-active"{/if}>

              <a href="/cms">

                <i class="fas fa-home"></i>

                <span>Home</span>

              </a>

            </li>

          </ul>

          <ul>

            {*if $admin.typeName!='updater'*}

            <li{if $hoofdmenu_actief=='models'} class="is-active"{/if}>

              <a href="/cms/models/models/lijst">

                <i class="fas fa-user-plus"></i> Search people

              </a>

            </li>

            {*/if*}

            <li{if $hoofdmenu_actief=='selections'} class="is-active"{/if}>

              <a href="/cms/models/models/booker_list">

                <i class="fas fa-user-check"></i> Selections

              </a>

            </li>

            <li{if $hoofdmenu_actief=='inquiry_list'} class="is-active"{/if}>

              <a href="/cms/clients/clients/inquiry_list">

                <i class="fas fa-calendar-check"></i> Inquiries

              </a>

            </li>

          </ul>

          <ul>

            <li{if $hoofdmenu_actief=='clients'} class="is-active"{/if}>

              <a href="/cms/clients/clients/client_list">

                <i class="fas fa-list"></i> Clients

              </a>

            </li>

            <li{if $hoofdmenu_actief=='projects'} class="is-active"{/if}>

              <a href="/cms/projects/projects/project_list">

                <i class="fas fa-list"></i> Projects

              </a>

            </li>

            {*if $admin.typeName!='updater'*}

            <li{if $hoofdmenu_actief==''} class="is-active"{/if}>

              <a href="#">

                <i class="fas fa-bolt"></i> Bookings

              </a>

            </li>

            {*/if*}

            <li{if $hoofdmenu_actief==''} class="is-active"{/if}>

              <a href="#">

                <i class="fas fa-calculator"></i> Invoices

              </a>

            </li>

            <li{if $hoofdmenu_actief==''} class="is-active"{/if}>

              <a href="#">

                <i class="fas fa-file-invoice"></i> Sales / turnover

              </a>

            </li>

          </ul>

          <ul>

            <li{if $hoofdmenu_actief=='nieuw'} class="is-active"{/if}>

              <a href="/cms/inschrijvingen/models/nieuw">

                <i class="fas fa-plus-square"></i> Profiles

              </a>

            </li>

            <li{if $hoofdmenu_actief=='updates'} class="is-active"{/if}>

              <a href="/cms/inschrijvingen/models/updates">

                <i class="fas fa-sync-alt"></i> Updates

              </a>

            </li>

            {*if $admin.typeName!='updater'*}

            <li{if $hoofdmenu_actief=='communicatie'} class="is-active"{/if}>

              <a href="/cms/communicatie/emails/lijst">

                <i class="far fa-envelope"></i>

                <span>Templates</span>

              </a>

            </li>

            {*/if*}

            {*if $admin.typeName=='admin'*}

            <li{if $hoofdmenu_actief=='stats'} class="is-active"{/if}>

              <a href="/cms/stats/stats/basic">

                <i class="fas fa-chart-pie"></i>

                <span>Stats</span>

              </a>

            </li>

            {*/if*}

          </ul>

          <ul>

            <li>

              <a href="">

                <i class="fas fa-cog"></i> {$admin.voornaam}

              </a>

            </li>

            <li>

              <a href="">

                <i class="fas fa-sign-out-alt"></i> Log out

              </a>

            </li>

          </ul>

        </div>

        <!--<div class="cms-header-settings">

          <span>{$admin.voornaam} - </span>

          <a class="cms-link-logout" href="/cms/login/uitloggen/uitloggen">log out</a>

          <a href=""><i class="fas fa-cog"></i></a>

        </div>-->

      </div>

        

      {if isset($include_tabs) && $include_tabs !== ''}

        <div class="cms-container">

          <div class="cms-tabs">

            {include "$include_tabs"}

          </div>

        </div>

      {/if}

      

      <div class="cms-includes">

        <div class="cms-container">

          {include "$include"}

        </div>

      </div>



    </section>



    <div class="cms-popup-bg" id="models-preview">

      <div class="cms-popup models-preview">

        <a href="#" class="close"><span class="icon-cross icon"></span></a>

        <div id="preview-images"></div>

      </div>

    </div>



    <div class="cms-popup-bg" id="models-message">

      <div class="cms-popup models-message">

        <a href="#" class="close"><span class="icon-cross icon"></span></a>

        <h3>Message to people / models</h3>

        <form method="post" action="/api/email/send" class="ajax">

          <input type="hidden" name="model_id" value="" />

          <input type="hidden" name="user_type" id="user_type" value="{if $tab_active eq 'overview' ||  $tab_active eq 'new_registrations'}1{else}2{/if}" />



          <div class="line_block mail-id-block">

            <select name="mail_id" class="custom-select-new">

              {foreach from=$emails item=r key=id}

                <option value="{$id}">{$r.titel}</option>

              {/foreach}

            </select>

          </div>



          <div class="line_block">

            <div class="select-wrapper">

              <select name="mail_from" class="custom-select-new mail_from">

                {foreach from=$emailsFrom item=email key=id}

                  <option value="{$email.id}" {if $email.address == 'david@castingteam.com'}selected="selected"{/if}>{$email.address}</option>

                {/foreach}

              </select>

            </div>

          </div>



          <p class="custom-message-area-wrapper">

            <textarea class="custom-message-area" rows="5" cols="45" name="text"></textarea>

          </p>

          <p style="clear: both; padding-top: 20px;">

            <input type="submit" class="button new" value="Versturen" />

            <input type="button" onclick="email_preview()" name="button" class="button new grey" value="Preview" />

          </p>

        </form>

        

        <h3 style="padding-top: 20px;">History</h3>

        <div id="email_logs">

          

        </div>

      </div>

    </div>



    <div class="cms-popup-bg" id="models-message-group">

      <div class="cms-popup models-message">

        <a href="#" class="close"><span class="icon-cross icon"></span></a>

        <h3>Bericht naar model</h3>

        <form method="post" action="/api/email/send" class="ajax">

          <input type="hidden" name="send_message_id" value="" />

          <div class="line_block">

            <select name="mail_id" class="custom-select-new">

              {foreach from=$emails item=r key=id}

              <option value="{$id}">{$r.titel}</option>

              {/foreach}

            </select>

          </div>



          <div class="line_block">

            <div class="select-wrapper">

              <select name="mail_from" class="custom-select-new mail_from">

                {foreach from=$emailsFrom item=email key=id}

                  <option value="{$email.id}" {if $email.address == 'info@borderfield.com'}selected="selected"{/if}>{$email.address}</option>

                {/foreach}

              </select>

            </div>

            <a id="add-from-email" onclick="showAddFromEmailForm()" class="button">Add email address</a>

          </div>



          <p class="custom-message-area-wrapper">

            <textarea class="custom-message-area" rows="5" cols="45" name="text"></textarea>

          </p>

          <p style="clear: both; padding-top: 20px;">

            <input type="submit" class="button new" value="Versturen" />

            <input type="button" onclick="email_group_preview()" name="button" class="button new grey" value="Preview" />

          </p>

        </form>

        <h3>SMS naar model</h3>

        <form method="post" action="/ajax/send_sms_to_selection/" class="ajax">

          <input type="hidden" name="send_message_id" value="" />

          <p><textarea rows="5" cols="45" name="text" style="padding: 5px;"></textarea></p>

          <p style="clear: both; padding-top: 20px;">

            <input type="submit" class="button new" value="Text" />

          </p>

        </form>

      </div>

    </div>



    <div class="loading">

      <div id="infscr-loading">

        <img src="/images/loading.gif" alt="Loading..." width='50' height="50" >

      </div>

      <div id="no-infscr-loading" style="display: none; width:300px; margin:auto; padding:10px 20px;">

        <span>No more pages to load.</span>

      </div>

    </div>



  </body>

</html>

