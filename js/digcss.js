(function($){
	var dcss = {};

	function $$(selector){
		return function(){
			return $(selector);
		};
	}

	dcss.ui = {
		doc : $$(document),
		win : $$(window),
		arcTitle : $$(".timeTitle"),
		collapse : $$(".collapseBox"),
		viewByTag : {
			vBtn : $$(".viewByTag"),
			vContent : $$(".allTag")
		},
		loading : $$(".loading"),
		aLink : $$("a:not([target='_blank'])")
	};

	dcss.app = {
		collapse : function(){
			var collapseAll = dcss.ui.collapse();
			collapseAll.each(function(){
				var me = $(this);
				if(me.find(".collapse").hasClass("opened")){
					me.data("opened",true);
				}else{
					me.data("opened",false);
				}
			});

			collapseAll.on("click",function(e){
				e.preventDefault();
				var me = $(this);
				me.data("opened",!me.data("opened"));
				me.find(".collapse").toggleClass("opened");
			});
		},

		arcTitle : function(){
			dcss.ui.arcTitle().on("click",function(){
				$(this).next("ul").slideToggle();
			});
		},

		viewByTag : function(){
			var vBtn = dcss.ui.viewByTag.vBtn(),
				vContent = dcss.ui.viewByTag.vContent();

			vBtn.on("click",function(e){
				e.preventDefault();
				e.stopPropagation();
				vContent.fadeToggle();
			})

			dcss.ui.doc().on("click",function(){
				if(vBtn.data("opened")){
					vContent.fadeOut();
					vBtn.data("opened",false);
					vBtn.find(".collapse").toggleClass("opened");
				}else{
					return;
				}
			});
		},

		loading : function(){
			var loading = dcss.ui.loading(),
				aLink = dcss.ui.aLink();

			dcss.ui.win().on("load",function(){
				loading.css({
					opacity : 0,
					visibility : "hidden"
				}).removeClass("loadAni");
			});

			aLink.each(function(){
				var me = $(this).filter("[href*='/']");
				me.on("click",function(e){
					if(!e.ctrlKey){
						loading.css({
							opacity : 1,
							visibility : "visible"
						}).addClass("loadAni");
					}
				});


			});

			
		}
	};

	dcss.ui.doc().ready(function(){
		for(var i in dcss.app){
			dcss.app[i]();
		}
	});

})(jQuery);