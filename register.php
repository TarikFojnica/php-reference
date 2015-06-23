<?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.
//this php code is from http://www.peachpit.com/articles/article.aspx?p=483799&seqNum=7
if (isset($_POST['submit'])) { // Handle the form.

      $message = NULL; // Create an empty new variable.

      // Check for a name.
      if (strlen($_POST['first_name']) > 0) {
          $first_name = TRUE;
     } else {
         $first_name = FALSE;
         $message .= '<p>You forgot to enter first name!</p>';
     }
      if (strlen($_POST['last_name']) > 0) {
          $last_name = TRUE;
     } else {
         $last_name = FALSE;
         $message .= '<p>You forgot to enter last name!</p>';
     }

     // Check for an email address.
     if (strlen($_POST['email']) > 0) {
         $email = TRUE;
     } else {
         $email = FALSE;
         $message .= '<p>You forgot to enter your email address!</p>';
     }

     // Check for a username.
     if (strlen($_POST['username']) > 0) {
         $username = TRUE;
     } else {
         $username = FALSE;
         $message .= '<p>You forgot to enter your user name!</p>';
     }

     // Check for a password and match against the confirmed password.
     if (strlen($_POST['pass1']) > 0) {
         if ($_POST['pass1'] == $_POST['pass2']) {
             $password = TRUE;
         } else {
             $password = FALSE;
             $message .= '<p>Your password did not match the confirmed password!</p>';
         }
     } else {
         $password = FALSE;
         $message .= '<p>You forgot to enter your password!</p>';
     }

     if ($first_name && $email && $username && $password && $last_name) { // If everything's okayOK.
         // Register the user.
        include('mysqli_connect.php');
        $username=   $_POST['username'];
        $password=   $_POST['pass1'];
        $first_name= $_POST['first_name'];
        $last_name=  $_POST['last_name'];
        $email=      $_POST['email'];

        $query = "INSERT INTO users (username, pass, first_name, last_name, email, registration_date) VALUES('".$username."', SHA1('".$password."'), '".$first_name."', '".$last_name."', '".$email."', NOW());";
        $result = $dbc->query($query);

        if ($result) {
        echo  $dbc->affected_rows." You are registered.";
        } else {
        echo "An error has occurred.  The item was not added.";
        }

        $dbc->close();
         // Send an email.
         //header ('Location: thankyou.php');
         exit();
        } else {
         $message .= '<p>Please try again.</p>';
        }

        }


$page_title = 'Register';
include ('./includes/header.html');
include('./includes/top.html');
if (isset($message)) {
      echo '<font color="red">', $message, '</font>';
  }

?>

<!-- ####################################################################################################### -->
            <h2>Register</h2>
            <div id="respond">
                <form action="register.php" method="post">
                    <p>
                        <input type="text" name="first_name" id="first_name"
                               value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" size="22" />
                        <label for="name"><small>First Name*</small></label>
                    </p>
                    <p>
                        <input type="text" name="last_name" id="last_name"
                               value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" size="22" />
                        <label for="name"><small>Last Name*</small></label>
                    </p>
                    <p>
                        <input type="text" name="email" id="email"
                               value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" size="22" />
                        <label for="email"><small>Mail*</small></label>
                    </p>
                    <p>
                        <input type="text" name="username" id="username"
                               value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" size="22" />
                        <label for="name"><small>Username*</small></label>
                    </p>
                    <p>
                        <input type="password" name="pass1" id="pass1"
                               value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" size="22" />
                        <label for="name"><small>Password*</small></label>
                    </p>
                    <p>
                        <input type="password" name="pass2" id="pass2"
                               value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" size="22" />
                        <label for="name"><small>Confirm Password*</small></label>
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