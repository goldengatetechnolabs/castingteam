<li class='m-result shadow-effect content-focus {if $filters['length']['active'] eq true} active{/if}' id='length'>
  <header>
    <h5 data-collapse='m-collapse' data-target='#content-13' ><span class="icon"></span>{$taalContent['filters']['length']}</h5>
  </header>
  <div class='m-collapse' id='content-13' style="display: {if $filters['length']['active'] eq true} block{else}none{/if};">
    <span class="custom_filter">
      <span class="custom_filter_sub">
        <label>
          <input type="checkbox" value="1" name="length">
          <span class="lbl padding-8">{$taalContent['filters']['less_than']} 1m74</span>
        </label>
      </span>
      <span class="custom_filter_sub">
        <label>
          <input type="checkbox" value="2" name="length">
          <span class="lbl padding-8">1m74 {$taalContent['filters']['to']} 1m80</span>
        </label>
      </span>
      <span class="custom_filter_sub">
        <label>
          <input type="checkbox" value="3" name="length">
          <span class="lbl padding-8">+ 1m80</span>
        </label>
      </span>
    </span>
  </div>
</li>