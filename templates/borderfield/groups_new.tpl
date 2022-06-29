<ul class="group-list">
    {assign var="isSpecialtiesGroupActive" value=true}
    {if $currentGroup eq ''}{$isSpecialtiesGroupActive=false}{/if}
    {foreach $groups as $group}

         {if $smarty.session.country eq 'germany'}
            {if $group->getShortName() == "models-fashion-kids-teens" }
                {continue}
            {/if}
            {if $group->getShortName() == "models-plus-size-curvy"}
                {continue}
            {/if}
            {if $group->getShortName() == "models-hands-legs-feet"}
                {continue}
            {/if}
            {if $group->getShortName() == "models-real-families-couples"}
                {continue}
            {/if}
            {if $group->getShortName() == "models-seniors"}
                {continue}
            {/if}
        {/if}

        {if isset($languageContent.borderfield.groups[$group->getName()])}
            <li>
                <a {if $currentGroup != '' and $group->getId() eq $currentGroup->getId()}{$isSpecialtiesGroupActive=false}class="active"{/if} 
                    href="/{$taal}/{$group->getShortName()}">
                    {$languageContent.borderfield.groups[$group->getName()]}
                </a>
            </li>
        {/if}
    {/foreach}

    {if $smarty.session.country != 'germany'}
        <li class="specialties">
            <a class="specialties-title" href="#">{$languageContent.borderfield.groups.specialties}</a>
            <div class="specialties-list">
                <ul>
                    {foreach $specialties as $group}
                        {if !empty($languageContent.borderfield.groups[$group->getName()])}
                            <li>
                                <a {if $currentGroup != '' and $group->getId() eq $currentGroup->getId()}class="active"{/if} href="/{$taal}/{$group->getShortName()}">{$languageContent.borderfield.groups[$group->getName()]}</a>
                            </li>
                        {/if}
                    {/foreach}
                </ul>
            </div>
        </li>
    {/if}
</ul>
<input id="current_group" name="current_group" type="hidden" value="{if $currentGroup != ''}{$currentGroup->getId()}{/if}">