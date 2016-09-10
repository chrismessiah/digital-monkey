$(document).ready(function() {
  if ($('#write-blogpost').length > 0) {
    
    
    // Code for category popup
    var popupIsOpen = false;
    var popUpDiv = $('#write-blogpost').find('.banner').find('#category-popup');
    var categoryDiv = $('#write-blogpost').find('.banner').find('.category');
    
    categoryDiv.click(function () {
      if (popupIsOpen) {
        popUpDiv.animate({'opacity':"0"});
        popUpDiv.css({'display': 'none'});
      } else {
        popUpDiv.css({'display': 'block'});
        popUpDiv.animate({'opacity':"1"});
      }
      popupIsOpen = !popupIsOpen;
    });
    
    popUpDiv.find('.content').find('div').click(function (e) {
      popUpDiv.css({'display': 'none'});
      popUpDiv.animate({'opacity':"0"});
      popupIsOpen = !popupIsOpen;
      categoryDiv.html($(e.target).html());
    });
    
    
    // code for copy-pasteing content to form
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
