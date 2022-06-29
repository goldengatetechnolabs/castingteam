<li class='m-result shadow-effect content-focus {if $filters['hair_filter']['active'] eq true} active{/if}' id='hair_filter'>
  <header>
    <h5 data-collapse='m-collapse' data-target='#content-12'><span class="icon"></span>{$taalContent['filters']['hair']}</h5>
  </header>
  <div class='m-collapse' id='content-12' style="display:{if $filters['hair_filter']['active'] eq true} block{else}none{/if};"  ><span class="custom_filter">
    {foreach from=$hair_filter item=filter}
    <span class="custom_filter_sub">
      <label><input  type="checkbox" name="hair_filter"  value="{$filter['category_id']}"> <span class="lbl padding-8">{$taalContent['registration']['fields'][$filter['name']|replace:'#':''|lower]}</span></label></span>
      {/foreach}
    </span>
  </div>
</li>