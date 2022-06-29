{include file='registration/header.tpl'}
{literal}

<script type="text/javascript">
    $.mask.definitions['~'] = '([0-9])?';

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function setPhoneMask() {
    var land = $( "#land" ).val();
    var mask = "(0) 999 99 99 99";
    var numberCount = $("#telefoon").val().toString().length;

    if (land == 'DE') {
        mask = "(0) 99 99 99 99 99";
    } else if (
            land == 'UK' &&
            (numberCount == 0 || numberCount > 9)
    ) {
        mask = "(0) 99 99 99 99 9~";
    }

    $("#telefoon").mask(mask);
}

function validateData() {
    $('input:text[value=""]').addClass('error');
    $('input:text[value!=""]').removeClass('error');
    $('.field_txt input').removeClass('error');
    $('input[type=email]').each(function(index) {
        if (validateEmail($(this).attr('value'))) {
            $(this).removeClass('error');
        } else {
            $(this).addClass('error');
        }
  });

  $( "input:required" ).focus(function() {
      $('input:text[value=""]').addClass('error');
      $('input:text[value!=""]').removeClass('error');
      $('.field_txt input').removeClass('error');
      $('input[type=email]').each(function( index ) {

          if (validateEmail($( this ).attr('value'))) {
              $( this ).removeClass('error');
          } else {
              $( this ).addClass('error');
          }
      });
  });

  $( "input:required" ).keypress(function() {
      $('input:text[value=""]').addClass('error');
      $('input:text[value!=""]').removeClass('error');
      $('.field_txt  input').removeClass('error');
      $('input[type=email]').each(function( index ) {
          if(validateEmail($( this ).attr('value'))){
              $( this ).removeClass('error');
          } else {
              $( this ).addClass('error');
          }
      });
  });
}

$(document).ready(function($) {
    $( "#stap_one_submit" ).click(function(){
        validateData();
        naarStap2();
    });

    $( "#land" ).change(function() {
        $("#country_code").val($(this).val());
        setPhoneMask();
    });

    setPhoneMask();

    $("#telefoon").on("blur", function() {
        var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

        if(last.length == 3) {
            var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
            var lastfour = move + last;
            var first = $(this).val().substr( 0, 9 );
            $(this).val( first + '-' + lastfour );
        }
    });
});

</script>
{/literal}

<section class="main_content">
  <div class="pushmenu-push pushmenu-push-toright model_over_main">
    {include file='registration/sidebar.tpl'}
    <div class="grid_content model_over_cont">
      <section class="buttonset model_overview_btn">
        <div id="nav_list"> <span></span></div>
      </section>
      <section class="content">
        <div class="model_title clearfix">
          <header class="page_title" style="padding-bottom: 10px; margin-bottom:30px;">
            <h2 style="font-size:36px;">{$taalContent['registration']['step_1']['title']}</h2>
          </header>
        </div>
        <section class="sub_title">
          <div>{$taalContent['registration']['step_1']['subtitle']}</div>
        </section>
        <div id="form-stap1" class="cast_team_cont_btm vips mod_inner1" style="display:block; ">
          <div class="team_data" style=" margin-right: 60px;">
            <div class="field_wrap">
              <label>{$taalContent['registration']['fields']['voornaam']} :</label>
              <div class="field_wrap_inp">
                <input id="voornaam" name="voornaam" type="text" value="{$smarty.session.registreren.voornaam}" required/>
              </div>
            </div>
            <div class="field_wrap">
              <label>{$taalContent['registration']['fields']['achternaam']} :</label>
              <div class="field_wrap_inp">
                <input id="achternaam" name="achternaam" type="text" value="{$smarty.session.registreren.achternaam}" required/>
              </div>
            </div>
            <div class="field_wrap">
              <label>{$taalContent['registration']['fields']['adres']} :</label>
              <div class="field_wrap_inp">
                <input id="adres" name="adres" type="text" value="{$smarty.session.registreren.adres}" required/>
              </div>
            </div>
            <div class="field_wrap">
              <label>{$taalContent['registration']['fields']['huisnummer']} :</label>
              <div class="field_wrap_inp">
                <input id="huisnummer" name="huisnummer"  type="text" value="{$smarty.session.registreren.huisnummer}" required/>
              </div>
            </div>
            <div class="field_wrap">
              <label>{$taalContent['registration']['fields']['postcode']} :</label>
              <div class="field_wrap_inp">
                <input id="postcode" name="postcode"  type="text" value="{$smarty.session.registreren.postcode}" required/>
              </div>
            </div>
            <div class="field_wrap">
              <label>{$taalContent['registration']['fields']['gemeente']} :</label>
              <div class="field_wrap_inp">
                <input id="gemeente" name="gemeente"  type="text" value="{$smarty.session.registreren.gemeente}" required/>
              </div>
            </div>
            <div class="field_wrap">
              <label>{$taalContent['registration']['fields']['land']} :</label>
              <div class="field_wrap_inp">
                <div class="field_wrap_inp_sel">
                  <select name="land" id="land">
                      <option value="BE"{if $smarty.session.registreren.land=='BE'} selected="selected"{/if}>{$taalContent.countries.belgium}</option>
                      <option value="NL"{if $smarty.session.registreren.land=='NL'} selected="selected"{/if}>{$taalContent.countries.netherlands}</option>
                      <option value="FR"{if $smarty.session.registreren.land=='FR'} selected="selected"{/if}>{$taalContent.countries.france}</option>
                      <option value="DE"{if $smarty.session.registreren.land=='DE'} selected="selected"{/if}>{$taalContent.countries.germany}</option>
                      <option value="LUX"{if $smarty.session.registreren.land=='LUX'} selected="selected"{/if}>{$taalContent.countries.luxembourg}</option>
                      <option value="UK"{if $smarty.session.registreren.land=='UK'} selected="selected"{/if}>{$taalContent.countries.uk}</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="team_data">
            <div class="field_wrap">
              <label>{$taalContent['registration']['fields']['geboortedatum']} :</label>
              <div class="field_wrap_inp date-birth-block">
                <div class="field_wrap_inp_sel small" style="width:80px;">
                  <select name="geboortedatum_dag" id="geboortedatum_dag">
                    <option value="" selected="selected">-</option>
                    {section name=dag loop=31}
                    <option value="{$smarty.section.dag.iteration}"{if $smarty.session.registreren.geboortedatum_dag==$smarty.section.dag.iteration} selected="selected"{/if}>{$smarty.section.dag.iteration} </option>
                    {/section}
                  </select>
                </div>
                <div class="field_wrap_inp_sel small" style="width:80px;">
                  <select  name="geboortedatum_maand" id="geboortedatum_maand">
                    <option value="" selected="selected">-</option>
                    {section name=maand loop=12}
                    <option value="{$smarty.section.maand.iteration}"{if $smarty.session.registreren.geboortedatum_maand==$smarty.section.maand.iteration} selected="selected"{/if}>{$smarty.section.maand.iteration} </option>
                    {/section}
                  </select>
                </div>
                <div class="field_wrap_inp_sel small" style="width:126px;">
                  <select  name="geboortedatum_jaar" id="geboortedatum_jaar">
                    <option value="" selected="selected">-</option>
                    {section name=jaar loop=date('Y')+1 max=120 step=-1}
                    <option value="{$smarty.section.jaar.index}"{if $smarty.session.registreren.geboortedatum_jaar==$smarty.section.jaar.index} selected="selected"{/if}>{$smarty.section.jaar.index} </option>
                    {/section}
                  </select>
                </div>
              </div>
            </div>
            <div class="field_wrap">
              <label>{$taalContent['registration']['fields']['geslacht']} :</label>
              <div class="field_wrap_inp">
                <div class="field_wrap_inp_sel">
                  <select  name="geslacht" id="geslacht">
                    <option value="M"{if $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>{$taalContent.registration.fields.man}</option>
                    <option value="V"{if $smarty.session.registreren.geslacht=='V'} selected="selected"{/if}>{$taalContent.registration.fields.vrouw}</option>
                    <option value="F"{if $smarty.session.registreren.geslacht=='F'} selected="selected"{/if}>{$taalContent.registration.fields.family}</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="field_wrap">
              <label>{$taalContent['registration']['fields']['spreektaal']} :</label>
              <div class="field_wrap_inp">
                <div class="field_wrap_inp_sel">
                  <select  name="spreektaal" id="spreektaal">
                    <option value="nl"{if $smarty.session.registreren.spreektaal=='nl'} selected="selected"{/if}>{$taalContent.languages.dutch}</option>
                    <option value="fr"{if $smarty.session.registreren.spreektaal=='fr'} selected="selected"{/if}>{$taalContent.languages.french}</option>
                    <option value="en"{if $smarty.session.registreren.spreektaal=='en'} selected="selected"{/if}>{$taalContent.languages.english}</option>
                    <option value="de"{if $smarty.session.registreren.spreektaal=='de'} selected="selected"{/if}>{$taalContent.languages.german}</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="field_wrap">
              <label>{$taalContent['registration']['fields']['email']} :</label>
              <div class="field_wrap_inp">
                <input id="email" name="email"  type="email" value="{$smarty.session.registreren.email}" required/>
              </div>
            </div>
            <div class="field_wrap">
              <label>{$taalContent['registration']['fields']['herhaal_email']} :</label>
              <div class="field_wrap_inp">
                <input id="herhaal_email" name="herhaal_email"  type="email" value="{$smarty.session.registreren.email}" required/>
              </div>
            </div>
            <div class="field_wrap">
              <label>{$taalContent['registration']['fields']['telefoon']} :</label>
              <div class="field_wrap_inp">
              <div class="field_wrap_inp_sel small" style="width:80px;">
                  <select name="country_code" id="country_code">
                      <option value="BE"{if $smarty.session.registreren.land=='BE'} selected="selected"{/if}>+32</option>
                      <option value="NL"{if $smarty.session.registreren.land=='NL'} selected="selected"{/if}>+31</option>
                      <option value="FR"{if $smarty.session.registreren.land=='FR'} selected="selected"{/if}>+33</option>
                      <option value="DE"{if $smarty.session.registreren.land=='DE'} selected="selected"{/if}>+49</option>
                      <option value="LUX"{if $smarty.session.registreren.land=='LUX'} selected="selected"{/if}>+352</option>
                      <option value="UK"{if $smarty.session.registreren.land=='UK'} selected="selected"{/if}>+44</option>
                  </select>
                </div>
                <input style="width: calc( 100% - 96px);" id="telefoon" name="telefoon"  type="text" value="{$smarty.session.registreren.telefoon}" required/>
              </div>
            </div>
            <div class="field_wrap field_txt">
              <label>{$taalContent.registration.fields.telefoon2} :</label>
              <div class="field_wrap_inp">
                <input id="telefoon2" name="telefoon2"  type="number" value="{$smarty.session.registreren.telefoon2}" class="niet-verplicht" />
                
              </div>
            </div>
          </div>
          <div class="team_data" style="width:100%; display:block; max-width:none; background-color: #ffffff; margin-left : -20px;">
              <div class="info_title" style="margin-top:30px;">
                  <p class="cursief"><strong>{$taalContent.registration.step_1.text_block.title}</strong></p></div>
              <div style="width:100%; margin-bottom:20px; background-color: #ffffff;" class="team_data input-checkbox" id="checkboxes-stap2">
                  <div>
                      <span class="custom_filter">
                          <span class="custom_filter_sub">
                              <span style=" padding-right:30px;" class="custom_filter_sub">
                                  <label style="padding-left:0;">
                                      <input type="radio" {if $smarty.session.registreren.where_known==1}checked="checked"{/if} value="1" name="where_known">
                                      <span class="lbl padding-8"> {$taalContent.registration.step_1.text_block.li_2}</span>
                                  </label>
                                  <div class="keywords-block field_wrap field_txt {if empty($smarty.session.registreren.keywords) && $smarty.session.registreren.where_known!=1}dsp_none{/if}">
                                      <div class="field_wrap_inp">
                                          <input id="keywords" class="niet-verplicht" name="keywords" type="text" value="{$smarty.session.registreren.keywords}" placeholder="{$taalContent.registration.step_1.keywords_placeholder}">
                                      </div>
                                  </div>
                              </span>
                              <span style=" padding-right:30px;" class="custom_filter_sub">
                                  <label style="padding-left:0px;">
                                      <input type="radio" {if $smarty.session.registreren.where_known==2}checked="checked"{/if} value="2" name="where_known">
                                      <span class="lbl padding-8"> {$taalContent.registration.step_1.text_block.li_3}</span>
                                  </label>
                              </span>
                              <span style=" padding-right:30px;" class="custom_filter_sub">
                                  <label style="padding-left:0px;">
                                      <input type="radio" {if $smarty.session.registreren.where_known==3}checked="checked"{/if} value="3" name="where_known">
                                      <span class="lbl padding-8"> {$taalContent.registration.step_1.text_block.li_4}</span>
                                  </label>
                              </span>
                              <span style=" padding-right:30px;" class="custom_filter_sub">
                                  <label style="padding-left:0px;">
                                      <input type="radio" {if $smarty.session.registreren.where_known==4}checked="checked"{/if} value="4" name="where_known">
                                      <span class="lbl padding-8"> {$taalContent.registration.step_1.text_block.li_5}</span></label>
                              </span>
                              <span style=" padding-right:30px;" class="custom_filter_sub">
                                  <label style="padding-left:0px;">
                                      <input type="radio" {if $smarty.session.registreren.where_known==5}checked="checked"{/if} value="5" name="where_known">
                                      <span class="lbl padding-8"> {$taalContent.registration.step_1.text_block.li_6}</span>
                                  </label>
                              </span>
                              <span style=" padding-right:30px;" class="custom_filter_sub">
                                  <label style="padding-left:0px;">
                                      <input type="radio" {if $smarty.session.registreren.where_known==6}checked="checked"{/if} value="6" name="where_known">
                                      <span class="lbl padding-8"> {$taalContent.registration.step_1.text_block.li_7}</span>
                                  </label>
                              </span>
                          </span>
                      </span>
                  </div>
              </div>
          </div>
            <div class="team_data" style="width:100%; background-color : #ffffff; margin-left : -20px; margin-top: -30px; display:block; max-width:none;">
                <div class="field_wrap">
                    <div class="field_wrap_inp button-block" style="width:100%; display:block; max-width:none;">
                        <span class="mandatory-block">{$taalContent.registration.step_1.tooltip}</span>
                        <button id="stap_one_submit">{$taalContent.registration.step_1.submit}</button>
                    </div>
                </div>
            </div>
        </div>
          <div class="model_title clearfix">
              <header class="page_title" style="padding-bottom: 10px; margin-bottom:30px;">
                  <h2 style="font-size:36px;">{$taalContent.registration.step_1.text_block_2.title}</h2></header>
          </div>
          <section class="sub_title">
              <ul>
                  <li>{$taalContent.registration.step_1.text_block_2.li_1}</li>
                  <li>{$taalContent.registration.step_1.text_block_2.li_2}</li>
                  <li>{$taalContent.registration.step_1.text_block_2.li_3}</li>
              </ul>
          </section>
      </section>
    </div>
  </div>
</section>
{include file='registration/footer.tpl'}
