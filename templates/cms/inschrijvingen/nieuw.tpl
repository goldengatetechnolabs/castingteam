{if $tab_active == 'nieuw'}
    <h1 class="float">Model inschrijvingen</h1>
{/if}
{if $tab_active == 'updates'}
    <h1 class="float">Modellen updates</h1>
    <div class="lijn gn-margin" style="clear:both"></div>
    <table id="cms-subscriptions" cellspacing="3" cellpadding="0">
    {assign var="date" value="0"}
    {foreach from=$models_accepted name="loop" item=r key=id}
        {if $tab_active !== 'archief'}
            {if $date !== $r.updated_tonen}
                {if $date !== 0 || $smarty.foreach.loop.last}
                    </table>
                {/if}
                <table id="cms-subscriptions" cellspacing="3" cellpadding="0">
                <tr>
                    {if $r.updated=='0000-00-00'}
                        <td class="date" colspan="7">{$r.datum_tonen}</td>
                    {else}
                        <td class="date" colspan="7">{$r.updated_tonen}</td>
                    {/if}
                </tr>
            {/if}
        {/if}
        <tr id="model_{$id}">
            <td style="width: 200px;"><span class="icon-edit icon"></span><a href="/cms/models/models/aanpassen/?id={$id}">{$r.naam} {$r.voornaam}</a></td>
            {if $admin.typeName=='booker'}<td style="width: 200px;">{$r.email}</td>{else}<td style="width: 200px;"><a href="mailto:{$r.email}" class="mail">{$r.email}</a></td>{/if}
            <td style="width: 100px;"><span class="icon-eye icon"></span><a href="#" class="popup" data-id="models-preview" data-function="preview({$id}, '{$r.code}')">View</a></td>
            <td style="width: 100px;"><span class="icon-envelope icon"></span><a href="#" class="popup" data-id="models-message" data-function="messages({$id})">Message</a></td>
            {if $admin.typeName!='updater'}<td style="width: 100px;">{if $tab_active !== 'archief'}<span class="icon-download icon"></span><a href="javascript:changeModel({$id}, 0)">Archive</a>{/if}</td>{/if}
            <td style="width: 100px;">{if $tab_active !== 'archief'}<span class="icon-download icon"></span><a href="javascript:changeModel({$id}, 2)">Reject</a>{/if}</td>
            <td style="width: 100px;">{if $tab_active !== 'archief'}<span class="icon-download icon"></span><a href="javascript:changeModel({$id}, 3)">Confirm</a>{/if}</td>
        </tr> 
        {assign var="date" value=$r.updated_tonen}                            
    {/foreach}   
</table>

{/if}
{if $tab_active == 'inactive'}
    <h1 class="float">Model inactive</h1>
{/if}    
<div class="lijn gn-margin" style="clear:both"></div>
{if $tab_active == 'archief'}
<table id="cms-subscriptions" cellspacing="3" cellpadding="0">
    {elseif $tab_active == 'inactive'}
    <table id="cms-subscriptions" cellspacing="4" cellpadding="0">
        {/if}
        {assign var="date" value="0"}
        {foreach from=$models name="loop" item=r key=id}
        {if $tab_active !== 'archief' && $tab_active !== 'inactive'}
        {if $date !== $r.updated_tonen}
        {if $date !== 0 || $smarty.foreach.loop.last}
    </table>
    {/if}

    <table id="cms-subscriptions" cellspacing="3" cellpadding="0">
        <tr>
            {if $r.updated=='0000-00-00'}
                <td class="date" colspan="7">{$r.datum_tonen}</td>
            {else}
                <td class="date" colspan="7">{$r.updated_tonen}</td>
            {/if} 
        </tr>
        {/if}
        {/if}
        {if $tab_active == 'inactive'}
            {assign var=image_id value=$r.images[0]['id']}
            {if $image_id eq 'no_foto' or $image_id eq ''}
                {assign var="foto_path" value="/models/no_foto.jpg"}
                {assign var="foto_path_big" value="/models/no_foto.jpg"}
            {else}
                {assign var="foto_path" value="/models/$id/website/thumbs/$image_id.jpg"}
                {assign var="foto_path_big" value="/models/$id/website/big/$image_id.jpg"}
            {/if}
        {/if}
        <tr id="model_{$id}">
            {if $tab_active == 'inactive'}<td style=" min-width: 50px; overflow: hidden; width: 50px;"><img src="{$foto_path}"></td>{/if}
            <td style="width: 200px;"><span class="icon-edit icon"></span><a href="/cms/models/models/aanpassen/?id={$id}">{$r.naam} {$r.voornaam}</a></td>
            {if $admin.typeName=='booker'}<td style="width: 200px;">{$r.email}</td>{else}<td style="width: 200px;"><a href="mailto:{$r.email}" class="mail">{$r.email}</a></td>{/if}
            <td style="width: 100px;"><span class="icon-eye icon"></span><a href="#" class="popup" data-id="models-preview" data-function="preview({$id}, '{$r.code}')">View</a></td>
            <td style="width: 100px;"><span class="icon-envelope icon"></span><a href="#" class="popup" data-id="models-message" data-function="messages({$id})">Message</a></td>
            {if $admin.typeName!='updater'}{if $tab_active !== 'archief' && $tab_active !== 'inactive'}<td style="width: 100px;"><span class="icon-download icon"></span><a href="javascript:changeModel({$id}, 0)">Archive</a></td>{/if}{/if}
            {if $tab_active !== 'archief' && $tab_active !== 'inactive'}<td style="width: 100px;"><span class="icon-download icon"></span><a href="javascript:changeModel({$id}, 2)">Reject</a></td>{/if}
            {if $tab_active !== 'inactive'}<td style="width: 100px;"><span class="icon-download icon"></span><a href="javascript:changeModel({$id}, 1)">Accept</a></td>{/if}
        </tr> 
        {assign var="date" value=$r.updated_tonen}                            
        {/foreach}   
        {if $tab_active == 'archief'}
    </table>
    {/if}
    </table>
{if $tab_active == 'nieuw'}
    <h1 class="float">Model inschrijvingen - Updates</h1>
    <div class="lijn gn-margin" style="clear:both"></div>
    <table id="cms-subscriptions" cellspacing="3" cellpadding="0">
        {assign var="date" value="0"}
        {foreach from=$updated_models name="loop" item=r key=id}
        {if $tab_active !== 'archief'}
        {if $date !== $r.updated_tonen}
        {if $date !== 0 || $smarty.foreach.loop.last}
    </table>
    {/if}
    <table id="cms-subscriptions" cellspacing="3" cellpadding="0">
        <tr>
            {if $r.updated=='0000-00-00'}
                <td class="date" colspan="7">{$r.datum_tonen}</td>
            {else}
                <td class="date" colspan="7">{$r.updated_tonen}</td>
            {/if}
        </tr>
        {/if}
        {/if}
        <tr id="model_{$id}">
            <td style="width: 200px;"><span class="icon-edit icon"></span><a href="/cms/models/models/aanpassen/?id={$id}">{$r.naam} {$r.voornaam}</a></td>
            {if $admin.typeName=='booker'}<td style="width: 200px;">{$r.email}</td>{else}<td style="width: 200px;"><a href="mailto:{$r.email}" class="mail">{$r.email}</a></td>{/if}
            <td style="width: 100px;"><span class="icon-eye icon"></span><a href="#" class="popup" data-id="models-preview" data-function="preview({$id}, '{$r.code}')">View</a></td>
            <td style="width: 100px;"><span class="icon-envelope icon"></span><a href="#" class="popup" data-id="models-message" data-function="messages({$id})">Message</a></td>
            {if $admin.typeName!='updater'}<td style="width: 100px;">{if $tab_active !== 'archief'}<span class="icon-download icon"></span><a href="javascript:changeModel({$id}, 0)">Archive</a>{/if}</td>{/if}
            <td style="width: 100px;">{if $tab_active !== 'archief'}<span class="icon-download icon"></span><a href="javascript:changeModel({$id}, 2)">Reject</a>{/if}</td>
            <td style="width: 100px;">{if $tab_active !== 'archief'}<span class="icon-download icon"></span><a href="javascript:changeModel({$id}, 4)">Accept</a>{/if}</td>
        </tr> 
        {assign var="date" value=$r.updated_tonen}                            
    {/foreach}
    </table>
</table>
{/if}



