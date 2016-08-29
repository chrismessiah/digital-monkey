$(document).ready(function() {
  
  // check if this is the browse-page
  if ($('#browse').length > 0) {
    
    // scrolling the social-container
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
    
    // Change timestamp to something that makes sense
    var timestamp = moment(date, 'YYYY-MM-DD hh:mm:ss').fromNow().toLowerCase();
    $('.timestamp').html(timestamp);
    
  }
  
});
