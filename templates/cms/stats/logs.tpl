<h1>Access logs</h1>
<div class="lijn gn-margin" style="margin-bottom: 40px;"></div>

<table id="cms-subscriptions" cellspacing="3" cellpadding="0">
    <tr>
        <td>Booker</td>
        <td>Message</td>
        <td>Date</td>
    </tr>
    {foreach from=$logs item=log}
    <tr id="log_{$id}">
        <td style="width: 200px;">{$log.person.email}</td>
        <td style="width: 200px;">{$log.message}</td>
        <td style="width: 100px;">{$log.date}</td>
    </tr>
    {/foreach}
</table>