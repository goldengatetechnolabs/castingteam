<li class='m-result shadow-effect content-focus {if $filters['hair_color_filter']['active'] eq true} active{/if}' id='hair_color_filter'>
    <header>
        <h5 data-collapse='m-collapse' data-target='#content-10'><span class="icon"></span>{$taalContent['filters']['hair_color']}</h5>
    </header>
    <div class='m-collapse' id='content-10' style="display: {if $filters['hair_color_filter']['active'] eq true} block{else}none{/if};">
        <span class="custom_filter">
              {foreach from=$hair_color_filter item=filter}
                  <span class="custom_filter_sub">
                      <label>
                          <input  type="checkbox" name="hair_color_filter"  value="{$filter['category_id']}">
                          <span class="lbl padding-8">{$taalContent['registration']['fields'][$filter['name']|replace:'#':''|lower]}</span>
                      </label>
                  </span>
              {/foreach} 
        </span>
    </div>
</li>