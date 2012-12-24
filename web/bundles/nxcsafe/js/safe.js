/*
 * @author user
 *
 */
var safe = (function ($) {
	var app = {
        o:{
           gridID:(typeof gridSelector != "undefined")?gridSelector:"#grid"
        }
    },
		privateVariable = 1;

	function privateMethod() {
        
        $("#editgrid").button();
        $("#editgrid").click(function(){
            jQuery(app.o.gridID).jqGrid('editGridRow',"new",{height:280,reloadAfterSubmit:false});
        });
	}

	app.moduleProperty = 1;
	app.init = function () {
        privateMethod();
	};
    app.init();
	return app;
}(jQuery));
/**
 *  EXTENDING
 *
//(function($) {
///**
// *  Namespace: the namespace the plugin is located under
// *  pluginName: the name of the plugin
// */
//    var extensionMethods = {
//        /*
//         * retrieve the id of the element
//         * this is some context within the existing plugin
//         */
//        showId: function(){
//            return this.element[0].id;
//        }
//    };
//
//    $.extend(true, $[ Namespace ][ pluginName ].prototype, extensionMethods);
//
//
//})(jQuery);
var safetip = (function( $ ){

  var methods = {
     init : function( options ) {

       return this.each(function(){

         var $this = $(this),
             data = $this.data('safetip'),
             safetip = $('<div />', {
               text : $this.attr('title')
             });

         // If the plugin hasn't been initialized yet
         if ( ! data ) {

           /*
             Do more setup stuff here
           */

           $(this).data('safetip', {
               target : $this,
               safetip : safetip
           });

         }
       });
     },
     destroy : function( ) {

       return this.each(function(){

         var $this = $(this),
             data = $this.data('safetip');

         // Namespacing FTW
         $(window).unbind('.safetip');
         data.safetip.remove();
         $this.removeData('safetip');

       })

     },
     reposition : function( ) { // ...
     },
     show : function( ) { // ...
     },
     hide : function( ) { // ...
     },
     update : function( content ) { // ...
     }
  };

  $.fn.safetip = function( method ) {

    if ( methods[method] ) {
      return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Method ' +  method + ' does not exist on jQuery.safetip' );
    }

  };

})( jQuery );
