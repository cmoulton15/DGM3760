<?php
    //verify if useris already logged in
    include_once('protect.php');


?>

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

    <form method="POST" action="login.php">
    <fieldset>

    <?php
        require_once('variables.php');

        $feedback = '<p class="feedback">Welcome, '.$_COOKIE['username'].' | <a href="signout.php" >Sign Out</a></p>';

        echo $feedback;
    ?>

    
        <h2>Add Agenda Item</h2>
                       
            

            <label><p>First Name:</p><input name="firstname" type="text"  pattern="[a-zA-Z0-9 .]{2,99}" value="<?php if (!empty($firstname)) { echo $firstname; } ?>"> </label>

            <label><p>Last Name:</p><input name="lastname" type="text"  pattern="[a-zA-Z0-9 .]{2,99}" value="<?php if (!empty($lastname)) { echo $lastname; } ?>" > </label>
            
            <label><p>Username:</p><input name="user" type="text" value="<?php if (!empty($user)) { echo $user; } ?>"> </label>

            <label><p>Password:</p><input name="pass" type="text" value="<?php if (!empty($pass)) { echo $pass; } ?>"> </label>

            <label><p>Please Retype Password:</p><input name="pass2" type="text" value="<?php if (!empty($pass2)) { echo $pass2; } ?>"> </label>

            <br>
            <input class="submit" type="submit" value="Submit" name="submit">


            <a href="index.php">Go Back</a>

            
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