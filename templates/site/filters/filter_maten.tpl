<li class='m-result shadow-effect content-focus {if $filters['maten']['active'] eq true} active{/if}' id='maten'>
  <header>
    <h5 data-collapse='m-collapse' data-target='#content-14'><span class="icon"></span>{$taalContent['filters']['sizes']}</h5>
  </header>
  <div class='m-collapse' id='content-14'  style="display: {if $filters['maten']['active'] eq true} block{else}none{/if};">
    <div class="filter_group">
      <p>{$taalContent['filters']['bust']} ({$taalContent['filters']['from']} - {$taalContent['filters']['to']})</p>
      <label class="label">
        <select id='bust_start' name='borst_start' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=50 to 120}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
      -
      <label class="label">
        <select id='bust_end' name='borst_end' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=50 to 120}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
    </div>
    <div class="filter_group">
      <p>{$taalContent['filters']['waist']} ({$taalContent['filters']['from']} - {$taalContent['filters']['to']})</p>
      <label class="label">
        <select id='waist_start' name='taille_start' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=40 to 130}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
      -
      <label class="label">
        <select id='waist_end' name='taille_end' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=40 to 130}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
    </div>
    <div class="filter_group">
      <p>{$taalContent['filters']['hips']} ({$taalContent['filters']['from']} - {$taalContent['filters']['to']})</p>
      <label class="label">
        <select id="hips_start" name='heupen_start' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=50 to 130}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
      -
      <label class="label">
        <select id="hips_end" name='heupen_end' class='filter'>
          <option value="" selected>{$taalContent['filters']['choose']}</option>
          {for $param=50 to 130}
          <option value="{$param}">{$param}</option>
          {/for}
        </select>
      </label>
    </div>
  </div>
</li>