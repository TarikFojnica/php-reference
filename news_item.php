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
        <li class="comment_odd">
            <div class="author"><img class="avatar" src="../images/demo/avatar.gif" width="32" height="32" alt="" /><span class="name"><a href="#">A Name</a></span> <span class="wrote">wrote:</span></div>
            <div class="submitdate"><a href="#">August 4, 2009 at 8:35 am</a></div>
            <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
        </li>
        <li class="comment_even">
            <div class="author"><img class="avatar" src="../images/demo/avatar.gif" width="32" height="32" alt="" /><span class="name"><a href="#">A Name</a></span> <span class="wrote">wrote:</span></div>
            <div class="submitdate"><a href="#">August 4, 2009 at 8:35 am</a></div>
            <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
        </li>
        <li class="comment_odd">
            <div class="author"><img class="avatar" src="../images/demo/avatar.gif" width="32" height="32" alt="" /><span class="name"><a href="#">A Name</a></span> <span class="wrote">wrote:</span></div>
            <div class="submitdate"><a href="#">August 4, 2009 at 8:35 am</a></div>
            <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
        </li>
    </ul>
</div>

<h2>Write A Comment</h2>

<div id="respond">
    <form action="news_item.php" method="post">
        <p>
            <textarea name="comment" id="comment" cols="100%" rows="10"></textarea>
            <label for="comment" style="display:none;"><small>Comment (required)</small></label>
            <input type="hidden" name="news_id" value="<?php echo $_GET['news']; ?>" />
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" />
        </p>
        <p>
            <input name="submit" type="submit" id="submit" value="Submit Comment" />
        </p>
    </form>
</div>

<?php
include('./includes/bottom.html');
include('./includes/footer.html');
?>