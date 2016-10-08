$(document).ready(function() {
  if ($('#write-blogpost').length > 0) {
    
    // preview image upload
    var inputImage = $('#write-blogpost').find('form').find('input[type="file"]');
    inputImage.change(function(){
      var filename = inputImage.val();
      var ext = filename.split('.').pop();
      var oneMegaByte = 1000000;
      if (ext != 'jpeg' && ext != 'jpg' && ext != 'png' && ext != 'gif') {
        swal("Sorry bruh, only jpeg/jpg, png and gif image formats accepted.")
      } else if (this.files && this.files[0] && this.files[0].size > oneMegaByte*15) {
        swal("Hey that image is way too large!")
      } else {
        readURL(this);
      }
    });
    
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#write-blogpost').find('.banner').find('img').attr('src', e.target.result);
              $('#write-blogpost').find('.banner').find('img').animate({'opacity':'1'});
          }
          reader.readAsDataURL(input.files[0]);
      }
    }
    
    
    // Code for category popup
    var popupIsOpen = false;
    var popUpDiv = $('#write-blogpost').find('.banner').find('#category-popup');
    var categoryDiv = $('#write-blogpost').find('.banner').find('.category');
    
    categoryDiv.click(function (e) {
      if (popupIsOpen) {
        popUpDiv.animate({'opacity':"0"});
        popUpDiv.css({'display': 'none'});
      } else {
        popUpDiv.css({'display': 'block'});
        popUpDiv.animate({'opacity':"1"});
      }
      e.stopPropagation();
      popupIsOpen = !popupIsOpen;
    });
    
    $(document).on('click', function (e) {
      popUpDiv.animate({'opacity':"0"});
      popUpDiv.css({'display': 'none'});
      popupIsOpen = false;
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
