<div class="page_title">
    <div class="top_links_pop white-color">
        <div class="selection-add-block">
            <div id="upward-triangle"></div>
            <a class="set_card background-black-color button" target="_blank" href="/api/pdf/get?id={$model['model_id']}"> {$languageContent.borderfield.profile.pdf_button} </a>
        </div>
        <a class="voeg_card background-red-color button" href="#"> {$languageContent.borderfield.profile.selection_button} </a>
    </div>
    <div class="model-title"><span class="model-name">{$model['voornaam']} </span><span class="ref-number">(Ref. {$model['model_id']})</span></div>
</div>
<div class="top_links_pop mobile white-color">
    <div class="selection-add-block">
        <div class="upward-triangle"></div>
        <a class="voeg_card background-red-color button" href="#"> {$languageContent.borderfield.profile.selection_button} </a>
    </div>
</div>
<div class="cast_team_cont_btm vips selections-single background-red-color white-color">
    <h2>{$languageContent.borderfield.profile.title}</h2>
    {include file='borderfield/add_selection.tpl'}
</div>
<div class="top_links_pop mobile white-color">
    <a class="set_card background-black-color button" target="_blank" href="/api/pdf/get?id={$model['model_id']}"> {$languageContent.borderfield.profile.pdf_button} </a>
</div>
<section class="main1 clearfix">
    <div class="modal-info">
        <div class="modal_dtls_popup_rht">
            <div class="model-characteristics">
                {*<div class="model-trait-title"><div class="measurements-title">{$languageContent.borderfield.profile.measurements} :</div></div>*}
                <ul class="model-traits">
                    {if $model['lengte'] neq '' and $model['lengte'] != 0}<li> <span>{$languageContent.borderfield.parameters.length}</span> <span>{$model['lengte']|lower}</span> </li>{/if}
                    {if $model['maten_taille'] neq '' and $model['maten_taille'] != 0}<li> <span>{$languageContent.borderfield.parameters.taille}</span> <span>{$model['maten_taille']|lower}</span> </li>{/if}
                    {if $model['maten_kostuum'] neq '' and $model['maten_kostuum'] != 0}<li> <span>{$languageContent.borderfield.parameters.costum}</span> <span>{$model['maten_kostuum']|lower}</span> </li>{/if}
                    {if $model['maten_schoenen'] neq '' and $model['maten_schoenen'] != 0}<li> <span>{$languageContent.borderfield.parameters.shoes}</span> <span>{$model['maten_schoenen']|lower}</span> </li>{/if}
                    {if $model['nieuw_kind_maat_min'] neq '' and $model['nieuw_kind_maat_min'] != 0}<li> <span>{$languageContent.borderfield.parameters.kinder}</span> <span>{$model['nieuw_kind_maat_min']|lower} - {$model['nieuw_kind_maat_max']|lower}</span> </li>{/if}
                    {if $model['int_maat'] neq '' and $model['int_maat'] != 0}<li> <span>{$languageContent.borderfield.parameters.int_size}</span> <span>{$model['int_maat']|lower}</span> </li>{/if}
                    {if $model['maten_cup'] neq '' and $model['maten_cup'] != 0}<li> <span>{$languageContent.borderfield.parameters.cup_size}</span> <span>{$model['maten_cup']|lower} {$model['maten_cup_letter']|lower}</span> </li>{/if}
                    {if $model['maten_borst'] neq '' and $model['maten_borst'] != 0}<li> <span>{$languageContent.borderfield.parameters.burst}</span> <span>{$model['maten_borst']|lower}</span> </li>{/if}
                    {if $model['maten_heupen'] neq '' and $model['maten_heupen'] != 0}<li> <span>{$languageContent.borderfield.parameters.hips}</span> <span>{$model['maten_heupen']|lower}</span> </li>{/if}
                    {if $model['maten_jeans'] neq '' and $model['maten_jeans'] != 0}<li> <span>{$languageContent.borderfield.parameters.jeans}</span> <span>{$model['maten_jeans']|lower}</span> </li>{/if}
                </ul>
            </div>
            {*<div class="model-characteristics">
                <div class="model-trait-title"><div class="measurements-title">{$languageContent.borderfield.profile.description} :</div></div>
                <ul class="model-traits">
                    {if $model['land'] neq '' and $model['land'] neq '0'}<li> <span>{$taalContent['parameters']['country']|lower} </span> <span>{$model['land']|lower}</span> </li>{/if}
                    {if isset($model['info']['huidskleur'])}<li> <span>{$taalContent['parameters']['skin_color']|lower} </span> <span>{$taalContent['registration']['fields'][$model['info']['huidskleur'][0]['name']|replace:'#':''|lower]|lower}</span> </li>{/if}
                    {if isset($model['info']['ogen'])}<li> <span>{$taalContent['parameters']['eyes']|lower} </span> <span>{$taalContent['registration']['fields'][$model['info']['ogen'][0]['name']|replace:'#':''|replace:'Ogen':''|lower]|lower}</span> </li>{/if}
                    {if isset($model['info']['haarkleur'])}<li> <span>{$taalContent['parameters']['hair_color']|lower} </span> <span>{$taalContent['registration']['fields'][$model['info']['haarkleur'][0]['name']|replace:'#':''|lower]|replace:'Haar':''|lower}</span> </li>{/if}
                    {if isset($model['info']['haar'])}<li> <span>{$taalContent['parameters']['hair_type']|lower} </span> <span>{$taalContent['registration']['fields'][$model['info']['haar'][0]['name']|replace:'#':''|lower]|replace:'Haar':''|lower}</span> </li>{/if}
                    {if isset($model['info']['haarlengte'])}<li> <span>{$taalContent['parameters']['hair_length']|lower} </span> <span>{$taalContent['registration']['fields'][$model['info']['haarlengte'][0]['name']|replace:'#':''|lower]|replace:'Haar':''|lower}</span> </li>{/if}
                </ul>
            </div>*}
        </div>
        <!--<div class="modal-inst">
            <div class="modal-inst-top">
                <span>11k</span>
                <i class="fab fa-instagram"></i>
            </div>
            <p>Ask us about our influencers</p>
        </div>-->
    </div>
    <div class="model-photos">
        {assign var=model_id value=$model['model_id']}
        {foreach from=$siteImages key=i item=image}
            <div class="photo-item">
                <a class="fancybox_image" href="/models/{$model['model_id']}/website/middle/{$image.id}.jpg" title="copyright" rel="model_group">
                    <img alt="{$model['voornaam']} ({$model['model_id']})" src="/models/{$model['model_id']}/website/middle/{$image.id}.jpg" class="animate fade-in">
                </a>
            </div>
            {if $siteImages|@count gt 9 and $i eq 8 or $siteImages|@count le 9 and $i eq ($siteImages|@count - 1)}
                <div class="model-photos-info">
                    <p>Would you like to book {$model['voornaam']}?</p>
                    <p>Call us at <a href="tel:32033037211">+32 (0) 3 303 72 11</a></p>
                    <p>or drop us a message at <a href="mailto:info@bordermodels.com">info@bordermodels.com</a></p>
                </div>
            {/if}
        {/foreach}
    </div>

    {if isset($model['videos'][0])}
        <div class="video-block">
            <div class="model-videos">
                {foreach from=$model['videos'] key=number item=video}
                    <div class="model-video">
                        <iframe width="500" height="281" frameborder="0" allowfullscreen="" src="{$video['host']}{$video['code']}"></iframe>
                    </div>
                {/foreach}
            </div>
        </div>
    {/if}
    <!--<div class="model-photos-info">
        <p>Did you know we also have... </p>
    </div>-->
    <div class="model-photos-info">
        <p>Need hair and make up artists? We have those too! <a href="mailto:info@bordermodels.com">Ask us.</a></p>
    </div>
</section>
