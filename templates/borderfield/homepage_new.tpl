{extends file="borderfield/base_layout_new.tpl"}
{block name=content}
    <section class="section section-intro clearfix">
        <div class="section-intro__left">
            <h2>{$languageContent.borderfield.homepage.intro.title}</h2>
            {$languageContent.borderfield.homepage.intro.text}
            <a class="section-intro__inst-link red-color" target="_blank" href="http://www.instagram.com/bordermodels">
                <i class="fab fa-instagram"></i>
                <span>{$languageContent.borderfield.homepage.intro.link}</span>
            </a>
        </div>
        <div class="section-intro__inst">
            {if $smarty.session.country == 'germany' && $smarty.session.lang eq 'de'}
                <!--<script src="https://apps.elfsight.com/p/platform.js" defer></script>
                <div class="elfsight-app-f4113958-3fd9-4a70-bb0d-1c0035dd47f6"></div>-->
            {else}
                <!--<script src="https://apps.elfsight.com/p/platform.js" defer></script>
                <div class="elfsight-app-225419b4-fe76-4818-80d4-a53502ee3941"></div>-->
            {/if}
        </div>
    </section>
    <section class="section section-categories clearfix">
        <h2>{$languageContent.borderfield.homepage.categories.title}</h2>
        <div class="grid grid-1 clearfix">
            <div class="grid-sizer"></div>
            <a href="/{$taal}/models-girls-women" class="grid-item grid-item--width-40">
                <img src="/images/borderfield/categories-women.jpg">
                <div class="grid-item__overlay">
                    <p>Women</p>
                    <span>Main & future talents</span>
                </div>
            </a>
            <a href="/{$taal}/models-boys-men" class="grid-item grid-item--width-60">
                <img src="/images/borderfield/categories-men.jpg">
                <div class="grid-item__overlay right">
                    <p>Men</p>
                    <span>Main & future talents</span>
                </div>
            </a>
            <a href="/{$taal}/models-ladies" class="grid-item grid-item--width-60">
                <img src="/images/borderfield/categories-ladies.jpg">
                <div class="grid-item__overlay left">
                    <p>Ladies</p>
                    <span>Classics</span>
                </div>
            </a>
            <a href="/{$taal}/models-gentlemen" class="grid-item grid-item--width-40">
                <img src="/images/borderfield/categories-gentlemen.jpg">
                <div class="grid-item__overlay">
                    <p>Gentlemen</p>
                    <span>Classics</span>
                </div>
            </a>
            <a href="/{$taal}/models-sports-athletes" class="grid-item grid-item--width-60">
                <img src="/images/borderfield/categories-athletes-sport.jpg">
                <div class="grid-item__overlay left">
                    <p>Athletes & Sport</p>
                </div>
            </a>
        </div>
        {if $smarty.session.country eq 'belgium'}
        <div class="grid grid-2 clearfix">
            <div class="grid-sizer"></div>
            <a href="/{$taal}/models-fashion-kids-teens" class="grid-item grid-item--width-50">
                <img src="/images/borderfield/categories-kids.jpg">
                <div class="grid-item__overlay left">
                    <p>Fashion kids</p>
                    <span>Kids & Teens</span>
                </div>
            </a>
            <a href="/{$taal}/models-plus-size-curvy" class="grid-item grid-item--width-50">
                <img src="/images/borderfield/categories-plus-size.jpg">
                <div class="grid-item__overlay right">
                    <p>Plus size</p>
                    <span>Curvy</span>
                </div>
            </a>
        </div>
        <div class="grid grid-3 clearfix">
            <div class="grid-sizer"></div>
            <a href="/{$taal}/models-hands-legs-feet" class="grid-item">
                <img src="/images/borderfield/categories-hands-legs-feet.jpg">
                <div class="grid-item__overlay">
                    <p>Hands, legs & feet</p>
                </div>
            </a>
            <a href="/{$taal}/models-real-families-couples" class="grid-item">
                <img src="/images/borderfield/categories-families-couples.jpg">
                <div class="grid-item__overlay">
                    <p>Real families & couples</p>
                </div>
            </a>
            <a href="/{$taal}/models-seniors" class="grid-item">
                <img src="/images/borderfield/categories-seniors.jpg">
                <div class="grid-item__overlay">
                    <p>Seniors</p>
                    <span>+65</span>
                </div>
            </a>
        </div>
        {/if}
    </section>
    <section class="section section-contact">
        <h2>{$languageContent.borderfield.footer.title}</h2>
        <ul class="section-contact__info">
            {if $smarty.session.country eq 'belgium'}
                <li>
                    <h3>{$languageContent.borderfield.footer.belgium.title}</h3>
                    <p><i class="fa fa-phone"></i> 03 / 773 52 00<span> - </span><br><a href="mailto:booking@bordermodels.com">booking@bordermodels.com</a></p>
                    <p>{$languageContent.borderfield.footer.belgium.address}</p>
                </li>
                <li>
                    <h3>{$languageContent.borderfield.footer.netherlands.title}</h3>
                    <p><i class="fa fa-phone"></i> +31 (0) 20 244 01 42<span> - </span><br><a href="mailto:holland@bordermodels.com.com">holland@bordermodels.com</a></p>
                    <p>{$languageContent.borderfield.footer.netherlands.address}</p>
                </li>
                <li>
                    <h3>{$languageContent.borderfield.footer.germany.title}</h3>
                    <p><i class="fa fa-phone"></i> 01 5155 332 323<span> - </span><br><a href="mailto:scouting@bordermodels.com">scouting@bordermodels.com</a></p>
                    <!--<p>{$languageContent.borderfield.footer.germany.address}</p>-->
                </li>
            {/if}

            {if $smarty.session.country eq 'netherlands'}
                <li>
                    <h3>{$languageContent.borderfield.footer.netherlands.title}</h3>
                    <p><i class="fa fa-phone"></i> +31 (0) 20 244 01 42<span> - </span><br><a href="mailto:holland@bordermodels.com.com">holland@bordermodels.com</a></p>
                    <p>{$languageContent.borderfield.footer.netherlands.address}</p>
                </li>
                <li>
                    <h3>{$languageContent.borderfield.footer.belgium.title}</h3>
                    <p><i class="fa fa-phone"></i> 03 / 773 52 00<span> - </span><br><a href="mailto:booking@bordermodels.com">booking@bordermodels.com</a></p>
                    <p>{$languageContent.borderfield.footer.belgium.address}</p>
                </li>
                <li>
                    <h3>{$languageContent.borderfield.footer.germany.title}</h3>
                    <p><i class="fa fa-phone"></i> 01 5155 332 323<span> - </span><br><a href="mailto:scouting@bordermodels.com">scouting@bordermodels.com</a></p>
                    <!--<p>{$languageContent.borderfield.footer.germany.address}</p>-->
                </li>
            {/if}

            {if $smarty.session.country eq 'germany'}
                <li>
                    <h3>{$languageContent.borderfield.footer.germany.title}</h3>
                    <p><i class="fa fa-phone"></i> 01 5155 332 323<span> - </span><br><a href="mailto:scouting@bordermodels.com">scouting@bordermodels.com</a></p>
                    <!--<p>{$languageContent.borderfield.footer.germany.address}</p>-->
                </li>
                <li>
                    <h3>{$languageContent.borderfield.footer.belgium.title}</h3>
                    <p><i class="fa fa-phone"></i> 03 / 773 52 00<span> - </span><br><a href="mailto:booking@bordermodels.com">booking@bordermodels.com</a></p>
                    <p>{$languageContent.borderfield.footer.belgium.address}</p>
                </li>
                <li>
                    <h3>{$languageContent.borderfield.footer.netherlands.title}</h3>
                    <p><i class="fa fa-phone"></i> +31 (0) 20 244 01 42<span> - </span><br><a href="mailto:holland@bordermodels.com.com">holland@bordermodels.com</a></p>
                    <p>{$languageContent.borderfield.footer.netherlands.address}</p>
                </li>
            {/if}
            
            <li class="section-contact__social">
                <a href="http://www.facebook.com/bordermodels" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="http://www.instagram.com/bordermodels" target="_blank"><i class="fab fa-instagram"></i></a>
            </li>
        </ul>
        <a class="section-contact__button" href="https://castingteam.com/en/register/0" target="_blank">{$languageContent.borderfield.footer.button}</a>
    </section>

    {if $smarty.session.country neq 'germany'}
        <!--<section class="section section-creative-trials clearfix">
            <div class="section-creative-trials__image">
                {if $smarty.session.country eq 'germany'}
                    <img src="/images/borderfield/creative-portfolio.jpg">
                {else}
                    <img src="/images/borderfield/creative-trials.jpg">
                {/if}
            </div>
            <div class="section-creative-trials__info">
                <h2>{$languageContent.borderfield.homepage.creative.title}</h2>
                {$languageContent.borderfield.homepage.creative.text}
            </div>
        </section>-->
    {/if}

{/block}