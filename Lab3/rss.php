<?php 
    # DO NOT TOUCH THIS
    header("Content-type: text/xml; charset=utf-8"); 
    require('functions.php');
?>


<?php  
    $link = connect_to_db();

    // The SQL query
    $query = "SELECT link, title, description, creator, feeddate FROM exjobbsfeed ORDER BY feeddate;";
    $result = run_query($link, $query);

    // Loop over the resulting lines
    while ($line = $result->fetch_object()) {
        
        // Store results from each row in variables
        $link = $line->link;
        $title = $line->title;
        $description = $line->description;
        $creator = $line->creator;
        $feeddate = $line->feeddate;

        // Make variables to string and use UTF8 encoding
        $link_string = utf8_encode("$link");
        $title_string = utf8_encode("$title");
        $description_string = utf8_encode("$description");
        $creator_string = utf8_encode("$creator");
        $feeddate_string = utf8_encode("$feeddate");

    }

    // Clear the query result
    mysqli_free_result($result);
    
?>




