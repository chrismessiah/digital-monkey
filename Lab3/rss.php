<?php 
    # DO NOT TOUCH THIS
    header("Content-type: text/xml; charset=utf-8"); 
?>

<html>
<head>
    <title>HTML Stuff</title>
</head>
<body>
<table>

<?php  
    require('functions.php');
    $link = connect_to_db();

    // The SQL query
    $query = "SELECT link, title, description, creator, feeddate FROM exjobbsfeed ORDER BY feeddate;";
    $result = run_query($link, $query);


    $returnstring = '';
    // Loop over the resulting lines
    while ($line = $result->fetch_object()) {
        // Store results from each row in variables
        $link = $line->link;
        $title = $line->title;
        $description = $line->description;
        $creator = $line->creator;
        $feeddate = $line->feeddate;

        // Store the result we want by appending strings to the variable $returnstring
        $returnstring .= "<tr>";
        $returnstring .= "<td>$link</td>";
        $returnstring .= "<td>$title</td>";
        $returnstring .= "<td>$description</td>";
        $returnstring .= "<td>$creator</td>";
        $returnstring .= "<td>$feeddate</td>";
        $returnstring .= "</tr>";
    }


    // Free result and just in case encode result to utf8 before returning
    mysqli_free_result($result);
    echo utf8_encode($returnstring);
?>

</table>
</body>
</html>



