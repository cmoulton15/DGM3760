<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>

    <!--STYLING-->
    <link href="css/main.css" rel="stylesheet" type="text/css">

    <!--GOOGLE FONT-->
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
</head>


<body>

<div class="container">
    <header>
        <h1>07 - Cookies and Login</h1>

    </header>


    <form method="POST" action="createAccount.php">
    <fieldset>

    <?php
        require_once('variables.php');

        //BUILD CONNECTION TO DB - localhost means it's on the same server---------------------------------------------------
        $databaseConnect = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME) or die('Could not connect to Database');

        if (isset($_POST['submit'])) {
            //preventing hacking issues or misused characters
            $firstname = mysqli_real_escape_string($databaseConnect, trim($_POST[firstname]));        
            $lastname = mysqli_real_escape_string($databaseConnect, trim($_POST[lastname]));
            $user = mysqli_real_escape_string($databaseConnect, trim($_POST[user]));
            $pass = mysqli_real_escape_string($databaseConnect, trim($_POST[pass]));
            $pass2 = mysqli_real_escape_string($databaseConnect, trim($_POST[pass2]));


            //check to see if information has been added - EMPTY CHECK
            if (!empty($user) && !empty($pass) && !empty($pass2) && ($pass == $pass2)) {

                $query = "SELECT * FROM 07users WHERE username = '$user'";
                $alreadyExists = mysqli_query($databaseConnect, $query) or die('Query failed!');

                if (mysqli_num_rows($alreadyExists) == 0) {
                    //insert the data
                    $addQuery = "INSERT INTO 07users (firstname, lastname, username, password, currentDate) ".
                    "VALUES ('$firstname', '$lastname', '$user', SHA('$pass'), NOW() )";

                    $result = mysqli_query($databaseConnect, $addQuery) or die('Adding to DB failed!');

                    
                    //confirmation message
                    echo '<h2>Your account has been created!</h2>';
                    echo '<h2><a href="index.php">Return to Login</a></h2>';

                    setcookie('username', $user, time() + (60*60*24*30));
                    setcookie('firstname', $firstname, time() + (60*60*24*30));
                    setcookie('lastname', $lastname, time() + (60*60*24*30)); //seconds,minutes,hours, days = 30 days when username will expire

                    //exit the page
                    exit();


                } else {
                    echo '<h2 style="color: red;">Username already exists - please choose a different name.</h2>';
                } //end of existing user check

            } else {
                echo 'Passwords must match! Username and Password must be entered!';
            }//end of empty check
        }



        //CLOSE CONNECTION
        mysqli_close($databaseConnect);
        //--------------------------------------------------------------------------------------

    ?> 



        <h2>Create an Account:</h2>
            <label><p>First Name:</p><input name="firstname" type="text"  pattern="[a-zA-Z0-9 .]{2,99}" value="<?php if (!empty($firstname)) { echo $firstname; } ?>"> </label>

            <label><p>Last Name:</p><input name="lastname" type="text"  pattern="[a-zA-Z0-9 .]{2,99}" value="<?php if (!empty($lastname)) { echo $lastname; } ?>" > </label>
            
            <label><p>Username:</p><input name="user" type="text" value="<?php if (!empty($user)) { echo $user; } ?>"> </label>

            <label><p>Password:</p><input name="pass" type="text" value="<?php if (!empty($pass)) { echo $pass; } ?>"> </label>

            <label><p>Please Retype Password:</p><input name="pass2" type="text" value="<?php if (!empty($pass2)) { echo $pass2; } ?>"> </label>

            <br>
            <input class="submit" type="submit" value="Submit" name="submit">


            <br><br>
            <a href="login.php">Back to login</a>

        
    </fieldset>
    </form>

    <?php //Adding in the nav bar
        //include_once('navbar.php');
    ?>


    <main>


    </main>
</div>

</body>
</html>