<li class='m-result shadow-effect content-focus {if $filters['cat']['active'] eq true} active{/if}' id='cat'>
    <header>
        <h5 data-collapse='m-collapse' data-target='#content-6'><span class="icon"></span>{$taalContent['filters']['category']}</h5>
    </header>
    <div class='m-collapse' id='content-6' style="display: {if $filters['cat']['active'] eq true} block{else}none{/if};">
        <span class="custom_filter">
            <span class="custom_filter_sub">
                <label>
                    <input type="checkbox" value="0" name="cat">
                    <span class="lbl padding-8">Cat. 1</span>
                </label>
            </span> <span class="custom_filter_sub" >
                <label>
                    <input type="checkbox" value="1" name="cat">
                    <span class="lbl padding-8">Cat. 2</span>
                </label>
            </span>
        </span>
    </div>
</li>