<?php header("Content-type: text/xml; charset=utf-8"); ?>

<html>
  <head>
    <title>Kaffelista</title>
  </head>
  <body>
    <table>
      <tr>
        <th>År</th>
        <th>Vecka</th>
        <th>Namn</th>
      </tr>
      
<?php

    // Connect using host, username, password and databasename
    $link = mysqli_connect('localhost', 'rsslab', 'rsslab', 'rsslab');

    // Check connection
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    // The SQL query
    $query = "SELECT link, title, description, creator, feeddate FROM exjobbsfeed ORDER BY feeddate;";

    // Execute the query
    if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }

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
    print utf8_encode($returnstring);
?>
    </table>
  </body>
</html>