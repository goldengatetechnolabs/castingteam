<li class='m-result shadow-effect content-focus {if $filters['kleur_ogen']['active'] eq true} active{/if}' id='kleur_ogen_filter'>
  <header>
    <h5 data-collapse='m-collapse' data-target='#content-18'><span class="icon"></span>{$taalContent['filters']['eyes_color']}</h5>
  </header>
  <div class='m-collapse' id='content-18' style="display:{if $filters['kleur_ogen']['active'] eq true} block{else}none{/if};"  ><span class="custom_filter">
    {foreach from=$kleur_ogen_filter item=filter}
    <span class="custom_filter_sub">
      <label><input  type="checkbox" name="kleur_ogen_filter"  value="{$filter['category_id']}"> <span class="lbl padding-8">{$taalContent['registration']['fields'][$filter['name']|replace:'Ogen':''|replace:'#':''|lower]}</span></label></span>
      {/foreach}
    </span>
  </div>
</li>