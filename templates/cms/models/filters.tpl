{literal}
<script type="text/javascript">

function addFilterToCategory(category_id,filter_id,position,active) {

	$.ajax({
        type: "POST",
        dataType: 'json',
        data: {
           category_id:category_id,
           filter_id:filter_id, 
           position:position,
           active:active                                                                                                       
        },    
        url: "/ajax/add_filter_to_category",
        error:
            function () {
                 alert('Er is een technische fout opgetreden.');
            },

        success:
            function(json) {  

            }

  });
}
	
$( document ).ready(function() {
  $('.filter').change( function(e) {
  	var category_id = $(this).parent().attr('data-id');
  	var position = $(this).parent().attr('data-position');
  	var filter_id = $(this).val();
  	var active = $(this).find(":selected").attr('data-active');
    addFilterToCategory(category_id,filter_id,position,active);
  });
});

</script>
{/literal}
<h1>Filters</h1>
<div class="lijn gn-margin" style="margin-bottom: 40px;"></div>

<table id="filters_category"><tr>
	{foreach from=$categories item=category}
	<th><h4>{$category['name']}</h4></th>
	{/foreach}
</tr>
{for $position=1 to 12}
<tr>
{foreach from=$categories item=category}
<td>
<label data-position="{$position}" data-id="{$category['category_id']}" class="label">
   <select class="filter" >
      <option value=""> - Kies - </option>
       {foreach from=$filters item=filter}
	      <option value="{$filter['id']}" data-active="1" {foreach from=$category['filters'] item=category_filter}{if $category_filter['filter_id'] eq $filter['id'] and $category_filter['active'] eq 1 and $category_filter['position'] eq $position}selected=""{/if}{/foreach}  >{$filter['name']} open</option>
	      <option value="{$filter['id']}" data-active="0" {foreach from=$category['filters'] item=category_filter}{if $category_filter['filter_id'] eq $filter['id'] and $category_filter['active'] eq 0 and $category_filter['position'] eq $position}selected=""{/if}{/foreach}  >{$filter['name']} gesloten</option>
       {/foreach}
   </select>
</label>
</td>
{/foreach}	
</tr>
{/for}
</table>


