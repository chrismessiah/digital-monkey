$(document).ready(function() {
  if ($('#write-blogpost').length > 0) {
    
    
    $('#write-blogpost').find('form').find('button').click(function () {
      var category = $('#write-blogpost').find('.banner').find('.category').html();
      var title = $('#write-blogpost').find('.banner').find('.title').html();
      var intro = $('#write-blogpost').find('.content').find('.intro').html();
      var body = $('#write-blogpost').find('.content').find('.body').html();
      
      $('#write-blogpost').find('form').find('#category').val(category);
      $('#write-blogpost').find('form').find('#title').val(title);
      $('#write-blogpost').find('form').find('#intro').val(intro);
      $('#write-blogpost').find('form').find('#body').val(body);
    });
    
  }
});
