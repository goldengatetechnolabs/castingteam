<h1>Hoe ben je bij ons terecht gekomen?</h1>
<div class="lijn gn-margin" style="margin-bottom: 40px;"></div>
<ul class="stats" id='stats'>
    <li>1. Via <a href="http://whatmatters.be">whatmatters.be</a> ({$stats[7]})</li>
    <li>2. Google search ({$stats[1]})</li>
    <li>3. Via een vriend of vriendin ({$stats[2]})</li>
    <li>4. Via social media : Facebook, Twitter, Instagram… ({$stats[3]})</li>
    <li>5. Aangesproken op straat door een spotter ({$stats[4]})</li>
    <li>6. Ik ken Castingteam al langer (Ten tijde van Borderfield) ({$stats[5]})</li>
    <li>7. Poster / affiche van Castingteam ({$stats[6]})</li>
</ul>

<h1>Keywords</h1>

<div class="lijn gn-margin" style="margin-bottom: 40px;"></div>
<ul class="stats" id='keywords'>
    {foreach from=$keywords item=keyword}
        <li> {$keyword.word} ({$keyword.totalCount})</li>
    {/foreach}
</ul>