<section class="smart-search-section">
    <form action="/api/search/smartsearch" method="POST" class="search-container">
        <div class="search-bar-container">
            <div class="search-input">
                <input autocomplete="off" class="search-bar-input" id="search-phrase" name="text" placeholder="{$taalContent['smart_search']['placeholder']}" type="text">
            </div>
        </div>
        <section class="media-filter">
            <div class="media-filter-label">
                <input hidden id="current-category-search" name="category" value="{$categories[0]['category_id']}">
                <ul id="search-category-menu">
                    <li> <span for="main-categories" data-id="{$categories[0]['category_id']}" class="category-active"><strong>{$categories[0]['name']}</strong> <i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        <ul name="main-categories" id="main-categories">
                            {foreach from=$categories key=k item=category}
                                {if $k<7}
                                    <li data-id="{$category['category_id']}"><span><strong>{$taalContent['categories'][$category['category_id']]}</strong></span></li>
                                {/if}
                            {/foreach}
                        </ul>
                    </li>
                </ul>
            </div>
        </section>
        <button class="search-icon" type="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
        <div class="search-bar-placeholder"></div>
    </form>
</section>