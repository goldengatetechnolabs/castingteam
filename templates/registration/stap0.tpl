{include file='registration/header.tpl'}
 <section class="main_content">
    <div class="pushmenu-push pushmenu-push-toright model_over_main">
      <div class="grid_content model_over_cont" style="width:100%; ">
        <section class="buttonset model_overview_btn">
          <div id="nav_list"> <span></span></div>
        </section>
          <section class="content my_team">
            <header class="page_title mar39">
            <h2 style="font-size : 46px;">{$taalContent['registration']['step_0']['title']}</h2>
          </header>
          <section class="content_sec_1 pad_none sign-up-block" style="max-width:960px; display:inline-block;">
              <p>{$taalContent['registration']['step_0']['subtitle']}</p>
              <ul>
                  <li style="padding-bottom:20px;">{$taalContent['registration']['step_0']['p_1']}<br><br>
                      <div style="margin-top : 15px;">
                          <a href="/{$taal}/register/1" id="become_vip" class="meld_btn">{$taalContent['registration']['step_0']['registration_button']}</a>
                      </div>
                  </li>
              </ul>
          </section>
          <header class="page_title mar39" style="margin-top : -45px;">
            <h2 style="font-size : 46px;">{$taalContent['registration']['step_0']['title_2']}</h2>
          </header>
              <section class="content_sec_1 pad_none" style="max-width:960px; display:inline-block;">
                  <p>{$taalContent['registration']['step_0']['subtitle_2']}</p>
                  <ul>
                      <li style="padding-bottom:20px">{$taalContent['registration']['step_0']['p_2']}<br><br>
                          <div class="submit">
                              <input type="text" name="modelcode" value="" /><a href="javascript:modelCode()">{$taalContent['registration']['step_0']['login_button']}</a>
                          </div>
                      </li>
                  </ul>
                  <section class="content_sec_3 pad_none model-email-restore" style="max-width:960px; display:inline-block;">
                      <p>{$taalContent['registration']['step_0']['code_forget']}</p>
                      <ul>
                          <li style="font-size:15px;">{$taalContent['registration']['step_0']['li_1']}<br><br>
                              <div class="submit">
                                  <input type="text" name="email_code" value="" /><a href="javascript:modelCodeByEmail()">{$taalContent['registration']['step_0']['code_forget_button']}</a>
                              </div>
                              <br><br>{$taalContent['registration']['step_0']['li_2']}
                          </li>
                      </ul>
                  </section>
              </section>
          </section>
      </div>
        <section class="main_content" style=" width:100%;">
            <div class="pushmenu-push pushmenu-push-toright model_over_main">
                <div class="grid_content model_over_cont" style="width:100%; ">
                    <section class="content my_team" style="padding-left:50px; padding-right:50px; padding-bottom: 0px;">
                    </section>
                </div>
            </div>
        </section>
      </div>
  </section>
{if !$isLanguageSet}
    {include file='registration/language_popup.tpl'}
{/if}
{include file='registration/footer.tpl'}

