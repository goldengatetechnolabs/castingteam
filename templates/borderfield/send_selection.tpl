<div id="send_selection_form_email" class="cast_team_cont_btm vips mod_inner1 background-red-color white-color {if isset($smarty.get.form)}dsp_block{/if}">
    <h2>{$languageContent.borderfield.form.title}</h2>
    <div class="team_data">
        <div class="field_wrap">
            <label>{$languageContent.borderfield.form.name}</label>
            <div class="field_wrap_inp">
                <input id="name" type="text" value="{if isset($user)}{$user['name']}{/if}"/>
            </div>
        </div>
        <div class="field_wrap">
            <label>{$languageContent.borderfield.form.email}</label>
            <div class="field_wrap_inp">
                <input id="email_from" type="email" value="{if isset($user)}{$user['email']}{/if}" />
            </div>
        </div>
        <div class="field_wrap">
            <label>{$languageContent.borderfield.form.email_to}</label>
            <div class="field_wrap_inp">
                <input id="email_to"  type="email" value=""/>
            </div>
        </div>
        <div class="field_wrap field_txt">
            <label>{$languageContent.borderfield.form.comment}</label>
            <div class="field_wrap_inp">
                <textarea id="comment" rows="5" cols="20"></textarea>
            </div>
        </div>
        <div class="field_wrap">
            <label></label>
            <div class="field_wrap_inp button-wrapper">
                <button id="send_selection_submit" class="background-black-color">{$languageContent.borderfield.form.send}</button>
                <span class="tooltip">{$languageContent.borderfield.form.mandatory}</span>
            </div>
        </div>
    </div>
</div>