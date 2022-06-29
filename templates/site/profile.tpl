{include file='site/header.tpl'}
{literal}
<script type="text/javascript">
  

$( document ).ready(function() {
  $( "body" ).delegate( ".for_sel", "click", function() {
    var selection_id = $(this).parent().attr('data-id');

    deleteSelection(selection_id);
});


});

</script>
{/literal}
<!-- SET: MAIN CONTENT -->
  {include file='site/mobile_menu.tpl'}
  <section class="main_content inner_content">
    <div class="pushmenu-push pushmenu-push-toright model_over_main">
      {include file='site/sidebar.tpl'}
      <div class="grid_content model_over_cont">
        <section class="buttonset model_overview_btn">
          <div id="nav_list"> <span></span> </div>
        </section>
        <section class="content my_team max-width-800">
          <header class="page_title mar39">
            <h1>{$taalContent['mycastingteam']['title']}</h1>
          </header>
          <section class="content_sec_1">
              <p>{$taalContent['mycastingteam']['subtitle']}</p>
          </section>
          <section class="cast_team_cont">
          {if isset($user)}
          <div class="cast_team_cont_top">
              <p class="sub_header_inner mrgn-btm-20">{$taalsContent['mycastingteam']['selections']['title']}</p>
              {if isset($selections) and !empty($selections)}
                  <section class="cast_team_cont_sel" id="selections">
                      {foreach from=$selections item=selection}
                          <div class="sel_row" data-id="{$selection['id']}" >
                              <div class="fr_sel">{$selection['creation_date']}</div>
                              <div class="sec_sel" >
                                  <span>
                                      <span class="selection-name-editable">
                                          <input type="text" class="selection-title-input" data-id="{$selection['id']}" readonly disabled value="{$selection['name']}"><i class="edit fa fa-pencil-square-o" aria-hidden="true"></i>
                                      </span>({$selection['models']|@count})
                                  </span>
                              </div>
                              <a href="/{$taal}/selection/?selection={$selection['code']}&form=1#send_selection_form" class="tr_sel">{$taalContent['mycastingteam']['selections']['button']}</a>
                              <a href="#selections" class="for_sel"><i class="fa fa-close"></i> </a>
                          </div>
                      {/foreach}
                  </section>
              {else}
                  <div class="middle-text">
                      <p>{$taalContent.selection.title_two}</p>
                  </div>
              {/if}
          </div>
          <div class="cast_team_cont_btm">
		  <p class="sub_header_inner mrgn-btm-20 mrgn-tp-30">{$taalContent['mycastingteam']['pdf']['title']}</p>
          <p class="paragraph-text">{$taalContent['mycastingteam']['pdf']['p']}</p>
          <div class="cast_team_cont_mid">
          <a href="/pdf/Castingteam_rates.pdf" class="dwn_btn" target="_blank"><i class="fa fa-file-pdf-o"></i>{$taalContent['mycastingteam']['pdf']['button']}</a>
          </div>
          <div class="cast_team_cont_btm">
		  <p class="sub_header_inner mrgn-btm-20">{$taalContent['mycastingteam']['update']['title']}</p>
          {include file='site/user_update.tpl'}
          </div>
          {/if}
          </section>
        </section>
        <!-- End Content --> 
      </div>
      <!-- End Container --> 
    </div>
  </section>
  <!-- END: MAIN CONTENT --> 
   {include file='site/footer.tpl'}