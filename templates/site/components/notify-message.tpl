{if isset($smarty.get['login'])}
    <input id="notify-message-poppup" type="hidden" value="{$taalContent['messages']['login'][$smarty.get['login']]|replace:'user_firstname':$user['name']}">
{/if}