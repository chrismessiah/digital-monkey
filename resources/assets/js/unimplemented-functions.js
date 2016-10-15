$(document).ready(function() {
  var categoryBoxes = $('#index').find('.categories').find('div');
  if ($('#index').length > 0) {
    categoryBoxes.click(function() {
      swal({
        title: 'Nope',
        text: 'This functionallity hasn\'t been implemented yet. Sorry about that.',
        type: 'info',
        showConfirmButton: false,
        timer: '3000'
      });
    });
  }
});
