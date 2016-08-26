$(document).ready(function() {
  
  if ($('#browse').length > 0) {
    var socialContainer = $('#browse').find('.social');
    var distanceToTop = socialContainer.offset().top;
    var scollOffset = 10;
    $(window).scroll(function(e){ 
      var isPositionFixed = (socialContainer.css('position') == 'fixed');
      if ($(this).scrollTop() > distanceToTop - scollOffset && !isPositionFixed){ 
        socialContainer.css({'position': 'fixed', 'top': `${scollOffset}px`}); 
      }
      if ($(this).scrollTop() < distanceToTop - scollOffset && isPositionFixed)
      {
        socialContainer.css({'position': 'absolute', 'top': `${distanceToTop}px`}); 
      } 
    });
  }
  
});
