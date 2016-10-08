$(document).ready(function() {
  if ($('#browse').length > 0) {
    
    var preList = $('#browse').find('.body').find('pre');
    for (var i = 0; i < preList.length; i++) {
      var code = $(preList[i]).html();
      var html = Prism.highlight(code, Prism.languages.javascript);
      $(preList[i]).html(html);
    }
    
  }
});
