<div class="team_data">
     <div class="field_wrap">
          <label>{$taalContent['add_selection']['field_1']}</label>
          <div class="field_wrap_inp">
               <input type="text"  name="selection_name" id="selection_name" value=""  maxlength="50"/>
          </div>
     </div>
     {if isset($selections)}
    <div class="field_wrap">
      <label>{$taalContent['add_selection']['field_2']}</label>
        <div class="field_wrap_inp">
          <div class="field_wrap_inp_sel">
            <select  name="selection" id="selection_select">
            <option value="">{$taalContent['add_selection']['option']}</option>
            {foreach from=$selections item=selection}
              <option value="{$selection->getId()}">{$selection->getName()}</option>
              {/foreach}
            </select>
            </div>
        </div>
      </div>
      {/if}
    <div class="field_wrap">
      <label></label>
      <div class="field_wrap_inp">
          <button data-id="{$model['model_id']}" id="add_selection" class="add-selection-tnb" >{$taalContent['add_selection']['button']}</button>
          <span>{$taalContent['add_selection']['tooltip']}</span>
      </div>
    </div>
    {if !isset($user)}
        <div class="add_selection_bottom">
            <p>{$taalContent['add_selection']['p_1']} <span class="underlined_text"><a class="white_text" href="/{$taal}/vip/"> {$taalContent['add_selection']['a']}</a></span>{$taalContent['add_selection']['p_2']}</p>
        </div>
    {/if}
</div>