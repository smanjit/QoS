var w,h,dw,dh,WebAdmin_VARS={BODY:$("body"),WRAPPER:$("#wrapper"),LEFT_ITEMS:$(".left ul")};!function(s){"use strict";var e=function(){this.$body=WebAdmin_VARS.BODY,this.$openLeftBtn=s(".open-left"),this.$menuItem=s("#sidebar-menu a"),this.$subDropItem=s(".subdrop"),this.$leftMenuToggle=s(".open-left"),this.$firstMenuChild=s("#sidebar-menu ul li.has_sub a.active")};e.prototype.openLeftBar=function(){WebAdmin_VARS.WRAPPER.toggleClass("enlarged"),WebAdmin_VARS.WRAPPER.addClass("forced"),WebAdmin_VARS.WRAPPER.hasClass("enlarged")&&WebAdmin_VARS.BODY.hasClass("fixed-left")?WebAdmin_VARS.BODY.removeClass("fixed-left").addClass("fixed-left-void"):!WebAdmin_VARS.WRAPPER.hasClass("enlarged")&&WebAdmin_VARS.BODY.hasClass("fixed-left-void")&&WebAdmin_VARS.BODY.removeClass("fixed-left-void").addClass("fixed-left"),WebAdmin_VARS.WRAPPER.hasClass("enlarged")?WebAdmin_VARS.LEFT_ITEMS.removeAttr("style"):this.$subDropItem.siblings("ul:first").show(),toggle_slimscroll(".slimscrollleft"),WebAdmin_VARS.BODY.trigger("resize")},e.prototype.menuItemClick=function(e){WebAdmin_VARS.WRAPPER.hasClass("enlarged")||(s(this).parent().hasClass("has_sub")&&e.preventDefault(),s(this).hasClass("subdrop")?s(this).hasClass("subdrop")&&(s(this).removeClass("subdrop"),s(this).next("ul").slideUp(350),s(".float-right i",s(this).parent()).removeClass("mdi-minus").addClass("mdi-plus")):(s("ul",s(this).parents("ul:first")).slideUp(350),s("a",s(this).parents("ul:first")).removeClass("subdrop"),s("#sidebar-menu .float-right i").removeClass("mdi-minus").addClass("mdi-plus"),s(this).next("ul").slideDown(350),s(this).addClass("subdrop"),s(".float-right i",s(this).parents(".has_sub:last")).removeClass("mdi-plus").addClass("mdi-minus"),s(".float-right i",s(this).siblings("ul")).removeClass("mdi-minus").addClass("mdi-plus")))},e.prototype.init=function(){var i=this;i.$leftMenuToggle.on("click",function(e){e.stopPropagation(),i.openLeftBar()}),i.$menuItem.on("click",i.menuItemClick),i.$firstMenuChild.parents("li:last").children("a:first").addClass("active").trigger("click"),i.$menuItem.each(function(){this.href==window.location.href&&(s(this).addClass("active"),s(this).parent().addClass("active"),s(this).parent().parent().prev().addClass("active"),s(this).parent().parent().prev().trigger("click"))})},s.Sidemenu=new e,s.Sidemenu.Constructor=e}(window.jQuery),function(e){"use strict";var i=function(){this.$body=WebAdmin_VARS.BODY,this.$fullscreenBtn=e("#btn-fullscreen")};i.prototype.launchFullscreen=function(e){e.requestFullscreen?e.requestFullscreen():e.mozRequestFullScreen?e.mozRequestFullScreen():e.webkitRequestFullscreen?e.webkitRequestFullscreen():e.msRequestFullscreen&&e.msRequestFullscreen()},i.prototype.exitFullscreen=function(){document.exitFullscreen?document.exitFullscreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitExitFullscreen&&document.webkitExitFullscreen()},i.prototype.toggle_fullscreen=function(){(document.fullscreenEnabled||document.mozFullScreenEnabled||document.webkitFullscreenEnabled)&&(document.fullscreenElement||document.mozFullScreenElement||document.webkitFullscreenElement||document.msFullscreenElement?this.exitFullscreen():this.launchFullscreen(document.documentElement))},i.prototype.init=function(){var e=this;e.$fullscreenBtn.on("click",function(){e.toggle_fullscreen()})},e.FullScreen=new i,e.FullScreen.Constructor=i}(window.jQuery),function(i){"use strict";var e=function(){this.VERSION="1.0.0",this.AUTHOR="ThemesDesign",this.SUPPORT="#",this.pageScrollElement="html, body",this.$body=WebAdmin_VARS.BODY};e.prototype.initTooltipPlugin=function(){i.fn.tooltip&&i('[data-toggle="tooltip"]').tooltip()},e.prototype.initPopoverPlugin=function(){i.fn.popover&&i('[data-toggle="popover"]').popover()},e.prototype.initNiceScrollPlugin=function(){i.fn.niceScroll&&i(".nicescroll").niceScroll({cursorcolor:"#9d9ea5",cursorborderradius:"0px"})},e.prototype.onDocReady=function(e){FastClick.attach(document.body),Menufunction.push("initscrolls"),Menufunction.push("changeptype"),i(".animate-number").each(function(){i(this).animateNumbers(i(this).attr("data-value"),!0,parseInt(i(this).attr("data-duration")))}),i(window).resize(debounce(resizeitems,100)),WebAdmin_VARS.BODY.trigger("resize"),new WOW({boxClass:"wow",animateClass:"animated",offset:50,mobile:!1}).init()},e.prototype.init=function(){this.initTooltipPlugin(),this.initPopoverPlugin(),this.initNiceScrollPlugin(),i(document).on("ready",this.onDocReady),i.Sidemenu.init(),i.FullScreen.init()},i.WebAdmin=new e,i.WebAdmin.Constructor=e}(window.jQuery),function(e){"use strict";window.jQuery.WebAdmin.init()}();var changeptype=function(){w=$(window).width(),h=$(window).height(),dw=$(document).width(),dh=$(document).height(),!0===jQuery.browser.mobile&&WebAdmin_VARS.BODY.addClass("mobile").removeClass("fixed-left"),WebAdmin_VARS.WRAPPER.hasClass("forced")||(1024<w?(WebAdmin_VARS.BODY.removeClass("smallscreen").addClass("widescreen"),WebAdmin_VARS.WRAPPER.removeClass("enlarged")):(WebAdmin_VARS.BODY.removeClass("widescreen").addClass("smallscreen"),WebAdmin_VARS.WRAPPER.addClass("enlarged"),WebAdmin_VARS.LEFT_ITEMS.removeAttr("style")),WebAdmin_VARS.WRAPPER.hasClass("enlarged")&&WebAdmin_VARS.BODY.hasClass("fixed-left")?WebAdmin_VARS.BODY.removeClass("fixed-left").addClass("fixed-left-void"):!WebAdmin_VARS.WRAPPER.hasClass("enlarged")&&WebAdmin_VARS.BODY.hasClass("fixed-left-void")&&WebAdmin_VARS.BODY.removeClass("fixed-left-void").addClass("fixed-left")),toggle_slimscroll(".slimscrollleft")},debounce=function(t,n,l){var o,r;return function(){var e=this,i=arguments,s=l&&!o;return clearTimeout(o),o=setTimeout(function(){o=null,l||(r=t.apply(e,i))},n),s&&(r=t.apply(e,i)),r}};function resizeitems(){if($.isArray(Menufunction))for(i=0;i<Menufunction.length;i++)window[Menufunction[i]]()}function initscrolls(){!0!==jQuery.browser.mobile&&($(".slimscroller").slimscroll({height:"auto",size:"5px"}),$(".slimscrollleft").slimScroll({height:"auto",position:"right",size:"7px",color:"#bbb",wheelStep:5}))}function toggle_slimscroll(e){WebAdmin_VARS.WRAPPER.hasClass("enlarged")?($(e).css("overflow","inherit").parent().css("overflow","inherit"),$(e).siblings(".slimScrollBar").css("visibility","hidden")):($(e).css("overflow","hidden").parent().css("overflow","hidden"),$(e).siblings(".slimScrollBar").css("visibility","visible"))}var Menufunction=[];