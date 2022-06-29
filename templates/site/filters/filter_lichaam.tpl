<li class='m-result shadow-effect content-focus {if $filters['lichaam']['active'] eq true} active{/if}' id='lichaam_filter'>
  <header>
    <h5 data-collapse='m-collapse' data-target='#content-19'><span class="icon"></span>{$taalContent['filters']['body']}</h5>
  </header>
  <div class='m-collapse' id='content-19' style="display:{if $filters['lichaam']['active'] eq true} block{else}none{/if};"  ><span class="custom_filter">
    {foreach from=$lichaam_filter item=filter}
    <span class="custom_filter_sub">
      <label><input  type="checkbox" name="lichaam_filter"  value="{$filter['category_id']}"> <span class="lbl padding-8">{$taalContent['registration']['fields'][$filter['name']|replace:'lichaam ':''|trim|lower]}</span></label>
    </span>
      {/foreach}
    </span>
  </div>
</li>