<header class="page_header">
    <div class="modal-title page_title">
        <h1>{$model['voornaam']}</h1><span> - (Ref. {$model['model_id']})</span>
    </div>
    <div class="modal-buttons model-single-block">
        <a data-featherlight="#data2" data-featherlight-variant="fixwidth" href="#"></a>
        <div class="top_links_pop">
            <a data-featherlight="#data2" data-featherlight-variant="fixwidth" href="#"></a>
            {*{if !isset($user)}
                <a class="link_to_vip" href="/{$taal}/vip"><i class="fa fa-shield"></i>{$taalContent['links']['vip']}</a>
            {/if}*}
            <a class="set_card" target="_blank" href="/api/pdf/get?id={$model['model_id']}">
                <i class="fa fa-file-pdf-o"></i>
                {$taalContent['model']['pdf_button']}
            </a>
            <a class="voeg_card" href="#">
                <i class="fa fa-heart"></i>
                {$taalContent['model']['selection_button']}
            </a>
        </div>
    </div>
</header>
<div class="cast_team_cont_btm vips selections-single">
    <h2>{$taalContent['model']['title']}</h2>
    <div class="delete-add-selection" style="color:#fff;" >{include file='site/add_selection.tpl'}</div>
</div>
<section class="main1 clearfix">
    <div class="modal_dtls_popup_rht">
        <h5>{$taalContent['model']['subtitle_1']}</h5>
        <ul>
            {if $model['lengte'] neq '' and $model['lengte'] != 0}<li> <span>{$taalContent['parameters']['length']} :</span> <span>{$model['lengte']}</span> </li>{/if}
            {if $model['maten_borst'] neq '' and $model['maten_borst'] != 0}<li> <span>{$taalContent['parameters']['burst']} :</span> <span>{$model['maten_borst']}</span> </li>{/if}
            {if $model['maten_taille'] neq '' and $model['maten_taille'] != 0}<li> <span>{$taalContent['parameters']['taille']} :</span> <span>{$model['maten_taille']}</span> </li>{/if}
            {if $model['maten_heupen'] neq '' and $model['maten_heupen'] != 0}<li> <span>{$taalContent['parameters']['hips']} :</span> <span>{$model['maten_heupen']}</span> </li>{/if}
            {if $model['maten_kostuum'] neq '' and $model['maten_kostuum'] != 0}<li> <span>{$taalContent['parameters']['costum']} :</span> <span>{$model['maten_kostuum']}</span> </li>{/if}
            {if $model['maten_jeans'] neq '' and $model['maten_jeans'] != 0}<li> <span>{$taalContent['parameters']['jeans']} :</span> <span>{$model['maten_jeans']}</span> </li>{/if}
            {if $model['maten_schoenen'] neq '' and $model['maten_schoenen'] != 0}<li> <span>{$taalContent['parameters']['shoes']} :</span> <span>{$model['maten_schoenen']}</span> </li>{/if}
            {if $model['nieuw_kind_maat_min'] neq '' and $model['nieuw_kind_maat_min'] != 0}<li> <span>{$taalContent['parameters']['kinder']} :</span> <span>{$model['nieuw_kind_maat_min']} - {$model['nieuw_kind_maat_max']}</span> </li>{/if}
            {if $model['int_maat'] neq '' and $model['int_maat'] != 0}<li> <span>{$taalContent['parameters']['int_size']} :</span> <span>{$model['int_maat']}</span> </li>{/if}
            {if $model['maten_cup'] neq '' and $model['maten_cup'] != 0}<li> <span>{$taalContent['parameters']['cup_size']} :</span> <span>{$model['maten_cup']} {$model['maten_cup_letter']}</span> </li>{/if}
        </ul>
        <h5>{$taalContent['model']['subtitle_2']}</h5>
        <ul>
            {if $model['land'] neq '' and $model['land'] neq '0'}<li> <span>{$taalContent['parameters']['country']} :</span> <span>{$model['land']}</span> </li>{/if}
            {if isset($model['info']['huidskleur'])}<li> <span>{$taalContent['parameters']['skin_color']} :</span> <span>{$taalContent['registration']['fields'][$model['info']['huidskleur'][0]['name']|replace:'#':''|lower]}</span> </li>{/if}
            {if isset($model['info']['ogen'])}<li> <span>{$taalContent['parameters']['eyes']} :</span> <span>{$taalContent['registration']['fields'][$model['info']['ogen'][0]['name']|replace:'#':''|replace:'Ogen':''|lower]}</span> </li>{/if}
            {if isset($model['info']['haarkleur'])}<li> <span>{$taalContent['parameters']['hair_color']} :</span> <span>{$taalContent['registration']['fields'][$model['info']['haarkleur'][0]['name']|replace:'#':''|lower]|replace:'Haar':''}</span> </li>{/if}
            {if isset($model['info']['haar'])}<li> <span>{$taalContent['parameters']['hair_type']} :</span> <span>{$taalContent['registration']['fields'][$model['info']['haar'][0]['name']|replace:'#':''|lower]|replace:'Haar':''}</span> </li>{/if}
            {if isset($model['info']['haarlengte'])}<li> <span>{$taalContent['parameters']['hair_length']} :</span> <span>{$taalContent['registration']['fields'][$model['info']['haarlengte'][0]['name']|replace:'#':''|lower]|replace:'Haar':''}</span> </li>{/if}
        </ul>
        <h5>{$taalContent['model']['subtitle_3']}</h5>
        <ul class="experience">
            {if isset($model['info']['ervaring'])}
                {foreach from=$model['info']['ervaring'] key=number item=ervaring}
                    <li>
                        <span>
                            {if $ervaring['name']=='##Acteerervaringreklame##'}
                                {$number+1} : {$taalContent['parameters']['experience']}
                            {else}
                                {$number+1} : {$ervaring['name']|replace:'#':''}
                            {/if}
                        </span>
                    </li>
                {/foreach}
            {/if}
        </ul>
        <a class="share_fb" href="javascript:fbShare('https://{$smarty.server.HTTP_HOST}/{$taal}/people/{$model['model_id']}', '{$model['voornaam']} bij Castingteam', '{$taalContent['facebook']['share']}', 575, 700)"><i class="fa fa-facebook" aria-hidden="true"></i> {$taalContent['model']['facebook']}</a>
    </div>
    <div class="content_sec_1 pad_none">
        <ul id="got-gridbox" class="pad-none-vert">
            {assign var=model_id value=$model['model_id']}
            {foreach from=$model['images'] item=image}
                {assign var=image_src_domain value=$image['src_domain']}
                {if $image_id eq 'no_foto' or $image_id eq ''}
                    {assign var="foto_path" value="/models/no_foto.jpg"}
                    {assign var="foto_path_big" value="/models/no_foto.jpg"}
                {else}
                    {assign var="foto_path" value="$image_src_domain/models/$model_id/website/thumbs/$image_id.jpg"}
                    {assign var="foto_path_big" value="$image_src_domain/models/$model_id/website/middle/$image_id.jpg"}
                {/if}
                <li class="masonry-item">
                    <a {if $image['big']} class="fancybox_image" href="{$foto_path_big}" {if !isset($user)}title="copyright"{/if} rel="model_group"{/if} >{if $image['big']}<span class="zoom_pop"><i class="fa fa-search"></i></span>{/if}<img width="228" height="350" alt="{$model['voornaam']} ({$model['model_id']})" src="{$foto_path}" class="animate fade-in"></a>
                </li>
            {/foreach}
        </ul>
    </div>
    {if isset($model['videos'][0])}
        <div class="video_poppup video-block">
            <div class="model-videos">
                {foreach from=$model['videos'] key=number item=video}
                    <div class="model-video">
                        <iframe width="500" height="281" frameborder="0" allowfullscreen="" src="{$video['host']}{$video['code']}"></iframe>
                    </div>
                {/foreach}
            </div>
        </div>
    {/if}
</section>
<i class="clear_0"></i>
