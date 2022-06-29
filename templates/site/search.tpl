{literal}
<script type="text/javascript" src="/js/jquery.autocomplete.js"></script>
<script>
$( document ).ready(function() {
    var matched, browser;

    jQuery.uaMatch = function( ua ) {
        ua = ua.toLowerCase();

        var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
                /(webkit)[ \/]([\w.]+)/.exec( ua ) ||
                /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
                /(msie) ([\w.]+)/.exec( ua ) ||
                ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
                [];
        return {
            browser: match[ 1 ] || "",
            version: match[ 2 ] || "0"
        };
    };

    matched = jQuery.uaMatch( navigator.userAgent );
    browser = {};

    if ( matched.browser ) {
        browser[ matched.browser ] = true;
        browser.version = matched.version;
    }

    if ( browser.chrome ) {
        browser.webkit = true;
    } else if ( browser.webkit ) {
        browser.safari = true;
    }

    jQuery.browser = browser;

    $('.search_button').click(function(){
        window.location.href={/literal}'/{$taal}{literal}/people/?search='+$(this).parent().find("#search").val();
    });

    $('.search_input').keypress(function(e){
        if(e.keyCode == 13) {
            window.location.href={/literal}'/{$taal}{literal}/people/?search='+$(this).val();
            return false;
        }
    });

	$(".search_input").autocomplete(
		"/ajax/smart_search/",
		{
			delay:10,
			minChars:2,
			matchSubset:2,
			matchContains:2,
			cacheLength:10,
			onItemSelect:selectItem,
			onFindValue:findValue,
			formatItem:formatItem,
			autoFill:false,
			maxItemsToShow:5
		}
	);
});

function findValue(li) {
	if( li == null ) return alert("No match!");
	if( !!li.extra ) var sValue = li.extra[0];
	else var sValue = li.selectValue;
}

function selectItem(li) {
	findValue(li);
}

function formatItem(row) {
	return row[0] + " (refn°: " + row[1] + ")";
}

function lookupAjax(){
	var oSuggest = $("#search")[0].autocompleter;
	oSuggest.findValue();

	return false;
}
</script>
{/literal}

<input
        id='search'
        class="search_input"
        type="text"
        placeholder="{$taalContent['search']['placeholder']}"
        {if isset($search)} value='{$search}'{/if}
        onfocus="this.placeholder = ''"
        onblur="if(this.value == '') this.placeholder='{$taalContent['search']['placeholder']}'">
<button type="submit" class="search_button" id='search_button'> <i class="fa fa-search"></i> </button>