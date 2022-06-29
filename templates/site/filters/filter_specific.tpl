<li class='m-result shadow-effect content-focus {if $filters['specific']['active'] eq true} active{/if}' id='specific'>
    <header>
        <h5 data-collapse='m-collapse' data-target='#content-7'><span class="icon"></span>{$taalContent['filters']['specific']}</h5>
    </header>
    <div class='m-collapse' id='content-7' style="display: {if $filters['specific']['active'] eq true} block{else}none{/if};">
        <span class="custom_filter">
            {foreach from=$groups item=group}
                {if isset($filters['specific']['filter_options'][$group['id']])}
                    <span class="custom_filter_sub">
                        <label><input  type="checkbox" name="specific"  value="{$group['id']}"> <span class="lbl padding-8">{$group['naam']}</span></label>
                    </span>
                {/if}
            {/foreach}
        </span>
    </div>
</li>