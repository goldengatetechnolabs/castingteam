<div class="menu-off-canvas">
    <div class="menu-off-canvas__close">
        <i class="fas fa-times"></i>
    </div>
    {if $pageTitle != 'Intro' && $pageTitle != 'Creative Trials'}
        {block name=groups}
            {include file="borderfield/groups_new.tpl"}
        {/block}
    {/if}
    {* <ul>
        <li><a href="/en/models-girls-women">Women</a></li>
        <li><a href="/en/models-boys-men">Men</a></li>
        <li><a href="/en/models-ladies">Ladies</a></li>
        <li><a href="/en/models-gentlemen">Gentlemen</a></li>
        <li><a href="/en/models-sports-athletes">Athletes &amp; sport</a></li>
        <li><a href="/en/models-fashion-kids-teens">Fashion kids</a></li>
        <li><a href="#">Specialties</a></li>
    </ul> *}
    <div>
        {include file="borderfield/contacts.tpl"}
        {* <p><a href="#" class="active">Belgium</a> - <a href="#">Netherlands</a> - <a href="#">Germany</a></p>
        <p>Call +32(0)3 303 72 11 or <a href="mailto:info@bordermodels.com">email us</a></p>
        <p><a href="http://signup.bordermodels.com" target="_blank">Models Sign Up here</a></p> *}
    </div>
</div>