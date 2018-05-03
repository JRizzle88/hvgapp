'use strict';

jQuery(document).ready(function($) {
  // any element with data-toggle="tooltip"
  $('[data-toggle="tooltip"]').tooltip();

  /* swap open/close side menu icons */
  $('[data-toggle=collapse]').click(function(){
    // toggle icon
    $(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
  });
  
  // fadeOut messages retrieved from controllers or middleware ->with('message','Message.')
  $('.messages').delay(2500).fadeOut(500);
  
});
