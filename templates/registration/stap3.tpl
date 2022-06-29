{include file='registration/header.tpl'}
{literal}
<script type="text/javascript">
var debug = false;

$( document ).ready(function() {
  $( "#stap_submit" ).click(function(){
    naarStap4(debug);
    debug = true;
  });
});

</script>
{/literal}

<section class="main_content">
  <div class="pushmenu-push pushmenu-push-toright model_over_main">
    {include file='registration/sidebar.tpl'}
    <div class="grid_content model_over_cont">
      <section class="buttonset model_overview_btn">
        <div id="nav_list"><span></span></div>
      </section>
      <section class="content">
        <div class="model_title clearfix">
          <header class="page_title" style="padding-bottom: 10px; margin-bottom:30px;">
            <h2 style="font-size:36px;">{$taalContent.registration.step_3.title}</h2>
          </header>
        </div>
        <div style="display : block;">
          <section class="sub_title">
            <div>{$taalContent.registration.step_3.subtitle}</div>
          </section>
          <div id="form-stap3" class="cast_team_cont_btm vips mod_inner1" style="display:block;  margin-bottom: 0px; padding-bottom:0px;">
            <div style="width:300px; display:inline-block;">
              <div class='info_title' >
                <p class="cursief"><strong>{$taalContent.registration.step_3.p_1}</strong></p>
              </div>
              <div id="form-3-links" class="team_data" style="width: 240px; height: 280px;">
                <div style="margin-bottom: 30px;">
                  <span class="custom_filter">
                    {foreach from=$eigenschappen.ervaring item=code key=id}
                    <span class="custom_filter_sub">
                      <label>
                        <input  type="checkbox" name="eigenschap_{$id}"{if $smarty.session.registreren.eigenschappen.$id == 1}checked="checked"{/if} >
                        <span class="lbl padding-8">{$taalContent.registration.fields.$code}</span>
                      </label>
                    </span>
                    {/foreach}
                  </span>
                </div>
              </div>
            </div>
            <div style="width:300px; display:inline-block;">
              <div class='info_title' >
                <p class="cursief"><strong>{$taalContent.registration.step_3.p_2}</strong></p></div>
              <div id="form-3-rechts" class="team_data" style="width: 240px; height: 280px;">
                <div style="margin-bottom: 30px;"><span class="custom_filter">
                  {foreach from=$eigenschappen.talenkennis name=talen item=code key=id}
                  <span class="custom_filter_sub">
                    <label><input  type="checkbox" name="eigenschap_{$id}"{if $smarty.session.registreren.eigenschappen.$id == 1}checked="checked"{/if} > <span class="lbl padding-8" style="font-size: 15px;">{$taalContent.registration.fields.$code}</span></label></span>
                  {/foreach}
                </span>
                </div>
              </div>
            </div>
          </div>
          <div style="display : block;">
            <div id="form-stap3" class="cast_team_cont_btm vips mod_inner1" style="display:block;  margin-bottom: 0px; padding-bottom:0px;">
              <div class="experience-block" style="width:500px; display:inline-block; padding-right : 50px; padding-top : 40px;">
                <div class='info_title' >
                  <p class="cursief"><strong>{$taalContent.registration.step_3.p_3}</strong></p>
                </div>
                <div id="form-3-rechts" class="team_data" style="background-color : #ffffff; margin-left : -20px; width:400px;">
                  <div class="field_wrap field_txt" >
                    <div class="field_wrap_inp" style="width:500px; max-width:500px;">
                      <textarea  style="height:120px; width:500;" name="ervaring_uitleg">{$smarty.session.registreren.ervaring}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="experience-block" style="width:400px; display:inline-block; padding-top : 40px;">
                <div class='info_title'>
                  <p class="cursief"><strong>{$taalContent.registration.step_3.p_4}</strong></p>
                </div>
                <div id="form-3-links" class="team_data" style="background-color : #ffffff; margin-left : -20px;">
                  <div class="field_wrap field_txt">
                    <div class="field_wrap_inp" style="width:500px; margin-left : -18px; max-width:500px;">
                      <textarea style="height:120px; width:500;" name="talenten_uitleg">{$smarty.session.registreren.talenten}</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="team_data upload_code" style="margin-top: 15px; margin-left: 20px; background-color: #ffffff; width:600px;">
              <div class='info_title'>
                <p class="cursief"><strong>{$taalContent.registration.step_3.p_5}</strong></p>
                <p style="font-size : 15px; line-height:22px;"><br>{$taalContent.registration.step_3.p_6}</span></p>
              </div>
              <div style="background-color: #f0f0f0; padding: 10px 10px 10px 10px;">
                {for $num=1 to 6}
                <div class="field_wrap field_txt" style="background-color : #f0f0f0;">
                  <label style="padding-left: 8px;">Video {$num}:</label>
                  <div class="field_wrap_inp" style="margin-left : -50px;">
                    <input type="text" style="width: 400px;" value="{if isset($smarty.session.registreren['video_code'][$num-1])}{if $smarty.session.registreren['video_code'][$num-1]['original_link']}{$smarty.session.registreren['video_code'][$num-1]['original_link']}{else}{$smarty.session.registreren['video_code'][$num-1]['host']}{$smarty.session.registreren['video_code'][$num-1]['code']}{/if}{/if}" name="video_code_{$num}" id="video_code_{$num}">
                  </div>
                </div>
                {/for}
              </div>
            </div>
            <div class="model_title clearfix">
              <header class="page_title" style="padding-bottom: 10px; margin-bottom:30px;">
                <h2 style="font-size:36px;">{$taalContent.registration.step_3.text_block.title}</h2></header>
            </div>
            <section class="sub_title">
              <ul>
                <li>{$taalContent.registration.step_3.text_block.li_1}</li>
                <li>{$taalContent.registration.step_3.text_block.li_2}</li>
                <li>{$taalContent.registration.step_3.text_block.li_3}</li>
                <li>{$taalContent.registration.step_3.text_block.li_1}</li>
              </ul>
            </section>
            <div class="team_data" style="display:block; background-color: #ffffff; margin-top : -50px;">
              <div class="field_wrap field_txt">
                <div class="field_wrap_inp button-block" style="margin-left : 18px;">
                  <button id="stap_submit" style="margin-bottom: 20px;">{$taalContent.registration.step_3.tooltip}</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</section>
{include file='registration/footer.tpl'}
                  
