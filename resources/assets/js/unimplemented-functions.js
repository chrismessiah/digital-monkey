function functionNotImplemented() {
  swal({
    title: 'Nope',
    text: 'This functionallity hasn\'t been implemented yet. Sorry about that.',
    type: 'info',
    showConfirmButton: false,
    timer: '3000'
  });
}

$(document).ready(function() {
  var searchBox = $('#header').find('.standard').find('.right').find('.search');
  if ($('#header').find('.login-dropdown').length > 0) {
    var forgotPass = $('#header').find('.login-dropdown').find('.sign-in').find('.container').find('.pass-forgot');
    forgotPass.click(function() {functionNotImplemented();});
  }
  $('#header').find('.login-dropdown').find('.sign-in').find('.container').find('.pass-forgot')
  if ($('#index').length > 0) {
    var categoryBoxes = $('#index').find('.categories').find('div');
    categoryBoxes.click(function() {functionNotImplemented();});
  }
  searchBox.click(function() {functionNotImplemented();});
});
