<?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';
include ('./includes/header.html');
include('./includes/top.html');
?>

<!-- ####################################################################################################### -->
            <h2>Register</h2>
            <div id="respond">
                <form action="register.php" method="post">
                    <p>
                        <input type="text" name="email" id="email"
                               value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" size="22" />
                        <label for="email"><small>Mail*</small></label>
                    </p>
                    <p>
                        <input type="text" name="username" id="username"
                               value="" size="22" />
                        <label for="name"><small>Username*</small></label>
                    </p>
                    <p>
                        <input type="password" name="pass" id="pass1"
                               value="" size="22" />
                        <label for="name"><small>Password*</small></label>
                    </p>

                    <p>
                        <input name="submit" type="submit" id="submit" value="Register" />
                    </p>
                </form>
            </div>
<!-- ####################################################################################################### -->



<?php
include('./includes/bottom.html');
include('./includes/footer.html');
?>