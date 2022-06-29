<li class='m-result shadow-effect content-focus {if $filters['kledingmaten']['active'] eq true} active{/if}' id='kledingmaten'>
  <header>
    <h5 data-collapse='m-collapse' data-target='#content-15'><span class="icon"></span>{$taalContent['filters']['cloth_sizes']}</h5>
  </header>
  <div class='m-collapse' id='content-15'  style="display: {if $filters['kledingmaten']['active'] eq true} block{else}none{/if};">
    <div class="filter_group">
      <p>{$taalContent['filters']['jeans']} ({$taalContent['filters']['from']} - {$taalContent['filters']['to']})</p>
      <label class="label">
        <select id='jeans_size_start' name='jeans_start' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=22 to 43}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
      -
      <label class="label">
        <select id='jeans_size_end' name='jeans_end' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=22 to 43}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
    </div>
    <div class="filter_group">
      <p>{$taalContent['filters']['size']} ({$taalContent['filters']['from']} - {$taalContent['filters']['to']})</p>
      <label class="label">
        <select id='clothing_size_start' name='kleding_start' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=30 to 60}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
      -
      <label class="label">
        <select id='clothing_size_end' name='kleding_end' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=30 to 60}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
    </div>
    <div class="filter_group">
      <p>{$taalContent['filters']['shoes']} ({$taalContent['filters']['from']} - {$taalContent['filters']['to']})</p>
      <label class="label">
        <select id='shoe_size_start' name="schoenmaat_start" class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=4 to 50}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
      -
      <label class="label">
        <select id='shoe_size_end' name="schoenmaat_end" class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=4 to 50}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
    </div>
    {if $smarty.get.category!=204}
    <div class="filter_group">
      <p>{$taalContent['filters']['costume']} ({$taalContent['filters']['from']} - {$taalContent['filters']['to']})</p>
      <label class="label">
        <select id='costum_size_start' name='kostuum_start' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=30 to 60 step 2}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
      -
      <label class="label">
        <select id='costum_size_end' name='kostuum_end' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=30 to 60 step 2}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
    </div>
    {/if}
    <div class="filter_group">
      <p>{$taalContent['filters']['cup']}</p>
      <label class="label">
        <select id='cup_size_letter' name='cup_letter' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          <option value="AA">AA</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          <option value="DD">DD</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="G">G</option>
        </select>
      </label>
    </div>
    <div class="filter_group">
      <p>{$taalContent['filters']['cup']} ({$taalContent['filters']['from']} - {$taalContent['filters']['to']})</p>
      <label class="label">
        <select id='cup_size_start' name='cup_start' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=60 to 130 step 5}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
      -
      <label class="label">
        <select id='cup_size_end' name='cup_end' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=60 to 130 step 5}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
    </div>
    {if $smarty.get.category==204}
    <div class="filter_group">
      <p>{$taalContent['filters']['kinder']} ({$taalContent['filters']['from']} - {$taalContent['filters']['to']})</p>
      <label class="label">
        <select id="kinder_start" name='kinder_start' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=50 to 188 step 6}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
      -
      <label class="label">
        <select id="kinder_end" name='kinder_end' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=50 to 188 step 6}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
    </div>
    {/if}
    <div class="filter_group">
      <p>{$taalContent['filters']['int_size']}</p>
      <label class="label">
        <select id='int_maat' name='int_maat' class='filter'>
          <option value="">{$taalContent['filters']['choose']}</option>
          <option value="XXS">XSS</option>
          <option value="XS">XS</option>
          <option value="S">S</option>
          <option value="M">M</option>
          <option value="L">L</option>
          <option value="XL">XL</option>
          <option value="XXL">XXL</option>
          <option value="3XL">3XL</option>
          <option value="4XL">4XL</option>
          <option value="5XL">5XL</option>
        </select>
      </label>
    </div>
  </div>
</li>