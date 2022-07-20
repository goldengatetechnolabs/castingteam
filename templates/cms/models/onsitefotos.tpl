<h2>Photo's on site</h2>

<div id="image-tabs">
    <div class="tab-header">
        <div id="image-tabs-tabs">
            <a href="#tab-image-castingteam" class="tabs eerste" style="width:120px;">Castingteam</a>

            {foreach from=$categoryGroups item=group key=number}
                <a href="#tab-image-{$group->getId()}" class="tabs inactief" style="width:120px;">{$group->getName()|replace:'Border ':''|replace:'Specialties ':''}</a>
            {/foreach}
        </div>
    </div>

    <div id="tab-image-castingteam" class="tab">
        <ul class="onsite-images" data-id="0">
        {foreach from=$siteImages item=image }
        <li id="foto_list_{$image->getId()}" class="foto_list_{$image->getId()}" data-image-id="{$image->getId()}" >
            <div class="model-photos" id="foto_{$image->getId()}">
                <a href="javascript:deletePhoto({$image->getId()})" class="button grijs delete">Delete</a>

                <img src="{$image->getImageLocation()}/models/{$id}/website/thumbs/{$image->getId()}.jpg" alt="" />

                <a id="foto_online_{$image->getId()}" class="photo-checkbox online check{if $image->getOnline() == 1} actief{/if}"></a><br />
                <a id="foto_pdf_{$image->getId()}" class="photo-checkbox pdf check{if $image->getPdf() == 1} actief{/if} pdf"></a>
            </div>
        </li>
        {/foreach}
        </ul>
    </div>

    {foreach from=$categoryGroups item=group key=number}
    <div id="tab-image-{$group->getId()}" class="tab" style="display: none" >
        <ul class="onsite-images" data-id="{$group->getId()}">
            {foreach from=$groupOrderedImages[$group->getId()] item=image }
                <li id="foto_list_{$image.id}" class="foto_list_{$image.id}" data-image-id="{$image.id}">
                    <div class="model-photos" id="foto_{$image.id}">
                        <a href="javascript:deletePhoto({$image.id})" class="button grijs delete">Delete</a>


                        <a id="foto_online_{$image.id}" class="photo-checkbox online check{if $image.siteImageGroups[0].online === true} actief{/if}"></a><br />
                        <a id="foto_pdf_{$image.id}" class="photo-checkbox pdf check{if $image.siteImageGroups[0].pdf === true} actief{/if} pdf"></a>
                    </div>
                </li>
            {/foreach}
        </ul>
    </div>
    {/foreach}
</div>
<div style="clear:both"></div>