<div class="field_wrap">
    <label>{$taalContent['form']['name']}</label>
    <div class="field_wrap_inp">
        <input type="text"  name="name" id="name" value="{$user['name']}"  maxlength="50"/>
    </div>
</div> <div class="field_wrap">
    <label>{$taalContent['form']['surname']}</label>
    <div class="field_wrap_inp">
        <input type="text"  name="surname" id="surname" value="{$user['surname']}"  maxlength="50"/>
    </div>
</div>
<div class="field_wrap">
    <label>{$taalContent['form']['email']}</label>
    <div class="field_wrap_inp">
        <input type="email" name="email" id="email" value="{$user['email']}"  maxlength="50"/>
    </div>
</div>
<div class="field_wrap">
    <label>{$taalContent['form']['telephone']}</label>
    <div class="field_wrap_inp">
        <input type="tel"  name="phone" id="phone" value="{$user['phone']}"  maxlength="50"/>
    </div>
</div>
<div class="field_wrap">
    <label>{$taalContent['form']['company']}</label>
    <div class="field_wrap_inp">
        <input type="text"  name="company" id="company" value="{$user['company']}"  maxlength="50"/>
    </div>
</div>
<div class="field_wrap">
    <label>{$taalContent['form']['sector']}</label>
    <div class="field_wrap_inp">
        <div class="field_wrap_inp_sel">
            <select  name="sector" id="sector">
                <option>Kies</option>
                <option>Fotografie</option>
                <option>Film</option>
                <option>Reclame</option>
                <option>Casting director</option>
                <option>Eindklant</option>
                <option>Student foto of film</option>
                <option>Andere</option>
            </select>
        </div>
    </div>
</div>
<div class="field_wrap">
    <label>{$taalContent['form']['password']}</label>
    <div class="field_wrap_inp">
        <input type="password"  name="password" id="password" {if isset($user)}placeholder="******"{/if} value=""/>
    </div>
</div>