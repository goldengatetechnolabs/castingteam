<ul class="group-list">
    {assign var="isSpecialtiesGroupActive" value=true}
    {if $currentGroup eq ''}{$isSpecialtiesGroupActive=false}{/if}
    <li>
        <a {if $currentGroup eq '' and $pageTitle == 'Overview'}{$isSpecialtiesGroupActive=false}class="active"{/if} href="/{$taal}/new_talent_models">{$languageContent.borderfield.groups.new_talent}</a>
    </li>
    {foreach $groups as $group}
        {if isset($languageContent.borderfield.groups[$group->getName()])}
            <li>
                <a {if $currentGroup != '' and $group->getId() eq $currentGroup->getId()}{$isSpecialtiesGroupActive=false}class="active"{/if} href="/{$taal}/{$group->getShortName()}">{$languageContent.borderfield.groups[$group->getName()]}</a>
            </li>
        {/if}
    {/foreach}
    <li class="specialties">
        <a href="javascript:void(0);" class="{if $isSpecialtiesGroupActive}active{/if} specialty" >
            <span>{$languageContent.borderfield.groups.specialties} <i class="fa fa-chevron-right" aria-hidden="true"></i></span>
        </a>
        <ul class="specialties-list">
            {foreach $specialties as $group}
                {if !empty($languageContent.borderfield.groups[$group->getName()])}
                    <li>
                        <a {if $currentGroup != '' and $group->getId() eq $currentGroup->getId()}class="active"{/if} href="/{$taal}/{$group->getShortName()}">{$languageContent.borderfield.groups[$group->getName()]}</a>
                    </li>
                {/if}
            {/foreach}
        </ul>
    </li>
</ul>
<input id="current_group" name="current_group" type="hidden" value="{if $currentGroup != ''}{$currentGroup->getId()}{/if}">