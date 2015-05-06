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
        viewByTag : {
            vBtn : $$(".viewByTag"),
            vContent : $$(".allTag")
        }
    };
 
    dcss.app = {
  
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
                }else{
                    return;
                }
            });
        }
 
    };
 
    dcss.ui.doc().ready(function(){
        for(var i in dcss.app){
            dcss.app[i]();
        }
    });
 
})(jQuery);