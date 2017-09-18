<?php
//LOAD IN THE VARIABLES FROM index.html

    $subject = $_POST[subject];
    $message = $_POST[message];
    $from = 'cojamo15@gmail.com';

//BUILD CONNECTION TO DB - localhost means it's on the same server
$databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');



//BUILD THE QUERY
$query = "SELECT * FROM 03_newsletter";


//WORK WITH THE DB
$result = mysqli_query($databaseConnect, $query) or die('Query failed!');


//DISPLAY WHAT WE SELECTED
while($row = mysqli_fetch_array($result)) {
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $to = $row['email'];

    $text = "Dear $firstname $lastname,\n$message";

    mail($to, $subject, $text, 'From: ' .$from);

    echo 'Your message has been sent to ' . $to .'<br><br>';
}

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

<div class="container">
    <header>
        <h1>03 - Spamming Email</h1>
    </header>

    <main>

    <form class="phpForm" action="contact.php" method="POST" enctype="multipart/form-data" name="01form">

        <fieldset>
            <h2>Your email has been sent to all the peeps in your Database!</h2>
        </fieldset>

        
    </form>

    </main>
</div>

</body>
</html>