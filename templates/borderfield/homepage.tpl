{extends file="borderfield/base_layout.tpl"}
{block name=menu_image_color_button}hamburger_button_white{/block}
{block name=header-color}white-color{/block}
{block name=header_position}ps_ab{/block}
{block name=logo}b-logo-white.svg{/block}
{block name=saved_selection_button}{/block}
{block name=saved_selection_button_mobile}{/block}
{block name=groups}{/block}
{block name=slides}
    <section class="header-slider-block">
        <div class="image-section">
            <img class="slick-image" alt="homepage model" src="/images/borderfield_homepage_1.png">
            <img class="slick-image" alt="homepage model" src="/images/borderfield_homepage_2.png">
            <img class="slick-image" alt="homepage model" src="/images/borderfield_homepage_3.png">
            <img class="slick-image" alt="homepage model" src="/images/borderfield_homepage_4.png">
            <img class="slick-image" alt="homepage model" src="/images/borderfield_homepage_5.png">
        </div>
        <div class="image-section-single mobile">
            <img class="slick-image" alt="homepage model" src="/images/borderfield_homepage_3.png">
        </div>
        <div class="main-groups">
            {include file="borderfield/groups.tpl"}
        </div>
    </section>
{/block}
{block name=content}
    <div class="content">
        <section class="latest-models background-red-color white-color">
            <div class="block-title">
                <h2>{$languageContent.borderfield.homepage.title_first}</h2>
                <p>{$languageContent.borderfield.homepage.subtitle_first}</p>
                <a href="/{$taal}/overview/" class="plus_icon"> </a>
            </div>
            <div class="homepage-slide-wrapper">
                <div class="slick-image-section">
                    {foreach $models as $model}
                        {if $model->getBigImages()|@count eq 0}
                            {assign var=image value='models/no_foto.jpg'}
                        {else}
                            {assign var=images value=$model->getBigImages()}
                            {assign var=imageEntity value=$images[0]}
                            {assign var=image value=$imageEntity->getLinkBig()}
                        {/if}
                        <div data-id="{$model->getId()}" class="model-thumb">
                            <img class="slick-image" alt="publication 1" src="/{$image}">
                            <div class="model-title background-red-color"><i class="fa fa-heart-o"></i> {$model->getName()} - {$model->getId()}</div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </section>
        {*<section class="publication-block background-white-color red-color">*}
            {*<div class="block-title">*}
                {*<h2>{$languageContent.borderfield.homepage.title_second}</h2>*}
                {*<p>{$languageContent.borderfield.homepage.subtitle_second}</p>*}
            {*</div>*}
            {*<div class="homepage-slide-wrapper">*}
                {*<div class="slick-image-section">*}
                    {*<img class="slick-image" alt="publication 1" src="/images/publication_1.png">*}
                    {*<img class="slick-image" alt="publication 2" src="/images/pubication_2.png">*}
                    {*<img class="slick-image" alt="publication 3" src="/images/publication_3.png">*}
                    {*<img class="slick-image" alt="publication 1" src="/images/publication_1.png">*}
                    {*<img class="slick-image" alt="publication 2" src="/images/pubication_2.png">*}
                    {*<img class="slick-image" alt="publication 3" src="/images/publication_3.png">*}
                    {*<img class="slick-image" alt="publication 1" src="/images/publication_1.png">*}
                    {*<img class="slick-image" alt="publication 2" src="/images/pubication_2.png">*}
                    {*<img class="slick-image" alt="publication 3" src="/images/publication_3.png">*}
                {*</div>*}
            {*</div>*}
        {*</section>*}
    </div>
{/block}
{block name="footer"}
    {include file="borderfield/footer.tpl"}
{/block}