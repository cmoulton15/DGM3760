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

        $feedback = '<p class="feedback"><a href="login.php" >Login</a></p>';

        if (isset($_COOKIE['username'])) {
            $feedback = '<p class="feedback">Welcome, '.$_COOKIE['username'].' | <a href="signout.php" >Sign Out</a></p>';
        } 

        
        echo $feedback;
    ?>

        <h2>Concert Agendas Home</h2>
                       
            

            <a href="addAgenda.php">Add a new agenda.</a><br><br>
            <a href="viewAgenda.php">View items.</a><br><br>
            <a href="createAccount.php">Create Account.</a>

            
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