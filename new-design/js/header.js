function preventDefault(e) {
  e = e || window.event;
  if (e.preventDefault)
      e.preventDefault();
  e.returnValue = false;  
}

$(document).ready(function() {
  
  $("#header").find('.standard').find('.login').click(function() {
    $($("body").children()[1]).css({'-webkit-filter': 'blur(5px)'});
    $("#header").css({
      'height':'100vh',
      'position': 'fixed',
      'background-color': 'rgba(28, 34, 40, 0.96)',
    });
    $("#header").find('.standard').css({'display':'none'});
    $("#header").find('.login-dropdown').css({'display':'flex'});
    window.onwheel = preventDefault;
    window.ontouchmove  = preventDefault;
  });
  
  $("#header").find('.login-dropdown').find('.back').click(function() {
    $($("body").children()[1]).css({'-webkit-filter': 'none'});
    $("#header").css({
      'height':'60px',
      'position': 'static',
      'background-color': '#1c2227',
    });
    $("#header").find('.standard').css({'display':'block'});
    $("#header").find('.login-dropdown').css({'display':'none'});
    window.onwheel = null;
    window.ontouchmove  = null;
  });
  
});
