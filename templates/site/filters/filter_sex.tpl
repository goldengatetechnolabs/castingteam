<h4>{$taalContent['filters']['refine']}</h4>
    <ul id='sex'>
      <li>
        <label>
          <input type="checkbox" name='sex' value='M'>
          <span class="lbl padding-8">{if $current_category eq '204'}{$taalContent['filters']['boy']}{else}{$taalContent['filters']['man']}{/if}</span>
        </label>
      </li>
      <li>
        <label>
          <input type="checkbox" name='sex' value='V'>
            <span class="lbl padding-8">{if $current_category eq '204'}{$taalContent['filters']['girl']}{else}{$taalContent['filters']['woman']}{/if}</span>
        </label>
      </li>
    </ul>