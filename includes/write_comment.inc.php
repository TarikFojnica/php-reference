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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require('./mysqli_connect.php'); // Connect to the db.

    $errors = array(); // Initialize an error array.

    // Check for a first name:
    if (empty($_POST['comment'])) {
        $errors[] = 'You forgot to enter a a comment.';
    } else {
        $c = mysqli_real_escape_string($dbc, trim($_POST['comment']));
    }

    if (empty($errors)) { // If everything's OK.

        // Register the user in the database...
        $nid = $_POST['news_id'];
        $uid = $_POST['user_id'];

        // Make the query:
        $q = "INSERT INTO comments (news_id, user_id, body, date_entered) VALUES ('$nid', '$uid', '$c', NOW() )";
        $r = @mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.

            // Print a message:
            echo '<h1>Thank you for your comment!</h1>';
        } else { // If it did not run OK.

            // Public message:
            echo '<h1>System Error</h1>
			<p class="error">You could not comment due to a system error. We apologize for any inconvenience.</p>';

            // Debugging message:
            echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

        } // End of if ($r) IF.

        mysqli_close($dbc); // Close the database connection.

        // Include the footer and quit the script:
        include('./includes/bottom.html');
        include ('./includes/footer.html');
        exit();

    } else { // Report the errors.

        echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br />\n";
        }
        echo '</p><p>Please try again.</p>';

    } // End of if (empty($errors)) IF.

    mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>