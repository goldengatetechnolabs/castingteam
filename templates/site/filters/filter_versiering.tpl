<li class='m-result shadow-effect content-focus {if $filters['versiering']['active'] eq true} active{/if}' id='versiering_filter'>
  <header>
    <h5 data-collapse='m-collapse' data-target='#content-17'><span class="icon"></span>{$taalContent['filters']['decoration']}</h5>
  </header>
  <div class='m-collapse' id='content-17' style="display:{if $filters['versiering']['active'] eq true} block{else}none{/if};"  ><span class="custom_filter">
    {foreach from=$versiering_filter item=filter}
    <span class="custom_filter_sub">
      <label><input  type="checkbox" name="versiering_filter"  value="{$filter['category_id']}"> <span class="lbl padding-8">{$taalContent['registration']['fields'][$filter['name']|replace:'versiering':''|trim|lower]}</span></label></span>
      {/foreach}
    </span>
  </div>
</li>