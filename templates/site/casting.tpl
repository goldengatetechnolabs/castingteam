{include file='site/header.tpl'}
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
          <h1>{$taalContent['casting']['title']}</h1>
        </header>
        <section class="content_sec_1 pad_none">
          <p class="sub_header">{$taalContent['casting']['subtitle']}</p>
          <div class="max-width-900">
            <p class="paragraph-text">{$taalContent['casting']['text_block']['p_1']}<br><br></p>
            <p class="sub_header_inner">{$taalContent['casting']['text_block']['p_2']}</p>
            <p class="paragraph-text">{$taalContent['casting']['text_block']['p_3']}<br><br></p>
            <p class="sub_header_inner">{$taalContent['casting']['text_block']['p_4']}</p>
            <p class="paragraph-text">{$taalContent['casting']['text_block']['p_5']}<br><br></p>
            <p class="sub_header_inner">{$taalContent['casting']['text_block']['p_6']}</p>
            <p class="paragraph-text">{$taalContent['casting']['text_block']['p_7']}</p>
          </div>
        </section>
      </section>
      <!-- End Content -->
    </div>
    <!-- End Container -->
  </div>
</section>
<!-- END: MAIN CONTENT -->
{include file='site/footer.tpl'}
