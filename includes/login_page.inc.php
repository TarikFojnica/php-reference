<?php
$page_title = 'Login Page';
include('./includes/header.html');
include('./includes/top.html');

if (isset($errors) && !empty($errors)) {
    echo '<h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
    foreach ($errors as $msg) {
        echo " - $msg<br />\n";
    }
    echo '</p><p>Please try again.</p>';
}
?>

<h2>Login Page</h2>
<div id="respond">
    <form action="./login.php" method="post">
        <p>
            <input type="text" name="username" id="username" value="" size="22" />
            <label for="name"><small>Username*</small></label>
        </p>
        <p>
            <input type="password" name="pass" id="pass" value="" size="22" />
            <label for="pass"><small>Password*</small></label>
        </p>
        <p>
            <input name="submit" type="submit" id="submit" value="Login" />
        </p>
    </form>
</div>

<?php
include('./includes/bottom.html');
include('./includes/footer.html');
?>