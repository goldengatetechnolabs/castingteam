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
        <section class="content_sec_1 pad_none">
          <div class="max-width-900">
            <p class="sub_header_inner">{$taalContent['casting']['text_block_1']['title']}</p>
            <p class="paragraph-text-13">{$taalContent['casting']['text_block_1']['p']}</p>
            <br><br>
            <a name="disclaimer"></a>
            <hr size="1">
            <br><br>
            <p class="sub_header_inner">{$taalContent['casting']['text_block_2']['title']}</p>
            <p class="paragraph-text-13">{$taalContent['casting']['text_block_2']['p']}</p>
            <br><br>
            <a name="conditions"></a>
            <hr size="1">
            <br><br>
            <p class="sub_header_inner">{$taalContent['casting']['text_block_3']['title']}</p>
            <p class="paragraph-text-13">{$taalContent['casting']['text_block_3']['p']}</p>
          </div>
        </section>
      </section>
    </div>
  </div>
  <!-- END: MAIN CONTENT -->
  {include file='site/footer.tpl'}
