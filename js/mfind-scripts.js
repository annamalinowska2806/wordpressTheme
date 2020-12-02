/* qTip2 v2.2.0 None | qtip2.com | Licensed MIT, GPL | Sat Mar 15 2014 11:30:39 */

!function(a,b,c){!function(a){"use strict";"function"==typeof define&&define.amd?define(["jquery"],a):jQuery&&!jQuery.fn.qtip&&a(jQuery)}(function(d){"use strict";function e(a,b,c,e){this.id=c,this.target=a,this.tooltip=A,this.elements={target:a},this._id=J+"-"+c,this.timers={img:{}},this.options=b,this.plugins={},this.cache={event:{},target:d(),disabled:z,attr:e,onTooltip:z,lastClass:""},this.rendered=this.destroyed=this.disabled=this.waiting=this.hiddenDuringWait=this.positioning=this.triggering=z}function f(a){return a===A||"object"!==d.type(a)}function g(a){return!(d.isFunction(a)||a&&a.attr||a.length||"object"===d.type(a)&&(a.jquery||a.then))}function h(a){var b,c,e,h;return f(a)?z:(f(a.metadata)&&(a.metadata={type:a.metadata}),"content"in a&&(b=a.content,f(b)||b.jquery||b.done?b=a.content={text:c=g(b)?z:b}:c=b.text,"ajax"in b&&(e=b.ajax,h=e&&e.once!==z,delete b.ajax,b.text=function(a,b){var f=c||d(this).attr(b.options.content.attr)||"Loading...",g=d.ajax(d.extend({},e,{context:b})).then(e.success,A,e.error).then(function(a){return a&&h&&b.set("content.text",a),a},function(a,c,d){b.destroyed||0===a.status||b.set("content.text",c+": "+d)});return h?f:(b.set("content.text",f),g)}),"title"in b&&(f(b.title)||(b.button=b.title.button,b.title=b.title.text),g(b.title||z)&&(b.title=z))),"position"in a&&f(a.position)&&(a.position={my:a.position,at:a.position}),"show"in a&&f(a.show)&&(a.show=a.show.jquery?{target:a.show}:a.show===y?{ready:y}:{event:a.show}),"hide"in a&&f(a.hide)&&(a.hide=a.hide.jquery?{target:a.hide}:{event:a.hide}),"style"in a&&f(a.style)&&(a.style={classes:a.style}),d.each(I,function(){this.sanitize&&this.sanitize(a)}),a)}function i(a,b){for(var c,d=0,e=a,f=b.split(".");e=e[f[d++]];)d<f.length&&(c=e);return[c||a,f.pop()]}function j(a,b){var c,d,e;for(c in this.checks)for(d in this.checks[c])(e=new RegExp(d,"i").exec(a))&&(b.push(e),("builtin"===c||this.plugins[c])&&this.checks[c][d].apply(this.plugins[c]||this,b))}function k(a){return M.concat("").join(a?"-"+a+" ":" ")}function l(c){return c&&{type:c.type,pageX:c.pageX,pageY:c.pageY,target:c.target,relatedTarget:c.relatedTarget,scrollX:c.scrollX||a.pageXOffset||b.body.scrollLeft||b.documentElement.scrollLeft,scrollY:c.scrollY||a.pageYOffset||b.body.scrollTop||b.documentElement.scrollTop}||{}}function m(a,b){return b>0?setTimeout(d.proxy(a,this),b):(a.call(this),void 0)}function n(a){return this.tooltip.hasClass(T)?z:(clearTimeout(this.timers.show),clearTimeout(this.timers.hide),this.timers.show=m.call(this,function(){this.toggle(y,a)},this.options.show.delay),void 0)}function o(a){if(this.tooltip.hasClass(T))return z;var b=d(a.relatedTarget),c=b.closest(N)[0]===this.tooltip[0],e=b[0]===this.options.show.target[0];if(clearTimeout(this.timers.show),clearTimeout(this.timers.hide),this!==b[0]&&"mouse"===this.options.position.target&&c||this.options.hide.fixed&&/mouse(out|leave|move)/.test(a.type)&&(c||e))try{a.preventDefault(),a.stopImmediatePropagation()}catch(f){}else this.timers.hide=m.call(this,function(){this.toggle(z,a)},this.options.hide.delay,this)}function p(a){return this.tooltip.hasClass(T)||!this.options.hide.inactive?z:(clearTimeout(this.timers.inactive),this.timers.inactive=m.call(this,function(){this.hide(a)},this.options.hide.inactive),void 0)}function q(a){this.rendered&&this.tooltip[0].offsetWidth>0&&this.reposition(a)}function r(a,c,e){d(b.body).delegate(a,(c.split?c:c.join($+" "))+$,function(){var a=t.api[d.attr(this,L)];a&&!a.disabled&&e.apply(a,arguments)})}function s(a,c,f){var g,i,j,k,l,m=d(b.body),n=a[0]===b?m:a,o=a.metadata?a.metadata(f.metadata):A,p="html5"===f.metadata.type&&o?o[f.metadata.name]:A,q=a.data(f.metadata.name||"qtipopts");try{q="string"==typeof q?d.parseJSON(q):q}catch(r){}if(k=d.extend(y,{},t.defaults,f,"object"==typeof q?h(q):A,h(p||o)),i=k.position,k.id=c,"boolean"==typeof k.content.text){if(j=a.attr(k.content.attr),k.content.attr===z||!j)return z;k.content.text=j}if(i.container.length||(i.container=m),i.target===z&&(i.target=n),k.show.target===z&&(k.show.target=n),k.show.solo===y&&(k.show.solo=i.container.closest("body")),k.hide.target===z&&(k.hide.target=n),k.position.viewport===y&&(k.position.viewport=i.container),i.container=i.container.eq(0),i.at=new v(i.at,y),i.my=new v(i.my),a.data(J))if(k.overwrite)a.qtip("destroy",!0);else if(k.overwrite===z)return z;return a.attr(K,c),k.suppress&&(l=a.attr("title"))&&a.removeAttr("title").attr(V,l).attr("title",""),g=new e(a,k,c,!!j),a.data(J,g),a.one("remove.qtip-"+c+" removeqtip.qtip-"+c,function(){var a;(a=d(this).data(J))&&a.destroy(!0)}),g}var t,u,v,w,x,y=!0,z=!1,A=null,B="x",C="y",D="top",E="left",F="bottom",G="right",H="center",I={},J="qtip",K="data-hasqtip",L="data-qtip-id",M=["ui-widget","ui-tooltip"],N="."+J,O="click dblclick mousedown mouseup mousemove mouseleave mouseenter".split(" "),P=J+"-fixed",Q=J+"-default",R=J+"-focus",S=J+"-hover",T=J+"-disabled",U="_replacedByqTip",V="oldtitle",W={ie:function(){for(var a=3,c=b.createElement("div");(c.innerHTML="<!--[if gt IE "+ ++a+"]><i></i><![endif]-->")&&c.getElementsByTagName("i")[0];);return a>4?a:0/0}(),iOS:parseFloat((""+(/CPU.*OS ([0-9_]{1,5})|(CPU like).*AppleWebKit.*Mobile/i.exec(navigator.userAgent)||[0,""])[1]).replace("undefined","3_2").replace("_",".").replace("_",""))||z};u=e.prototype,u._when=function(a){return d.when.apply(d,a)},u.render=function(a){if(this.rendered||this.destroyed)return this;var b,c=this,e=this.options,f=this.cache,g=this.elements,h=e.content.text,i=e.content.title,j=e.content.button,k=e.position,l=("."+this._id+" ",[]);return d.attr(this.target[0],"aria-describedby",this._id),this.tooltip=g.tooltip=b=d("<div/>",{id:this._id,"class":[J,Q,e.style.classes,J+"-pos-"+e.position.my.abbrev()].join(" "),width:e.style.width||"",height:e.style.height||"",tracking:"mouse"===k.target&&k.adjust.mouse,role:"alert","aria-live":"polite","aria-atomic":z,"aria-describedby":this._id+"-content","aria-hidden":y}).toggleClass(T,this.disabled).attr(L,this.id).data(J,this).appendTo(k.container).append(g.content=d("<div />",{"class":J+"-content",id:this._id+"-content","aria-atomic":y})),this.rendered=-1,this.positioning=y,i&&(this._createTitle(),d.isFunction(i)||l.push(this._updateTitle(i,z))),j&&this._createButton(),d.isFunction(h)||l.push(this._updateContent(h,z)),this.rendered=y,this._setWidget(),d.each(I,function(a){var b;"render"===this.initialize&&(b=this(c))&&(c.plugins[a]=b)}),this._unassignEvents(),this._assignEvents(),this._when(l).then(function(){c._trigger("render"),c.positioning=z,c.hiddenDuringWait||!e.show.ready&&!a||c.toggle(y,f.event,z),c.hiddenDuringWait=z}),t.api[this.id]=this,this},u.destroy=function(a){function b(){if(!this.destroyed){this.destroyed=y;var a=this.target,b=a.attr(V);this.rendered&&this.tooltip.stop(1,0).find("*").remove().end().remove(),d.each(this.plugins,function(){this.destroy&&this.destroy()}),clearTimeout(this.timers.show),clearTimeout(this.timers.hide),this._unassignEvents(),a.removeData(J).removeAttr(L).removeAttr(K).removeAttr("aria-describedby"),this.options.suppress&&b&&a.attr("title",b).removeAttr(V),this._unbind(a),this.options=this.elements=this.cache=this.timers=this.plugins=this.mouse=A,delete t.api[this.id]}}return this.destroyed?this.target:(a===y&&"hide"!==this.triggering||!this.rendered?b.call(this):(this.tooltip.one("tooltiphidden",d.proxy(b,this)),!this.triggering&&this.hide()),this.target)},w=u.checks={builtin:{"^id$":function(a,b,c,e){var f=c===y?t.nextid:c,g=J+"-"+f;f!==z&&f.length>0&&!d("#"+g).length?(this._id=g,this.rendered&&(this.tooltip[0].id=this._id,this.elements.content[0].id=this._id+"-content",this.elements.title[0].id=this._id+"-title")):a[b]=e},"^prerender":function(a,b,c){c&&!this.rendered&&this.render(this.options.show.ready)},"^content.text$":function(a,b,c){this._updateContent(c)},"^content.attr$":function(a,b,c,d){this.options.content.text===this.target.attr(d)&&this._updateContent(this.target.attr(c))},"^content.title$":function(a,b,c){return c?(c&&!this.elements.title&&this._createTitle(),this._updateTitle(c),void 0):this._removeTitle()},"^content.button$":function(a,b,c){this._updateButton(c)},"^content.title.(text|button)$":function(a,b,c){this.set("content."+b,c)},"^position.(my|at)$":function(a,b,c){"string"==typeof c&&(a[b]=new v(c,"at"===b))},"^position.container$":function(a,b,c){this.rendered&&this.tooltip.appendTo(c)},"^show.ready$":function(a,b,c){c&&(!this.rendered&&this.render(y)||this.toggle(y))},
  "^style.classes$":function(a,b,c,d){this.rendered&&this.tooltip.removeClass(d).addClass(c)},"^style.(width|height)":function(a,b,c){this.rendered&&this.tooltip.css(b,c)},"^style.widget|content.title":function(){this.rendered&&this._setWidget()},"^style.def":function(a,b,c){this.rendered&&this.tooltip.toggleClass(Q,!!c)},"^events.(render|show|move|hide|focus|blur)$":function(a,b,c){this.rendered&&this.tooltip[(d.isFunction(c)?"":"un")+"bind"]("tooltip"+b,c)},"^(show|hide|position).(event|target|fixed|inactive|leave|distance|viewport|adjust)":function(){if(this.rendered){var a=this.options.position;this.tooltip.attr("tracking","mouse"===a.target&&a.adjust.mouse),this._unassignEvents(),this._assignEvents()}}}},u.get=function(a){if(this.destroyed)return this;var b=i(this.options,a.toLowerCase()),c=b[0][b[1]];return c.precedance?c.string():c};var X=/^position\.(my|at|adjust|target|container|viewport)|style|content|show\.ready/i,Y=/^prerender|show\.ready/i;u.set=function(a,b){if(this.destroyed)return this;{var c,e=this.rendered,f=z,g=this.options;this.checks}return"string"==typeof a?(c=a,a={},a[c]=b):a=d.extend({},a),d.each(a,function(b,c){if(e&&Y.test(b))return delete a[b],void 0;var h,j=i(g,b.toLowerCase());h=j[0][j[1]],j[0][j[1]]=c&&c.nodeType?d(c):c,f=X.test(b)||f,a[b]=[j[0],j[1],c,h]}),h(g),this.positioning=y,d.each(a,d.proxy(j,this)),this.positioning=z,this.rendered&&this.tooltip[0].offsetWidth>0&&f&&this.reposition("mouse"===g.position.target?A:this.cache.event),this},u._update=function(a,b){var c=this,e=this.cache;return this.rendered&&a?(d.isFunction(a)&&(a=a.call(this.elements.target,e.event,this)||""),d.isFunction(a.then)?(e.waiting=y,a.then(function(a){return e.waiting=z,c._update(a,b)},A,function(a){return c._update(a,b)})):a===z||!a&&""!==a?z:(a.jquery&&a.length>0?b.empty().append(a.css({display:"block",visibility:"visible"})):b.html(a),this._waitForContent(b).then(function(a){a.images&&a.images.length&&c.rendered&&c.tooltip[0].offsetWidth>0&&c.reposition(e.event,!a.length)}))):z},u._waitForContent=function(a){var b=this.cache;return b.waiting=y,(d.fn.imagesLoaded?a.imagesLoaded():d.Deferred().resolve([])).done(function(){b.waiting=z}).promise()},u._updateContent=function(a,b){this._update(a,this.elements.content,b)},u._updateTitle=function(a,b){this._update(a,this.elements.title,b)===z&&this._removeTitle(z)},u._createTitle=function(){var a=this.elements,b=this._id+"-title";a.titlebar&&this._removeTitle(),a.titlebar=d("<div />",{"class":J+"-titlebar "+(this.options.style.widget?k("header"):"")}).append(a.title=d("<div />",{id:b,"class":J+"-title","aria-atomic":y})).insertBefore(a.content).delegate(".qtip-close","mousedown keydown mouseup keyup mouseout",function(a){d(this).toggleClass("ui-state-active ui-state-focus","down"===a.type.substr(-4))}).delegate(".qtip-close","mouseover mouseout",function(a){d(this).toggleClass("ui-state-hover","mouseover"===a.type)}),this.options.content.button&&this._createButton()},u._removeTitle=function(a){var b=this.elements;b.title&&(b.titlebar.remove(),b.titlebar=b.title=b.button=A,a!==z&&this.reposition())},u.reposition=function(c,e){if(!this.rendered||this.positioning||this.destroyed)return this;this.positioning=y;var f,g,h=this.cache,i=this.tooltip,j=this.options.position,k=j.target,l=j.my,m=j.at,n=j.viewport,o=j.container,p=j.adjust,q=p.method.split(" "),r=i.outerWidth(z),s=i.outerHeight(z),t=0,u=0,v=i.css("position"),w={left:0,top:0},x=i[0].offsetWidth>0,A=c&&"scroll"===c.type,B=d(a),C=o[0].ownerDocument,J=this.mouse;if(d.isArray(k)&&2===k.length)m={x:E,y:D},w={left:k[0],top:k[1]};else if("mouse"===k)m={x:E,y:D},!J||!J.pageX||!p.mouse&&c&&c.pageX?c&&c.pageX||((!p.mouse||this.options.show.distance)&&h.origin&&h.origin.pageX?c=h.origin:(!c||c&&("resize"===c.type||"scroll"===c.type))&&(c=h.event)):c=J,"static"!==v&&(w=o.offset()),C.body.offsetWidth!==(a.innerWidth||C.documentElement.clientWidth)&&(g=d(b.body).offset()),w={left:c.pageX-w.left+(g&&g.left||0),top:c.pageY-w.top+(g&&g.top||0)},p.mouse&&A&&J&&(w.left-=(J.scrollX||0)-B.scrollLeft(),w.top-=(J.scrollY||0)-B.scrollTop());else{if("event"===k?c&&c.target&&"scroll"!==c.type&&"resize"!==c.type?h.target=d(c.target):c.target||(h.target=this.elements.target):"event"!==k&&(h.target=d(k.jquery?k:this.elements.target)),k=h.target,k=d(k).eq(0),0===k.length)return this;k[0]===b||k[0]===a?(t=W.iOS?a.innerWidth:k.width(),u=W.iOS?a.innerHeight:k.height(),k[0]===a&&(w={top:(n||k).scrollTop(),left:(n||k).scrollLeft()})):I.imagemap&&k.is("area")?f=I.imagemap(this,k,m,I.viewport?q:z):I.svg&&k&&k[0].ownerSVGElement?f=I.svg(this,k,m,I.viewport?q:z):(t=k.outerWidth(z),u=k.outerHeight(z),w=k.offset()),f&&(t=f.width,u=f.height,g=f.offset,w=f.position),w=this.reposition.offset(k,w,o),(W.iOS>3.1&&W.iOS<4.1||W.iOS>=4.3&&W.iOS<4.33||!W.iOS&&"fixed"===v)&&(w.left-=B.scrollLeft(),w.top-=B.scrollTop()),(!f||f&&f.adjustable!==z)&&(w.left+=m.x===G?t:m.x===H?t/2:0,w.top+=m.y===F?u:m.y===H?u/2:0)}return w.left+=p.x+(l.x===G?-r:l.x===H?-r/2:0),w.top+=p.y+(l.y===F?-s:l.y===H?-s/2:0),I.viewport?(w.adjusted=I.viewport(this,w,j,t,u,r,s),g&&w.adjusted.left&&(w.left+=g.left),g&&w.adjusted.top&&(w.top+=g.top)):w.adjusted={left:0,top:0},this._trigger("move",[w,n.elem||n],c)?(delete w.adjusted,e===z||!x||isNaN(w.left)||isNaN(w.top)||"mouse"===k||!d.isFunction(j.effect)?i.css(w):d.isFunction(j.effect)&&(j.effect.call(i,this,d.extend({},w)),i.queue(function(a){d(this).css({opacity:"",height:""}),W.ie&&this.style.removeAttribute("filter"),a()})),this.positioning=z,this):this},u.reposition.offset=function(a,c,e){function f(a,b){c.left+=b*a.scrollLeft(),c.top+=b*a.scrollTop()}if(!e[0])return c;var g,h,i,j,k=d(a[0].ownerDocument),l=!!W.ie&&"CSS1Compat"!==b.compatMode,m=e[0];do"static"!==(h=d.css(m,"position"))&&("fixed"===h?(i=m.getBoundingClientRect(),f(k,-1)):(i=d(m).position(),i.left+=parseFloat(d.css(m,"borderLeftWidth"))||0,i.top+=parseFloat(d.css(m,"borderTopWidth"))||0),c.left-=i.left+(parseFloat(d.css(m,"marginLeft"))||0),c.top-=i.top+(parseFloat(d.css(m,"marginTop"))||0),g||"hidden"===(j=d.css(m,"overflow"))||"visible"===j||(g=d(m)));while(m=m.offsetParent);return g&&(g[0]!==k[0]||l)&&f(g,1),c};var Z=(v=u.reposition.Corner=function(a,b){a=(""+a).replace(/([A-Z])/," $1").replace(/middle/gi,H).toLowerCase(),this.x=(a.match(/left|right/i)||a.match(/center/)||["inherit"])[0].toLowerCase(),this.y=(a.match(/top|bottom|center/i)||["inherit"])[0].toLowerCase(),this.forceY=!!b;var c=a.charAt(0);this.precedance="t"===c||"b"===c?C:B}).prototype;Z.invert=function(a,b){this[a]=this[a]===E?G:this[a]===G?E:b||this[a]},Z.string=function(){var a=this.x,b=this.y;return a===b?a:this.precedance===C||this.forceY&&"center"!==b?b+" "+a:a+" "+b},Z.abbrev=function(){var a=this.string().split(" ");return a[0].charAt(0)+(a[1]&&a[1].charAt(0)||"")},Z.clone=function(){return new v(this.string(),this.forceY)},u.toggle=function(a,c){var e=this.cache,f=this.options,g=this.tooltip;if(c){if(/over|enter/.test(c.type)&&/out|leave/.test(e.event.type)&&f.show.target.add(c.target).length===f.show.target.length&&g.has(c.relatedTarget).length)return this;e.event=l(c)}if(this.waiting&&!a&&(this.hiddenDuringWait=y),!this.rendered)return a?this.render(1):this;if(this.destroyed||this.disabled)return this;var h,i,j,k=a?"show":"hide",m=this.options[k],n=(this.options[a?"hide":"show"],this.options.position),o=this.options.content,p=this.tooltip.css("width"),q=this.tooltip.is(":visible"),r=a||1===m.target.length,s=!c||m.target.length<2||e.target[0]===c.target;return(typeof a).search("boolean|number")&&(a=!q),h=!g.is(":animated")&&q===a&&s,i=h?A:!!this._trigger(k,[90]),this.destroyed?this:(i!==z&&a&&this.focus(c),!i||h?this:(d.attr(g[0],"aria-hidden",!a),a?(e.origin=l(this.mouse),d.isFunction(o.text)&&this._updateContent(o.text,z),d.isFunction(o.title)&&this._updateTitle(o.title,z),!x&&"mouse"===n.target&&n.adjust.mouse&&(d(b).bind("mousemove."+J,this._storeMouse),x=y),p||g.css("width",g.outerWidth(z)),this.reposition(c,arguments[2]),p||g.css("width",""),m.solo&&("string"==typeof m.solo?d(m.solo):d(N,m.solo)).not(g).not(m.target).qtip("hide",d.Event("tooltipsolo"))):(clearTimeout(this.timers.show),delete e.origin,x&&!d(N+'[tracking="true"]:visible',m.solo).not(g).length&&(d(b).unbind("mousemove."+J),x=z),this.blur(c)),j=d.proxy(function(){a?(W.ie&&g[0].style.removeAttribute("filter"),g.css("overflow",""),"string"==typeof m.autofocus&&d(this.options.show.autofocus,g).focus(),this.options.show.target.trigger("qtip-"+this.id+"-inactive")):g.css({display:"",visibility:"",opacity:"",left:"",top:""}),this._trigger(a?"visible":"hidden")},this),m.effect===z||r===z?(g[k](),j()):d.isFunction(m.effect)?(g.stop(1,1),m.effect.call(g,this),g.queue("fx",function(a){j(),a()})):g.fadeTo(90,a?1:0,j),a&&m.target.trigger("qtip-"+this.id+"-inactive"),this))},u.show=function(a){return this.toggle(y,a)},u.hide=function(a){return this.toggle(z,a)},u.focus=function(a){if(!this.rendered||this.destroyed)return this;var b=d(N),c=this.tooltip,e=parseInt(c[0].style.zIndex,10),f=t.zindex+b.length;return c.hasClass(R)||this._trigger("focus",[f],a)&&(e!==f&&(b.each(function(){this.style.zIndex>e&&(this.style.zIndex=this.style.zIndex-1)}),b.filter("."+R).qtip("blur",a)),c.addClass(R)[0].style.zIndex=f),this},u.blur=function(a){return!this.rendered||this.destroyed?this:(this.tooltip.removeClass(R),this._trigger("blur",[this.tooltip.css("zIndex")],a),this)},u.disable=function(a){return this.destroyed?this:("toggle"===a?a=!(this.rendered?this.tooltip.hasClass(T):this.disabled):"boolean"!=typeof a&&(a=y),this.rendered&&this.tooltip.toggleClass(T,a).attr("aria-disabled",a),this.disabled=!!a,this)},u.enable=function(){return this.disable(z)},u._createButton=function(){var a=this,b=this.elements,c=b.tooltip,e=this.options.content.button,f="string"==typeof e,g=f?e:"Close tooltip";b.button&&b.button.remove(),b.button=e.jquery?e:d("<a />",{"class":"qtip-close "+(this.options.style.widget?"":J+"-icon"),title:g,"aria-label":g}).prepend(d("<span />",{"class":"ui-icon ui-icon-close",html:"&times;"})),b.button.appendTo(b.titlebar||c).attr("role","button").click(function(b){return c.hasClass(T)||a.hide(b),z})},u._updateButton=function(a){if(!this.rendered)return z;var b=this.elements.button;a?this._createButton():b.remove()},u._setWidget=function(){var a=this.options.style.widget,b=this.elements,c=b.tooltip,d=c.hasClass(T);c.removeClass(T),T=a?"ui-state-disabled":"qtip-disabled",c.toggleClass(T,d),c.toggleClass("ui-helper-reset "+k(),a).toggleClass(Q,this.options.style.def&&!a),b.content&&b.content.toggleClass(k("content"),a),b.titlebar&&b.titlebar.toggleClass(k("header"),a),b.button&&b.button.toggleClass(J+"-icon",!a)},u._storeMouse=function(a){(this.mouse=l(a)).type="mousemove"},u._bind=function(a,b,c,e,f){var g="."+this._id+(e?"-"+e:"");b.length&&d(a).bind((b.split?b:b.join(g+" "))+g,d.proxy(c,f||this))},u._unbind=function(a,b){d(a).unbind("."+this._id+(b?"-"+b:""))};var $="."+J;d(function(){r(N,["mouseenter","mouseleave"],function(a){var b="mouseenter"===a.type,c=d(a.currentTarget),e=d(a.relatedTarget||a.target),f=this.options;b?(this.focus(a),c.hasClass(P)&&!c.hasClass(T)&&clearTimeout(this.timers.hide)):"mouse"===f.position.target&&f.hide.event&&f.show.target&&!e.closest(f.show.target[0]).length&&this.hide(a),c.toggleClass(S,b)}),r("["+L+"]",O,p)}),u._trigger=function(a,b,c){var e=d.Event("tooltip"+a);return e.originalEvent=c&&d.extend({},c)||this.cache.event||A,this.triggering=a,this.tooltip.trigger(e,[this].concat(b||[])),this.triggering=z,!e.isDefaultPrevented()},u._bindEvents=function(a,b,c,e,f,g){if(e.add(c).length===e.length){var h=[];b=d.map(b,function(b){var c=d.inArray(b,a);return c>-1?(h.push(a.splice(c,1)[0]),void 0):b}),h.length&&this._bind(c,h,function(a){var b=this.rendered?this.tooltip[0].offsetWidth>0:!1;(b?g:f).call(this,a)})}this._bind(c,a,f),this._bind(e,b,g)},u._assignInitialEvents=function(a){function b(a){return this.disabled||this.destroyed?z:(this.cache.event=l(a),this.cache.target=a?d(a.target):[c],clearTimeout(this.timers.show),this.timers.show=m.call(this,function(){this.render("object"==typeof a||e.show.ready)},e.show.delay),void 0)}var e=this.options,f=e.show.target,g=e.hide.target,h=e.show.event?d.trim(""+e.show.event).split(" "):[],i=e.hide.event?d.trim(""+e.hide.event).split(" "):[];/mouse(over|enter)/i.test(e.show.event)&&!/mouse(out|leave)/i.test(e.hide.event)&&i.push("mouseleave"),this._bind(f,"mousemove",function(a){this._storeMouse(a),this.cache.onTarget=y}),this._bindEvents(h,i,f,g,b,function(){clearTimeout(this.timers.show)}),(e.show.ready||e.prerender)&&b.call(this,a)},u._assignEvents=function(){var c=this,e=this.options,f=e.position,g=this.tooltip,h=e.show.target,i=e.hide.target,j=f.container,k=f.viewport,l=d(b),m=(d(b.body),d(a)),r=e.show.event?d.trim(""+e.show.event).split(" "):[],s=e.hide.event?d.trim(""+e.hide.event).split(" "):[];d.each(e.events,function(a,b){c._bind(g,"toggle"===a?["tooltipshow","tooltiphide"]:["tooltip"+a],b,null,g)}),/mouse(out|leave)/i.test(e.hide.event)&&"window"===e.hide.leave&&this._bind(l,["mouseout","blur"],function(a){/select|option/.test(a.target.nodeName)||a.relatedTarget||this.hide(a)}),e.hide.fixed?i=i.add(g.addClass(P)):/mouse(over|enter)/i.test(e.show.event)&&this._bind(i,"mouseleave",function(){clearTimeout(this.timers.show)}),(""+e.hide.event).indexOf("unfocus")>-1&&this._bind(j.closest("html"),["mousedown","touchstart"],function(a){var b=d(a.target),c=this.rendered&&!this.tooltip.hasClass(T)&&this.tooltip[0].offsetWidth>0,e=b.parents(N).filter(this.tooltip[0]).length>0;b[0]===this.target[0]||b[0]===this.tooltip[0]||e||this.target.has(b[0]).length||!c||this.hide(a)}),"number"==typeof e.hide.inactive&&(this._bind(h,"qtip-"+this.id+"-inactive",p),this._bind(i.add(g),t.inactiveEvents,p,"-inactive")),this._bindEvents(r,s,h,i,n,o),this._bind(h.add(g),"mousemove",function(a){if("number"==typeof e.hide.distance){var b=this.cache.origin||{},c=this.options.hide.distance,d=Math.abs;(d(a.pageX-b.pageX)>=c||d(a.pageY-b.pageY)>=c)&&this.hide(a)}this._storeMouse(a)}),"mouse"===f.target&&f.adjust.mouse&&(e.hide.event&&this._bind(h,["mouseenter","mouseleave"],function(a){this.cache.onTarget="mouseenter"===a.type}),this._bind(l,"mousemove",function(a){this.rendered&&this.cache.onTarget&&!this.tooltip.hasClass(T)&&this.tooltip[0].offsetWidth>0&&this.reposition(a)})),(f.adjust.resize||k.length)&&this._bind(d.event.special.resize?k:m,"resize",q),f.adjust.scroll&&this._bind(m.add(f.container),"scroll",q)},u._unassignEvents=function(){var c=[this.options.show.target[0],this.options.hide.target[0],this.rendered&&this.tooltip[0],this.options.position.container[0],this.options.position.viewport[0],this.options.position.container.closest("html")[0],a,b];this._unbind(d([]).pushStack(d.grep(c,function(a){return"object"==typeof a})))},t=d.fn.qtip=function(a,b,e){var f=(""+a).toLowerCase(),g=A,i=d.makeArray(arguments).slice(1),j=i[i.length-1],k=this[0]?d.data(this[0],J):A;return!arguments.length&&k||"api"===f?k:"string"==typeof a?(this.each(function(){var a=d.data(this,
  J);if(!a)return y;if(j&&j.timeStamp&&(a.cache.event=j),!b||"option"!==f&&"options"!==f)a[f]&&a[f].apply(a,i);else{if(e===c&&!d.isPlainObject(b))return g=a.get(b),z;a.set(b,e)}}),g!==A?g:this):"object"!=typeof a&&arguments.length?void 0:(k=h(d.extend(y,{},a)),this.each(function(a){var b,c;return c=d.isArray(k.id)?k.id[a]:k.id,c=!c||c===z||c.length<1||t.api[c]?t.nextid++:c,b=s(d(this),c,k),b===z?y:(t.api[c]=b,d.each(I,function(){"initialize"===this.initialize&&this(b)}),b._assignInitialEvents(j),void 0)}))},d.qtip=e,t.api={},d.each({attr:function(a,b){if(this.length){var c=this[0],e="title",f=d.data(c,"qtip");if(a===e&&f&&"object"==typeof f&&f.options.suppress)return arguments.length<2?d.attr(c,V):(f&&f.options.content.attr===e&&f.cache.attr&&f.set("content.text",b),this.attr(V,b))}return d.fn["attr"+U].apply(this,arguments)},clone:function(a){var b=(d([]),d.fn["clone"+U].apply(this,arguments));return a||b.filter("["+V+"]").attr("title",function(){return d.attr(this,V)}).removeAttr(V),b}},function(a,b){if(!b||d.fn[a+U])return y;var c=d.fn[a+U]=d.fn[a];d.fn[a]=function(){return b.apply(this,arguments)||c.apply(this,arguments)}}),d.ui||(d["cleanData"+U]=d.cleanData,d.cleanData=function(a){for(var b,c=0;(b=d(a[c])).length;c++)if(b.attr(K))try{b.triggerHandler("removeqtip")}catch(e){}d["cleanData"+U].apply(this,arguments)}),t.version="2.2.0",t.nextid=0,t.inactiveEvents=O,t.zindex=15e3,t.defaults={prerender:z,id:z,overwrite:y,suppress:y,content:{text:y,attr:"title",title:z,button:z},position:{my:"top left",at:"bottom right",target:z,container:z,viewport:z,adjust:{x:0,y:0,mouse:y,scroll:y,resize:y,method:"flipinvert flipinvert"},effect:function(a,b){d(this).animate(b,{duration:200,queue:z})}},show:{target:z,event:"mouseenter",effect:y,delay:90,solo:z,ready:z,autofocus:z},hide:{target:z,event:"mouseleave",effect:y,delay:0,fixed:z,inactive:z,leave:"window",distance:z},style:{classes:"",widget:z,width:z,height:z,def:y},events:{render:A,move:A,show:A,hide:A,toggle:A,visible:A,hidden:A,focus:A,blur:A}}})}(window,document);
//# sourceMappingURL=https://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.0//var/www/qtip2/build/tmp/tmp-11954t19ejds/jquery.qtip.min.map

/*! Copyright (c) 2011 Brandon Aaron (https://brandonaaron.net)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Thanks to: https://adomas.org/javascript-mouse-wheel/ for some pointers.
 * Thanks to: Mathias Bank(https://www.mathias-bank.de) for a scope bug fix.
 * Thanks to: Seamus Leahy for adding deltaX and deltaY
 *
 * Version: 3.0.6
 *
 * Requires: 1.2.2+
 */
(function(a){function d(b){var c=b||window.event,d=[].slice.call(arguments,1),e=0,f=!0,g=0,h=0;return b=a.event.fix(c),b.type="mousewheel",c.wheelDelta&&(e=c.wheelDelta/120),c.detail&&(e=-c.detail/3),h=e,c.axis!==undefined&&c.axis===c.HORIZONTAL_AXIS&&(h=0,g=-1*e),c.wheelDeltaY!==undefined&&(h=c.wheelDeltaY/120),c.wheelDeltaX!==undefined&&(g=-1*c.wheelDeltaX/120),d.unshift(b,e,g,h),(a.event.dispatch||a.event.handle).apply(this,d)}var b=["DOMMouseScroll","mousewheel"];if(a.event.fixHooks)for(var c=b.length;c;)a.event.fixHooks[b[--c]]=a.event.mouseHooks;a.event.special.mousewheel={setup:function(){if(this.addEventListener)for(var a=b.length;a;)this.addEventListener(b[--a],d,!1);else this.onmousewheel=d},teardown:function(){if(this.removeEventListener)for(var a=b.length;a;)this.removeEventListener(b[--a],d,!1);else this.onmousewheel=null}},a.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})})(jQuery);


/* == jquery mousewheel plugin == Version: 3.1.12, License: MIT License (MIT) */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a:a(jQuery)}(function(a){function b(b){var g=b||window.event,h=i.call(arguments,1),j=0,l=0,m=0,n=0,o=0,p=0;if(b=a.event.fix(g),b.type="mousewheel","detail"in g&&(m=-1*g.detail),"wheelDelta"in g&&(m=g.wheelDelta),"wheelDeltaY"in g&&(m=g.wheelDeltaY),"wheelDeltaX"in g&&(l=-1*g.wheelDeltaX),"axis"in g&&g.axis===g.HORIZONTAL_AXIS&&(l=-1*m,m=0),j=0===m?l:m,"deltaY"in g&&(m=-1*g.deltaY,j=m),"deltaX"in g&&(l=g.deltaX,0===m&&(j=-1*l)),0!==m||0!==l){if(1===g.deltaMode){var q=a.data(this,"mousewheel-line-height");j*=q,m*=q,l*=q}else if(2===g.deltaMode){var r=a.data(this,"mousewheel-page-height");j*=r,m*=r,l*=r}if(n=Math.max(Math.abs(m),Math.abs(l)),(!f||f>n)&&(f=n,d(g,n)&&(f/=40)),d(g,n)&&(j/=40,l/=40,m/=40),j=Math[j>=1?"floor":"ceil"](j/f),l=Math[l>=1?"floor":"ceil"](l/f),m=Math[m>=1?"floor":"ceil"](m/f),k.settings.normalizeOffset&&this.getBoundingClientRect){var s=this.getBoundingClientRect();o=b.clientX-s.left,p=b.clientY-s.top}return b.deltaX=l,b.deltaY=m,b.deltaFactor=f,b.offsetX=o,b.offsetY=p,b.deltaMode=0,h.unshift(b,j,l,m),e&&clearTimeout(e),e=setTimeout(c,200),(a.event.dispatch||a.event.handle).apply(this,h)}}function c(){f=null}function d(a,b){return k.settings.adjustOldDeltas&&"mousewheel"===a.type&&b%120===0}var e,f,g=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],h="onwheel"in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],i=Array.prototype.slice;if(a.event.fixHooks)for(var j=g.length;j;)a.event.fixHooks[g[--j]]=a.event.mouseHooks;var k=a.event.special.mousewheel={version:"3.1.12",setup:function(){if(this.addEventListener)for(var c=h.length;c;)this.addEventListener(h[--c],b,!1);else this.onmousewheel=b;a.data(this,"mousewheel-line-height",k.getLineHeight(this)),a.data(this,"mousewheel-page-height",k.getPageHeight(this))},teardown:function(){if(this.removeEventListener)for(var c=h.length;c;)this.removeEventListener(h[--c],b,!1);else this.onmousewheel=null;a.removeData(this,"mousewheel-line-height"),a.removeData(this,"mousewheel-page-height")},getLineHeight:function(b){var c=a(b),d=c["offsetParent"in a.fn?"offsetParent":"parent"]();return d.length||(d=a("body")),parseInt(d.css("fontSize"),10)||parseInt(c.css("fontSize"),10)||16},getPageHeight:function(b){return a(b).height()},settings:{adjustOldDeltas:!0,normalizeOffset:!0}};a.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})});
/* == malihu jquery custom scrollbar plugin == Version: 3.0.7, License: MIT License (MIT) */
!function(e,t,a){!function(t){var o="function"==typeof define&&define.amd,n="https:"==a.location.protocol?"https:":"http:",i="cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.12/jquery.mousewheel.min.js";o||e.event.special.mousewheel||e("head").append(decodeURI("%3Cscript src="+n+"//"+i+"%3E%3C/script%3E")),t()}(function(){var o,n="mCustomScrollbar",i="mCS",r=".mCustomScrollbar",l={setTop:0,setLeft:0,axis:"y",scrollbarPosition:"inside",scrollInertia:950,autoDraggerLength:!0,alwaysShowScrollbar:0,snapOffset:0,mouseWheel:{enable:!0,scrollAmount:"auto",axis:"y",deltaFactor:"auto",disableOver:["select","option","keygen","datalist","textarea"]},scrollButtons:{scrollType:"stepless",scrollAmount:"auto"},keyboard:{enable:!0,scrollType:"stepless",scrollAmount:"auto"},contentTouchScroll:25,advanced:{autoScrollOnFocus:"input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",updateOnContentResize:!0,updateOnImageLoad:!0},theme:"light",callbacks:{onTotalScrollOffset:0,onTotalScrollBackOffset:0,alwaysTriggerOffsets:!0}},s=0,c={},d=t.attachEvent&&!t.addEventListener?1:0,u=!1,f=["mCSB_dragger_onDrag","mCSB_scrollTools_onDrag","mCS_img_loaded","mCS_disabled","mCS_destroyed","mCS_no_scrollbar","mCS-autoHide","mCS-dir-rtl","mCS_no_scrollbar_y","mCS_no_scrollbar_x","mCS_y_hidden","mCS_x_hidden","mCSB_draggerContainer","mCSB_buttonUp","mCSB_buttonDown","mCSB_buttonLeft","mCSB_buttonRight"],h={init:function(t){var t=e.extend(!0,{},l,t),a=m.call(this);if(t.live){var o=t.liveSelector||this.selector||r,n=e(o);if("off"===t.live)return void g(o);c[o]=setTimeout(function(){n.mCustomScrollbar(t),"once"===t.live&&n.length&&g(o)},500)}else g(o);return t.setWidth=t.set_width?t.set_width:t.setWidth,t.setHeight=t.set_height?t.set_height:t.setHeight,t.axis=t.horizontalScroll?"x":v(t.axis),t.scrollInertia=t.scrollInertia>0&&t.scrollInertia<17?17:t.scrollInertia,"object"!=typeof t.mouseWheel&&1==t.mouseWheel&&(t.mouseWheel={enable:!0,scrollAmount:"auto",axis:"y",preventDefault:!1,deltaFactor:"auto",normalizeDelta:!1,invert:!1}),t.mouseWheel.scrollAmount=t.mouseWheelPixels?t.mouseWheelPixels:t.mouseWheel.scrollAmount,t.mouseWheel.normalizeDelta=t.advanced.normalizeMouseWheelDelta?t.advanced.normalizeMouseWheelDelta:t.mouseWheel.normalizeDelta,t.scrollButtons.scrollType=x(t.scrollButtons.scrollType),p(t),e(a).each(function(){var a=e(this);if(!a.data(i)){a.data(i,{idx:++s,opt:t,scrollRatio:{y:null,x:null},overflowed:null,contentReset:{y:null,x:null},bindEvents:!1,tweenRunning:!1,sequential:{},langDir:a.css("direction"),cbOffsets:null,trigger:null});var o=a.data(i),n=o.opt,r=a.data("mcs-axis"),l=a.data("mcs-scrollbar-position"),c=a.data("mcs-theme");r&&(n.axis=r),l&&(n.scrollbarPosition=l),c&&(n.theme=c,p(n)),_.call(this),e("#mCSB_"+o.idx+"_container img:not(."+f[2]+")").addClass(f[2]),h.update.call(null,a)}})},update:function(t,a){var o=t||m.call(this);return e(o).each(function(){var t=e(this);if(t.data(i)){var o=t.data(i),n=o.opt,r=e("#mCSB_"+o.idx+"_container"),l=[e("#mCSB_"+o.idx+"_dragger_vertical"),e("#mCSB_"+o.idx+"_dragger_horizontal")];if(!r.length)return;o.tweenRunning&&Q(t),t.hasClass(f[3])&&t.removeClass(f[3]),t.hasClass(f[4])&&t.removeClass(f[4]),C.call(this),w.call(this),"y"===n.axis||n.advanced.autoExpandHorizontalScroll||r.css("width",S(r.children())),o.overflowed=k.call(this),R.call(this),n.autoDraggerLength&&y.call(this),B.call(this),O.call(this);var s=[Math.abs(r[0].offsetTop),Math.abs(r[0].offsetLeft)];"x"!==n.axis&&(o.overflowed[0]?l[0].height()>l[0].parent().height()?M.call(this):(G(t,s[0].toString(),{dir:"y",dur:0,overwrite:"none"}),o.contentReset.y=null):(M.call(this),"y"===n.axis?I.call(this):"yx"===n.axis&&o.overflowed[1]&&G(t,s[1].toString(),{dir:"x",dur:0,overwrite:"none"}))),"y"!==n.axis&&(o.overflowed[1]?l[1].width()>l[1].parent().width()?M.call(this):(G(t,s[1].toString(),{dir:"x",dur:0,overwrite:"none"}),o.contentReset.x=null):(M.call(this),"x"===n.axis?I.call(this):"yx"===n.axis&&o.overflowed[0]&&G(t,s[0].toString(),{dir:"y",dur:0,overwrite:"none"}))),a&&o&&(2===a&&n.callbacks.onImageLoad&&"function"==typeof n.callbacks.onImageLoad?n.callbacks.onImageLoad.call(this):3===a&&n.callbacks.onSelectorChange&&"function"==typeof n.callbacks.onSelectorChange?n.callbacks.onSelectorChange.call(this):n.callbacks.onUpdate&&"function"==typeof n.callbacks.onUpdate&&n.callbacks.onUpdate.call(this)),N.call(this)}})},scrollTo:function(t,a){if("undefined"!=typeof t&&null!=t){var o=m.call(this);return e(o).each(function(){var o=e(this);if(o.data(i)){var n=o.data(i),r=n.opt,l={trigger:"external",scrollInertia:r.scrollInertia,scrollEasing:"mcsEaseInOut",moveDragger:!1,timeout:60,callbacks:!0,onStart:!0,onUpdate:!0,onComplete:!0},s=e.extend(!0,{},l,a),c=Y.call(this,t),d=s.scrollInertia>0&&s.scrollInertia<17?17:s.scrollInertia;c[0]=X.call(this,c[0],"y"),c[1]=X.call(this,c[1],"x"),s.moveDragger&&(c[0]*=n.scrollRatio.y,c[1]*=n.scrollRatio.x),s.dur=d,setTimeout(function(){null!==c[0]&&"undefined"!=typeof c[0]&&"x"!==r.axis&&n.overflowed[0]&&(s.dir="y",s.overwrite="all",G(o,c[0].toString(),s)),null!==c[1]&&"undefined"!=typeof c[1]&&"y"!==r.axis&&n.overflowed[1]&&(s.dir="x",s.overwrite="none",G(o,c[1].toString(),s))},s.timeout)}})}},stop:function(){var t=m.call(this);return e(t).each(function(){var t=e(this);t.data(i)&&Q(t)})},disable:function(t){var a=m.call(this);return e(a).each(function(){var a=e(this);if(a.data(i)){{a.data(i)}N.call(this,"remove"),I.call(this),t&&M.call(this),R.call(this,!0),a.addClass(f[3])}})},destroy:function(){var t=m.call(this);return e(t).each(function(){var a=e(this);if(a.data(i)){var o=a.data(i),r=o.opt,l=e("#mCSB_"+o.idx),s=e("#mCSB_"+o.idx+"_container"),c=e(".mCSB_"+o.idx+"_scrollbar");r.live&&g(r.liveSelector||e(t).selector),N.call(this,"remove"),I.call(this),M.call(this),a.removeData(i),$(this,"mcs"),c.remove(),s.find("img."+f[2]).removeClass(f[2]),l.replaceWith(s.contents()),a.removeClass(n+" _"+i+"_"+o.idx+" "+f[6]+" "+f[7]+" "+f[5]+" "+f[3]).addClass(f[4])}})}},m=function(){return"object"!=typeof e(this)||e(this).length<1?r:this},p=function(t){var a=["rounded","rounded-dark","rounded-dots","rounded-dots-dark"],o=["rounded-dots","rounded-dots-dark","3d","3d-dark","3d-thick","3d-thick-dark","inset","inset-dark","inset-2","inset-2-dark","inset-3","inset-3-dark"],n=["minimal","minimal-dark"],i=["minimal","minimal-dark"],r=["minimal","minimal-dark"];t.autoDraggerLength=e.inArray(t.theme,a)>-1?!1:t.autoDraggerLength,t.autoExpandScrollbar=e.inArray(t.theme,o)>-1?!1:t.autoExpandScrollbar,t.scrollButtons.enable=e.inArray(t.theme,n)>-1?!1:t.scrollButtons.enable,t.autoHideScrollbar=e.inArray(t.theme,i)>-1?!0:t.autoHideScrollbar,t.scrollbarPosition=e.inArray(t.theme,r)>-1?"outside":t.scrollbarPosition},g=function(e){c[e]&&(clearTimeout(c[e]),$(c,e))},v=function(e){return"yx"===e||"xy"===e||"auto"===e?"yx":"x"===e||"horizontal"===e?"x":"y"},x=function(e){return"stepped"===e||"pixels"===e||"step"===e||"click"===e?"stepped":"stepless"},_=function(){var t=e(this),a=t.data(i),o=a.opt,r=o.autoExpandScrollbar?" "+f[1]+"_expand":"",l=["<div id='mCSB_"+a.idx+"_scrollbar_vertical' class='mCSB_scrollTools mCSB_"+a.idx+"_scrollbar mCS-"+o.theme+" mCSB_scrollTools_vertical"+r+"'><div class='"+f[12]+"'><div id='mCSB_"+a.idx+"_dragger_vertical' class='mCSB_dragger' style='position:absolute;' oncontextmenu='return false;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>","<div id='mCSB_"+a.idx+"_scrollbar_horizontal' class='mCSB_scrollTools mCSB_"+a.idx+"_scrollbar mCS-"+o.theme+" mCSB_scrollTools_horizontal"+r+"'><div class='"+f[12]+"'><div id='mCSB_"+a.idx+"_dragger_horizontal' class='mCSB_dragger' style='position:absolute;' oncontextmenu='return false;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>"],s="yx"===o.axis?"mCSB_vertical_horizontal":"x"===o.axis?"mCSB_horizontal":"mCSB_vertical",c="yx"===o.axis?l[0]+l[1]:"x"===o.axis?l[1]:l[0],d="yx"===o.axis?"<div id='mCSB_"+a.idx+"_container_wrapper' class='mCSB_container_wrapper' />":"",u=o.autoHideScrollbar?" "+f[6]:"",h="x"!==o.axis&&"rtl"===a.langDir?" "+f[7]:"";o.setWidth&&t.css("width",o.setWidth),o.setHeight&&t.css("height",o.setHeight),o.setLeft="y"!==o.axis&&"rtl"===a.langDir?"989999px":o.setLeft,t.addClass(n+" _"+i+"_"+a.idx+u+h).wrapInner("<div id='mCSB_"+a.idx+"' class='mCustomScrollBox mCS-"+o.theme+" "+s+"'><div id='mCSB_"+a.idx+"_container' class='mCSB_container' style='position:relative; top:"+o.setTop+"; left:"+o.setLeft+";' dir="+a.langDir+" /></div>");var m=e("#mCSB_"+a.idx),p=e("#mCSB_"+a.idx+"_container");"y"===o.axis||o.advanced.autoExpandHorizontalScroll||p.css("width",S(p.children())),"outside"===o.scrollbarPosition?("static"===t.css("position")&&t.css("position","relative"),t.css("overflow","visible"),m.addClass("mCSB_outside").after(c)):(m.addClass("mCSB_inside").append(c),p.wrap(d)),b.call(this);var g=[e("#mCSB_"+a.idx+"_dragger_vertical"),e("#mCSB_"+a.idx+"_dragger_horizontal")];g[0].css("min-height",g[0].height()),g[1].css("min-width",g[1].width())},S=function(t){return Math.max.apply(Math,t.map(function(){return e(this).outerWidth(!0)}).get())},w=function(){var t=e(this),a=t.data(i),o=a.opt,n=e("#mCSB_"+a.idx+"_container");o.advanced.autoExpandHorizontalScroll&&"y"!==o.axis&&n.css({position:"absolute",width:"auto"}).wrap("<div class='mCSB_h_wrapper' style='position:relative; left:0; width:999999px;' />").css({width:Math.ceil(n[0].getBoundingClientRect().right+.4)-Math.floor(n[0].getBoundingClientRect().left),position:"relative"}).unwrap()},b=function(){var t=e(this),a=t.data(i),o=a.opt,n=e(".mCSB_"+a.idx+"_scrollbar:first"),r=at(o.scrollButtons.tabindex)?"tabindex='"+o.scrollButtons.tabindex+"'":"",l=["<a href='#' class='"+f[13]+"' oncontextmenu='return false;' "+r+" />","<a href='#' class='"+f[14]+"' oncontextmenu='return false;' "+r+" />","<a href='#' class='"+f[15]+"' oncontextmenu='return false;' "+r+" />","<a href='#' class='"+f[16]+"' oncontextmenu='return false;' "+r+" />"],s=["x"===o.axis?l[2]:l[0],"x"===o.axis?l[3]:l[1],l[2],l[3]];o.scrollButtons.enable&&n.prepend(s[0]).append(s[1]).next(".mCSB_scrollTools").prepend(s[2]).append(s[3])},C=function(){var t=e(this),a=t.data(i),o=e("#mCSB_"+a.idx),n=t.css("max-height")||"none",r=-1!==n.indexOf("%"),l=t.css("box-sizing");if("none"!==n){var s=r?t.parent().height()*parseInt(n)/100:parseInt(n);"border-box"===l&&(s-=t.innerHeight()-t.height()+(t.outerHeight()-t.innerHeight())),o.css("max-height",Math.round(s))}},y=function(){var t=e(this),a=t.data(i),o=e("#mCSB_"+a.idx),n=e("#mCSB_"+a.idx+"_container"),r=[e("#mCSB_"+a.idx+"_dragger_vertical"),e("#mCSB_"+a.idx+"_dragger_horizontal")],l=[o.height()/n.outerHeight(!1),o.width()/n.outerWidth(!1)],s=[parseInt(r[0].css("min-height")),Math.round(l[0]*r[0].parent().height()),parseInt(r[1].css("min-width")),Math.round(l[1]*r[1].parent().width())],c=d&&s[1]<s[0]?s[0]:s[1],u=d&&s[3]<s[2]?s[2]:s[3];r[0].css({height:c,"max-height":r[0].parent().height()-10}).find(".mCSB_dragger_bar").css({"line-height":s[0]+"px"}),r[1].css({width:u,"max-width":r[1].parent().width()-10})},B=function(){var t=e(this),a=t.data(i),o=e("#mCSB_"+a.idx),n=e("#mCSB_"+a.idx+"_container"),r=[e("#mCSB_"+a.idx+"_dragger_vertical"),e("#mCSB_"+a.idx+"_dragger_horizontal")],l=[n.outerHeight(!1)-o.height(),n.outerWidth(!1)-o.width()],s=[l[0]/(r[0].parent().height()-r[0].height()),l[1]/(r[1].parent().width()-r[1].width())];a.scrollRatio={y:s[0],x:s[1]}},T=function(e,t,a){var o=a?f[0]+"_expanded":"",n=e.closest(".mCSB_scrollTools");"active"===t?(e.toggleClass(f[0]+" "+o),n.toggleClass(f[1]),e[0]._draggable=e[0]._draggable?0:1):e[0]._draggable||("hide"===t?(e.removeClass(f[0]),n.removeClass(f[1])):(e.addClass(f[0]),n.addClass(f[1])))},k=function(){var t=e(this),a=t.data(i),o=e("#mCSB_"+a.idx),n=e("#mCSB_"+a.idx+"_container"),r=null==a.overflowed?n.height():n.outerHeight(!1),l=null==a.overflowed?n.width():n.outerWidth(!1);return[r>o.height(),l>o.width()]},M=function(){var t=e(this),a=t.data(i),o=a.opt,n=e("#mCSB_"+a.idx),r=e("#mCSB_"+a.idx+"_container"),l=[e("#mCSB_"+a.idx+"_dragger_vertical"),e("#mCSB_"+a.idx+"_dragger_horizontal")];if(Q(t),("x"!==o.axis&&!a.overflowed[0]||"y"===o.axis&&a.overflowed[0])&&(l[0].add(r).css("top",0),G(t,"_resetY")),"y"!==o.axis&&!a.overflowed[1]||"x"===o.axis&&a.overflowed[1]){var s=dx=0;"rtl"===a.langDir&&(s=n.width()-r.outerWidth(!1),dx=Math.abs(s/a.scrollRatio.x)),r.css("left",s),l[1].css("left",dx),G(t,"_resetX")}},O=function(){function t(){r=setTimeout(function(){e.event.special.mousewheel?(clearTimeout(r),A.call(a[0])):t()},100)}var a=e(this),o=a.data(i),n=o.opt;if(!o.bindEvents){if(D.call(this),n.contentTouchScroll&&L.call(this),W.call(this),n.mouseWheel.enable){var r;t()}z.call(this),U.call(this),n.advanced.autoScrollOnFocus&&H.call(this),n.scrollButtons.enable&&F.call(this),n.keyboard.enable&&q.call(this),o.bindEvents=!0}},I=function(){var t=e(this),o=t.data(i),n=o.opt,r=i+"_"+o.idx,l=".mCSB_"+o.idx+"_scrollbar",s=e("#mCSB_"+o.idx+",#mCSB_"+o.idx+"_container,#mCSB_"+o.idx+"_container_wrapper,"+l+" ."+f[12]+",#mCSB_"+o.idx+"_dragger_vertical,#mCSB_"+o.idx+"_dragger_horizontal,"+l+">a"),c=e("#mCSB_"+o.idx+"_container");n.advanced.releaseDraggableSelectors&&s.add(e(n.advanced.releaseDraggableSelectors)),o.bindEvents&&(e(a).unbind("."+r),s.each(function(){e(this).unbind("."+r)}),clearTimeout(t[0]._focusTimeout),$(t[0],"_focusTimeout"),clearTimeout(o.sequential.step),$(o.sequential,"step"),clearTimeout(c[0].onCompleteTimeout),$(c[0],"onCompleteTimeout"),o.bindEvents=!1)},R=function(t){var a=e(this),o=a.data(i),n=o.opt,r=e("#mCSB_"+o.idx+"_container_wrapper"),l=r.length?r:e("#mCSB_"+o.idx+"_container"),s=[e("#mCSB_"+o.idx+"_scrollbar_vertical"),e("#mCSB_"+o.idx+"_scrollbar_horizontal")],c=[s[0].find(".mCSB_dragger"),s[1].find(".mCSB_dragger")];"x"!==n.axis&&(o.overflowed[0]&&!t?(s[0].add(c[0]).add(s[0].children("a")).css("display","block"),l.removeClass(f[8]+" "+f[10])):(n.alwaysShowScrollbar?(2!==n.alwaysShowScrollbar&&c[0].css("display","none"),l.removeClass(f[10])):(s[0].css("display","none"),l.addClass(f[10])),l.addClass(f[8]))),"y"!==n.axis&&(o.overflowed[1]&&!t?(s[1].add(c[1]).add(s[1].children("a")).css("display","block"),l.removeClass(f[9]+" "+f[11])):(n.alwaysShowScrollbar?(2!==n.alwaysShowScrollbar&&c[1].css("display","none"),l.removeClass(f[11])):(s[1].css("display","none"),l.addClass(f[11])),l.addClass(f[9]))),o.overflowed[0]||o.overflowed[1]?a.removeClass(f[5]):a.addClass(f[5])},E=function(e){var t=e.type;switch(t){case"pointerdown":case"MSPointerDown":case"pointermove":case"MSPointerMove":case"pointerup":case"MSPointerUp":return[e.originalEvent.pageY,e.originalEvent.pageX,!1];case"touchstart":case"touchmove":case"touchend":var a=e.originalEvent.touches[0]||e.originalEvent.changedTouches[0],o=e.originalEvent.touches.length||e.originalEvent.changedTouches.length;return[a.pageY,a.pageX,o>1];default:return[e.pageY,e.pageX,!1]}},D=function(){function t(e){var t=p.find("iframe");if(t.length){var a=e?"auto":"none";t.css("pointer-events",a)}}function o(e,t,a,o){if(p[0].idleTimer=f.scrollInertia<233?250:0,n.attr("id")===m[1])var i="x",r=(n[0].offsetLeft-t+o)*c.scrollRatio.x;else var i="y",r=(n[0].offsetTop-e+a)*c.scrollRatio.y;G(s,r.toString(),{dir:i,drag:!0})}var n,r,l,s=e(this),c=s.data(i),f=c.opt,h=i+"_"+c.idx,m=["mCSB_"+c.idx+"_dragger_vertical","mCSB_"+c.idx+"_dragger_horizontal"],p=e("#mCSB_"+c.idx+"_container"),g=e("#"+m[0]+",#"+m[1]),v=f.advanced.releaseDraggableSelectors?g.add(e(f.advanced.releaseDraggableSelectors)):g;g.bind("mousedown."+h+" touchstart."+h+" pointerdown."+h+" MSPointerDown."+h,function(o){if(o.stopImmediatePropagation(),o.preventDefault(),et(o)){u=!0,d&&(a.onselectstart=function(){return!1}),t(!1),Q(s),n=e(this);var i=n.offset(),c=E(o)[0]-i.top,h=E(o)[1]-i.left,m=n.height()+i.top,p=n.width()+i.left;m>c&&c>0&&p>h&&h>0&&(r=c,l=h),T(n,"active",f.autoExpandScrollbar)}}).bind("touchmove."+h,function(e){e.stopImmediatePropagation(),e.preventDefault();var t=n.offset(),a=E(e)[0]-t.top,i=E(e)[1]-t.left;o(r,l,a,i)}),e(a).bind("mousemove."+h+" pointermove."+h+" MSPointerMove."+h,function(e){if(n){var t=n.offset(),a=E(e)[0]-t.top,i=E(e)[1]-t.left;if(r===a)return;o(r,l,a,i)}}).add(v).bind("mouseup."+h+" touchend."+h+" pointerup."+h+" MSPointerUp."+h,function(){n&&(T(n,"active",f.autoExpandScrollbar),n=null),u=!1,d&&(a.onselectstart=null),t(!0)})},L=function(){function t(e,t){var a=[1.5*t,2*t,t/1.5,t/2];return e>90?t>4?a[0]:a[3]:e>60?t>3?a[3]:a[2]:e>30?t>8?a[1]:t>6?a[0]:t>4?t:a[2]:t>8?t:a[3]}function a(e,t,a,o,n,i){e&&G(_,e.toString(),{dur:t,scrollEasing:a,dir:o,overwrite:n,drag:i})}var n,r,l,s,c,d,f,h,m,p,g,v,x,_=e(this),S=_.data(i),w=S.opt,b=i+"_"+S.idx,C=e("#mCSB_"+S.idx),y=e("#mCSB_"+S.idx+"_container"),B=[e("#mCSB_"+S.idx+"_dragger_vertical"),e("#mCSB_"+S.idx+"_dragger_horizontal")],T=[],k=[],M=0,O="yx"===w.axis?"none":"all",I=[];y.bind("touchstart."+b+" pointerdown."+b+" MSPointerDown."+b,function(e){if(!tt(e)||u||E(e)[2])return void(o=0);o=1,v=0,x=0;var t=y.offset();n=E(e)[0]-t.top,r=E(e)[1]-t.left,I=[E(e)[0],E(e)[1]]}).bind("touchmove."+b+" pointermove."+b+" MSPointerMove."+b,function(e){if(tt(e)&&!u&&!E(e)[2]&&(e.stopImmediatePropagation(),!x||v)){d=K();var t=C.offset(),o=E(e)[0]-t.top,i=E(e)[1]-t.left,l="mcsLinearOut";if(T.push(o),k.push(i),I[2]=Math.abs(E(e)[0]-I[0]),I[3]=Math.abs(E(e)[1]-I[1]),S.overflowed[0])var s=B[0].parent().height()-B[0].height(),c=n-o>0&&o-n>-(s*S.scrollRatio.y)&&(2*I[3]<I[2]||"yx"===w.axis);if(S.overflowed[1])var f=B[1].parent().width()-B[1].width(),h=r-i>0&&i-r>-(f*S.scrollRatio.x)&&(2*I[2]<I[3]||"yx"===w.axis);c||h?(e.preventDefault(),v=1):x=1,p="yx"===w.axis?[n-o,r-i]:"x"===w.axis?[null,r-i]:[n-o,null],y[0].idleTimer=250,S.overflowed[0]&&a(p[0],M,l,"y","all",!0),S.overflowed[1]&&a(p[1],M,l,"x",O,!0)}}),C.bind("touchstart."+b+" pointerdown."+b+" MSPointerDown."+b,function(e){if(!tt(e)||u||E(e)[2])return void(o=0);o=1,e.stopImmediatePropagation(),Q(_),c=K();var t=C.offset();l=E(e)[0]-t.top,s=E(e)[1]-t.left,T=[],k=[]}).bind("touchend."+b+" pointerup."+b+" MSPointerUp."+b,function(e){if(tt(e)&&!u&&!E(e)[2]){e.stopImmediatePropagation(),v=0,x=0,f=K();var o=C.offset(),n=E(e)[0]-o.top,i=E(e)[1]-o.left;if(!(f-d>30)){m=1e3/(f-c);var r="mcsEaseOut",_=2.5>m,b=_?[T[T.length-2],k[k.length-2]]:[0,0];h=_?[n-b[0],i-b[1]]:[n-l,i-s];var B=[Math.abs(h[0]),Math.abs(h[1])];m=_?[Math.abs(h[0]/4),Math.abs(h[1]/4)]:[m,m];var M=[Math.abs(y[0].offsetTop)-h[0]*t(B[0]/m[0],m[0]),Math.abs(y[0].offsetLeft)-h[1]*t(B[1]/m[1],m[1])];p="yx"===w.axis?[M[0],M[1]]:"x"===w.axis?[null,M[1]]:[M[0],null],g=[4*B[0]+w.scrollInertia,4*B[1]+w.scrollInertia];var I=parseInt(w.contentTouchScroll)||0;p[0]=B[0]>I?p[0]:0,p[1]=B[1]>I?p[1]:0,S.overflowed[0]&&a(p[0],g[0],r,"y",O,!1),S.overflowed[1]&&a(p[1],g[1],r,"x",O,!1)}}})},W=function(){function n(){return t.getSelection?t.getSelection().toString():a.selection&&"Control"!=a.selection.type?a.selection.createRange().text:0}function r(e,t,a){f.type=a&&l?"stepped":"stepless",f.scrollAmount=10,j(s,e,t,"mcsLinearOut",a?60:null)}var l,s=e(this),c=s.data(i),d=c.opt,f=c.sequential,h=i+"_"+c.idx,m=e("#mCSB_"+c.idx+"_container"),p=m.parent();m.bind("mousedown."+h,function(){o||l||(l=1,u=!0)}).add(a).bind("mousemove."+h,function(e){if(!o&&l&&n()){var t=m.offset(),a=E(e)[0]-t.top+m[0].offsetTop,i=E(e)[1]-t.left+m[0].offsetLeft;a>0&&a<p.height()&&i>0&&i<p.width()?f.step&&r("off",null,"stepped"):("x"!==d.axis&&c.overflowed[0]&&(0>a?r("on",38):a>p.height()&&r("on",40)),"y"!==d.axis&&c.overflowed[1]&&(0>i?r("on",37):i>p.width()&&r("on",39)))}}).bind("mouseup."+h,function(){o||(l&&(l=0,r("off",null)),u=!1)})},A=function(){function t(e){var t=null;try{var a=e.contentDocument||e.contentWindow.document;t=a.body.innerHTML}catch(o){}return null!==t}var a=e(this),o=a.data(i);if(o){var n=o.opt,r=i+"_"+o.idx,l=e("#mCSB_"+o.idx),s=[e("#mCSB_"+o.idx+"_dragger_vertical"),e("#mCSB_"+o.idx+"_dragger_horizontal")],c=e("#mCSB_"+o.idx+"_container").find("iframe"),u=l;c.length&&c.each(function(){var a=this;t(a)&&(u=u.add(e(a).contents().find("body")))}),u.bind("mousewheel."+r,function(t,i){if(Q(a),!P(a,t.target)){var r="auto"!==n.mouseWheel.deltaFactor?parseInt(n.mouseWheel.deltaFactor):d&&t.deltaFactor<100?100:t.deltaFactor||100;if("x"===n.axis||"x"===n.mouseWheel.axis)var c="x",u=[Math.round(r*o.scrollRatio.x),parseInt(n.mouseWheel.scrollAmount)],f="auto"!==n.mouseWheel.scrollAmount?u[1]:u[0]>=l.width()?.9*l.width():u[0],h=Math.abs(e("#mCSB_"+o.idx+"_container")[0].offsetLeft),m=s[1][0].offsetLeft,p=s[1].parent().width()-s[1].width(),g=t.deltaX||t.deltaY||i;else var c="y",u=[Math.round(r*o.scrollRatio.y),parseInt(n.mouseWheel.scrollAmount)],f="auto"!==n.mouseWheel.scrollAmount?u[1]:u[0]>=l.height()?.9*l.height():u[0],h=Math.abs(e("#mCSB_"+o.idx+"_container")[0].offsetTop),m=s[0][0].offsetTop,p=s[0].parent().height()-s[0].height(),g=t.deltaY||i;"y"===c&&!o.overflowed[0]||"x"===c&&!o.overflowed[1]||(n.mouseWheel.invert&&(g=-g),n.mouseWheel.normalizeDelta&&(g=0>g?-1:1),(g>0&&0!==m||0>g&&m!==p||n.mouseWheel.preventDefault)&&(t.stopImmediatePropagation(),t.preventDefault()),G(a,(h-g*f).toString(),{dir:c}))}})}},P=function(t,a){var o=a.nodeName.toLowerCase(),n=t.data(i).opt.mouseWheel.disableOver,r=["select","textarea"];return e.inArray(o,n)>-1&&!(e.inArray(o,r)>-1&&!e(a).is(":focus"))},z=function(){var t=e(this),a=t.data(i),o=i+"_"+a.idx,n=e("#mCSB_"+a.idx+"_container"),r=n.parent(),l=e(".mCSB_"+a.idx+"_scrollbar ."+f[12]);l.bind("touchstart."+o+" pointerdown."+o+" MSPointerDown."+o,function(){u=!0}).bind("touchend."+o+" pointerup."+o+" MSPointerUp."+o,function(){u=!1}).bind("click."+o,function(o){if(e(o.target).hasClass(f[12])||e(o.target).hasClass("mCSB_draggerRail")){Q(t);var i=e(this),l=i.find(".mCSB_dragger");if(i.parent(".mCSB_scrollTools_horizontal").length>0){if(!a.overflowed[1])return;var s="x",c=o.pageX>l.offset().left?-1:1,d=Math.abs(n[0].offsetLeft)-.9*c*r.width()}else{if(!a.overflowed[0])return;var s="y",c=o.pageY>l.offset().top?-1:1,d=Math.abs(n[0].offsetTop)-.9*c*r.height()}G(t,d.toString(),{dir:s,scrollEasing:"mcsEaseInOut"})}})},H=function(){var t=e(this),o=t.data(i),n=o.opt,r=i+"_"+o.idx,l=e("#mCSB_"+o.idx+"_container"),s=l.parent();l.bind("focusin."+r,function(){var o=e(a.activeElement),i=l.find(".mCustomScrollBox").length,r=0;o.is(n.advanced.autoScrollOnFocus)&&(Q(t),clearTimeout(t[0]._focusTimeout),t[0]._focusTimer=i?(r+17)*i:0,t[0]._focusTimeout=setTimeout(function(){var e=[ot(o)[0],ot(o)[1]],a=[l[0].offsetTop,l[0].offsetLeft],i=[a[0]+e[0]>=0&&a[0]+e[0]<s.height()-o.outerHeight(!1),a[1]+e[1]>=0&&a[0]+e[1]<s.width()-o.outerWidth(!1)],c="yx"!==n.axis||i[0]||i[1]?"all":"none";"x"===n.axis||i[0]||G(t,e[0].toString(),{dir:"y",scrollEasing:"mcsEaseInOut",overwrite:c,dur:r}),"y"===n.axis||i[1]||G(t,e[1].toString(),{dir:"x",scrollEasing:"mcsEaseInOut",overwrite:c,dur:r})},t[0]._focusTimer))})},U=function(){var t=e(this),a=t.data(i),o=i+"_"+a.idx,n=e("#mCSB_"+a.idx+"_container").parent();n.bind("scroll."+o,function(){(0!==n.scrollTop()||0!==n.scrollLeft())&&e(".mCSB_"+a.idx+"_scrollbar").css("visibility","hidden")})},F=function(){var t=e(this),a=t.data(i),o=a.opt,n=a.sequential,r=i+"_"+a.idx,l=".mCSB_"+a.idx+"_scrollbar",s=e(l+">a");s.bind("mousedown."+r+" touchstart."+r+" pointerdown."+r+" MSPointerDown."+r+" mouseup."+r+" touchend."+r+" pointerup."+r+" MSPointerUp."+r+" mouseout."+r+" pointerout."+r+" MSPointerOut."+r+" click."+r,function(i){function r(e,a){n.scrollAmount=o.snapAmount||o.scrollButtons.scrollAmount,j(t,e,a)}if(i.preventDefault(),et(i)){var l=e(this).attr("class");switch(n.type=o.scrollButtons.scrollType,i.type){case"mousedown":case"touchstart":case"pointerdown":case"MSPointerDown":if("stepped"===n.type)return;u=!0,a.tweenRunning=!1,r("on",l);break;case"mouseup":case"touchend":case"pointerup":case"MSPointerUp":case"mouseout":case"pointerout":case"MSPointerOut":if("stepped"===n.type)return;u=!1,n.dir&&r("off",l);break;case"click":if("stepped"!==n.type||a.tweenRunning)return;r("on",l)}}})},q=function(){var t=e(this),o=t.data(i),n=o.opt,r=o.sequential,l=i+"_"+o.idx,s=e("#mCSB_"+o.idx),c=e("#mCSB_"+o.idx+"_container"),d=c.parent(),u="input,textarea,select,datalist,keygen,[contenteditable='true']";s.attr("tabindex","0").bind("blur."+l+" keydown."+l+" keyup."+l,function(i){function l(e,a){r.type=n.keyboard.scrollType,r.scrollAmount=n.snapAmount||n.keyboard.scrollAmount,"stepped"===r.type&&o.tweenRunning||j(t,e,a)}switch(i.type){case"blur":o.tweenRunning&&r.dir&&l("off",null);break;case"keydown":case"keyup":var s=i.keyCode?i.keyCode:i.which,f="on";if("x"!==n.axis&&(38===s||40===s)||"y"!==n.axis&&(37===s||39===s)){if((38===s||40===s)&&!o.overflowed[0]||(37===s||39===s)&&!o.overflowed[1])return;"keyup"===i.type&&(f="off"),e(a.activeElement).is(u)||(i.preventDefault(),i.stopImmediatePropagation(),l(f,s))}else if(33===s||34===s){if((o.overflowed[0]||o.overflowed[1])&&(i.preventDefault(),i.stopImmediatePropagation()),"keyup"===i.type){Q(t);var h=34===s?-1:1;if("x"===n.axis||"yx"===n.axis&&o.overflowed[1]&&!o.overflowed[0])var m="x",p=Math.abs(c[0].offsetLeft)-.9*h*d.width();else var m="y",p=Math.abs(c[0].offsetTop)-.9*h*d.height();G(t,p.toString(),{dir:m,scrollEasing:"mcsEaseInOut"})}}else if((35===s||36===s)&&!e(a.activeElement).is(u)&&((o.overflowed[0]||o.overflowed[1])&&(i.preventDefault(),i.stopImmediatePropagation()),"keyup"===i.type)){if("x"===n.axis||"yx"===n.axis&&o.overflowed[1]&&!o.overflowed[0])var m="x",p=35===s?Math.abs(d.width()-c.outerWidth(!1)):0;else var m="y",p=35===s?Math.abs(d.height()-c.outerHeight(!1)):0;G(t,p.toString(),{dir:m,scrollEasing:"mcsEaseInOut"})}}})},j=function(t,a,o,n,r){function l(e){var a="stepped"!==u.type,o=r?r:e?a?p/1.5:g:1e3/60,i=e?a?7.5:40:2.5,s=[Math.abs(h[0].offsetTop),Math.abs(h[0].offsetLeft)],d=[c.scrollRatio.y>10?10:c.scrollRatio.y,c.scrollRatio.x>10?10:c.scrollRatio.x],f="x"===u.dir[0]?s[1]+u.dir[1]*d[1]*i:s[0]+u.dir[1]*d[0]*i,m="x"===u.dir[0]?s[1]+u.dir[1]*parseInt(u.scrollAmount):s[0]+u.dir[1]*parseInt(u.scrollAmount),v="auto"!==u.scrollAmount?m:f,x=n?n:e?a?"mcsLinearOut":"mcsEaseInOut":"mcsLinear",_=e?!0:!1;return e&&17>o&&(v="x"===u.dir[0]?s[1]:s[0]),G(t,v.toString(),{dir:u.dir[0],scrollEasing:x,dur:o,onComplete:_}),e?void(u.dir=!1):(clearTimeout(u.step),void(u.step=setTimeout(function(){l()},o)))}function s(){clearTimeout(u.step),$(u,"step"),Q(t)}var c=t.data(i),d=c.opt,u=c.sequential,h=e("#mCSB_"+c.idx+"_container"),m="stepped"===u.type?!0:!1,p=d.scrollInertia<26?26:d.scrollInertia,g=d.scrollInertia<1?17:d.scrollInertia;switch(a){case"on":if(u.dir=[o===f[16]||o===f[15]||39===o||37===o?"x":"y",o===f[13]||o===f[15]||38===o||37===o?-1:1],Q(t),at(o)&&"stepped"===u.type)return;l(m);break;case"off":s(),(m||c.tweenRunning&&u.dir)&&l(!0)}},Y=function(t){var a=e(this).data(i).opt,o=[];return"function"==typeof t&&(t=t()),t instanceof Array?o=t.length>1?[t[0],t[1]]:"x"===a.axis?[null,t[0]]:[t[0],null]:(o[0]=t.y?t.y:t.x||"x"===a.axis?null:t,o[1]=t.x?t.x:t.y||"y"===a.axis?null:t),"function"==typeof o[0]&&(o[0]=o[0]()),"function"==typeof o[1]&&(o[1]=o[1]()),o},X=function(t,a){if(null!=t&&"undefined"!=typeof t){var o=e(this),n=o.data(i),r=n.opt,l=e("#mCSB_"+n.idx+"_container"),s=l.parent(),c=typeof t;a||(a="x"===r.axis?"x":"y");var d="x"===a?l.outerWidth(!1):l.outerHeight(!1),u="x"===a?l[0].offsetLeft:l[0].offsetTop,f="x"===a?"left":"top";switch(c){case"function":return t();case"object":var m=t.jquery?t:e(t);if(!m.length)return;return"x"===a?ot(m)[1]:ot(m)[0];case"string":case"number":if(at(t))return Math.abs(t);if(-1!==t.indexOf("%"))return Math.abs(d*parseInt(t)/100);if(-1!==t.indexOf("-="))return Math.abs(u-parseInt(t.split("-=")[1]));if(-1!==t.indexOf("+=")){var p=u+parseInt(t.split("+=")[1]);return p>=0?0:Math.abs(p)}if(-1!==t.indexOf("px")&&at(t.split("px")[0]))return Math.abs(t.split("px")[0]);if("top"===t||"left"===t)return 0;if("bottom"===t)return Math.abs(s.height()-l.outerHeight(!1));if("right"===t)return Math.abs(s.width()-l.outerWidth(!1));if("first"===t||"last"===t){var m=l.find(":"+t);return"x"===a?ot(m)[1]:ot(m)[0]}return e(t).length?"x"===a?ot(e(t))[1]:ot(e(t))[0]:(l.css(f,t),void h.update.call(null,o[0]))}}},N=function(t){function a(){clearTimeout(u[0].autoUpdate),u[0].autoUpdate=setTimeout(function(){return d.advanced.updateOnSelectorChange&&(m=r(),m!==S)?(l(3),void(S=m)):(d.advanced.updateOnContentResize&&(p=[u.outerHeight(!1),u.outerWidth(!1),v.height(),v.width(),_()[0],_()[1]],(p[0]!==w[0]||p[1]!==w[1]||p[2]!==w[2]||p[3]!==w[3]||p[4]!==w[4]||p[5]!==w[5])&&(l(p[0]!==w[0]||p[1]!==w[1]),w=p)),d.advanced.updateOnImageLoad&&(g=o(),g!==b&&(u.find("img").each(function(){n(this)}),b=g)),void((d.advanced.updateOnSelectorChange||d.advanced.updateOnContentResize||d.advanced.updateOnImageLoad)&&a()))},60)}function o(){var e=0;return d.advanced.updateOnImageLoad&&(e=u.find("img").length),e}function n(t){function a(e,t){return function(){return t.apply(e,arguments)}}function o(){this.onload=null,e(t).addClass(f[2]),l(2)}if(e(t).hasClass(f[2]))return void l();var n=new Image;n.onload=a(n,o),n.src=t.src}function r(){d.advanced.updateOnSelectorChange===!0&&(d.advanced.updateOnSelectorChange="*");var t=0,a=u.find(d.advanced.updateOnSelectorChange);return d.advanced.updateOnSelectorChange&&a.length>0&&a.each(function(){t+=e(this).height()+e(this).width()}),t}function l(e){clearTimeout(u[0].autoUpdate),h.update.call(null,s[0],e)}var s=e(this),c=s.data(i),d=c.opt,u=e("#mCSB_"+c.idx+"_container");if(t)return clearTimeout(u[0].autoUpdate),void $(u[0],"autoUpdate");var m,p,g,v=u.parent(),x=[e("#mCSB_"+c.idx+"_scrollbar_vertical"),e("#mCSB_"+c.idx+"_scrollbar_horizontal")],_=function(){return[x[0].is(":visible")?x[0].outerHeight(!0):0,x[1].is(":visible")?x[1].outerWidth(!0):0]},S=r(),w=[u.outerHeight(!1),u.outerWidth(!1),v.height(),v.width(),_()[0],_()[1]],b=o();a()},V=function(e,t,a){return Math.round(e/t)*t-a},Q=function(t){var a=t.data(i),o=e("#mCSB_"+a.idx+"_container,#mCSB_"+a.idx+"_container_wrapper,#mCSB_"+a.idx+"_dragger_vertical,#mCSB_"+a.idx+"_dragger_horizontal");o.each(function(){Z.call(this)})},G=function(t,a,o){function n(e){return s&&c.callbacks[e]&&"function"==typeof c.callbacks[e]}function r(){return[c.callbacks.alwaysTriggerOffsets||_>=S[0]+b,c.callbacks.alwaysTriggerOffsets||-C>=_]}function l(){var e=[h[0].offsetTop,h[0].offsetLeft],a=[v[0].offsetTop,v[0].offsetLeft],n=[h.outerHeight(!1),h.outerWidth(!1)],i=[f.height(),f.width()];t[0].mcs={content:h,top:e[0],left:e[1],draggerTop:a[0],draggerLeft:a[1],topPct:Math.round(100*Math.abs(e[0])/(Math.abs(n[0])-i[0])),leftPct:Math.round(100*Math.abs(e[1])/(Math.abs(n[1])-i[1])),direction:o.dir}}var s=t.data(i),c=s.opt,d={trigger:"internal",dir:"y",scrollEasing:"mcsEaseOut",drag:!1,dur:c.scrollInertia,overwrite:"all",callbacks:!0,onStart:!0,onUpdate:!0,onComplete:!0},o=e.extend(d,o),u=[o.dur,o.drag?0:o.dur],f=e("#mCSB_"+s.idx),h=e("#mCSB_"+s.idx+"_container"),m=h.parent(),p=c.callbacks.onTotalScrollOffset?Y.call(t,c.callbacks.onTotalScrollOffset):[0,0],g=c.callbacks.onTotalScrollBackOffset?Y.call(t,c.callbacks.onTotalScrollBackOffset):[0,0];if(s.trigger=o.trigger,(0!==m.scrollTop()||0!==m.scrollLeft())&&(e(".mCSB_"+s.idx+"_scrollbar").css("visibility","visible"),m.scrollTop(0).scrollLeft(0)),"_resetY"!==a||s.contentReset.y||(n("onOverflowYNone")&&c.callbacks.onOverflowYNone.call(t[0]),s.contentReset.y=1),"_resetX"!==a||s.contentReset.x||(n("onOverflowXNone")&&c.callbacks.onOverflowXNone.call(t[0]),s.contentReset.x=1),"_resetY"!==a&&"_resetX"!==a){switch(!s.contentReset.y&&t[0].mcs||!s.overflowed[0]||(n("onOverflowY")&&c.callbacks.onOverflowY.call(t[0]),s.contentReset.x=null),!s.contentReset.x&&t[0].mcs||!s.overflowed[1]||(n("onOverflowX")&&c.callbacks.onOverflowX.call(t[0]),s.contentReset.x=null),c.snapAmount&&(a=V(a,c.snapAmount,c.snapOffset)),o.dir){case"x":var v=e("#mCSB_"+s.idx+"_dragger_horizontal"),x="left",_=h[0].offsetLeft,S=[f.width()-h.outerWidth(!1),v.parent().width()-v.width()],w=[a,0===a?0:a/s.scrollRatio.x],b=p[1],C=g[1],y=b>0?b/s.scrollRatio.x:0,B=C>0?C/s.scrollRatio.x:0;
break;case"y":var v=e("#mCSB_"+s.idx+"_dragger_vertical"),x="top",_=h[0].offsetTop,S=[f.height()-h.outerHeight(!1),v.parent().height()-v.height()],w=[a,0===a?0:a/s.scrollRatio.y],b=p[0],C=g[0],y=b>0?b/s.scrollRatio.y:0,B=C>0?C/s.scrollRatio.y:0}w[1]<0||0===w[0]&&0===w[1]?w=[0,0]:w[1]>=S[1]?w=[S[0],S[1]]:w[0]=-w[0],t[0].mcs||(l(),n("onInit")&&c.callbacks.onInit.call(t[0])),clearTimeout(h[0].onCompleteTimeout),(s.tweenRunning||!(0===_&&w[0]>=0||_===S[0]&&w[0]<=S[0]))&&(J(v[0],x,Math.round(w[1]),u[1],o.scrollEasing),J(h[0],x,Math.round(w[0]),u[0],o.scrollEasing,o.overwrite,{onStart:function(){o.callbacks&&o.onStart&&!s.tweenRunning&&(n("onScrollStart")&&(l(),c.callbacks.onScrollStart.call(t[0])),s.tweenRunning=!0,T(v),s.cbOffsets=r())},onUpdate:function(){o.callbacks&&o.onUpdate&&n("whileScrolling")&&(l(),c.callbacks.whileScrolling.call(t[0]))},onComplete:function(){if(o.callbacks&&o.onComplete){"yx"===c.axis&&clearTimeout(h[0].onCompleteTimeout);var e=h[0].idleTimer||0;h[0].onCompleteTimeout=setTimeout(function(){n("onScroll")&&(l(),c.callbacks.onScroll.call(t[0])),n("onTotalScroll")&&w[1]>=S[1]-y&&s.cbOffsets[0]&&(l(),c.callbacks.onTotalScroll.call(t[0])),n("onTotalScrollBack")&&w[1]<=B&&s.cbOffsets[1]&&(l(),c.callbacks.onTotalScrollBack.call(t[0])),s.tweenRunning=!1,h[0].idleTimer=0,T(v,"hide")},e)}}}))}},J=function(e,a,o,n,i,r,l){function s(){b.stop||(_||p.call(),_=K()-x,c(),_>=b.time&&(b.time=_>b.time?_+h-(_-b.time):_+h-1,b.time<_+1&&(b.time=_+1)),b.time<n?b.id=m(s):v.call())}function c(){n>0?(b.currVal=f(b.time,S,C,n,i),w[a]=Math.round(b.currVal)+"px"):w[a]=o+"px",g.call()}function d(){h=1e3/60,b.time=_+h,m=t.requestAnimationFrame?t.requestAnimationFrame:function(e){return c(),setTimeout(e,.01)},b.id=m(s)}function u(){null!=b.id&&(t.requestAnimationFrame?t.cancelAnimationFrame(b.id):clearTimeout(b.id),b.id=null)}function f(e,t,a,o,n){switch(n){case"linear":case"mcsLinear":return a*e/o+t;case"mcsLinearOut":return e/=o,e--,a*Math.sqrt(1-e*e)+t;case"easeInOutSmooth":return e/=o/2,1>e?a/2*e*e+t:(e--,-a/2*(e*(e-2)-1)+t);case"easeInOutStrong":return e/=o/2,1>e?a/2*Math.pow(2,10*(e-1))+t:(e--,a/2*(-Math.pow(2,-10*e)+2)+t);case"easeInOut":case"mcsEaseInOut":return e/=o/2,1>e?a/2*e*e*e+t:(e-=2,a/2*(e*e*e+2)+t);case"easeOutSmooth":return e/=o,e--,-a*(e*e*e*e-1)+t;case"easeOutStrong":return a*(-Math.pow(2,-10*e/o)+1)+t;case"easeOut":case"mcsEaseOut":default:var i=(e/=o)*e,r=i*e;return t+a*(.499999999999997*r*i+-2.5*i*i+5.5*r+-6.5*i+4*e)}}e._mTween||(e._mTween={top:{},left:{}});var h,m,l=l||{},p=l.onStart||function(){},g=l.onUpdate||function(){},v=l.onComplete||function(){},x=K(),_=0,S=e.offsetTop,w=e.style,b=e._mTween[a];"left"===a&&(S=e.offsetLeft);var C=o-S;b.stop=0,"none"!==r&&u(),d()},K=function(){return t.performance&&t.performance.now?t.performance.now():t.performance&&t.performance.webkitNow?t.performance.webkitNow():Date.now?Date.now():(new Date).getTime()},Z=function(){var e=this;e._mTween||(e._mTween={top:{},left:{}});for(var a=["top","left"],o=0;o<a.length;o++){var n=a[o];e._mTween[n].id&&(t.requestAnimationFrame?t.cancelAnimationFrame(e._mTween[n].id):clearTimeout(e._mTween[n].id),e._mTween[n].id=null,e._mTween[n].stop=1)}},$=function(e,t){try{delete e[t]}catch(a){e[t]=null}},et=function(e){return!(e.which&&1!==e.which)},tt=function(e){var t=e.originalEvent.pointerType;return!(t&&"touch"!==t&&2!==t)},at=function(e){return!isNaN(parseFloat(e))&&isFinite(e)},ot=function(e){var t=e.parents(".mCSB_container");return[e.offset().top-t.offset().top,e.offset().left-t.offset().left]};e.fn[n]=function(t){return h[t]?h[t].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof t&&t?void e.error("Method "+t+" does not exist"):h.init.apply(this,arguments)},e[n]=function(t){return h[t]?h[t].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof t&&t?void e.error("Method "+t+" does not exist"):h.init.apply(this,arguments)},e[n].defaults=l,t[n]=!0,e(t).load(function(){e(r)[n](),e.extend(e.expr[":"],{mcsInView:e.expr[":"].mcsInView||function(t){var a,o,n=e(t),i=n.parents(".mCSB_container");if(i.length)return a=i.parent(),o=[i[0].offsetTop,i[0].offsetLeft],o[0]+ot(n)[0]>=0&&o[0]+ot(n)[0]<a.height()-n.outerHeight(!1)&&o[1]+ot(n)[1]>=0&&o[1]+ot(n)[1]<a.width()-n.outerWidth(!1)},mcsOverflow:e.expr[":"].mcsOverflow||function(t){var a=e(t).data(i);if(a)return a.overflowed[0]||a.overflowed[1]}})})})}(jQuery,window,document);

/*
 *  jQuery dotdotdot 1.8.3
 *
 *  Copyright (c) Fred Heusschen
 *  www.frebsite.nl
 *
 *  Plugin website:
 *  dotdotdot.frebsite.nl
 *
 *  Licensed under the MIT license.
 *  http://en.wikipedia.org/wiki/MIT_License
 */
!function(t,e){function n(t,e,n){var r=t.children(),o=!1;t.empty();for(var i=0,d=r.length;d>i;i++){var l=r.eq(i);if(t.append(l),n&&t.append(n),a(t,e)){l.remove(),o=!0;break}n&&n.detach()}return o}function r(e,n,i,d,l){var s=!1,c="a, table, thead, tbody, tfoot, tr, col, colgroup, object, embed, param, ol, ul, dl, blockquote, select, optgroup, option, textarea, script, style",u="script, .dotdotdot-keep";return e.contents().detach().each(function(){var h=this,f=t(h);if("undefined"==typeof h)return!0;if(f.is(u))e.append(f);else{if(s)return!0;e.append(f),!l||f.is(d.after)||f.find(d.after).length||e[e.is(c)?"after":"append"](l),a(i,d)&&(s=3==h.nodeType?o(f,n,i,d,l):r(f,n,i,d,l)),s||l&&l.detach()}}),n.addClass("is-truncated"),s}function o(e,n,r,o,d){var c=e[0];if(!c)return!1;var h=s(c),f=-1!==h.indexOf(" ")?" ":"　",p="letter"==o.wrap?"":f,g=h.split(p),v=-1,w=-1,b=0,m=g.length-1;for(o.fallbackToLetter&&0==b&&0==m&&(p="",g=h.split(p),m=g.length-1);m>=b&&(0!=b||0!=m);){var y=Math.floor((b+m)/2);if(y==w)break;w=y,l(c,g.slice(0,w+1).join(p)+o.ellipsis),r.children().each(function(){t(this).toggle().toggle()}),a(r,o)?(m=w,o.fallbackToLetter&&0==b&&0==m&&(p="",g=g[0].split(p),v=-1,w=-1,b=0,m=g.length-1)):(v=w,b=w)}if(-1==v||1==g.length&&0==g[0].length){var x=e.parent();e.detach();var C=d&&d.closest(x).length?d.length:0;if(x.contents().length>C?c=u(x.contents().eq(-1-C),n):(c=u(x,n,!0),C||x.detach()),c&&(h=i(s(c),o),l(c,h),C&&d)){var T=d.parent();t(c).parent().append(d),t.trim(T.html())||T.remove()}}else h=i(g.slice(0,v+1).join(p),o),l(c,h);return!0}function a(t,e){return t.innerHeight()>e.maxHeight}function i(e,n){for(;t.inArray(e.slice(-1),n.lastCharacter.remove)>-1;)e=e.slice(0,-1);return t.inArray(e.slice(-1),n.lastCharacter.noEllipsis)<0&&(e+=n.ellipsis),e}function d(t){return{width:t.innerWidth(),height:t.innerHeight()}}function l(t,e){t.innerText?t.innerText=e:t.nodeValue?t.nodeValue=e:t.textContent&&(t.textContent=e)}function s(t){return t.innerText?t.innerText:t.nodeValue?t.nodeValue:t.textContent?t.textContent:""}function c(t){do t=t.previousSibling;while(t&&1!==t.nodeType&&3!==t.nodeType);return t}function u(e,n,r){var o,a=e&&e[0];if(a){if(!r){if(3===a.nodeType)return a;if(t.trim(e.text()))return u(e.contents().last(),n)}for(o=c(a);!o;){if(e=e.parent(),e.is(n)||!e.length)return!1;o=c(e[0])}if(o)return u(t(o),n)}return!1}function h(e,n){return e?"string"==typeof e?(e=t(e,n),e.length?e:!1):e.jquery?e:!1:!1}function f(t){for(var e=t.innerHeight(),n=["paddingTop","paddingBottom"],r=0,o=n.length;o>r;r++){var a=parseInt(t.css(n[r]),10);isNaN(a)&&(a=0),e-=a}return e}if(!t.fn.dotdotdot){t.fn.dotdotdot=function(e){if(0==this.length)return t.fn.dotdotdot.debug('No element found for "'+this.selector+'".'),this;if(this.length>1)return this.each(function(){t(this).dotdotdot(e)});var o=this,i=o.contents();o.data("dotdotdot")&&o.trigger("destroy.dot"),o.data("dotdotdot-style",o.attr("style")||""),o.css("word-wrap","break-word"),"nowrap"===o.css("white-space")&&o.css("white-space","normal"),o.bind_events=function(){return o.bind("update.dot",function(e,d){switch(o.removeClass("is-truncated"),e.preventDefault(),e.stopPropagation(),typeof l.height){case"number":l.maxHeight=l.height;break;case"function":l.maxHeight=l.height.call(o[0]);break;default:l.maxHeight=f(o)}l.maxHeight+=l.tolerance,"undefined"!=typeof d&&(("string"==typeof d||"nodeType"in d&&1===d.nodeType)&&(d=t("<div />").append(d).contents()),d instanceof t&&(i=d)),g=o.wrapInner('<div class="dotdotdot" />').children(),g.contents().detach().end().append(i.clone(!0)).find("br").replaceWith("  <br />  ").end().css({height:"auto",width:"auto",border:"none",padding:0,margin:0});var c=!1,u=!1;return s.afterElement&&(c=s.afterElement.clone(!0),c.show(),s.afterElement.detach()),a(g,l)&&(u="children"==l.wrap?n(g,l,c):r(g,o,g,l,c)),g.replaceWith(g.contents()),g=null,t.isFunction(l.callback)&&l.callback.call(o[0],u,i),s.isTruncated=u,u}).bind("isTruncated.dot",function(t,e){return t.preventDefault(),t.stopPropagation(),"function"==typeof e&&e.call(o[0],s.isTruncated),s.isTruncated}).bind("originalContent.dot",function(t,e){return t.preventDefault(),t.stopPropagation(),"function"==typeof e&&e.call(o[0],i),i}).bind("destroy.dot",function(t){t.preventDefault(),t.stopPropagation(),o.unwatch().unbind_events().contents().detach().end().append(i).attr("style",o.data("dotdotdot-style")||"").removeClass("is-truncated").data("dotdotdot",!1)}),o},o.unbind_events=function(){return o.unbind(".dot"),o},o.watch=function(){if(o.unwatch(),"window"==l.watch){var e=t(window),n=e.width(),r=e.height();e.bind("resize.dot"+s.dotId,function(){n==e.width()&&r==e.height()&&l.windowResizeFix||(n=e.width(),r=e.height(),u&&clearInterval(u),u=setTimeout(function(){o.trigger("update.dot")},100))})}else c=d(o),u=setInterval(function(){if(o.is(":visible")){var t=d(o);c.width==t.width&&c.height==t.height||(o.trigger("update.dot"),c=t)}},500);return o},o.unwatch=function(){return t(window).unbind("resize.dot"+s.dotId),u&&clearInterval(u),o};var l=t.extend(!0,{},t.fn.dotdotdot.defaults,e),s={},c={},u=null,g=null;return l.lastCharacter.remove instanceof Array||(l.lastCharacter.remove=t.fn.dotdotdot.defaultArrays.lastCharacter.remove),l.lastCharacter.noEllipsis instanceof Array||(l.lastCharacter.noEllipsis=t.fn.dotdotdot.defaultArrays.lastCharacter.noEllipsis),s.afterElement=h(l.after,o),s.isTruncated=!1,s.dotId=p++,o.data("dotdotdot",!0).bind_events().trigger("update.dot"),l.watch&&o.watch(),o},t.fn.dotdotdot.defaults={ellipsis:"... ",wrap:"word",fallbackToLetter:!0,lastCharacter:{},tolerance:0,callback:null,after:null,height:null,watch:!1,windowResizeFix:!0},t.fn.dotdotdot.defaultArrays={lastCharacter:{remove:[" ","　",",",";",".","!","?"],noEllipsis:[]}},t.fn.dotdotdot.debug=function(t){};var p=1,g=t.fn.html;t.fn.html=function(n){return n!=e&&!t.isFunction(n)&&this.data("dotdotdot")?this.trigger("update",[n]):g.apply(this,arguments)};var v=t.fn.text;t.fn.text=function(n){return n!=e&&!t.isFunction(n)&&this.data("dotdotdot")?(n=t("<div />").text(n).html(),this.trigger("update",[n])):v.apply(this,arguments)}}}(jQuery),jQuery(document).ready(function(t){t(".dot-ellipsis").each(function(){var e=t(this).hasClass("dot-resize-update"),n=t(this).hasClass("dot-timer-update"),r=0,o=t(this).attr("class").split(/\s+/);t.each(o,function(t,e){var n=e.match(/^dot-height-(\d+)$/);null!==n&&(r=Number(n[1]))});var a=new Object;n&&(a.watch=!0),e&&(a.watch="window"),r>0&&(a.height=r),t(this).dotdotdot(a)})}),jQuery(window).on("load",function(){jQuery(".dot-ellipsis.dot-load-update").trigger("update.dot")});

/**
 * onPromoClick
 * Function for metric in GA click promotion banner - run with "on-click" atributte in HTML
*/
window.onPromoClick = function(promoObj) {
  window.dataLayer.push({
    event: 'InternalPromotionClick',
    ecommerce: {
      promoClick: {
        promotions: [{
          id: promoObj.getAttribute('data-banner-id'),
          name: promoObj.getAttribute('data-name')
        }]
      }
    }
  });
}

// Main page
jQuery(document).ready(function($) {

  var sendGABannersView = function() {
    var bannerPromotions = document.querySelectorAll('[data-banner-id]');
    for (var i = 0; i < bannerPromotions.length; i++) {
      var banner = bannerPromotions[i];
      window.dataLayer.push({
        event: 'InternalPromotionView',
        ecommerce: {
          promoView: {
            promotions: [{
              id: banner.getAttribute('data-banner-id'),
              name: banner.getAttribute('data-name')
            }]
          }
        }
      });
    };
  }

  $('.js-academy-filters').on('click', '.js-academy-filters_btn', function() {
    var self = $(this);
    self.prop('disabled', true).addClass('is-active');
    self.siblings().prop('disabled', true).removeClass('is-active');

    var mainContentDiv = $('.js-acedemy-mainContent');
    mainContentDiv.addClass('is-loading').removeClass('is-loaded');

    $.ajax({
      type: 'POST',
      url: main_ajax_call.ajax_url,
      data: {
        'action': 'post_filter',
        'tagMfind': self.data('mfind-tag')
      },
      success: function(data) {
        $('.js-other-topics').html(data);
        mainContentDiv.removeClass('is-loading is-all-load');
        contentClass = self.hasClass('academy-filters_btnAllArticles') ? 'all-articles' : 'is-loaded'
        mainContentDiv.addClass(contentClass);
        self.siblings().prop('disabled', false);
      }
    });
  });

  $('.js-academy-filtersMore').on('click', function(e) {
    e.preventDefault();
    var self = $(this);
    self.addClass('loading').prop('disabled', true);
    var excludeID = [];

    $('.js-box-load').each(function() {
      excludeID.push($(this).data('postid'));
    });

    $.ajax({
      type: 'POST',
      url: main_ajax_call.ajax_url,
      data: {
        'action': 'post_filter',
        'tagMfind': $('.js-academy-filters_btn.is-active').data('mfind-tag'),
        'exclude': JSON.stringify(excludeID)
      },
      success: function(data) {
        if (data === 'no more posts') {
          $('.js-acedemy-mainContent').addClass('is-all-load');
        } else {
          $('.js-other-topics').append(data);
        }
        self.removeClass('loading').prop('disabled', false)
      }
    });
  });

  function rolldownClose() {
    var scrolled = false;

    $(document).scroll(function() {
      if ( !scrolled && $(document).scrollTop() >= ($('#rolldown').height() + parseInt($('#rolldown').css('margin-top')) - 2 )) {
        $('#rolldown').hide().addClass('hidden');
        $('.rolldown-thankyou').remove();
        $('html, body').animate({ scrollTop: 0 }, 0);
        scrolled = true;
      }
    });

    function scrollToArticle() {
      var rolldownH = $('#rolldown').height();
      var scrollH = 0;
      scrollH = rolldownH - $(window).scrollTop();

      $('#rolldown').animate({
        marginTop: '-' + scrollH
      }, 800, function() {}, 0);
    }

    $('#rolldown-close, #rolldown-thankyou-close').on('click', function() {
      scrollToArticle();
    });
  }

  var fixVisiblePosts = function() {
    if (window.innerWidth < 999) return; // dont do anything if post visible one per line
    var countBoxes = $('.other-topics .box').length + 1; // +1 for popular post div
    $('.other-topics .box:not(:visible)').show();
    if (($('#main #academy').length == 0) && (countBoxes % 3 != 0)) {
      return false;
    }

    var amountToHide = countBoxes % 3;
    $('#ajax-load-more .alm-reveal:last-child .box:nth-child(n+' + (7 - amountToHide) + ')').hide();
  }

  var checkForBanners = function() {
    $.ajax({
      type: 'POST',
      url: main_ajax_call.ajax_url,
      data: {
        'action': 'promobanner',
        'pid': main_ajax_call.pid
      },
      dataType: "JSON",
      success: function(data) {
        for (var key in data) {
          if (data.hasOwnProperty(key)) {
            $('.' + key).replaceWith(data[key]);
          }
        }
        if ($('.other-topics > .box.color_partner').index() > 6) {
          var partnerPosts = $('.other-topics > .box.color_partner').detach()
          $('.other-topics > .box:nth-child(6)').after(partnerPosts);
        }
        fixVisiblePosts();
        sendGABannersView();
        rolldownClose();
      }
    });
  }

  checkForBanners();

  titlePositioner();
  searchPositioner();
  widgetsPositioner();
  searchField();
  $('.collapse').on('click', function(e) {
    e.preventDefault();

    $('.collapsible').children().fadeOut(200);
    setTimeout(function () {$('.collapsible').css('display','block').slideToggle(400);},200);
  });
  $('.details > p, .post-title').dotdotdot();
  function searchField() {
    $('.js-searchForm').on('click', function() {
      $(this).addClass('is-open').children().first().show().find('.orig').focus();
      $('.js-searchFormToggle').show();
    });
    $('.js-searchFormToggle').on('click', function() {
      $(this).hide();
      $('.js-searchForm').removeClass('is-open').children().first().hide();
    });
  };
  function titlePositioner() {
    $('.other-topics .box .image-title-wrapper h3, .related-topics .box .image-title-wrapper h3').each(function() {
      var $this = $(this);

      var topValue = ($this.closest('.image-title-wrapper').outerHeight() - $this.outerHeight())/2;
      $this.css('top', topValue);
    });
  }

  function searchPositioner() {
    var searchWidget = $('#header .widget_search');
    var menuControl = $('#header .navigation .menu_control');
    var sidebar = $('#content-cont #sidebar');

    if (sidebar.length && sidebar.is(':visible')) {
      searchWidget.css('width', ((30 / 100 * $('body').outerWidth()) - menuControl.outerWidth())+'px');
    }
  }
  function widgetsPositioner() {
    if ( ! $('body').is('.page-id-36')) {
      if ($('#sidebar .widget_mfind_contact').length && $('footer.main').length) {
        var contact_form = $('#sidebar .widget_mfind_contact');

        contact_form.css({
          'position': 'absolute',
          'width': $('#sidebar .image-bg-ad').width()+'px'
        });

        var new_top = $(window).scrollTop();
        var max_top = $('footer.main').offset().top - $('footer.main').outerHeight() + 70;
        var min_top = $('.widgets .image-bg-ad').offset().top + $('.widgets .image-bg-ad').outerHeight() - 70;

        if (new_top < max_top && new_top > min_top) {
          contact_form.stop().animate({
            'top': (new_top + 50) + 'px',
          }, 250);
        }
      }
    }
  }

  $(window).on('resize', function() {
    titlePositioner();
    searchPositioner();
    widgetsPositioner();
  });

  $(window).on('scroll', function() {
    widgetsPositioner();
  })

  $('.other-topics .box .image-title-wrapper img').load(function() {
    titlePositioner();
  });
  $('.related-topics .box .image-title-wrapper img').load(function() {
    titlePositioner();
  });

  $('.menu_control').on('click', function(e) {
    e.preventDefault();
    $('#container').toggleClass('moved');
  });

  $(document).on('mouseup touchstart', function(e) {
    if ( ! $(e.target).closest('#nav').length && ! $(e.target).is('.menu_control') && ! $(e.target).closest('.menu_control').length && $('#container').is('.moved')) {
      $('#container').removeClass('moved');
    }
  });

  $('.search_control').on('click', function() {

    var $container = $('.sliding-search'),
      slidingNavHeight = $container.outerHeight();

      if ($container.hasClass('active')) {
        $container.removeClass('active').animate({top: -slidingNavHeight+'px'}, 400, function () {$container.hide()});
      }
      else {
        $container.show().addClass('active').css('top', -slidingNavHeight).animate({top: 50+'px'}, 400);
      }
  });

  $('#social-buttons > li').on({
    mouseover: function() {
      $(this).stop().animate({'margin-left': '-140px'}, 100);
    },
    mouseout: function() {
      $(this).stop().animate({'margin-left': 0});
    }
  });

  $('.tooltip').qtip({
    position: {
      target: 'mouse',
      adjust: {
        x: 15,
        y: 15
      }
    },
    style: {
      classes: 'qtip-light qtip-shadow'
    }
  });

  $('.share-social .add-button a').on('click', function(e) {
    e.preventDefault();

    var icons_container = $(this).closest('.share-social').find('.expandable');

    if (icons_container.is(':visible')) {
      $(this).parent().removeClass('hide');
      icons_container.hide();
    } else {
      $(this).parent().addClass('hide');
      icons_container.show();
    }
  });

  $(document).on('mouseup touchstart', function(e) {
    if ( ! $(e.target).closest('#sliding-nav').length && ! $(e.target).is('.sliding-nav') && ! $(e.target).closest('.sliding-nav').length && $('#wrapper').is('.moved')) {
      $('#sliding-nav').removeClass('visible');
      $('#wrapper').removeClass('moved');
    }
  });

  $('.sliding-nav').on('click', function(e) {
    e.preventDefault();
    $('#sliding-nav').toggleClass('visible');
    $('#wrapper').toggleClass('moved');
  });

  //-- ajax load more callback --
  almComplete = function(alm) {
    try {
      FB.XFBML.parse();
      fixVisiblePosts();
    } catch(ex) {}
  }

  // Rollover bottom slide-up widget
  // detect if desktop or tablet, otherwise launch immediatelly
  if ( window.innerWidth > 722 ) {
    if ( $('#rollover-promotion').length ) {
      promotionRolloverArrow();
      promotionRolloverAutoShow();
    }
  }
  function promotionRolloverArrow() {
    $('body').on('click', '#rollover-promotion .toggle', function() {
      if ( $('#rollover-promotion').hasClass('show') ) {
        $('#rollover-promotion').removeClass('show');

        if ($('#popup-lead-shortcut').length && $('#popup-lead-shortcut').hasClass('active')) {
          $('#popup-lead-shortcut').addClass('show');
        }

        /* $.cookie('rollover_promotion', '1', {expires:7, path:'/'}); */
      } else {
        $('#rollover-promotion').addClass('show');

        if ($('#popup-lead-shortcut').length && $('#popup-lead-shortcut').hasClass('active')) {
          $('#popup-lead-shortcut').removeClass('show');
        }

      }
    });
  }
  /* scroll to ID on click*/
  $('.scroll-to-id').on('click', function(e) {
    e.preventDefault();
    var scrollToIDTarget = $(this).data('scroll-target');
    $('html, body').stop(true,true).animate({
      scrollTop: $('#'+scrollToIDTarget+'').offset().top
    }, 700, function() {
    });
  });

  // New Main-menu
  // Advanced crucial Main-menu hovers, triggers and fixed-menu functions
  mainMenuTriggers();
  fixedMenu();

  function mainMenuTriggers() {
    //mobile menu
    $('#menu-mobile-trigger').on('click', function(e) {
      $('#main-menu').toggleClass('mobile-menu-visible');
      $('body').toggleClass('mobile-menu-active');
    });
    //desktop sub-menu
    $('#main-menu .has-sub-menu').hover(
      function() {
        $(this).addClass('sub-menu-visible');
      }, function() {
        $(this).removeClass('sub-menu-visible');
      }
    );
    //set mobile-menu wrap height
    if ( $(window).width() <= 960 ) {
      $('.main-menu-content-scroll-wrap').css('height','' + $(window).height() - 65 - $('.top-bar-green').outerHeight(true) + '');
    }
    $(window).resize(function() {
      if ( $(window).width() <= 960 ) {
        $('.main-menu-content-scroll-wrap').css('height','' + $(window).height() - 65 - $('.top-bar-green').outerHeight(true) + '');
      }
    });
  }
  function fixedMenu() { // only for non-mobile
    var $document = $(document),
      $element = $('body'),
      lastScrollTop = 0,
      fixedMenuActive = false;

    $document.scroll(function() {
      // user scrolled more than 70% of the screen size
      // show menu only if scrolled up
      var st = $document.scrollTop();
        if ( $('.top-thankyou-page').length ) {
          var thankyouHeight = $('.top-thankyou-page').height();
        } else {
          var thankyouHeight = 0;
        }
      if (st > lastScrollTop) {
        // downscroll
      } else {
        // upscroll
        if ($document.scrollTop() > ($(window).height() * 0.7) + thankyouHeight ) {
          if (fixedMenuActive === false) {
            $element.removeClass('menu-scroll-in');
            $element.removeClass('menu-fade-in');
            $element.addClass('fixed-menu-active');
            $element.addClass('menu-scroll-in');
            fixedMenuActive = true;
            if ( $(window).width() <= 960 ) {
              $('.main-menu-content-scroll-wrap').css('height','' + $(window).height() - 65 + '');
            }
          }
        } else {
          if (fixedMenuActive === true) {
            fixedMenuActive = false;
            $('.fixed-menu-active').removeClass('menu-scroll-in');
            $('.fixed-menu-active').addClass('menu-scroll-out');
            $('.menu-scroll-out').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
            function (e) {
              $element.removeClass('fixed-menu-active');
              $element.removeClass('menu-scroll-out');
              $element.addClass('menu-fade-in');
              if ( $(window).width() <= 960 ) {
                $('.main-menu-content-scroll-wrap').css('height','' + $(window).height() - 65 - $('.top-bar-green').outerHeight(true) + '');
              }
            });
          }
        }
      }
      lastScrollTop = st;
    });
  }
  // detect anchored section, animated scroll to it + distance to top
  if (window.location.hash.length > 1) {
    window.scrollTo(0, 0);

    var hashAnimatedScrollTarget = location.hash;
    var hashAnimatedScrollDistance = $(''+hashAnimatedScrollTarget+'').offset().top;
    $('html, body').stop(true,true).delay(1000).animate({
      scrollTop: hashAnimatedScrollDistance
    }, 700, function() {
    });

  }
  // mobile - doublatap on upper part of the screen moves to the top of the page
  var tapped = false
  var yScreen = screen.height;
  $('html').on("touchstart",function(event) {
    if (!tapped) { //if tap is not set, set up single tap
      tapped=setTimeout(function() {
        tapped = null;
        //insert things you want to do when single tapped
      },300);   //wait 300ms then run single click code
    } else {    //tapped within 300ms of last tap. double tap
      event.preventDefault(); // prevent zooming
      var y1Click = event.originalEvent.touches[0].screenY; // detect position of the tap vs screen
      if ( y1Click < (yScreen/2) ) { // if tap happened on the upper half, scroll to the top :)
        clearTimeout(tapped); //stop single tap callback
        tapped = null;
        //insert things you want to do when double tapped
        $('html, body').stop(true,true).animate({
          scrollTop: 0
        }, 700, function() {
        });
      }
    }
  });

  //hide SumoMe icon
  $(document).on('DOMNodeInserted', function(e) {
    if ($(e.target).is('a[title=\"SumoMe\"]')) {
      $(e.target).remove();
    }
  });

  function customScrollbar(element) {
    // custom scrollbar, plugin: https://manos.malihu.gr/jquery-custom-content-scroller/
    element.mCustomScrollbar({
      theme: "dark-thick",
      scrollButtons: { enable: true, scrollAmount: 14  },
      mouseWheel: { scrollAmount: 200 }
    });
  }

  function stickySidebar() {
    // stick
    var elemToScroll = $('#sidebar-sticky-widgets');
    $(elemToScroll).addClass('animate-sidebar');
    var elemToScrollLeft = $(elemToScroll).offset().left;
    var elemToScrollTop = $(elemToScroll).offset().top + 40;

    //sentinel - to stick or not to stick
    var stickIt = true;
    var windowWidth = $(document.body).width();
    if (windowWidth < 1120) {
      stickIt = false;
    }

    var containerHeight = $('#content-holder').height();
    var containerScrollLimit = containerHeight;
    var containerMaxPosition = containerHeight - $(elemToScroll).height();

    var currentWindowWidth = $(document.body).width();
    var elemToScrollLeftNew;
    var resized = false;

    // detect resize to correct left positioning
    $(window).on('resize', function(event) {

      var newWindowWidth = $(document.body).width();
      elemToScrollLeftNew = elemToScrollLeft + ( ( newWindowWidth - currentWindowWidth ) / 2 );

      if (newWindowWidth > 1120) {
        stickIt = true;
        var top = $(document).scrollTop();
        if (top > elemToScrollTop && top < containerScrollLimit ) { //stick it if less than half of the container
          $(elemToScroll).css('left',''+ elemToScrollLeftNew +'px').css('position','fixed');
        }
        resized = true;
      } else {
        stickIt = false;
        //reset stick style
        $(elemToScroll).css('top','0').css('left','auto').css('position','relative');
      }

    });

    //watch widget on scrolling

    // vars for detecting scrolling up or down
    var lastScrollTop_Sidebar = 0;
    var fixedMenuActive = false;

    $(window).scroll(function() {
      if (stickIt === true) { //if sticking is allowed by sentinel

        var top = $(document).scrollTop();
        var elemToScrollLeftPX = elemToScrollLeft;
        if ( resized == true ) {
          elemToScrollLeftPX = elemToScrollLeftNew;
        }

        //stick it if less than half of the container
        if ( top > elemToScrollTop && top < containerScrollLimit ) {
          if ( top > lastScrollTop_Sidebar && fixedMenuActive == false ) {
            // downscroll
            $(elemToScroll).css('top','20px').css('left',''+elemToScrollLeftPX+'px').css('position','fixed');
          } else {
            // upscroll
            $(elemToScroll).css('top','90px').css('left',''+elemToScrollLeftPX+'px').css('position','fixed');
            fixedMenuActive = true;
          }
        // stick it at the end of container, don't move it further
        } else if ( top > elemToScrollTop && top >= (containerScrollLimit) ) {
          $(elemToScroll).removeClass('animate-sidebar').css('top', ''+
            ( containerScrollLimit - ($(elemToScroll).height() / 2) ) +'px').css('left','auto')
            .css('position','absolute');
        //reset to default
        } else if ( top < elemToScrollTop ) {
          $(elemToScroll).addClass('animate-sticked').css('top','0').css('left','auto').css('position','relative');
          fixedMenuActive = false;
        }
        lastScrollTop_Sidebar = top;
      }
    });
  }

  if ($('#mfindadv').length  > 0 && $('#sidebar-sticky-widgets').length  > 0) {
    stickySidebar();
  }

  $('.callback-trigger').click(function(){
    $('body').addClass('callback-modal-show');
    $('#callback-widget-open').addClass('show');
    $('#callback-widget-open').removeClass('hide');
    $('.content-top-wrap').css('z-index', 0);
    $('#slide-box').css('z-index', 0);
  });

  $('.callback-modal-close').click(function(){
    $('body').removeClass('callback-modal-show');
    $('#callback-widget-open').addClass('hide');
    $('#callback-widget-open').removeClass('show');
  });

  $('.callback-tooltip-close').click(function(){
    $('.callback-tooltip').addClass('hide');
  });

  var errorMessage = function() {
    $('.w-form').click(function() {
      $('.response').html('<div class="error">Niestety nie udało się wysłać Twojego zgłoszenia, sprawdź swoje dane i spróbuj ponownie!</div>');
    });
  }

  function fetchRequestData() {
    var requestData = {
      full_name: $('[name="fullname"]').val(),
      source: $('[name="Source"]').val(),
      phone: $('[name="phone"]').val(),
      utm_source: $('[name="utm_source"]').val(),
      utm_term: $('[name="utm_medium"]').val(),
      agreements: $('[name="agreements[]"]').val(),
    }
    return JSON.stringify(requestData);
  }

  function fetchRequestMetadata(form, dataType) {
    return $(form).data(dataType);
  }

  var formHandler = function(form) {
    var submitBtn = $(form).find('button');
    submitBtn.addClass('loading').prop('disabled', true);
    $.ajax({
      url: fetchRequestMetadata(form, 'request-url'),
      method: 'POST',
      dataType: 'json',
      contentType: 'application/json',
      data: fetchRequestData(),
      headers: {
        'Authorization': fetchRequestMetadata(form, 'auth-hash'),
        'Accept': 'application/json'
      },
      success: function(response) {
        if (response.success) {
          $('.success').addClass('thank-you');

          window.dataLayer = window.dataLayer || [];
          window.dataLayer.push({
            event: 'calculationCreated',
            calculation_id: response.id
          });
        } else {
          errorMessage();
        }
      },
      error: errorMessage
    })
    .always(function() {
      submitBtn.removeClass('loading').prop('disabled', false);
    });
  }

  $('#contactForm').validate({
    rules: {
      phone: {
        required: true
      },
      'agreements[]': {
        required: true
      },
    },
    submitHandler: formHandler
  })

  $(document).ready(function(){
    $('.button-show').click(function(){
      $('.content-showmore').slideToggle('slow');
      $('.button-show').hide();
      $('.button-hide').show();
    });
    $('.button-hide').click(function(){
      $('.content-showmore').slideToggle('slow');
      $('.button-show').show();
      $('.button-hide').hide();
    });
  });

  jQuery.extend(jQuery.validator.messages, {
    required: "To pole jest wymagane.",
    email: "Proszę wpisać prawidłowy adres email",
    number: "Proszę wpisać prawidłowy numer",
    maxlength: jQuery.validator.format("Proszę wpisać nie więcej niż {0} znaków."),
    minlength: jQuery.validator.format("Proszę wpisać przynajmniej {0} znaków.")
  });

  $(document).ready(function() {
    var full_path = location.protocol + "//" + location.host + location.pathname;
    $(".custom-menu a").each(function() {
      var $this = $(this);
      if ($this.prop("href").split("#")[0] == full_path) {
        $this.addClass("current-menu-item");
      }
    });
  });

});
