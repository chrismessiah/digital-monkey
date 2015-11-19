<?php

    function connect_to_db() {
        // Connect using host, username, password and databasename
        $link = mysqli_connect('localhost', 'rsslab', 'rsslab', 'rsslab');

        // Check connection
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        return $link;
    }

    function run_query($link, $query) {
        // Execute the query
        if (($result = mysqli_query($link, $query)) === false) {
           printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
           exit();
        }

        return $result;
    }


?>