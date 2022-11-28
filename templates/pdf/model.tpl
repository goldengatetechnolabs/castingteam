<p style="text-align: center;"><img src="/images/pdf_logo.jpg" alt="Castingteam" width="293" height="131" /></p>
<h1 style="font-weight: normal; text-align: center; color: #787878">{$model['voornaam']} - refn° {$model['model_id']}<br/></h1>
<p style="text-align: center;  color: #787878; font-size: x-small">Lengte: {$model['lengte']} cm - Gewicht: {$model['gewicht']} kg - 
			{if $leeftijd > 17} Borst: {$model['maten_borst']} cm - Taille: {$model['maten_taille']} cm - Heupen: {$model['maten_heupen']} cm - Jeans: {$model['maten_jeans']} - 
				{if $model['geslacht'] == 'M'}
					Kostuum: {$model['maten_kostuum']} - 
				{else}
					Kleding: {$model['maten_kleding']} -
					Cup: {$model['maten_cup']} {$model['maten_cup_letter']} - 
				{/if}
			{elseif $leeftijd<13}
				Kindermaat (min): {$model['nieuw_kind_maat_min']} - 
				Kindermaat (max): {$model['nieuw_kind_maat_max']} - 
			{else}
				{if $model['geslacht'] == 'M'}
					Kostuum: {$model['maten_kostuum']} - 
				{else}
					Kleding: {$model['maten_kleding']} -
					Cup: {$model['maten_cup']} {$model['maten_cup_letter']} - 
				{/if}
				Kindermaat (min): {$model['nieuw_kind_maat_min']} - 
				Kindermaat (max): {$model['nieuw_kind_maat_max']} - 
			{/if}
			Int. Maat: {$model['int_maat']}
			Schoenen: {$model['maten_schoenen']}
	<br/>
</p>

{foreach from=$photos key=k item=photo}
{if (($k) is div by 3) and ($k != 1)}
<table><tr>
{/if}
	{* <td><img style="width: 200px; display: inline; margin-bottom: 20px;" src="/models/{$model['model_id']}/website/thumbs/{$photo['id']}.jpg" alt=""/></td> *}
	<td><img style="width: 200px; display: inline; margin-bottom: 20px;" src="{$photo['src_domain']}/models/{$model['model_id']}/website/thumbs/{$photo['id']}.jpg" alt=""/></td>
{if (($k+1) is div by 3) and ($k != 0)}
</tr></table><br/><br/>
{/if}
{/foreach}
<!-- </table> -->