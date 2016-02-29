<?

?>




<tag class="title">Hello there, how are you?</tag>


<script src="jquery-2.1.4.min.js"></script>
<script type="text/javascript" language="javascript">
 
$(function() {
    var language = 'italian';
    $.ajax({
        url: 'languages.xml',
        success: function(xml) {
            $(xml).find('translation').each(function(){
                var id = $(this).attr('id');
                var text = $(this).find(language).text();
                $("." + id).html(text);
            });
        }
    });
});
</script>