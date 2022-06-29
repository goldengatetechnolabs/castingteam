<li class='m-result shadow-effect content-focus {if $filters['age']['active'] eq true} active{/if}' id='age'>
    <header>
        <h5 data-collapse='m-collapse' data-target='#content-5'><span class="icon"></span>{$taalContent['filters']['age']}</h5>
    </header>
    <div class='m-collapse' id='content-5' style="display: {if $filters['age']['active'] eq true} block{else}none{/if};"><span class="custom_filter">
            {if isset($filters['age']['filter_options']['14'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="14" name="age">
                        <span class="lbl padding-8">0 {$taalContent['filters']['to']} 5 {$taalContent['filters']['year']}</span>
                    </label>
                </span>
            {/if}
            {if isset($filters['age']['filter_options']['13'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="13" name="age">
                        <span class="lbl padding-8">5 {$taalContent['filters']['to']} 8 {$taalContent['filters']['year']}</span>
                    </label>
                </span>
            {/if}
            {if isset($filters['age']['filter_options']['12'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="12" name="age">
                        <span class="lbl padding-8">8 {$taalContent['filters']['to']} 11 {$taalContent['filters']['year']}</span>
                    </label>
                </span>
            {/if}
            {if isset($filters['age']['filter_options']['10'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="10" name="age">
                        <span class="lbl padding-8">12 {$taalContent['filters']['to']} 14 {$taalContent['filters']['year']}</span> </label>
                </span>
            {/if}
            {if isset($filters['age']['filter_options']['5'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="5" name="age">
                        <span class="lbl padding-8">12 {$taalContent['filters']['to']} 18 {$taalContent['filters']['year']}</span> </label>
                </span>
            {/if}
            {if isset($filters['age']['filter_options']['11'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="11" name="age">
                        <span class="lbl padding-8">15 {$taalContent['filters']['to']} 17 {$taalContent['filters']['year']}</span> </label>
                </span>
            {/if}
            {if isset($filters['age']['filter_options']['1'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="1" name="age">
                        <span class="lbl padding-8" >18 {$taalContent['filters']['to']} 25 {$taalContent['filters']['year']}</span> </label>
                </span>
            {/if}
            {if isset($filters['age']['filter_options']['2'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="2" name="age">
                        <span class="lbl padding-8">25 {$taalContent['filters']['to']} 35 {$taalContent['filters']['year']}</span> </label>
                </span> 
            {/if}
            {if isset($filters['age']['filter_options']['3'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="3" name="age">
                        {if $current_category==202}
                            <span class="lbl padding-8">+36</span> </label>
                        {else}
                            <span class="lbl padding-8">35 {$taalContent['filters']['to']} 55 {$taalContent['filters']['year']}</span> </label>
                        {/if}
                        
                </span> 
            {/if}
            {if isset($filters['age']['filter_options']['16'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="16" name="age">
                        <span class="lbl padding-8">35 {$taalContent['filters']['to']} 45 {$taalContent['filters']['year']}</span> </label>
                </span>
            {/if}
            {if isset($filters['age']['filter_options']['15'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="15" name="age">
                        <span class="lbl padding-8">45 {$taalContent['filters']['to']} 55 {$taalContent['filters']['year']}</span> </label>
                </span>
            {/if}
            {if isset($filters['age']['filter_options']['4'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="4" name="age">
                        <span class="lbl padding-8">+55</span> </label>
                </span>
            {/if}
            {if isset($filters['age']['filter_options']['6'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="6" name="age">
                        <span class="lbl padding-8">55 {$taalContent['filters']['to']} 65 {$taalContent['filters']['year']}</span> </label>
                </span>
            {/if}
            {if isset($filters['age']['filter_options']['7'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="7" name="age">
                        <span class="lbl padding-8">65 {$taalContent['filters']['to']} 75 {$taalContent['filters']['year']}</span> </label>
                </span>
            {/if}
            {if isset($filters['age']['filter_options']['8'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="8" name="age">
                        <span class="lbl padding-8">75 {$taalContent['filters']['to']} 85 {$taalContent['filters']['year']}</span> </label>
                </span>
            {/if}
            {if isset($filters['age']['filter_options']['9'])}
                <span class="custom_filter_sub">
                    <label>
                        <input type="checkbox" value="9" name="age">
                        <span class="lbl padding-8">+85</span> </label>
                </span>
            {/if}
        </span>
    </div>
</li>