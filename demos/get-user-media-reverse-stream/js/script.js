/*globals jQuery*/
/*jslint browser: true, devel:true */
(function ($) {
  
  "use strict";
  
  $(function () {
      
      var normal = document.getElementById('normal'),
        reversed = document.getElementById('reverse');
      
      navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia;
      
      if ( navigator.getUserMedia ) {
        
        navigator.getUserMedia( 'video', function( stream ) {
          window.stream = stream;
          if ( window.webkitURL ) {
            normal.src = window.webkitURL.createObjectURL( stream );
            reversed.src = window.webkitURL.createObjectURL( stream );
          } else {
            normal.src = stream;
            reversed.src = stream;
          }
        },
        function( error ) {
          console.error( 'An error occurred: [CODE ' + error.code + ']' );
          return;
        } );
        
      } else {
        alert('Sorry. Your browser does not support getUserMedia');
      }
      
    
  });
  
}(jQuery));