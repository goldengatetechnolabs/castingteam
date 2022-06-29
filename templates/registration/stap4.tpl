{include file='registration/header.tpl'}
{literal}
<script type="text/javascript">
    $( document ).ready(function() {
        $( "#stap_submit" ).click(function(){
            naarStap5();
        });
    });
</script>
{/literal}

<section class="main_content">
  <div class="pushmenu-push pushmenu-push-toright model_over_main">
    {include file='registration/sidebar.tpl'}
    <div class="grid_content model_over_cont">
      <section class="buttonset model_overview_btn">
        <div id="nav_list"> <span></span> </div>
      </section>
      <section class="content">
        <div class="model_title clearfix">
          <header class="page_title" style="padding-bottom: 10px; margin-bottom:30px; ">
            <h2 style="font-size:36px;">{$taalContent.registration.step_4.title}</h2>
          </header>
        </div>
        <section class="sub_title" style="margin-bottom: -60px;"><div>{$taalContent.registration.step_4.subtitle}</div>
          <ul  style="margin-left : -18px; list-style-type:none">
            <li style="padding-bottom:20px; padding-top: 20px;"><strong><span>{$taalContent.registration.step_4.li_1}</span>
              <section class="sub_title">
                <ul>
                  <li>{$taalContent.registration.step_4.text_block.li_1}</li>
                  <li>{$taalContent.registration.step_4.text_block.li_2}</li>
                  <li><span class="sub_header_inner_small">{$taalContent.registration.step_4.text_block.li_3}</span></li>
                  <li>{$taalContent.registration.step_4.text_block.li_4}</li>
                </ul>
              </section>
              <span>{$taalContent.registration.step_4.li_2}</span>
            </li>
        </ul>
        </section>
        <div id="form-4" class="cast_team_cont_btm vips mod_inner1" style="display:block; margin-bottom: 0px; padding-bottom:0px;">
          <div id="form-4-upload">
            <div id="uploadjs">
            </div>
          </div>
          <div class='info_title' style="margin-top:50px;" >
            <p class="cursief">
              <strong>{$taalContent.registration.step_4.p_1}</strong>
            </p>
          </div>
          <ul style="margin-top: 20px; list-style-type:none; font-size:15px;">
            <li style="padding-bottom:35px; margin-top:-15px;">{$taalContent.registration.step_4.li_3}</li>
          </ul>
          <div id="checkboxes-stap2" class="team_data input-checkbox informatie" style="width:800px;">
            <div class="field_wrap field_txt" style="margin-bottom: 3px;">
              <label>{$taalContent.registration.step_4.photograph} :</label>
              <div class="field_wrap_inp">
                <input id="fotografen" name="fotografen"  type="text" style="width: 400px;" value="{$smarty.session.registreren.fotografen}"/>
              </div>
            </div>
          </div>
          <div class="team_data" style="margin-left:-20px; padding-top: 30px; display:block; background-color: #ffffff;">
            <div class="field_wrap field_txt">
              <div class="field_wrap_inp button-block">
                <button id="stap_submit" style="margin-top: 20px; margin-bottom:20px;">{$taalContent.registration.step_4.submit}</button>
              </div>
            </div>
          </div>
        </div>
        <div class="model_title clearfix">
          <header class="page_title" style="padding-bottom: 10px; margin-bottom:30px;">
            <h2 style="font-size:36px;">{$taalContent.registration.step_4.text_block_2.title}</h2></header>
        </div>
        <section class="sub_title">
            <ul>
                <li>{$taalContent.registration.step_4.text_block_2.li_1}</li>
                <li>{$taalContent.registration.step_4.text_block_2.li_2}</li>
                <li>{$taalContent.registration.step_4.text_block_2.li_3}</li>
                <li>{$taalContent.registration.step_4.text_block_2.li_4}</li>
                <li>{$taalContent.registration.step_4.text_block_2.li_5}</li>
                <li>{$taalContent.registration.step_4.text_block_2.li_6}</li>
                <li>{$taalContent.registration.step_4.text_block_2.li_7}</li>
          </ul>
        </section>
      </section>
    </div>
  </div>
</section>
{include file='registration/footer.tpl'}

