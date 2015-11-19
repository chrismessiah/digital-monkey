<?php include 'prefix.php'; ?>
<?php 
    # DO NOT TOUCH THIS
    header("Content-type: text/xml; charset=utf-8"); 
    $db_link = mysqli_connect('localhost', 'rsslab', 'rsslab', 'rsslab');

?>

<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://purl.org/rss/1.0/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:syn="http://purl.org/rss/1.0/modules/syndication/">
    <channel rdf:about="http://www.nada.kth.se/media/Theses/"> 
        <title>Examensarbeten medieteknik</title>
        <link>http://www.nada.kth.se/media/Theses/</link>
        <description>Examensarbeten inom medieteknik.</description>
        <dc:language>sv</dc:language>
        <dc:rights>Copyright KTH/Nada/Media</dc:rights>
        <dc:date><?php $date = date("c"); echo $date; ?></dc:date>

        <dc:publisher>KTH/Nada/Media</dc:publisher>
        <dc:creator>bjornh@kth.se</dc:creator>
        <syn:updatePeriod>daily</syn:updatePeriod>
        <syn:updateFrequency>1</syn:updateFrequency>
        <syn:updateBase><?php $date = date("c"); echo $date; ?></syn:updateBase>
        <items>
            <rdf:Seq>
                <?php
                    $query = "SELECT link, feeddate FROM exjobbsfeed ORDER BY feeddate;";
                    
                    $result = mysqli_query($db_link, $query);

                    while ($line = $result->fetch_object()) {
                        $link = $line->link;
                        $output = "<rdf:li rdf:resource='";

                        $link = str_replace(' ','%20', $link);
                        $output .= $link;

                        $output .= "'/>";
                        echo $output;
                    }

                    mysqli_free_result($result);
                ?>
            </rdf:Seq>
        </items>
        <image rdf:resource="http://www.nada.kth.se/media/images/kth.png"/>
    </channel>


    <?php
        $query = "SELECT link, title, description, creator, feeddate FROM exjobbsfeed ORDER BY feeddate;";
        $result = mysqli_query($db_link, $query);

        while ($line = $result->fetch_object()) {

            $link = $line->link;
            $title = utf8_encode($line->title);
            $description = utf8_encode($line->description);
            $creator = utf8_encode($line->creator);
            $feeddate = date("c");

            $output = "<item rdf:about='";
            $link = str_replace(' ', '%20', $link);
            $output .= $link;
            $output .= "'>";

            $output .= "<title>";
            $output .= $title;
            $output .= "</title>";

            $output .= "<link>";

            $link = str_replace(' ', '%20', $link);
            $output .= $link;

            $output .= "</link>";

            $output .= "<description>";
            
            $output .= htmlspecialchars($description);

            
            $output .= "</description>";

            $output .= "<dc:creator>";
            $output .= $creator;
            $output .= "</dc:creator>";

            $output .= "<dc:date>";
            $output .= $feeddate;
            $output .= "</dc:date>";
            $output .= "</item>";
            echo $output;
        }

        mysqli_free_result($result);
    ?>

</rdf:RDF>
<?php include 'postfix.php'; ?>