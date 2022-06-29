{include file='registration/header.tpl'}
{literal}
<script type="text/javascript">
    $(document).ready(function() {
        $("#stap_submit").click(function() {
            naarStap3();
        });
    });
</script>

{/literal}
<section class="main_content">
    <div class="pushmenu-push pushmenu-push-toright model_over_main">
        {include file='registration/sidebar.tpl'}
            <section class="buttonset model_overview_btn">
                <div id="nav_list"> <span></span> </div>
            </section>
            <section class="content">
                <div class="model_title clearfix">
                    <header class="page_title" style="padding-bottom: 10px; margin-bottom:30px;">
                        <h2 style="font-size:36px;">{$taalContent.registration.step_2.title}</h2>
                    </header>
                </div>
                <section class="sub_title">
                    <div>{$taalContent.registration.step_2.subtitle}</div>
                </section>
                <div id="form-stap2" class="cast_team_cont_btm vips mod_inner1" style="display:block; padding-bottom:5px;">
                    {if ($leeftijd>=17 && $smarty.session.registreren.geslacht=='M') || $smarty.session.registreren.geslacht=='F'}
                    <div class='info_title'>
                        {if $smarty.session.registreren.geslacht=='F'}
                        <p class="cursief"><strong>{$taalContent.registration.step_2.parameters.family}</strong></p></div>
                    {else}
                    <p class="cursief"><strong>{$taalContent.registration.step_2.parameters.men}</strong> - {$taalContent.registration.fields.since} 18 {$taalContent.registration.fields.year}</p>
                </div>
                {/if}
                <div class="team_data first-form-block" style=" margin-right: 40px;">
                    <div class="field_wrap">
                        <label>{$taalContent.registration.fields.lengte}</label>
                        <div class="field_wrap_inp">
                            <div class="field_wrap_inp_sel">
                                <select name="man_lengte" id="man_lengte">
                                    <option value="0">{$taalContent.registration.fields.kies}</option>
                                    <option{if $smarty.session.registreren.lengte=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                    <option {if $smarty.session.registreren.lengte=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                    {section name=centimer start=100 loop=250}
                                    <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.lengte==$smarty.section.centimer.index && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                                    {/section}
                                    {if $smarty.session.registreren.geslacht=='F'}
                                    <option value="nvt" selected="selected">{$taalContent.registration.step_2.nvt}</option>
                                    {/if}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field_wrap">
                        <label>{$taalContent.registration.fields.gewicht}</label>
                        <div class="field_wrap_inp">
                            <div class="field_wrap_inp_sel">
                                <select name="man_gewicht" id="man_gewicht">
                                    <option value="0">{$taalContent.registration.fields.kies}</option>
                                    <option{if $smarty.session.registreren.gewicht=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                    <option {if $smarty.session.registreren.gewicht=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                    {section name=kg start=1 loop=200}
                                    <option value="{$smarty.section.kg.index}"{if $smarty.session.registreren.gewicht==$smarty.section.kg.index && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>{$smarty.section.kg.index}kg</option>
                                    {/section}
                                    {if $smarty.session.registreren.geslacht=='F'}
                                    <option value="nvt" selected="selected">{$taalContent.registration.step_2.nvt}</option>
                                    {/if}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field_wrap field_txt">
                        <label>{$taalContent.registration.fields.borstomtrek}</label>
                        <div class="field_wrap_inp">
                            <div class="field_wrap_inp_sel">
                                <select name="man_borst" id="man_borst">
                                    <option value="0">{$taalContent.registration.fields.kies}</option>
                                    <option{if $smarty.session.registreren.borst=='geen' && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                    <option {if $smarty.session.registreren.borst=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                    {section name=centimer start=50 loop=121}
                                    <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.borst==$smarty.section.centimer.index && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                                    {/section}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field_wrap field_txt">
                        <label>{$taalContent.registration.fields.taille}</label>
                        <div class="field_wrap_inp">
                            <div class="field_wrap_inp_sel">
                                <select name="man_taille" id="man_taille">
                                    <option value="0">{$taalContent.registration.fields.kies}</option>
                                    <option{if $smarty.session.registreren.taille=='geen' && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                    <option {if $smarty.session.registreren.taille=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                    {section name=centimer start=40 loop=131}
                                    <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.taille==$smarty.section.centimer.index && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                                    {/section}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field_wrap field_txt">
                        <label>{$taalContent.registration.fields.heupen}</label>
                        <div class="field_wrap_inp">
                            <div class="field_wrap_inp_sel">
                                <select name="man_heupen" id="man_heupen">
                                    <option value="0">{$taalContent.registration.fields.kies}</option>
                                    <option{if $smarty.session.registreren.heupen=='geen' && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                    <option {if $smarty.session.registreren.heupen=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                    {section name=centimer start=50 loop=131}
                                    <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.heupen==$smarty.section.centimer.index && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                                    {/section}
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team_data first-form-block" style=" margin-right: 40px; ">
                    <div class="field_wrap">
                        <label>{$taalContent.registration.fields.hemden}</label>
                        <div class="field_wrap_inp">
                            <div class="field_wrap_inp_sel">
                                <select name="man_hemden" id="man_hemden">
                                    <option value="0">{$taalContent.registration.fields.kies}</option>
                                    <option{if $smarty.session.registreren.hemden=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                    <option {if $smarty.session.registreren.hemden=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                    {section name=centimer start=30 loop=61}
                                    <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.hemden==$smarty.section.centimer.index && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                    {/section}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field_wrap">
                        <label>{$taalContent.registration.fields.int_maat}</label>
                        <div class="field_wrap_inp">
                            <div class="field_wrap_inp_sel">
                                <select name="man_int_maat" id="man_int_maat">
                                    <option value="0">{$taalContent.registration.fields.kies}</option>
                                    <option{if $smarty.session.registreren.int_maat=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                    <option {if $smarty.session.registreren.int_maat=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                    <option value="XXS"{if $smarty.session.registreren.int_maat=='XXS' && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>XXS</option>
                                    <option value="XS"{if $smarty.session.registreren.int_maat=='XS' && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>XS</option>
                                    <option value="S"{if $smarty.session.registreren.int_maat=='S' && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>S</option>
                                    <option value="M"{if $smarty.session.registreren.int_maat=='M' && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>M</option>
                                    <option value="L"{if $smarty.session.registreren.int_maat=='L' && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>L</option>
                                    <option value="XL"{if $smarty.session.registreren.int_maat=='XL' && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>XL</option>
                                    <option value="XXL"{if $smarty.session.registreren.int_maat=='XXL' && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>XXL</option>
                                    <option value="3XL"{if $smarty.session.registreren.int_maat=='3XL' && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>3XL</option>
                                    <option value="4XL"{if $smarty.session.registreren.int_maat=='4XL' && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>4XL</option>
                                    <option value="5XL"{if $smarty.session.registreren.int_maat=='5XL' && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>5XL</option>
                                    {if $smarty.session.registreren.geslacht=='F'}<option value="nvt" selected="selected">{$taalContent.registration.step_2.nvt}</option>
                                    {/if}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field_wrap">
                        <label>{$taalContent.registration.fields.jeansmaat}</label>
                        <div class="field_wrap_inp">
                            <div class="field_wrap_inp_sel">
                                <select name="man_jeans" id="man_jeans">
                                    <option value="0">{$taalContent.registration.fields.kies}</option>
                                    <option{if $smarty.session.registreren.jeans=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                    <option {if $smarty.session.registreren.jeans=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                    {section name=centimer step=1 start=22 loop=44}
                                    <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.jeans==$smarty.section.centimer.index && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                    {/section}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field_wrap">
                        <label>{$taalContent.registration.fields.costume}</label>
                        <div class="field_wrap_inp">
                            <div class="field_wrap_inp_sel">
                                <select name="man_kostuum" id="man_kostuum">
                                    <option value="0">{$taalContent.registration.fields.kies}</option>
                                    <option{if $smarty.session.registreren.kostuum=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                    <option {if $smarty.session.registreren.kostuum=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                    {section name=centimer step=2 start=30 loop=61}
                                    <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.kostuum==$smarty.section.centimer.index && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                    {/section}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field_wrap">
                        <label>{$taalContent.registration.fields.schoenmaat}</label>
                        <div class="field_wrap_inp">
                            <div class="field_wrap_inp_sel">
                                <select name="man_schoen" id="man_schoen">
                                    <option value="0">{$taalContent.registration.fields.kies}</option>
                                    <option{if $smarty.session.registreren.schoenmaat=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                    <option {if $smarty.session.registreren.schoenmaat=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                    {section name=centimer start=5 loop=51}
                                    <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.schoenmaat==$smarty.section.centimer.index && $leeftijd>17 && $smarty.session.registreren.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                    {/section}
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                {/if}
                {if $leeftijd>=17 && $smarty.session.registreren.geslacht=='V'}
                <div class='info_title'>
                    <p class="cursief"><strong>{$taalContent.registration.step_2.parameters.woman}</strong> - {$taalContent.registration.fields.since} 18 {$taalContent.registration.fields.year}</p></div>
                <div class="team_data first-form-block" style=" margin-right: 40px;">
                    <div class="field_wrap">
                        <label>{$taalContent.registration.fields.lengte}</label>
                        <div class="field_wrap_inp">
                            <div class="field_wrap_inp_sel">
                                <select name="vrouw_lengte" id="vrouw_lengte">
                                    <option value="0">{$taalContent.registration.fields.kies}</option>
                                    <option{if $smarty.session.registreren.lengte=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                    <option {if $smarty.session.registreren.lengte=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                    {section name=centimer start=100 loop=250}
                                    <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.lengte==$smarty.section.centimer.index } selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                                    {/section}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field_wrap">
                        <label>{$taalContent.registration.fields.gewicht}</label>
                        <div class="field_wrap_inp">
                            <div class="field_wrap_inp_sel">
                                <select name="vrouw_gewicht" id="vrouw_gewicht">
                                    <option value="0">{$taalContent.registration.fields.kies}</option>
                                    <option{if $smarty.session.registreren.gewicht=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                    <option {if $smarty.session.registreren.gewicht=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                    {section name=kg start=1 loop=200}
                                    <option value="{$smarty.section.kg.index}"{if $smarty.session.registreren.gewicht==$smarty.section.kg.index } selected="selected"{/if}>{$smarty.section.kg.index}kg</option>
                                    {/section}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field_wrap field_txt">
                        <label>{$taalContent.registration.fields.borstomtrek}</label>
                        <div class="field_wrap_inp">
                            <div class="field_wrap_inp_sel">
                                <select name="vrouw_borst" id="vrouw_borst">
                                    <option value="0">{$taalContent.registration.fields.kies}</option>
                                    <option{if $smarty.session.registreren.borst=='geen' && $leeftijd>17} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                    <option {if $smarty.session.registreren.borst=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                    {section name=centimer start=50 loop=121}
                                    <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.borst==$smarty.section.centimer.index } selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                                    {/section}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field_wrap field_txt">
                        <label>{$taalContent.registration.fields.taille}</label>
                        <div class="field_wrap_inp">
                            <div class="field_wrap_inp_sel">
                                <select name="vrouw_taille" id="vrouw_taille">
                                    <option value="0">{$taalContent.registration.fields.kies}</option>
                                    <option{if $smarty.session.registreren.taille=='geen' && $leeftijd>17} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.taille=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer start=40 loop=131}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.taille==$smarty.section.centimer.index } selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field_wrap field_txt">
                            <label>{$taalContent.registration.fields.heupen}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="vrouw_heupen" id="vrouw_heupen">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.heupen=='geen' && $leeftijd>17} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.heupen=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer start=50 loop=131}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.heupen==$smarty.section.centimer.index } selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="team_data" style=" margin-right: 40px; height:280px;">
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.maat}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="vrouw_kleed" id="vrouw_kleed">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.kleed=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.kleed=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer step=2 start=30 loop=61}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.kleed==$smarty.section.centimer.index } selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.int_maat}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="vrouw_int_maat" id="vrouw_int_maat">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.int_maat=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.int_maat=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        <option value="XXS"{if $smarty.session.registreren.int_maat=='XXS'} selected="selected"{/if}>XXS</option>
                                        <option value="XS"{if $smarty.session.registreren.int_maat=='XS'} selected="selected"{/if}>XS</option>
                                        <option value="S"{if $smarty.session.registreren.int_maat=='S'} selected="selected"{/if}>S</option>
                                        <option value="M"{if $smarty.session.registreren.int_maat=='M'} selected="selected"{/if}>M</option>
                                        <option value="L"{if $smarty.session.registreren.int_maat=='L'} selected="selected"{/if}>L</option>
                                        <option value="XL"{if $smarty.session.registreren.int_maat=='XL'} selected="selected"{/if}>XL</option>
                                        <option value="XXL"{if $smarty.session.registreren.int_maat=='XXL'} selected="selected"{/if}>XXL</option>
                                        <option value="3XL"{if $smarty.session.registreren.int_maat=='3XL'} selected="selected"{/if}>3XL</option>
                                        <option value="4XL"{if $smarty.session.registreren.int_maat=='4XL'} selected="selected"{/if}>4XL</option>
                                        <option value="5XL"{if $smarty.session.registreren.int_maat=='5XL'} selected="selected"{/if}>5XL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field_wrap cup-size-block">
                            <label>{$taalContent.registration.fields.cupmaat}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel small" style="width:72px;">
                                    <select name="vrouw_cup_letter" id="vrouw_cup_letter">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.cup_letter=='ge'} selected="selected"{/if} value="ge">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.cup_letter=='nv' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nv">{$taalContent.registration.step_2.nvt}</option>
                                        <option value="AA"{if $smarty.session.registreren.cup_letter=='AA' && $leeftijd>17 && $smarty.session.registreren.geslacht=='V'} selected="selected"{/if}>AA</option>
                                        <option value="A"{if $smarty.session.registreren.cup_letter=='A' && $leeftijd>17 && $smarty.session.registreren.geslacht=='V'} selected="selected"{/if}>A</option>
                                        <option value="B"{if $smarty.session.registreren.cup_letter=='B' && $leeftijd>17 && $smarty.session.registreren.geslacht=='V'} selected="selected"{/if}>B</option>
                                        <option value="C"{if $smarty.session.registreren.cup_letter=='C' && $leeftijd>17 && $smarty.session.registreren.geslacht=='V'} selected="selected"{/if}>C</option>
                                        <option value="D"{if $smarty.session.registreren.cup_letter=='D' && $leeftijd>17 && $smarty.session.registreren.geslacht=='V'} selected="selected"{/if}>D</option>
                                        <option value="DD"{if $smarty.session.registreren.cup_letter=='DD' && $leeftijd>17 && $smarty.session.registreren.geslacht=='V'} selected="selected"{/if}>DD</option>
                                        <option value="E"{if $smarty.session.registreren.cup_letter=='E' && $leeftijd>17 && $smarty.session.registreren.geslacht=='V'} selected="selected"{/if}>E</option>
                                        <option value="F"{if $smarty.session.registreren.cup_letter=='F' && $leeftijd>17 && $smarty.session.registreren.geslacht=='V'} selected="selected"{/if}>F</option>
                                        <option value="G"{if $smarty.session.registreren.cup_letter=='G' && $leeftijd>17 && $smarty.session.registreren.geslacht=='V'} selected="selected"{/if}>G</option>
                                    </select>
                                </div>
                                <div class="field_wrap_inp_sel small" style="width:72px;">
                                    <select name="vrouw_cup" id="vrouw_cup">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option {if $smarty.session.registreren.cup=='geen'} selected="selected" {/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.cup=='nvt'} selected="selected" {/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {for $param=60 to 130 step 5}
                                        <option value="{$param}" {if $smarty.session.registreren.cup==$param && $leeftijd>17 } selected="selected"{/if}>{$param}</option>
                                        {/for}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.jeansmaat}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="vrouw_jeans" id="vrouw_jeans">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.jeans=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.jeans=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer step=1 start=22 loop=44}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.jeans==$smarty.section.centimer.index } selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.schoenmaat}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="vrouw_schoen" id="vrouw_schoen">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option {if $smarty.session.registreren.schoenmaat=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.schoenmaat=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer start=5 loop=51}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.schoenmaat==$smarty.section.centimer.index } selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/if}
                    {if $smarty.session.registreren.geslacht != 'F'}

                    {if $leeftijd<=17 && $leeftijd>12}

                    <div class='info_title'>
                        <p class="cursief"><strong>{$taalContent.registration.step_2.parameters.teen}</strong> - {$taalContent.registration.fields.from} 13 - 17 {$taalContent.registration.fields.year}</p></div>
                    <div class="team_data" style=" margin-right: 40px; height:280px;">
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.lengte}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="kind_lengte" id="kind_lengte">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option {if $smarty.session.registreren.lengte=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.lengte=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer start=100 loop=220}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.lengte==$smarty.section.centimer.index && $leeftijd<=17} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.gewicht}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="kind_gewicht" id="kind_gewicht">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.gewicht=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.gewicht=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=kg start=1 loop=200}
                                        <option value="{$smarty.section.kg.index}"{if $smarty.session.registreren.gewicht==$smarty.section.kg.index && $leeftijd<=17} selected="selected"{/if}>{$smarty.section.kg.index}kg</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.kinder_min}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="kind_maat_min" id="kind_maat_min">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.kind_maat_min=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.kind_maat_min=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer step=6 start=50 loop=189}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.kind_maat_min==$smarty.section.centimer.index && $leeftijd<=17} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.kinder_max}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="kind_maat_max" id="kind_maat_max">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.kind_maat_max=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.kind_maat_max=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer step=6 start=50 loop=189}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.kind_maat_max==$smarty.section.centimer.index && $leeftijd<=17} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.schoenmaat}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="kind_schoen" id="kind_schoen">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.schoenmaat=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.schoenmaat=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer start=5 loop=51}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.schoenmaat==$smarty.section.centimer.index && $leeftijd<=17} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                        {/section}
                                    </select>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="team_data" style=" margin-right: 40px; height:280px;">
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.jeansmaat}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="kind_jeans" id="kind_jeans">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.jeans=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.jeans=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer step=1 start=22 loop=44}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.jeans==$smarty.section.centimer.index } selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        {if $smarty.session.registreren.geslacht=='V'}
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.maat}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="kind_kleed" id="kind_kleed">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.kleed=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.kleed=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer step=2 start=30 loop=61}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.kleed==$smarty.section.centimer.index } selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        {else}
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.hemden}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="kind_hemden" id="kind_hemden">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.hemden=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.hemden=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer start=30 loop=61}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.hemden==$smarty.section.centimer.index} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        {/if}
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.int_maat}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="kind_int_maat" id="kind_int_maat">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.int_maat=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.int_maat=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        <option value="XXS"{if $smarty.session.registreren.int_maat=='XXS'} selected="selected"{/if}>XXS</option>
                                        <option value="XS"{if $smarty.session.registreren.int_maat=='XS'} selected="selected"{/if}>XS</option>
                                        <option value="S"{if $smarty.session.registreren.int_maat=='S'} selected="selected"{/if}>S</option>
                                        <option value="M"{if $smarty.session.registreren.int_maat=='M'} selected="selected"{/if}>M</option>
                                        <option value="L"{if $smarty.session.registreren.int_maat=='L'} selected="selected"{/if}>L</option>
                                        <option value="XL"{if $smarty.session.registreren.int_maat=='XL'} selected="selected"{/if}>XL</option>
                                        <option value="XXL"{if $smarty.session.registreren.int_maat=='XXL'} selected="selected"{/if}>XXL</option>
                                        <option value="3XL"{if $smarty.session.registreren.int_maat=='3XL'} selected="selected"{/if}>3XL</option>
                                        <option value="4XL"{if $smarty.session.registreren.int_maat=='4XL'} selected="selected"{/if}>4XL</option>
                                        <option value="5XL"{if $smarty.session.registreren.int_maat=='5XL'} selected="selected"{/if}>5XL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    {/if}
                    {if $leeftijd<=12}

                    <div class='info_title'>
                        <p class="cursief"><strong>{$taalContent.registration.step_2.parameters.kids}</strong> - {$taalContent.registration.fields.from} 0 - 12 {$taalContent.registration.fields.year}</p></div>
                    <div class="team_data" style=" margin-right: 40px; height:280px;">
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.lengte}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="kind_lengte" id="kind_lengte">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.lengte=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.lengte=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer start=40 loop=220}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.lengte==$smarty.section.centimer.index && $leeftijd<=17} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.gewicht}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="kind_gewicht" id="kind_gewicht">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.gewicht=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.gewicht=='nvt' || $smarty.session.registreren.geslacht=='F'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=kg start=1 loop=200}
                                        <option value="{$smarty.section.kg.index}"{if $smarty.session.registreren.gewicht==$smarty.section.kg.index && $leeftijd<=17} selected="selected"{/if}>{$smarty.section.kg.index}kg</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.kinder_min}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="kind_maat_min" id="kind_maat_min">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.kind_maat_min=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.kind_maat_min=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer step=6 start=50 loop=189}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.kind_maat_min==$smarty.section.centimer.index && $leeftijd<=17} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.kinder_max}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="kind_maat_max" id="kind_maat_max">
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        <option{if $smarty.session.registreren.kind_maat_max=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.kind_maat_max=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        {section name=centimer step=6 start=50 loop=189}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.kind_maat_max==$smarty.section.centimer.index && $leeftijd<=17} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field_wrap">
                            <label>{$taalContent.registration.fields.schoenmaat}</label>
                            <div class="field_wrap_inp">
                                <div class="field_wrap_inp_sel">
                                    <select name="kind_schoen" id="kind_schoen">
                                        <option{if $smarty.session.registreren.schoenmaat=='geen'} selected="selected"{/if} value="geen">{$taalContent.registration.step_2.geen_idee}</option>
                                        <option {if $smarty.session.registreren.schoenmaat=='nvt'} selected="selected"{/if} value="nvt">{$taalContent.registration.step_2.nvt}</option>
                                        <option value="0">{$taalContent.registration.fields.kies}</option>
                                        {section name=centimer start=5 loop=51}
                                        <option value="{$smarty.section.centimer.index}"{if $smarty.session.registreren.schoenmaat==$smarty.section.centimer.index && $leeftijd<=17} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/if}
                    {/if}
                <div class='info_title' style="margin-top:60px; margin-bottom:50px;">
                    <p class="cursief">{$taalContent.registration.step_2.subtitle_3}</p>
                    <p class="fnt_15" style="margin-top: 10px; width: 90%">{$taalContent.registration.step_2.skin_color_block.title}</p>
                    <p class="fnt_15" style="margin-top: 10px;"><strong>{$taalContent.registration.step_2.skin_color_block.subtitle}</strong></p>
                </div>
                <div id="checkboxes-stap2" class="team_data skin-color-block">
                    <div class="custom_filter tb">
                        {foreach from=$eigenschappen.huidskleur item=code key=id}
                            <div class="tb-row">
                                <span class="custom_filter_sub tb-cell {if $smarty.session.registreren.geslacht=='F'}disabled-input{/if}">
                                    <label>
                                        <input class="ethnic-input" type="checkbox" {if $smarty.session.registreren.geslacht=='F'}disabled{/if} name="eigenschap_{$id}"{if $smarty.session.registreren.eigenschappen.$id == 1}checked="checked"{/if}>
                                        <span class="lbl padding-8 pd-left-10">{$taalContent.registration.fields.$code}</span>
                                    </label>
                                </span>
                                <span class="fnt_15 tb-cell pd-left-50">{$taalContent.registration.step_2.skin_color_block.$code}</span>
                            </div>
                        {/foreach}
                    </div>
                </div>
                <div class='info_title' style="margin-top:30px; margin-bottom:30px;">
                    <p class="fnt_15" style="margin-top: 10px;"><strong>{$taalContent.registration.step_2.skin_color_block.subtitle_2}</strong></p>
                </div>
                <div id="checkboxes-stap2" class="team_data skin-color-block origin-block">
                    <div class="custom_filter tb">
                        <div class="tb-row">
                            <span class="custom_filter_sub tb-cell country-origin-title">
                                <strong>{$taalContent.registration.step_2.skin_color_block.country}:</strong>
                            </span>
                            <span class="fnt_15 tb-cell pd-left-50 field_wrap">
                                <div class="field_wrap_inp">
                                    <div class="field_wrap_inp_sel">
                                        <select name="country" id="country">
                                            <option{if $smarty.session.registreren.country==''} selected="selected"{/if} value="0">-</option>
                                            {foreach from=$countries item=country key=id}
                                                <option value="{$country.id}"{if $smarty.session.registreren.country==$country.id} selected="selected"{/if}>{$country.country_name}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
                <div class='info_title' style="margin-top:60px; margin-bottom:50px;">
                    <p class="cursief">{$taalContent.registration.step_2.subtitle_2}</p>
                </div>
                <div id="checkboxes-stap2" class="team_data" style="margin-bottom: 20px;">
                    <header>
                        <h5><span class="icon"></span>{$taalContent.registration.fields.haarkleur}</h5>
                    </header>
                    <div>
                        <span class="custom_filter">
                            {foreach from=$eigenschappen.haarkleur item=code key=id}
                                <span class="custom_filter_sub {if $smarty.session.registreren.geslacht=='F'}disabled-input{/if}">
                                    <label><input type="checkbox" {if $smarty.session.registreren.geslacht=='F'}disabled{/if} name="eigenschap_{$id}"{if $smarty.session.registreren.eigenschappen.$id == 1}checked="checked"{/if} > <span class="lbl padding-8">{$taalContent.registration.fields.$code}</span></label>
                                </span>
                            {/foreach}
                            </span>
                        </div>
                    </div>
                    <div id="checkboxes-stap2" class="team_data" style="margin-bottom: 20px;">
                        <header>
                            <h5><span class="icon"></span>{$taalContent.registration.fields.haarlengte}</h5>
                        </header>
                        <div ><span class="custom_filter">
                                {foreach from=$eigenschappen.haarlengte item=code key=id}
                                <span class="custom_filter_sub {if $smarty.session.registreren.geslacht=='F'}disabled-input{/if}">
                                    <label><input  type="checkbox" {if $smarty.session.registreren.geslacht=='F'}disabled{/if} name="eigenschap_{$id}"{if $smarty.session.registreren.eigenschappen.$id == 1}checked="checked"{/if} > <span class="lbl padding-8">{$taalContent.registration.fields.$code}</span></label></span>
                                {/foreach}
                            </span>
                        </div>
                    </div>
                    <div id="checkboxes-stap2" class="team_data" style="margin-bottom: 20px;">
                        <header>
                            <h5><span class="icon"></span>{$taalContent.registration.fields.haarstijl}</h5>
                        </header>
                        <div><span class="custom_filter">
                                {foreach from=$eigenschappen.haar item=code key=id}
                                <span class="custom_filter_sub {if $smarty.session.registreren.geslacht=='F'}disabled-input{/if}">
                                    <label><input  type="checkbox" {if $smarty.session.registreren.geslacht=='F'}disabled{/if} name="eigenschap_{$id}"{if $smarty.session.registreren.eigenschappen.$id == 1}checked="checked"{/if} > <span class="lbl padding-8">{$taalContent.registration.fields.$code}</span></label></span>
                                {/foreach}
                            </span>
                        </div>
                    </div>
                    <div id="checkboxes-stap2" class="team_data" style="margin-bottom: 20px;">
                        <header>
                            <h5><span class="icon"></span>{$taalContent.registration.fields.begroeiing}</h5>
                        </header>
                        <div><span class="custom_filter">
                                {foreach from=$eigenschappen.begroeing item=code key=id}
                                <span class="custom_filter_sub {if $smarty.session.registreren.geslacht=='F'}disabled-input{/if}">
                                    <label><input  type="checkbox" {if $smarty.session.registreren.geslacht=='F'}disabled{/if} name="eigenschap_{$id}"{if $smarty.session.registreren.eigenschappen.$id == 1}checked="checked"{/if} > <span class="lbl padding-8">{$taalContent.registration.fields.$code}</span></label></span>
                                {/foreach}
                            </span>
                        </div>
                    </div>
                    <div id="checkboxes-stap2" class="team_data" style="margin-bottom: 20px;">
                        <header>
                            <h5><span class="icon"></span>{$taalContent.registration.fields.versiering}</h5>
                        </header>
                        <div><span class="custom_filter">
                                {foreach from=$eigenschappen.versiering item=code key=id}
                                <span class="custom_filter_sub {if $smarty.session.registreren.geslacht=='F'}disabled-input{/if}">
                                    <label><input  type="checkbox" {if $smarty.session.registreren.geslacht=='F'}disabled{/if} name="eigenschap_{$id}"{if $smarty.session.registreren.eigenschappen.$id == 1}checked="checked"{/if} > <span class="lbl padding-8">{$taalContent.registration.fields.$code}</span></label></span>
                                {/foreach}
                            </span>
                        </div>
                    </div>
                    <div id="checkboxes-stap2" class="team_data" style="margin-bottom: 20px;">
                        <header>
                            <h5><span class="icon"></span>{$taalContent.registration.fields.kleurogen}</h5>
                        </header>
                        <div>
                            <span class="custom_filter">
                                {foreach from=$eigenschappen.ogen item=code key=id}
                                <span class="custom_filter_sub {if $smarty.session.registreren.geslacht=='F'}disabled-input{/if}">
                                    <label><input  type="checkbox" {if $smarty.session.registreren.geslacht=='F'}disabled{/if} name="eigenschap_{$id}"{if $smarty.session.registreren.eigenschappen.$id == 1}checked="checked"{/if} > <span class="lbl padding-8">{$taalContent.registration.fields.$code}</span></label>
                                </span>
                                {/foreach}
                            </span>
                        </div>
                    </div>
        </div>
        <div class="team_data" style="padding-left:40px; background-color : #FFFFFF; display : block;">
            <div class="field_wrap field_txt">
                <div class="field_wrap_inp button-block">
                    <button id="stap_submit" style="margin-top: 0px; margin-bottom: 20px;">{$taalContent.registration.step_2.tooltip}</button>
                </div>
            </div>
        </div>
    </div>
</section>
{include file='registration/footer.tpl'}

