<div class="team_data">
    <div class="field_wrap">
        <label for="selection_name">{$languageContent.borderfield.selection.new}</label>
        <div class="field_wrap_inp">
            <input type="text"  name="selection_name" id="selection_name" value=""  maxlength="50"/>
        </div>
    </div>
    {if isset($selections)}
        <div class="field_wrap">
            <label for="selection_select">{$languageContent.borderfield.selection.add}</label>
            <div class="field_wrap_inp">
                <div class="field_wrap_inp_sel">
                    <select  name="selection" id="selection_select" >
                        <option value="">{$languageContent.borderfield.selection.saved}</option>
                        {foreach from=$selections item=selection}
                            <option value="{$selection->getId()}">{$selection->getName()}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
        </div>
    {/if}
    <div class="field_wrap">
        <label for="add_selection"></label>
        <div class="field_wrap_inp button-wrapper">
            <button data-id="{$model['model_id']}" id="add_selection" class="background-black-color">{$languageContent.borderfield.selection.save}</button>
            <span class="tooltip">{$languageContent.borderfield.selection.mandatory}</span>
        </div>
    </div>
</div>