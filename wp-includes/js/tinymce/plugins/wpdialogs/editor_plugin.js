(function(){tinymce.create("tinymce.plugins.WPDialogs",{init:function(a,b){tinymce.create("tinymce.WPWindowManager:tinymce.InlineWindowManager",{WPWindowManager:function(c){this.parent(c)},open:function(e,g){var d=this,c;if(!e.wpDialog){return this.parent(e,g)}else{if(!e.id){return}}c=jQuery("#"+e.id);if(!c.length){return}d.features=e;d.params=g;d.onOpen.dispatch(d,e,g);d.element=d.windows[e.id]=c;d.bookmark=d.editor.selection.getBookmark(1);if(!c.data("wpdialog")){c.wpdialog({title:e.title,width:e.width,height:e.height,modal:true,dialogClass:"wp-dialog",zIndex:300000})}c.wpdialog("open")},close:function(){if(!this.features.wpDialog){return this.parent.apply(this,arguments)}this.element.wpdialog("close")}});a.onBeforeRenderUI.add(function(){a.windowManager=new tinymce.WPWindowManager(a)})},getInfo:function(){return{longname:"WPDialogs",author:"WordPress",authorurl:"http://wordpress.org",infourl:"http://wordpress.org",version:"0.1"}}});tinymce.PluginManager.add("wpdialogs",tinymce.plugins.WPDialogs)})();
