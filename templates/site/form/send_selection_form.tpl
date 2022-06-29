<div id="send_selection_form_email" class="cast_team_cont_btm vips mod_inner1 {if isset($smarty.get.form)}dsp_block{/if}">
    <h2>{$taalContent['selection']['send_button']|upper}</h2>
    <div class="team_data">
        <div class="field_wrap">
            <label>{$taalContent['form']['surname']}</label>
            <div class="field_wrap_inp">
                <input id="name" type="text" value="{if isset($user)}{$user['name']}{/if}"/>
            </div>
        </div>
        <div class="field_wrap">
            <label>{$taalContent['form']['email_address']}</label>
            <div class="field_wrap_inp">
                <input id="email_from" type="email" value="{if isset($user)}{$user['email']}{/if}" />
            </div>
        </div>
        <div class="field_wrap">
            <label>{$taalContent['form']['email_address_reciever']}</label>
            <div class="field_wrap_inp">
                <input id="email_to"  type="email" value=""/>
            </div>
        </div>
        <div class="field_wrap field_txt">
            <label>{$taalContent['form']['comment']}</label>
            <div class="field_wrap_inp">
                <textarea id="comment" rows="5" cols="20"></textarea>
            </div>
        </div>
        <div class="field_wrap">
            <label></label>
            <div class="field_wrap_inp">
                <button id="send_selection_submit">{$taalContent['form']['button']}</button>
                <span>{$taalContent['form']['tooltip']}</span>
            </div>
        </div>
    </div>
</div>