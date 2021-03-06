/*!
 * jquery.customSelect() - v0.3.3
 * http://adam.co/lab/jquery/customselect/
 * 2013-03-04
 *
 * Copyright 2013 Adam Coulombe
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @license http://www.gnu.org/licenses/gpl.html GPL2 License
 */
/*
(function(a){a.fn.extend({customSelect:function(b){var c={customClass:null,mapClass:true,mapStyle:true},d=function(f,i){var e=f.find(":selected"),h=i.children(":first"),g=e.html()||"&nbsp;";h.html(g);setTimeout(function(){i.removeClass("customSelectOpen")},60)};if(typeof document.body.style.maxHeight==="undefined"){return this}b=a.extend(c,b);return this.each(function(){var e=a(this),g=a('<span class="customSelectInner" />'),f=a('<span class="customSelect" />');f.append(g);e.after(f);if(b.customClass){f.addClass(b.customClass)}if(b.mapClass){f.addClass(e.attr("class"))}if(b.mapStyle){f.attr("style",e.attr("style"))}e.addClass("hasCustomSelect").on("update",function(){d(e,f);var i=parseInt(e.outerWidth(),10)-(parseInt(f.outerWidth(),10)-parseInt(f.width(),10));f.css({display:"inline-block"});var h=f.outerHeight();if(e.attr("disabled")){f.addClass("customSelectDisabled")}else{f.removeClass("customSelectDisabled")}g.css({width:i,display:"inline-block"});e.css({"-webkit-appearance":"menulist-button",width:f.outerWidth(),position:"absolute",opacity:0,height:h,fontSize:f.css("font-size")})}).on("change",function(){f.addClass("customSelectChanged");d(e,f)}).on("keyup",function(){e.blur();e.focus()}).on("mousedown",function(){f.removeClass("customSelectChanged").addClass("customSelectOpen")}).focus(function(){f.removeClass("customSelectChanged").addClass("customSelectFocus")}).blur(function(){f.removeClass("customSelectFocus customSelectOpen")}).hover(function(){f.addClass("customSelectHover")},function(){f.removeClass("customSelectHover")}).trigger("update")})}})})(jQuery);
*/

/*!
 * jquery.customSelect() - v0.4.1
 * http://adam.co/lab/jquery/customselect/
 * 2013-05-13
 *
 * Copyright 2013 Adam Coulombe
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @license http://www.gnu.org/licenses/gpl.html GPL2 License
 */
(function(a){a.fn.extend({customSelect:function(c){if(typeof document.body.style.maxHeight==="undefined"){return this}var e={customClass:"customSelect",mapClass:true,mapStyle:true},c=a.extend(e,c),d=c.customClass,f=function(h,k){var g=h.find(":selected"),j=k.children(":first"),i=g.html()||"&nbsp;";j.html(i);if(g.attr("disabled")){k.addClass(b("DisabledOption"))}else{k.removeClass(b("DisabledOption"))}setTimeout(function(){k.removeClass(b("Open"));a(document).off("mouseup."+b("Open"))},60)},b=function(g){return d+g};return this.each(function(){var g=a(this),i=a("<span />").addClass(b("Inner")),h=a("<span />");g.after(h.append(i));h.addClass(d);if(c.mapClass){h.addClass(g.attr("class"))}if(c.mapStyle){h.attr("style",g.attr("style"))}g.addClass("hasCustomSelect").on("update",function(){f(g,h);var k=parseInt(g.outerWidth(),10)-(parseInt(h.outerWidth(),10)-parseInt(h.width(),10));h.css({display:"inline-block"});var j=h.outerHeight();if(g.attr("disabled")){h.addClass(b("Disabled"))}else{h.removeClass(b("Disabled"))}i.css({width:k,display:"inline-block"});g.css({"-webkit-appearance":"menulist-button",width:h.outerWidth(),position:"absolute",opacity:0,height:j,fontSize:h.css("font-size")})}).on("change",function(){h.addClass(b("Changed"));f(g,h)}).on("keyup",function(j){if(!h.hasClass(b("Open"))){g.blur();g.focus()}else{if(j.which==13||j.which==27){f(g,h)}}}).on("mousedown",function(j){h.removeClass(b("Changed"))}).on("mouseup",function(j){if(!h.hasClass(b("Open"))){if(a("."+b("Open")).not(h).length>0&&typeof InstallTrigger!=="undefined"){g.focus()}else{h.addClass(b("Open"));j.stopPropagation();a(document).one("mouseup."+b("Open"),function(k){if(k.target!=g.get(0)&&a.inArray(k.target,g.find("*").get())<0){g.blur()}else{f(g,h)}})}}}).focus(function(){h.removeClass(b("Changed")).addClass(b("Focus"))}).blur(function(){h.removeClass(b("Focus")+" "+b("Open"))}).hover(function(){h.addClass(b("Hover"))},function(){h.removeClass(b("Hover"))}).trigger("update")})}})})(jQuery);