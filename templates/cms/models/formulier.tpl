{literal}
<script src="/js/jquery.form.js" type="text/javascript"></script>
{/literal}
<!-- MODEL DETAILS -->
<h1>{$model.voornaam} {$model.naam} - Refn&deg; {$model.model_id}</h1>
{if $admin.typeName!='updater'}{if isset($previousModel)}<div style="float:left; font-size: 46px; margin-right: 40px; margin-bottom: 20px;"><a href="{if $pageType eq 'single_page'}/cms/models/models/aanpassen/?id={$previousModel}{else}javascript:getModelTemplate({$previousModel}){/if}"><i class="fa fa-arrow-left fa-3"></i></a></div>{/if}{if isset($nextModel)}<div style="float:right; font-size: 46px; margin-left: 40px; margin-bottom: 20px;"><a href="{if $pageType eq 'single_page'}/cms/models/models/aanpassen/?id={$nextModel}{else}javascript:getModelTemplate({$nextModel}){/if}"><i class="fa fa-arrow-right fa-3"></i></a></div>{/if}{/if}
{if $admin.typeName=='admin'}<p style="margin-bottom: 0px;">Modelcode - {$model.code}</p>{/if}
<div class="lijn klein" style="clear:both;"></div>
<form method="post" action="/cms/models/models/ajax_aanpassen/" class="ajax" id="formulier">
    <input type="hidden" name="page" value="{$pageType}"/>
    {assign var="frontImage" value=$siteImages[0]}
    <img src={if isset($frontImage)}"{$frontImage->getImageLocation()}/models/{$model.model_id}/website/thumbs/{$frontImage->getId()}.jpg"{else}"/models/no_foto.jpg"{/if} class="model-details" width="228" height="350"/>
    <input type="hidden" name="id" value="{$model.model_id}" />
    <div id="model-details-input">
        <div class="model-details-input-kolom">
            <div class="input"><input class="capitalize" name="voornaam" data-container="Voornaam" value="{$model.voornaam}" /></div>
            <div class="input"><input class="capitalize" name="naam" data-container="Naam" value="{$model.naam}" /></div>
            <div class="input"><input class="capitalize" name="straat" data-container="Adres" value="{$model.straat}" /></div>
            <div class="input"><input class="capitalize" name="nummer" data-container="Huisnummer" value="{$model.nummer}" /></div>
            <div class="input"><input class="capitalize" name="postcode" data-container="Postcode" value="{$model.postcode}" /></div>
            <div class="input"><input class="capitalize" name="gemeente" data-container="Gemeente" value="{$model.gemeente}" /></div>
            <div class="input">
                <select name="land" class="custom-select-new" style="width: 210px; color: #000000 !important;">
                    <option value="0">Kies</option>
                    <option value="BE"{if $model.land=='BE'} selected="selected"{/if}>Belgi&euml;</option>
                    <option value="NL"{if $model.land=='NL'} selected="selected"{/if}>Nederland</option>
                    <option value="FR"{if $model.land=='FR'} selected="selected"{/if}>Frankrijk</option>
                    <option value="DE"{if $model.land=='DE'} selected="selected"{/if}>Duitsland</option>
                    <option value="LUX"{if $model.land=='LUX'} selected="selected"{/if}>Luxembourg</option>
                    <option value="UK"{if $model.land=='UK'} selected="selected"{/if}>UK</option>
                </select>
            </div>
        </div>
        <div class="model-details-input-kolom">
            <div class="input">
                <select name="geboortedatum_dag" onchange="veranderGeslacht()" class="custom-select-new" style="width: 50px; color: #000000 !important; margin-right: 5px;">
                    <option value="0">--</option>
                    {section name=dag loop=31}
                    <option value="{$smarty.section.dag.iteration}"{if $model.check_dag==$smarty.section.dag.iteration} selected="selected"{/if}>{$smarty.section.dag.iteration} </option>
                    {/section}
                </select>
                
                <select name="geboortedatum_maand" onchange="veranderGeslacht()" class="custom-select-new" style="width: 50px; color: #000000 !important; margin-right: 5px;">
                    <option value="0">--</option>
                    {section name=maand loop=12}
                    <option value="{$smarty.section.maand.iteration}"{if $model.check_maand==$smarty.section.maand.iteration} selected="selected"{/if}>{$smarty.section.maand.iteration} </option>
                    {/section}
                </select>
                
                <select name="geboortedatum_jaar" onchange="veranderGeslacht()" class="custom-select-new" style="width: 56px; color: #000000 !important;">
                    <option value="0">--</option>
                    {section name=jaar loop=date('Y')+1 max=120 step=-1}
                    <option value="{$smarty.section.jaar.index}"{if $model.check_jaar==$smarty.section.jaar.index} selected="selected"{/if}>{$smarty.section.jaar.index} </option>
                    {/section}
                </select>
            </div>
            
            <div class="input">
                <select name="geslacht" class="custom-select-new" style="width: 210px; color: #000000 !important;" onchange="veranderGeslacht()">
                    <option value="M"{if $model.geslacht=='M'} selected="selected"{/if}>Man</option>
                    <option value="V"{if $model.geslacht=='V'} selected="selected"{/if}>Vrouw</option>
                    <option value="F"{if $model.geslacht=='F'} selected="selected"{/if}>Gezin</option>
                </select>
            </div>
            
            <div class="input">
                <select name="moedertaal" class="custom-select-new" style="width: 210px; color: #000000 !important;">
                    <option value="0">Spreektaal</option>
                    <option value="nl"{if $model.moedertaal=='nl'} selected="selected"{/if}>Nederlands</option>
                    <option value="fr"{if $model.moedertaal=='fr'} selected="selected"{/if}>Fran&ccedil;ais</option>
                    <option value="en"{if $model.moedertaal=='en'} selected="selected"{/if}>English</option>
                    <option value="de"{if $model.moedertaal=='de'} selected="selected"{/if}>Deutsch</option>
                </select>
            </div>
            {if $admin.typeName=='admin'}<div class="input"><input name="email" data-container="E-mail" value="{$model.email}" /></div>{/if}
            {if $admin.typeName=='booker'}<div class="input">{include file='cms/elements/get_email_button.tpl' id=$model.model_id}</div>{/if}
            {if $admin.typeName=='admin'}<div class="input"><input name="telefoon" data-container="Telefoon" value="{$model.telefoon}" /></div>{/if}
            {if $admin.typeName=='booker'}<div class="input">{include file='cms/elements/get_phone_button.tpl' id=$model.model_id}</div>{/if}
            {if $admin.typeName=='admin'}<div class="input"><input name="nieuw_telefoon2" data-container="2e telefoonnummer" class="niet-verplicht capitalize" value="{$model.nieuw_telefoon2}"/></div>{/if}
            <div class="input">
                <select name="status" class="custom-select-new niet-verplicht" style="width: 210px; color: #000000 !important;">
                    <option value="1"{if $model.nieuw_actief=='1'} selected="selected"{/if}>Actief</option>
                    <option value="0"{if $model.nieuw_actief=='0'} selected="selected"{/if}>Inactief</option>
                    <option value="2"{if $model.nieuw_actief=='2'} selected="selected"{/if}>Do not list</option>
                </select>
            </div>
            <div class="input">
                <select name="country" class="custom-select-new" style="width: 210px; color: #000000 !important;">
                    <option{if $model.country_origin_id==''} selected="selected"{/if} value="0">-</option>
                    {foreach from=$countries item=country key=id}
                    <option value="{$country.id}"{if $model.country_origin_id==$country.id} selected="selected"{/if}>{$country.country_name}</option>
                    {/foreach}
                </select>
            </div>
        </div>
        <div style="clear:both"></div>
        <textarea name="nieuw_opmerking" data-container="Interne opmerkingen">{$model.nieuw_opmerking}</textarea>
    </div>
    <div id="model-details-buttons">
        <a id="submit-model-profile" href="#" class="button new pdng">Opslaan</a>
        <a {if $model.accepted eq 0}href="javascript:approveModel({$model.model_id})"{/if} class="button new pdng">{if $model.accepted eq 1}Accepted{else}Accept{/if}</a><br/>
        <a {if $model.is_update eq 1}href="javascript:changeModel({$model.model_id}, 3)"{/if} class="button new pdng">{if $model.is_update eq 1}Confirm{else}Confirmed{/if}</a>
        {if $admin.typeName!='updater'}{if $model.declined !== 2}<a href="javascript:changeModel({$model.model_id},5)" class="button new pdng">Pending</a>{/if}{/if}<br/>
        <a href="/pdf/modelPdf/?id={$model.model_id}" class="button pdf_button new" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
        {if $admin.typeName!='updater'}{if $model.declined !== 1}<a href="javascript:changeModel({$model.model_id},0)" class="button new pdng">Archive</a>{/if}{/if}<br/>
        {if $admin.typeName!='updater'}{if isset($smarty.get.hidden)}<a href="javascript:modelVerwijderen({$model.model_id})" class="button grijs pdng">Verwijderen</a>{/if}{/if}<br/>
        {if $admin.typeName == 'admin'}<a href="#" class="button new pdng delete-model">Delete</a><br/>{/if}

        <div class="model_message">
            <h3>Message:</h3>
            <input type="hidden" name="send_message_id" value="{$model.model_id}" />
            <div class="line_block">
                <select name="bericht" class="custom-select-new">
                    {foreach from=$emails item=r key=id}
                    <option value="{$id}">{$r.titel}</option>
                    {/foreach}
                </select>
            </div>
            <div class="line_block">
                <select name="mail_from" class="custom-select-new mail_from">
                    {foreach from=$emailsFrom item=email key=id}
                        <option value="{$email.id}" {if $email.address == 'david@castingteam.com'}selected="selected"{/if}>{$email.address}</option>
                    {/foreach}
                </select>
            </div>
            <p class="custom-message-area-wrapper">
                <textarea class="custom-message-area" rows="5" cols="45" name="text"></textarea>
            </p>
            <div class="message_button">
                <input id="private_message_send" class="button new" value="Versturen" />
            </div>           
        </div>
        <div style="clear:both; padding-top: 30px;"></div>
        <div class="homepage_models">
            <h3>Frontpage:</h3>
            <div>
                <input name="homepage_models" type="checkbox" {if $isHomepageModel == true}checked="checked"{/if}>
            </div>
        </div>
    </div>
    <div style="clear:both"></div>
    <div class="lijn klein"></div>
    <div id="model-tabs">
        <div id="model-tabs-tabs">
            <a href="#tab1" class="tabs eerste" style="width:120px;">Groepen</a>
            <a href="#tab2" class="inactief tabs" style="width:130px;">Eigenschappen</a>
            <a href="#tab3" class="inactief tabs" style="width:120px;">Ervaring</a>
            <a href="#tab4" class="inactief tabs" style="width:120px;">Talenten</a>
            <a href="#tab6" class="inactief tabs" style="width:120px;">Maten</a>
            <a href="#tab5" class="inactief tabs laatste" style="width:120px;">Talen</a>
        </div>
        
        <div id="tab1" class="tab">
            <div id="model-groepen">
                {foreach from=$groepen item=group key=groupId}
                    <div data-id="{$groupId}" class="root-group">
                        <p class="root-group-title">{$group.name}</p>
                        <div class="root-groups">
                            {foreach from=$group.child_group item=r key=id}
                            <div class="model-tabs-checkbox" data-id="{$id}">
                                <input type="checkbox"{if $groepen_model.$id==1} checked="checked"{/if} class="checkbox" name="groep_{$id}" />
                                <span id="groep_naam_{$id}">{$r.naam}</span>
                                <input type="text" class="text niet-verplicht created" name="groep_naam_{$id}" value="{$r.naam}" />
                            </div>
                            {/foreach}
                            <div class="model-tabs-checkbox link"><a href="javascript:addNewGroup({$groupId})">Add</a></div>
                        </div>
                    </div>
                {/foreach}
            </div>
            <div style="clear: both;"></div>
        </div>
        
        <div id="tab2" class="tab" style="display: none">
            {foreach from=$eigenschappen.huidskleur item=code key=id}
                <div class="model-tabs-checkbox groot" data-id="{$id}">
                    <input type="checkbox"{if $eigenschappen_model.$id==1} checked="checked"{/if} class="checkbox" name="eigenschap_{$id}" />
                    <span id="groep_naam_{$id}"><strong>Huidskleur:</strong> {$taalContent.registration.fields.$code}</span>
                </div>
            {/foreach}

            {foreach from=$eigenschappen.haarkleur item=code key=id}
            <div class="model-tabs-checkbox groot" data-id="{$id}">
                <input type="checkbox"{if $eigenschappen_model.$id==1} checked="checked"{/if} class="checkbox" name="eigenschap_{$id}" />
                <span id="groep_naam_{$id}"><strong>Haarkleur:</strong> {$taalContent.registration.fields.$code}</span>
            </div>
            {/foreach}
            
            {foreach from=$eigenschappen.haarlengte item=code key=id}
            <div class="model-tabs-checkbox groot" data-id="{$id}">
                <input type="checkbox"{if $eigenschappen_model.$id==1} checked="checked"{/if} class="checkbox" name="eigenschap_{$id}" />
                <span id="groep_naam_{$id}"><strong>Haarlengte:</strong> {$taalContent.registration.fields.$code}</span>
            </div>
            {/foreach}
            
            {foreach from=$eigenschappen.haar item=code key=id}
            <div class="model-tabs-checkbox groot" data-id="{$id}">
                <input type="checkbox"{if $eigenschappen_model.$id==1} checked="checked"{/if} class="checkbox" name="eigenschap_{$id}" />
                <span id="groep_naam_{$id}"><strong>Haarstijl:</strong> {$taalContent.registration.fields.$code}</span>
            </div>
            {/foreach}
            
            {foreach from=$eigenschappen.begroeing item=code key=id}
            <div class="model-tabs-checkbox groot" data-id="{$id}">
                <input type="checkbox"{if $eigenschappen_model.$id==1} checked="checked"{/if} class="checkbox" name="eigenschap_{$id}" />
                <span id="groep_naam_{$id}"><strong>Begroeiing:</strong> {$taalContent.registration.fields.$code}</span>
            </div>
            {/foreach}
            
            {foreach from=$eigenschappen.versiering item=code key=id}
            <div class="model-tabs-checkbox groot" data-id="{$id}">
                <input type="checkbox"{if $eigenschappen_model.$id==1} checked="checked"{/if} class="checkbox" name="eigenschap_{$id}" />
                <span id="groep_naam_{$id}"><strong>Versiering:</strong> {$taalContent.registration.fields.$code}</span>
            </div>
            {/foreach}
            
            {foreach from=$eigenschappen.ogen item=code key=id}
            <div class="model-tabs-checkbox groot" data-id="{$id}">
                <input type="checkbox"{if $eigenschappen_model.$id==1} checked="checked"{/if} class="checkbox" name="eigenschap_{$id}" />
                <span id="groep_naam_{$id}"><strong>Kleur ogen:</strong> {$taalContent.registration.fields.$code}</span>
            </div>
            {/foreach}
            <div style="clear: both;"></div>
        </div>
       <!--  <div id="tab3" class="tab" style="display: none;"> -->
       
        <div id="tab3" class="tab">
            {foreach from=$eigenschappen.ervaring item=code key=id}
            <div class="model-tabs-checkbox dubbel" data-id="{$id}">
                <input type="checkbox"{if $eigenschappen_model.$id==1} checked="checked"{/if} class="checkbox" name="eigenschap_{$id}" />
                <span id="groep_naam_{$id}">{$taalContent.registration.fields.$code}</span>
            </div>
            {/foreach}
            
            <div style="clear: both;"></div>
            
            <textarea name="nieuw_ervaring" style="width: 1000px; height: 200px; padding: 5px;">{$model.nieuw_ervaring}</textarea>
        </div>
        <div id="tab4" class="tab" style="display: none;">
            <ul style="background-color:#fff; border-radius: 5px;
                padding: 10px;">
                <textarea name="talenten" style="width: 1000px; height: 200px; padding: 5px;">{$model.talenten}</textarea>
            </ul>
            
            <div style="clear: both;"></div>
        </div>
        <div id="tab5" class="tab" style="display: none;">
            {foreach from=$eigenschappen.talenkennis item=code key=id}
            <div class="model-tabs-checkbox dubbel" data-id="{$id}">
                <input type="checkbox"{if $eigenschappen_model.$id==1} checked="checked"{/if} class="checkbox" name="eigenschap_{$id}" />
                <span id="groep_naam_{$id}">{$taalContent.registration.fields.$code}</span>
            </div>
            {/foreach}
        </div>
        <div id="tab6" class="tab" style="display: none;">
            <div class="form-kolom klein man {if $leeftijd<=17 || $model.geslacht!='M'} inactief{/if} cms-model" style="width:250px;">
                <h2>Mannen<br /><span>(Vanaf 18 jaar)</span></h2>
                <div class="input gn-bg">
                    <label class="links klein">Lengte</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="man_lengte"{if $leeftijd<=17 || $model.geslacht=='V'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.lengte=='geen' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.lengte=='nvt' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer start=100 loop=250}
                    <option value="{$smarty.section.centimer.index}"{if $model.lengte==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                    {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Gewicht</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="man_gewicht"{if $leeftijd<=17 || $model.geslacht=='V'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.gewicht=='geen' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.gewicht=='nvt' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=kg start=1 loop=200}
                    <option value="{$smarty.section.kg.index}"{if $model.gewicht==$smarty.section.kg.index && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>{$smarty.section.kg.index}kg</option>
                    {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Borstomtrek</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="man_borst"{if $leeftijd<=17 || $model.geslacht=='V'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.maten_borst=='geen' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.maten_borst=='nvt' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer start=50 loop=121}
                    <option value="{$smarty.section.centimer.index}"{if $model.maten_borst==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                    {/section}
                    </select>
                </div>
                <div class="input gn-bg">
                    <label class="links klein">Taille</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="man_taille"{if $leeftijd<=17 || $model.geslacht=='V'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.maten_taille=='geen' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.maten_taille=='nvt' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer start=40 loop=131}
                    <option value="{$smarty.section.centimer.index}"{if $model.maten_taille==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                    {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Heupen</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="man_heupen"{if $leeftijd<=17 || $model.geslacht=='V'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.maten_heupen=='geen' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.maten_heupen=='nvt' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer start=50 loop=131}
                    <option value="{$smarty.section.centimer.index}"{if $model.maten_heupen==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                    {/section}
                    </select>
                </div>
                <div class="input gn-bg">
                    <label class="links klein">Hemden maat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="man_hemden_maat"{if $leeftijd<=17 || $model.geslacht=='V'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.hemden_maat=='geen' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.hemden_maat=='nvt' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer step=1 start=30 loop=61}
                    <option value="{$smarty.section.centimer.index}"{if $model.hemden_maat==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                    {/section}
                    </select>
                </div>
                <div class="input gn-bg">
                    <label class="links klein">Int. maat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="man_int_maat"{if $leeftijd<=17 || $model.geslacht=='V'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option {if $model.int_maat=='geen' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.int_maat=='nvt' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="nvt">NVT</option>
                    <option value="XXS"{if $model.int_maat=='XXS' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>XSS</option>
                    <option value="XS"{if $model.int_maat=='XS' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>XS</option>
                    <option value="S"{if $model.int_maat=='S' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>S</option>
                    <option value="M"{if $model.int_maat=='M' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>M</option>
                    <option value="L"{if $model.int_maat=='L' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>L</option>
                    <option value="XL"{if $model.int_maat=='XL' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>XL</option>
                    <option value="XXL"{if $model.int_maat=='XXL' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>XXL</option>
                    <option value="3XL"{if $model.int_maat=='3XL' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>3XL</option>
                    <option value="4XL"{if $model.int_maat=='4XL' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>4XL</option>
                    <option value="5XL"{if $model.int_maat=='5XL' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>5XL</option>
                    </select>
                </div>
                <div class="input gn-bg">
                    <label class="links klein">Jeansmaat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="man_jeans"{if $leeftijd<=17 || $model.geslacht=='V'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.maten_jeans=='geen' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.maten_jeans=='nvt' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer step=1 start=22 loop=44}
                    <option value="{$smarty.section.centimer.index}"{if $model.maten_jeans==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                    {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Kostuum of jas</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="man_kostuum"{if $leeftijd<=17 || $model.geslacht=='V'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.maten_kostuum=='geen' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.maten_kostuum=='nvt' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer step=2 start=30 loop=61}
                    <option value="{$smarty.section.centimer.index}"{if $model.maten_kostuum==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                    {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Schoenmaat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="man_schoen"{if $leeftijd<=17 || $model.geslacht=='V'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.maten_schoenen=='geen' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.maten_schoenen=='nvt' && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer start=5 loop=51}
                    <option value="{$smarty.section.centimer.index}"{if $model.maten_schoenen==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='M'} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                    {/section}
                    </select>
                </div>
            </div>

            <div class="form-kolom cms vrouw{if $leeftijd<=17 || $model.geslacht!='V'} inactief{/if} cms-model" style="margin-left: 20px; padding-right: 15px;">
                <h2 class="vrouw">Vrouwen<br /><span>(Vanaf 18 jaar)</span></h2>
                <div class="input gn-bg">
                    <label class="links klein">Lengte</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="vrouw_lengte"{if $leeftijd<=17 || $model.geslacht=='M'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option {if $model.lengte=='geen' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.lengte=='nvt' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer start=100 loop=250}
                    <option value="{$smarty.section.centimer.index}"{if $model.lengte==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                    {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Gewicht</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="vrouw_gewicht"{if $leeftijd<=17 || $model.geslacht=='M'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.gewicht=='geen' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.gewicht=='nvt' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=kg start=1 loop=200}
                    <option value="{$smarty.section.kg.index}"{if $model.gewicht==$smarty.section.kg.index && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>{$smarty.section.kg.index}kg</option>
                    {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Borstomtrek</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="vrouw_borst"{if $leeftijd<=17 || $model.geslacht=='M'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.maten_borst=='geen' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.maten_borst=='nvt' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer start=50 loop=121}
                    <option value="{$smarty.section.centimer.index}"{if $model.maten_borst==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                    {/section}
                    </select>
                </div>
                <div class="input gn-bg">
                    <label class="links klein">Taille</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="vrouw_taille"{if $leeftijd<=17 || $model.geslacht=='M'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.maten_taille=='geen' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.maten_taille=='nvt' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer start=40 loop=131}
                    <option value="{$smarty.section.centimer.index}"{if $model.maten_taille==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                    {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Heupen</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="vrouw_heupen"{if $leeftijd<=17 || $model.geslacht=='M'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.maten_heupen=='geen' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.maten_heupen=='nvt' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer start=50 loop=131}
                    <option value="{$smarty.section.centimer.index}"{if $model.maten_heupen==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                    {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Jeansmaat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="vrouw_jeans"{if $leeftijd<=17 || $model.geslacht=='M'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.maten_jeans=='geen' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.maten_jeans=='nvt' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer step=1 start=22 loop=44}
                    <option value="{$smarty.section.centimer.index}"{if $model.maten_jeans==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                    {/section}
                    </select>
                </div>
                <div class="input gn-bg">
                    <label class="links klein">Maat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="vrouw_kleed"{if $leeftijd<=17 || $model.geslacht=='M'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.maten_kleding=='geen' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.maten_kleding=='nvt' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer step=2 start=30 loop=61}
                    <option value="{$smarty.section.centimer.index}"{if $model.maten_kleding==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                    {/section}
                    </select>
                </div>
                <div class="input gn-bg">
                    <label class="links klein">Int. maat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="vrouw_int_maat"{if $leeftijd<=17 || $model.geslacht=='M'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.int_maat=='geen' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.int_maat=='nvt' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="nvt">NVT</option>
                    <option value="XXS"{if $model.int_maat=='XXS' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>XSS</option>
                    <option value="XS"{if $model.int_maat=='XS' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>XS</option>
                    <option value="S"{if $model.int_maat=='S' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>S</option>
                    <option value="M"{if $model.int_maat=='M' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>M</option>
                    <option value="L"{if $model.int_maat=='L' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>L</option>
                    <option value="XL"{if $model.int_maat=='XL' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>XL</option>
                    <option value="XXL"{if $model.int_maat=='XXL' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>XXL</option>
                    <option value="3XL"{if $model.int_maat=='3XL' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>3XL</option>
                    <option value="4XL"{if $model.int_maat=='4XL' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>4XL</option>
                    <option value="5XL"{if $model.int_maat=='5XL' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>5XL</option>
                    </select>
                </div>
                <div class="input gn-bg">
                    <label class="links klein">Cupmaat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="vrouw_cup"{if $leeftijd<=17 || $model.geslacht=='M'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.maten_cup=='geen' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.maten_cup=='nvt' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer step=5 start=60 loop=135}
                    <option value="{$smarty.section.centimer.index}"{if $model.maten_cup==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                    {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Cupmaat letter</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="vrouw_cup_letter"{if $leeftijd<=17 || $model.geslacht=='M'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option {if $model.maten_cup_letter=='ge' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="ge">Geen idee</option>
                    <option {if $model.maten_cup_letter=='nv' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="nv">NVT</option>
                    <option value="AA"{if $model.maten_cup_letter=='AA' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>AA</option>
                    <option value="A"{if $model.maten_cup_letter=='A' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>A</option>
                    <option value="B"{if $model.maten_cup_letter=='B' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>B</option>
                    <option value="C"{if $model.maten_cup_letter=='C' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>C</option>
                    <option value="D"{if $model.maten_cup_letter=='D' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>D</option>
                    <option value="DD"{if $model.maten_cup_letter=='DD' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>DD</option>
                    <option value="E"{if $model.maten_cup_letter=='E' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>E</option>
                    <option value="F"{if $model.maten_cup_letter=='F' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>F</option>
                    <option value="G"{if $model.maten_cup_letter=='G' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>G</option>
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Schoenmaat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="vrouw_schoen"{if $leeftijd<=17 || $model.geslacht=='M'} disabled="disabled"{/if}>
                    <option value="0">Kies</option>
                    <option{if $model.maten_schoenen=='geen' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="geen">Geen idee</option>
                    <option {if $model.maten_schoenen=='nvt' && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if} value="nvt">NVT</option>
                    {section name=centimer start=5 loop=51}
                    <option value="{$smarty.section.centimer.index}"{if $model.maten_schoenen==$smarty.section.centimer.index && $leeftijd>17 && $model.geslacht=='V'} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                    {/section}
                    </select>
                </div>
            </div>
            <div class="form-kolom klein kind {if $leeftijd>17 || $leeftijd<13 || $model.geslacht=='F'} inactief{/if} cms-model" style="margin-left: 30px; padding-right: 15px;">
                <h2 class="kind" style="margin-top: -20px; padding-bottom: 20px;">Maten tieners<br /><span>(Van 13 - 17 jaar)</span></h2>
                <div class="input gn-bg">
                    <label class="links klein">Lengte</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="teen_lengte"{if $leeftijd>17 || $leeftijd<13} disabled="disabled"{/if}>
                        <option value="0">Kies</option>
                        <option{if $model.lengte=='geen' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="geen">Geen idee</option>
                        <option {if $model.lengte=='nvt' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="nvt">NVT</option>
                        {section name=centimer start=100 loop=220}
                        <option value="{$smarty.section.centimer.index}"{if $model.lengte==$smarty.section.centimer.index && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                        {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Gewicht</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="teen_gewicht"{if $leeftijd>17 || $leeftijd<13} disabled="disabled"{/if}>
                        <option value="0">Kies</option>
                        <option{if $model.gewicht=='geen' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="geen">Geen idee</option>
                        <option {if $model.gewicht=='nvt' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="nvt">NVT</option>
                        {section name=kg start=1 loop=200}
                        <option value="{$smarty.section.kg.index}"{if $model.gewicht==$smarty.section.kg.index && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>{$smarty.section.kg.index}kg</option>
                        {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Kindermaat (min)</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="teen_maat_min"{if $leeftijd>17 || $leeftijd<13} disabled="disabled"{/if}>
                        <option value="0">Kies</option>
                        <option{if $model.nieuw_kind_maat_min=='geen' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="geen">Geen idee</option>
                        <option {if $model.nieuw_kind_maat_min=='nvt' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="nvt">NVT</option>
                        {section name=centimer step=6 start=50 loop=189}
                        <option value="{$smarty.section.centimer.index}"{if $model.nieuw_kind_maat_min==$smarty.section.centimer.index && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                        {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Kindermaat (max)</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="teen_maat_max"{if $leeftijd>17 || $leeftijd<13} disabled="disabled"{/if}>
                        <option value="0">Kies</option>
                        <option{if $model.nieuw_kind_maat_max=='geen' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="geen">Geen idee</option>
                        <option {if $model.nieuw_kind_maat_max=='nvt' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="nvt">NVT</option>
                        {section name=centimer step=6 start=50 loop=189}
                        <option value="{$smarty.section.centimer.index}"{if $model.nieuw_kind_maat_max==$smarty.section.centimer.index && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                        {/section}
                    </select>
                </div>
                <div class="input gn-bg">
                    <label class="links klein">Schoenmaat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="teen_schoen"{if $leeftijd>17 || $leeftijd<13} disabled="disabled"{/if}>
                        <option value="0">Kies</option>
                        <option{if $model.maten_schoenen=='geen' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="geen">Geen idee</option>
                        <option {if $model.maten_schoenen=='nvt' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="nvt">NVT</option>
                        {if $leeftijd<=17}
                        {section name=centimer start=5 loop=51}
                        <option value="{$smarty.section.centimer.index}"{if $model.maten_schoenen==$smarty.section.centimer.index && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                        {/section}
                        {/if}
                    </select>
                </div>
                <div class="input gn-bg">
                    <label class="links klein">Jeansmaat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="teen_jeans"{if $leeftijd>17 || $leeftijd<13} disabled="disabled"{/if}>
                        <option value="0">Kies</option>
                        <option{if $model.maten_jeans=='geen' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="geen">Geen idee</option>
                        <option {if $model.maten_jeans=='nvt' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="nvt">NVT</option>
                        {section name=centimer step=1 start=22 loop=44}
                        <option value="{$smarty.section.centimer.index}"{if $model.maten_jeans==$smarty.section.centimer.index && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                        {/section}
                    </select>
                </div>
                {if $model.geslacht=='V'}
                <div class="input gn-bg">
                    <label class="links klein">Maat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="teen_kleed"{if $leeftijd>17 || $leeftijd<13} disabled="disabled"{/if}>
                        <option value="0">Kies</option>
                        <option{if $model.maten_kleding=='geen' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="geen">Geen idee</option>
                        <option {if $model.maten_kleding=='nvt' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="nvt">NVT</option>
                        {section name=centimer step=2 start=38 loop=71}
                        <option value="{$smarty.section.centimer.index}"{if $model.maten_kleding==$smarty.section.centimer.index && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                        {/section}
                    </select>
                </div>
                {else}
                <div class="input gn-bg">
                    <label class="links klein">Hemden maat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="teen_hemden_maat"{if $leeftijd>17 || $leeftijd<13} disabled="disabled"{/if}>
                        <option value="0">Kies</option>
                        <option{if $model.hemden_maat=='geen' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="geen">Geen idee</option>
                        <option {if $model.hemden_maat=='nvt' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="nvt">NVT</option>
                        {section name=centimer step=1 start=30 loop=61}
                        <option value="{$smarty.section.centimer.index}"{if $model.hemden_maat==$smarty.section.centimer.index} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                        {/section}
                    </select>
                </div>
                {/if}
                <div class="input gn-bg">
                    <label class="links klein">Int. maat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="teen_int_maat"{if $leeftijd>17 || $leeftijd<13} disabled="disabled"{/if}>
                        <option value="0">Kies</option>
                        <option {if $model.int_maat=='geen' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="geen">Geen idee</option>
                        <option {if $model.int_maat=='nvt' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if} value="nvt">NVT</option>
                        <option value="XXS"{if $model.int_maat=='XXS' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>XSS</option>
                        <option value="XS"{if $model.int_maat=='XS' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>XS</option>
                        <option value="S"{if $model.int_maat=='S' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>S</option>
                        <option value="M"{if $model.int_maat=='M' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>M</option>
                        <option value="L"{if $model.int_maat=='L' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>L</option>
                        <option value="XL"{if $model.int_maat=='XL' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>XL</option>
                        <option value="XXL"{if $model.int_maat=='XXL' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>XXL</option>
                        <option value="3XL"{if $model.int_maat=='3XL' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>3XL</option>
                        <option value="4XL"{if $model.int_maat=='4XL' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>4XL</option>
                        <option value="5XL"{if $model.int_maat=='5XL' && $leeftijd<=17 && $leeftijd>12} selected="selected"{/if}>5XL</option>
                    </select>
                </div>
            </div>
            <div class="form-kolom klein kind laatste {if $leeftijd>12 || $model.geslacht=='F'} inactief{/if} cms-model" style="margin-left: 30px;">
                <h2 class="kind" style="margin-top: -20px; padding-bottom: 20px;">Maten kinderen<br /><span>(Van 0 - 12 jaar)</span></h2>
                <div class="input gn-bg">
                    <label class="links klein">Lengte</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="kind_lengte"{if $leeftijd>12} disabled="disabled"{/if}>
                        <option value="0">Kies</option>
                        <option{if $model.lengte=='geen' && $leeftijd<13} selected="selected"{/if} value="geen">Geen idee</option>
                        <option {if $model.lengte=='nvt' && $leeftijd<13} selected="selected"{/if} value="nvt">NVT</option>
                        {section name=centimer start=40 loop=220}
                        <option value="{$smarty.section.centimer.index}"{if $model.lengte==$smarty.section.centimer.index && $leeftijd<=12} selected="selected"{/if}>{$smarty.section.centimer.index}cm</option>
                        {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Gewicht</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="kind_gewicht"{if $leeftijd>12} disabled="disabled"{/if}>
                        <option value="0">Kies</option>
                        <option{if $model.gewicht=='geen' && $leeftijd<13} selected="selected"{/if} value="geen">Geen idee</option>
                        <option {if $model.gewicht=='nvt' && $leeftijd<13} selected="selected"{/if} value="nvt">NVT</option>
                        {section name=kg start=1 loop=200}
                        <option value="{$smarty.section.kg.index}"{if $model.gewicht==$smarty.section.kg.index && $leeftijd<=12} selected="selected"{/if}>{$smarty.section.kg.index}kg</option>
                        {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Kindermaat (min)</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="kind_maat_min"{if $leeftijd>12} disabled="disabled"{/if}>
                        <option value="0">Kies</option>
                        <option{if $model.nieuw_kind_maat_min=='geen' && $leeftijd<13} selected="selected"{/if} value="geen">Geen idee</option>
                        <option {if $model.nieuw_kind_maat_min=='nvt' && $leeftijd<13} selected="selected"{/if} value="nvt">NVT</option>
                        {section name=centimer step=6 start=50 loop=189}
                        <option value="{$smarty.section.centimer.index}"{if $model.nieuw_kind_maat_min==$smarty.section.centimer.index && $leeftijd<=12} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                        {/section}
                    </select>
                </div>

                <div class="input gn-bg">
                    <label class="links klein">Kindermaat (max)</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="kind_maat_max"{if $leeftijd>12} disabled="disabled"{/if}>
                        <option value="0">Kies</option>
                        <option{if $model.nieuw_kind_maat_max=='geen' && $leeftijd<13} selected="selected"{/if} value="geen">Geen idee</option>
                        <option {if $model.nieuw_kind_maat_max=='nvt' && $leeftijd<13} selected="selected"{/if} value="nvt">NVT</option>
                        {section name=centimer step=6 start=50 loop=189}
                        <option value="{$smarty.section.centimer.index}"{if $model.nieuw_kind_maat_max==$smarty.section.centimer.index && $leeftijd<=12} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                        {/section}
                    </select>
                </div>
                <div class="input gn-bg">
                    <label class="links klein">Schoenmaat</label>
                    <select class="custom-select-new" style="width: 50px; color: #787878 !important;" name="kind_schoen"{if $leeftijd>12} disabled="disabled"{/if}>
                        <option value="0">Kies</option>
                        <option{if $model.maten_schoenen=='geen' && $leeftijd<13} selected="selected"{/if} value="geen">Geen idee</option>
                        <option {if $model.maten_schoenen=='nvt' && $leeftijd<13} selected="selected"{/if} value="nvt">NVT</option>
                        {if $leeftijd<=12}
                        {section name=centimer start=5 loop=51}
                        <option value="{$smarty.section.centimer.index}"{if $model.maten_schoenen==$smarty.section.centimer.index && $leeftijd<=12} selected="selected"{/if}>{$smarty.section.centimer.index}</option>
                        {/section}
                        {/if}
                    </select>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div style="clear:both"></div>
    <div class="lijn klein"></div>
    <!-- PHOTOS ON SITE -->
    <div id="onsite-fotos">
        {include file='cms/models/onsitefotos.tpl' id=$model.model_id}
    </div>
    <div class="lijn"></div>
    <!-- VIDEOS -->
    <h2>Video's</h2>
    <div id="videos">
        {$videohtml}
    </div>
    <div style="clear:both; height: 30px;"></div>
    <div class="submit">
        <input type="text" name="video" data-container="Youtube or Vimeo url" value="Youtube code" class="niet-verplicht" />
        <a href="javascript:modelVideo({$model.model_id})">Toevoegen</a>
    </div>
    <div class="lijn klein"></div>
</form>
    <!-- PHOTO UPLOADER -->
    <h2>Upload photo</h2>
    <!-- Upload Button-->
    <div>
        <div class="upload_div">
            <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="/ajax/upload_model_photo">
                <input type="hidden" name="page" value="{$pageType}"/>
                <input type="hidden" name="model_id" value="{$model.model_id}"/>
                <label class="upload_button">
                    <input type="file" name="images[]" id="images" multiple >
                    <i class="fa fa-cloud-upload"></i> Upload
                </label>
            </form>
        </div>
    </div>
    <!-- PHOTOS DELIVERED -->
    <div class="model-delivered-view">
        <p class="cursief">View:</p>
        <a href="javascript:veranderThumbs(0)" class="actief" id="view_0"><img src="/images/view1.png" alt="" /></a>
        <a href="javascript:veranderThumbs(1)" id="view_1"><img src="/images/view2.png" alt="" /></a>
        
        <div style="clear:both"></div>
    </div>
    
    {foreach from=$fotos item=items key=datum}
        <h2>Aangeleverde foto's - {$datum}</h2>

        {foreach from=$items item=val key=id}
            <div class="model-delivered-photo">
                <div class="model-delivered-buttons">
                    <a href="#" class="button">Publish</a>
                    <a href="#" class="button">Replace</a>
                    <a href="#" class="button grijs delete">Delete</a>
                </div>
                <a class="rotate_image" href="javascript:rotateImage({$id},{$model.model_id})" style="position:absolute; width:42px; height:42px; margin:10px; display:none;"><img style="width:42px; height:42px;"  src="/images/button_rotate.png" alt="" /></a>
                <a href="javascript:showCrop({$id})">
                    <img data-view0="{$val}/models/{$model.model_id}/thumbs/{$id}.jpg" data-view1="{$val}/models/{$model.model_id}/original/{$id}.jpg" src="{$val}/models/{$model.model_id}/thumbs/{$id}.jpg" alt="" />
                </a>
            </div>
        {/foreach}

        <div style="clear:both"></div>
        <div class="lijn"></div>
    {/foreach}
    <h2>Vermelden van fotografen </h2>
    <p>{$model.fotografen}</p>

<!-- CROP MODAL -->
<div id="crop-modal" style="display: none;">
    <div id="modal-bg" class="crop"></div>
    <div id="modal" class="crop">
        <iframe src="" scrolling="no"></iframe>
    </div>
</div>