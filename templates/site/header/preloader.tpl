<div id="preloader" class="preloader">
	<div id="preloader_inner" class="preloader_inner">
		<div id="preloader_line" class="preloader_inner__line"></div>
		<span id="preloader_percent">0%</span>
	</div>
</div>
{literal}
	<style type="text/css">
		html, body, #preloader, #preloader_inner { width: 100%; }
		.preloader{position:fixed;top:0;left:0;right:0;bottom:0;transition:all 0.5s ease;background-color:#fff;z-index:99999999999999;display:block;opacity:1;}
		.preloader_inner{position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;width:100%;padding:50px;text-align:center;font-size:19px;color:#7d7d7d;display:flex;flex-direction:column;justify-content:center;}
		.preloader_inner__line {content:'';margin:0 auto 23px;height:2px;width:1px;display:block;background-color:#4e6359;transition:all 0.5s ease;}
		.show{visibility:visible!important;opacity:1!important;transition:all 0.7s ease;}
	</style>
	<script type="text/javascript">
		var percent = 0, width = 0, width_line = window.innerWidth - 100, width_percent = 0;
		var t = setInterval(function() {
			percent = percent + 2;
			if (percent > 100){ clearInterval(t); }
			else {
				width_percent = (width_line * percent) / 100;
				document.getElementById('preloader_line').style.width = width_percent + 'px';
				document.getElementById('preloader_percent').textContent = percent + '%';
			}
		}, 30);
	</script>
{/literal}