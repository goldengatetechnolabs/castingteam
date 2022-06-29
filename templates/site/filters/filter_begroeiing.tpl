<li class='m-result shadow-effect content-focus {if $filters['begroeiing']['active'] eq true} active{/if}' id='begroeiing_filter'>
  <header>
    <h5 data-collapse='m-collapse' data-target='#content-16'><span class="icon"></span>{$taalContent['filters']['vegetation']}</h5>
  </header>
  <div class='m-collapse' id='content-16' style="display:{if $filters['begroeiing']['active'] eq true} block{else}none{/if};"  ><span class="custom_filter">
    {foreach from=$begroeiing_filter item=filter}
    <span class="custom_filter_sub">
      <label><input  type="checkbox" name="begroeiing_filter"  value="{$filter['category_id']}"> <span class="lbl padding-8">{$taalContent['registration']['fields'][$filter['name']|replace:'begroeing':''|lower|trim]}</span></label></span>
      {/foreach}
    </span>
  </div>
</li>