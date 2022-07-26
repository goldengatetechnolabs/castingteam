{include file='site/header.tpl'}
<!-- SET: MAIN CONTENT -->
{include file='site/mobile_menu.tpl'}
<section class="main_content inner_content">
  <div class="pushmenu-push pushmenu-push-toright model_over_main">
    {include file='site/sidebar.tpl'}
    <div class="grid_content model_over_cont">
      <section class="buttonset model_overview_btn">
        <div id="nav_list"> <span></span> </div>
      </section>
      <section class="content my_team">
        <header class="page_title mar39">
          <h1>{$taalContent['contact']['title']}</h1>
        </header>
        <section class="content_sec_1 pad_none">
          <div class="max-width-900">
            <p class="paragraph-text"><br></p>
            <p class="sub_header_inner">{$taalContent['contact']['text_block']['p_1']}</p>
            <p class="paragraph-text">Marnixplaats 2 bus 102, 2000 Antwerpen<br>+32 (0) 3 773 52 00 - <span class="strong"><a id="info_be" class="info_be black-underlined" href="mailto:"></a></span><br><br><br></p>
            <p class="sub_header_inner">{$taalContent['contact']['text_block']['p_2']}</p>
            <p class="paragraph-text">Rogierlaan 162 bus 80, 1030 Schaarbeek<br>+32 (0)2 793 02 27 - <span class="strong"><a class="black-underlined" href="mailto:ans@castingteam.com">ans@castingteam.com</a></span><br><br><br></p>
            <p class="sub_header_inner">{$taalContent['contact']['text_block']['p_3']}</p>
            <p class="paragraph-text">Postbus 26032, 3002 EA Rotterdam<br>+31 (0) 85 130 18 12 - <span class="strong"><a id="info_nl" class="info_nl black-underlined" href="mailto:"></a></span><br><br><br></p>
            <p class="sub_header_inner">{$taalContent['contact']['text_block']['p_4']}</p>
            <p class="paragraph-text">{$taalContent['contact']['text_block']['p_5']}</p>
          </div>
        </section>
        <!-- End Content -->
      </section>
    </div>
    <!-- End Container -->
  </div>
</section>
<!-- END: MAIN CONTENT -->
{include file='site/footer.tpl'}
