!function(o,e){"function"==typeof define&&define.amd?define("pnotify.nonblock",["jquery","pnotify"],e):"object"==typeof exports&&"undefined"!=typeof module?module.exports=e(require("jquery"),require("./pnotify")):e(o.jQuery,o.PNotify)}("undefined"!=typeof window?window:this,function(o,e){var n,t=/^on/,i=/^(dbl)?click$|^mouse(move|down|up|over|out|enter|leave)$|^contextmenu$/,c=/^(focus|blur|select|change|reset)$|^key(press|down|up)$/,l=/^(scroll|resize|(un)?load|abort|error)$/,s=function(e,n){var s;if(e=e.toLowerCase(),document.createEvent&&this.dispatchEvent){if(e=e.replace(t,""),e.match(i)?(o(this).offset(),s=document.createEvent("MouseEvents"),s.initMouseEvent(e,n.bubbles,n.cancelable,n.view,n.detail,n.screenX,n.screenY,n.clientX,n.clientY,n.ctrlKey,n.altKey,n.shiftKey,n.metaKey,n.button,n.relatedTarget)):e.match(c)?(s=document.createEvent("UIEvents"),s.initUIEvent(e,n.bubbles,n.cancelable,n.view,n.detail)):e.match(l)&&(s=document.createEvent("HTMLEvents"),s.initEvent(e,n.bubbles,n.cancelable)),!s)return;this.dispatchEvent(s)}else e.match(t)||(e="on"+e),s=document.createEventObject(n),this.fireEvent(e,s)},a=function(e,t,i){e.elem.addClass("ui-pnotify-nonblock-hide");var c=document.elementFromPoint(t.clientX,t.clientY);e.elem.removeClass("ui-pnotify-nonblock-hide");var l=o(c),a=l.css("cursor");"auto"===a&&"A"===c.tagName&&(a="pointer"),e.elem.css("cursor","auto"!==a?a:"default"),n&&n.get(0)==c||(n&&(s.call(n.get(0),"mouseleave",t.originalEvent),s.call(n.get(0),"mouseout",t.originalEvent)),s.call(c,"mouseenter",t.originalEvent),s.call(c,"mouseover",t.originalEvent)),s.call(c,i,t.originalEvent),n=l};return e.prototype.options.nonblock={nonblock:!1},e.prototype.modules.nonblock={init:function(o,e){var t=this;o.elem.on({mouseenter:function(e){t.options.nonblock&&e.stopPropagation(),t.options.nonblock&&o.elem.addClass("ui-pnotify-nonblock-fade")},mouseleave:function(e){t.options.nonblock&&e.stopPropagation(),n=null,o.elem.css("cursor","auto"),t.options.nonblock&&"out"!==o.animating&&o.elem.removeClass("ui-pnotify-nonblock-fade")},mouseover:function(o){t.options.nonblock&&o.stopPropagation()},mouseout:function(o){t.options.nonblock&&o.stopPropagation()},mousemove:function(e){t.options.nonblock&&(e.stopPropagation(),a(o,e,"onmousemove"))},mousedown:function(e){t.options.nonblock&&(e.stopPropagation(),e.preventDefault(),a(o,e,"onmousedown"))},mouseup:function(e){t.options.nonblock&&(e.stopPropagation(),e.preventDefault(),a(o,e,"onmouseup"))},click:function(e){t.options.nonblock&&(e.stopPropagation(),a(o,e,"onclick"))},dblclick:function(e){t.options.nonblock&&(e.stopPropagation(),a(o,e,"ondblclick"))}})}},e});