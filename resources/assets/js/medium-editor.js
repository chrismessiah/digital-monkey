$(document).ready(function() {
  if ($('#write-blogpost').length > 0) {
    
    // Button behavior can be modified by passing an object into the buttons array instead of a string.
    var editorIntro = new MediumEditor('.editable-no-toolbar',{
      toolbar: false
    });
    
    var editorBody = new MediumEditor('.editable',{
      toolbar: {
        buttons: [
          'bold',
          'italic',
          'h1',
          'h2',
          'quote',
          'pre',
          'anchor'
        ]
      }
    });
    
    
  }
});