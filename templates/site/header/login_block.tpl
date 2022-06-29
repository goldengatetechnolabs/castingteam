{if isset($user)}
    <ul id="header-login-block" class="hdr_login">
        <li><a href="/{$taal}/mycastingteam" >{$taalContent['links']['mycastingteam']}</a> </li>
        <li><a href="/{$taal}/logout">{$taalContent['links']['logout']}</a> </li>
    </ul>
{else}
    <section id="loginform" class="top_log_in">
        <div class="container">
            <div class="top_header_sec clearfix">
                <form method = "post" action = "/{$taal}/login">
                    <div class="field_wrap">
                        <label>{$taalContent['header']['login']['email']}</label>
                        <div class="field_wrap_inp">
                            <input type = "email" id = "login" placeholder = "Email" name = "email">
                        </div>
                    </div>
                    <div class="field_wrap">
                        <label>{$taalContent['header']['login']['password']}</label>
                        <div class="field_wrap_inp">
                            <input type = "password" id = "password" name = "password" placeholder = "*********">
                        </div>
                    </div>
                    <input type = "submit"  id = "dologin" value = "{$taalContent['header']['login']['submit']}">
                </form>
            </div>
        </div>
    </section>
{/if}