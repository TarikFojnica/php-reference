<?php
session_start();
$page_title = 'Welcome to kiks!';
include ('./includes/header.html');
?>

<div class="wrapper col2">
<div id="featured_slide">

<?php
require ('./mysqli_connect.php');
$q = "SELECT * FROM news ORDER BY date LIMIT 5;";
$r = @mysqli_query ($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

    // Fetch and print all the records:
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $news_body = strip_tags($row['body']);
        if (strlen($news_body) > 170) {
            // truncate string
            $stringCut = substr($news_body, 0, 170);
            // make sure it ends in a word so assassinate doesn't become ass...
            $news_body = substr($stringCut, 0, strrpos($stringCut, ' ')). '...';
        }
        echo '<div class="featured_box">';
        echo '<div class="floater">';
        echo '<h2>' . $row['title'] . '</h2>';
        echo $news_body;
        echo '</div>';
        echo '<p class="readmore"><a href="./news_item.php">Continue Reading &raquo;</a></p>';
        echo '<img src="images/demo/930x375.gif" alt="" /> </div>';
    }

    echo '</div></div>';

    mysqli_free_result ($r); // Free up the resources.

} else { // If no records were returned.

}

?>

    <!-- ####################################################################################################### -->
    <div class="wrapper col3">

    <?php

        $results = $dbc->query('SELECT * FROM news LIMIT 4');

        foreach ($results as $row ) {
            ?>
           <div class="element" style="width:25%; float:left;">
                <a href="news_item.php?id=<?= $row['news_id']; ?>"<h1><?php print_r($row['title']); ?></h1></a>
                <p><?php print_r($row ['body']); ?></p>
           </div>

            <?php
        }

        mysqli_close($dbc); // Close the database connection.
    ?>
        <div class="container">
            <div class="content">

                <div id="topstory">
                    <h2>Feugiatrutrum rhoncus semper</h2>
                    <ul>
                        <li><img src="images/demo/190x130.gif" alt="" />
                            <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
                            <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
                            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                        </li>
                        <li><img src="images/demo/190x130.gif" alt="" />
                            <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
                            <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
                            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                        </li>
                        <li class="last"><img src="images/demo/190x130.gif" alt="" />
                            <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
                            <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
                            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                        </li>
                    </ul>
                    <br class="clear" />
                </div>
                <div id="latestnews">
                    <h2>Feugiatrutrum rhoncus semper</h2>
                    <ul>
                        <li>
                            <div class="imgholder"><img src="images/demo/imgl.gif" alt="" /></div>
                            <div class="latestnews">
                                <h2>About This Template !</h2>
                                <p>This is a W3C standards compliant free website template from <a href="http://www.os-templates.com/">OS Templates</a>. This template is distributed using a <a href="http://www.os-templates.com/template-terms">Website Template Licence</a>, which allows you to use and modify the template for both personal and commercial use when you keep the provided credit links in the footer. For more CSS templates visit <a href="http://www.os-templates.com/">Free Website Templates</a>.</p>
                                <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                            </div>
                            <br class="clear" />
                        </li>
                        <li class="last">
                            <div class="imgholder"><img src="images/demo/imgl.gif" alt="" /></div>
                            <div class="latestnews">
                                <h2>Indonectetus facilis leo nibh</h2>
                                <p>Attincidunt vel nam a maurisus lacinia consectetus magnisl sed ac morbi. Inmaurisus habitur pretium eu et ac vest penatibus id lacus parturpis. Maecenaset adipiscinia tellentum nullam velit et a convallis curabitae vitae laoreet niseros ligula sem sed susp en at.</p>
                                <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                            </div>
                            <br class="clear" />
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            include ('includes/sponsors.html');
            ?>
            <br class="clear" />
        </div>
    </div>

<?php
include ('includes/footer.html');
?>