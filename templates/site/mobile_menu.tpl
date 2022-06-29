<div class="mobile_menu side_top_links">
    <ul>
      {foreach from=$categories key=k item=category}
          <li   data-id="{$category['category_id']}"><a href="/{$taal}/{$taalContent['navigation'][$category['codename']]}/">{$taalContent['categories'][$category['category_id']]}</a> </li>
      {/foreach}
      <li class="side_search"> {include file='site/search.tpl'}</li>
      {if isset($selection_count)}<li class="reting_items_mobile"><a href="/{$taal}/selection" > <i class="fa fa-heart"></i>{$taalContent['people']['selection_count']} ({$selection_count}) </a></li>{/if}
    </ul>
 </div>