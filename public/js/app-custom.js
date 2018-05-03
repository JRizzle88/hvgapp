'use strict';

jQuery(document).ready(function($) {

  // bootstrap carousel
  $('.carousel').carousel({
      interval: 5000 //speed
  });

  // bootstrap tooltips
  $('[data-toggle="tooltip"]').tooltip();

  // just to make the progress bar show more progress by multiplying the value by a value to increase the width percentage
  $('.sidebar-poll-answers li .progress-bar').each(function() {
      var progress = $(this).attr('data-progress-count');
      $(this).css('width', progress * 2.5 + '%');
      //console.log(progress);
  });
  
  // sorting steam profiles games by game playtime
  //var $findGameAreas = $('.profile-block-games');
  //var $owner = $findGameAreas.find('.game').attr('data-game-owner');
  //var $gameItems = $findGameAreas.find('.game').sort(function(a,b){ return $(b).attr('data-game-playtime') - $(a).attr('data-game-playtime'); });
  //$findGameAreas.find('.game').remove();
  //$findGameAreas.append($gameItems);
  
  
  // fadeOut messages retrieved from controllers or middleware ->with('message','Message.')
  $('.messages').delay(2500).fadeOut(500);

  // hide modal by default
  $('#commentEdit').modal('hide');

  /* Player Profile Nav Tabs */
  $('#tabs').tab();
  
  var $fileinfo = $('#file-info');
    $('[data-target="#file-info"]').on('click', function(event) {
        $fileinfo.find('.close').addClass('hidden');
    });
    $fileinfo.on('shown.bs.modal', function (e) {    
        $fileinfo.find('.modal-dialog').css({'width': '600px'});
        $fileinfo.find('.close').removeClass('hidden');
    });
    
  var $lightbox = $('#lightbox');
    $('[data-target="#lightbox"]').on('click', function(event) {  
        var $img = $(this).find('img'), 
            src = $img.attr('src'),
            alt = $img.attr('alt'),
            css = {
                'maxWidth': $(window).width() - 100,
                'maxHeight': $(window).height() - 100
            };
    
        $lightbox.find('.close').addClass('hidden');
        $lightbox.find('img').attr('src', src);
        $lightbox.find('img').attr('alt', alt);
        $lightbox.find('img').css(css);
    });
    
    $lightbox.on('shown.bs.modal', function (e) {
        var $img = $lightbox.find('img');
            
        $lightbox.find('.modal-dialog').css({'width': $img.width()});
        $lightbox.find('.close').removeClass('hidden');
    });
    
   
});
