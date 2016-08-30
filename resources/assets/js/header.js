function preventDefault(e) {
  e = e || window.event;
  if (e.preventDefault)
      e.preventDefault();
  e.returnValue = false;  
}

var showingDropdown = false;

$(document).ready(function() {
  
  // show dropdown
  $("#header").find('.standard').find('.login').click(function() {
    $($("body").children()[1]).css({
      '-webkit-filter': 'blur(5px)',
      'position':'fixed',
      'top':'60px'
    });
    $('#footer').css({'height':'60px'});
    $($('#footer').children()).css('display','none');
    $("#header").css({
      'min-height':'100vh',
      'height':'auto',
      'position': 'absolute',
      'background-color': 'rgba(28, 34, 40, 0.96)',
    });
    $("#header").find('.standard').css({'display':'none'});
    $("#header").find('.login-dropdown').css({'display':'flex'});
  });
  
  // if (showingDropdown) {
  //   $(window).scroll(function(e) {
  //     var height = $("#header").height();
  //     if($(window).scrollTop() >= height) {
  //        $(window).scrollTop(height);
  //     }  
  //   });
  // }
  
  // hide dropdown
  $("#header").find('.login-dropdown').find('.back').click(function() {
    $($("body").children()[1]).css({
      '-webkit-filter': 'none',
      'position':'initial'
    });
    $('#footer').css({'height':'30px'});
    $($('#footer').children()).css('display','block');
    $("#header").css({
      'height':'60px',
      'min-height':'0',
      'position': 'static',
      'background-color': '#1c2227',
    });
    $("#header").find('.standard').css({'display':'block'});
    $("#header").find('.login-dropdown').css({'display':'none'});
    window.onwheel = null;
    window.ontouchmove  = null;
    showingDropdown = false;
  });
  
  // go to sign-up
  $("#header").find('.login-dropdown').find('.sign-in').find('.redirect').click(function() {
    $("#header").find('.login-dropdown').find('.sign-in').css({'display':'none'});
    $("#header").find('.login-dropdown').find('.sign-in').animate({'opacity':"0"});
    $("#header").find('.login-dropdown').find('.sign-up').css({'display':'flex'});
    $("#header").find('.login-dropdown').find('.sign-up').animate({'opacity':"1"});
  });
  
  // go to sign-in
  $("#header").find('.login-dropdown').find('.sign-up').find('.redirect').click(function() {
    $("#header").find('.login-dropdown').find('.sign-in').css({'display':'flex'});
    $("#header").find('.login-dropdown').find('.sign-in').animate({'opacity':"1"});
    $("#header").find('.login-dropdown').find('.sign-up').css({'display':'none'});
    $("#header").find('.login-dropdown').find('.sign-up').animate({'opacity':"0"});
  });
  
  // show dropdown (when logged in)
  var loggedInDropdownIsShown = false;
  $("#header").find('.right').find('.user').click(function() {
    if (loggedInDropdownIsShown) {
      $("#header").find('.logged-in-dropdown').css({'display':'none'});
      $("#header").find('.logged-in-dropdown').animate({'opacity':"0"});
    } else {
      $("#header").find('.logged-in-dropdown').css({'display':'block'});
      $("#header").find('.logged-in-dropdown').animate({'opacity':"1"});
      
    }
    loggedInDropdownIsShown = !loggedInDropdownIsShown;
  });
});
