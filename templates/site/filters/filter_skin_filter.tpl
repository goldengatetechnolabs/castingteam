 <li class='m-result shadow-effect content-focus {if $filters['skin_filter']['active'] eq true} active{/if}' id='skin_filter'>
     <header>
         <h5 data-collapse='m-collapse' data-target='#content-9'><span class="icon"></span>{$taalContent['filters']['skin']}</h5>
     </header>
     <div class='m-collapse' id='content-9' style="display: {if $filters['skin_filter']['active'] eq true} block{else}none{/if};">
         <span class="custom_filter">
             {foreach from=$skin_filter item=filter}
                 <span class="custom_filter_sub">
                     <label><input  type="checkbox" name="skin_filter"  value="{$filter['category_id']}"> <span class="lbl padding-8">{$taalContent['registration']['fields'][$filter['codename']]}
                         </span>
                     </label>
                 </span>
              {/foreach}
         </span>
     </div>
</li>