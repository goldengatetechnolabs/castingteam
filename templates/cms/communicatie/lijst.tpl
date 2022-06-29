<h1 class="float">E-mail templates</h1>
<div class="lijn gn-margin" style="clear:both"></div>

<table id="cms-subscriptions" class="template-list" cellspacing="3" cellpadding="0">
    <tr>
        <td class="action" colspan="6"><span class="icon-plus icon"></span> <a href="#" class="popup" data-id="email-add">Nieuwe template</a></td>
    </tr>

    {foreach from=$emails item=r key=id}
    <tr>
        <td><span class="icon-edit icon"></span><a href="#" class="popup" data-id="email-edit" data-function="getEmail({$r.id})">{$r.title}</a></td>
        <td>{$r.subject.nl}</td>
        {foreach from=$languages item=language }
            <td><span>{$language|upper} </span>{if isset($r.content[$language])}<i class="fa fa-check" aria-hidden="true">{else}<i class="fa fa-times" aria-hidden="true"></i>{/if}</i> (<a href="#" {if isset($r.content[$language])} class="popup" data-id="email-view" data-function="email_view({$r.id}, '{$language}')" {/if}>View</a>)</td>
        {/foreach}
        <td class="center button"><a href="#" class="delete-mail button rood klein" data-id="{$r.id}" data-function="removeEmail({$r.id})">Verwijderen</a></td>
    </tr>                             
    {/foreach}    
</table>

<h1 class="float clear">Keywords in templates</h1>
<table id="keyword-list" class="template-list">
    <tr class="template-header">
        <td class="action" colspan="6">
            <span class="icon-plus icon"></span> <a href="#keyword-list" class="new-keyword">New keyword</a>
        </td>
    </tr>

    {foreach from=$keywords item=keyword}
        <tr>
            <td colspan="2">
                <label for="template-keyword">Keyword: </label>
                <p class="input-new"><input type="text" name="keyword" value="{$keyword.keyword}"/></p>
            </td>
            <td>
                <label for="template-content">Content: </label>
                <p class="input-new">
                    <textarea class="niet-verplicht" name="template-content" style="height:100px;">{$keyword.content}</textarea>
                </p>
            </td>
            <td class="center button">
                <a href="#keyword-list" class="save-keyword" data-id="{$keyword.id}">Save</a>
            </td>
            <td class="center button">
                <a href="#keyword-list" class="delete-keyword" data-id="{$keyword.id}">Delete</a>
            </td>
        </tr>
    {/foreach}
</table>

<div class="cms-popup-bg" id="email-add">
    <div class="cms-popup emails" style="width: 800px;
        height: auto;
        margin-left: -450px;
        top:7%;margin-top:0">
        <a href="#" class="close"><span class="icon-cross icon"></span></a>
        <h3>E-mail template toevoegen</h3>
        <div class="lijn gn-margin"></div>
        <form method="post" action="/api/email/add" class="ajax">
            <p>Naam:</p>
            <p class="input-new"><input type="text" name="title"/></p>
            <div id="model-tabs">
                <div class="language-tabs">
                    <a href="#tab11" class="tabs eerste" style="width:150px;">Nederlands</a>
                    <a href="#tab22" class="inactief tabs" style="width:150px;">Francais</a>
                    <a href="#tab33" class="inactief tabs" style="width:150px;">English</a>
                </div>
                <div id="tab11" class="tab">
                    <p>Subject:</p>
                    <p class="input-new"><input type="text" name="subject_nl"/></p>
                    <p>Inhoud:</p>
                    <p class="input-new"><textarea class="niet-verplicht" name="content_nl" style="height:260px;"></textarea></p>
                </div>
                <div id="tab22" class="tab dsp_none">
                    <p>Subject:</p>
                    <p class="input-new"><input type="text" name="subject_fr"/></p>
                    <p>Inhoud:</p>
                    <p class="input-new"><textarea class="niet-verplicht" name="content_fr" style="height:260px;"></textarea></p>
                </div>
                <div id="tab33" class="tab dsp_none">
                    <p>Subject:</p>
                    <p class="input-new"><input type="text" name="subject_en"/></p>
                    <p>Inhoud:</p>
                    <p class="input-new"><textarea class="niet-verplicht" name="content_en" style="height:260px;"></textarea></p>
                </div>
                <p><input type="submit" class="button new" name="submit" value="Toevoegen" /></p>
            </div>
        </form>
    </div>
</div>

<div class="cms-popup-bg" id="email-edit">
    <div class="cms-popup emails" style="width: 800px;
        height: auto;
        margin-left: -450px;
        top:7%;margin-top:0">
        <a href="#" class="close"><span class="icon-cross icon"></span></a>
        <h3>E-mail template aanpassen</h3>
        <div class="lijn gn-margin"></div>
        <form method="post" action="/api/email/update" class="ajax">
            <p>Naam:</p>
            <p class="input-new"><input type="text" name="title"/></p>

            <div id="model-tabs">
                <div class="language-tabs">
                    <a href="#tab1" class="tabs eerste" style="width:150px;">Nederlands</a>
                    <a href="#tab2" class="inactief tabs" style="width:150px;">Francais</a>
                    <a href="#tab3" class="inactief tabs" style="width:150px;">English</a>
                </div>
                <div id="tab1" class="tab">
                    <p>Subject:</p>
                    <p class="input-new"><input type="text" name="subject_nl"/></p>
                    <p>Inhoud:</p>
                    <p class="input-new"><textarea class="niet-verplicht" name="content_nl" style="height:260px;"></textarea></p>
                </div>
                <div id="tab2" class="tab dsp_none">
                    <p>Subject:</p>
                    <p class="input-new"><input type="text" name="subject_fr"/></p>
                    <p>Inhoud:</p>
                    <p class="input-new"><textarea class="niet-verplicht" name="content_fr" style="height:260px;"></textarea></p>
                </div>
                <div id="tab3" class="tab dsp_none">
                    <p>Subject:</p>
                    <p class="input-new"><input type="text" name="subject_en"/></p>
                    <p>Inhoud:</p>
                    <p class="input-new"><textarea class="niet-verplicht" name="content_en" style="height:260px;"></textarea></p>
                </div>
                <p class="input-new" style="display:none;"><input id="email_id" type="text" name="id" value="" /></p>
                <p><input type="submit" class="button new" value="Aanpassen" /> <input id="test-button" class="button new" value="Test" /></p>
            </div>
        </form>
    </div>
</div>

<div class="cms-popup-bg" id="email-view">
    <div class="cms-popup emails">
        <a href="#" class="close"><span class="icon-cross icon"></span></a>
        <div id="emailview"></div>
    </div>
</div>
