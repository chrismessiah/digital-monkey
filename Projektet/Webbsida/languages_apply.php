<?php
    if (!isset($_SESSION["lang"])) {
        $_SESSION["lang"] = "en";
    }
?>


<script src="modules/jquery/jquery-2.1.4.min.js"></script>
<script type="text/javascript" language="javascript">
    $(function() {
        var language = '<?php echo $_SESSION["lang"]; ?>';
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