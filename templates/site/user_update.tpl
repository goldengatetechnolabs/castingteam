<form action="/{$taal}/update" method="post"  name="registration" class="team_data" onsubmit="return validateForm()">
     {include file='site/form/user_parameters_form.tpl'}
     <div class="field_wrap">
          <label></label>
          <div class="field_wrap_inp">
               <button>{$taalContent['form']['button']}</button>
               <span>{$taalContent['form']['tooltip']}</span>
          </div>
     </div>
</form>