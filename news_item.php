<?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.
session_start();
$page_title = 'News';
include ('./includes/header.html');
include('./includes/top.html');
?>

<?php

    require ('./mysqli_connect.php');
    //$results = $dbc->query('SELECT * FROM news WHERE id = 1');

    $q = "SELECT * FROM news WHERE news_id={$_GET['id']}";
    $r = @mysqli_query ($dbc, $q); // Run the query.
    $row = mysqli_fetch_array($r);

    //assigning values to variables
    $title=$row['title'];
    $body=$row['body'];
    ?>

    <div class="post-element">
        <h1><?php echo "$title"; ?></h1>

        <p> <?php echo "$body";?></p>
    </div>

<div id="comments">


    <h2>Comments</h2>
    <ul class="commentlist">
        <?php
            $results = $dbc->query("SELECT * FROM comments WHERE news_id={$_GET['id']}");

            foreach ($results as $row ) {
                ?>
               <div class="element" style="width:25%; float:left;">
                    <p><?php print_r($row ['body']); ?></p>
               </div>

                <?php
            }
        ?>

    </ul>
</div>

<h2>Write A Comment</h2>

<div id="respond">

    <?php
        
        if(isset($_POST['submit-comment'])) {
            


            //$post_id = $_GET['id'];
           // $post_comment = $_POST['comment'];


            //$query = "INSERT INTO comments (news_id, body, date_entered) VALUES('".$post_id."', '".$post_comment."', NOW());";
            //$result = $dbc->query($query);
            $post_id = $_GET['id'];
            $post_comment = $_POST['comment'];
            // Check connection
            
            if ($dbc->connect_error) {
                die("Connection failed: " . $dbc->connect_error);
            } 

            $sql = "INSERT INTO comments (news_id, body, user_id, date_entered)
            VALUES ('$post_id', '$post_comment', '1', NOW())";

            if ($dbc->query($sql) === TRUE) {
                echo "Successfully posted";
            } else {
                echo "Error: " . $sql . "<br>" . $dbc->error;
            }

            $dbc->close();
        }
    ?>

    <form action="" method="post">
        <p>
            <textarea name="comment" id="comment" cols="100%" rows="10"></textarea>
            <label for="comment" style="display:none;"><small>Comment (required)</small></label>
            <input type="hidden" name="news_id" value="<?php echo $_GET['id']; ?>" />
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" />
        </p>
        <p>
            <input name="submit-comment" type="submit" id="submit" value="Submit Comment" />
        </p>
    </form>
</div>

<?php
include('./includes/bottom.html');
include('./includes/footer.html');
?>