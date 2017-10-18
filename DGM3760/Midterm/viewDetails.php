<?php
//LOAD IN THE VARIABLES FROM index.html

    
    $employeeNumber = $_GET['id'];

    //BUILD CONNECTION TO DB - localhost means it's on the same server
    $databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');


    //BUILD THE QUERY - MATCHES FIELDS IN DB
    $query = "SELECT * FROM employeeDirectory WHERE id=$employeeNumber"; //no ID because it will auto increment in the DB


    //WORK WITH THE DB
    $result = mysqli_query($databaseConnect, $query) or die('Query failed!');

    $found = mysqli_fetch_array($result);

    //CLOSE CONNECTION
    mysqli_close($databaseConnect);


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
<br>
<div class="container">
    <header>
        <h1>View Employee Info</h1>
    </header>

    <?php //Adding in the nav bar
        include_once('navbar.php');
    ?>

    <br>
    <div>

    </div>

        
    <h2>Employee Information:</h2>
        <?php
            echo '<h3>'.$found['firstname'].' '.$found['lastname'].'</h3>';
            echo '<p>EXPERTISE: '.$found['expertise'].'<br>';
            echo 'PHONE: <a href="tel:'.$found['phone'].'">'.$found['phone'].'</a><br>';
            echo 'EMAIL: <a href="mailto:'.$found['email'].'">'.$found['email'].'</a><br>';
            echo 'DESCRIPTION: '.$found['description'].'</p>';

            echo '<img src="employeePics/'.$found['photo'].'" /></p>';
        ?>


    <br>



    <form class="fiftypercent" method="POST" action="sendMessage.php">
    <h3>Send them a message here!</h3>
        <label><p>First Name:</p><input name="firstname" type="text" placeholder="first name" pattern="[a-zA-Z0-9 .]{2,99}" > </label>
        <label><p>Last Name:</p><input name="lastname" type="text" placeholder="last name" pattern="[a-zA-Z0-9 .]{2,99}" > </label>
        <label><p>Your Email:</p><input name="senderEmail" type="email" placeholder="place@here.com"> </label>
        <label><p>Subject:</p><input name="subject" type="text" placeholder="message subject" pattern="[a-zA-Z0-9 .]{2,99}" > </label>
        <br><p>Message:</p>
        <textarea name="message" rows="5"></textarea>

        <?php
            echo '<input type="hidden" name="employeeEmail" value="'.$found['email'].'">'
        ?>


        <input  class="submit" type="submit" name="submit" value="Submit">
    </form>

    <br>
    <h4><a href="index.php">Go Back</a></h4>

    <main>


    </main>
</div>

</body>
</html>