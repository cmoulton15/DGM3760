<?php
//LOAD IN THE VARIABLES FROM index.html

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $senderEmail = $_POST['senderEmail'];
    $employeeEmail= $_POST['employeeEmail'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    //BUILD THE EMAIL (INSECURE VERSION, JUST FOR LEARNING)
    $to = 'cojamo15@gmail.com';
    $subjectHeader = "$subject - from $firstname $lastname";
    $emailMessage = "This message is meant for $employeeEmail:

    $message

-- Feel free to reply to their message at $senderEmail --";

    mail($to, $subjectHeader, $emailMessage, 'FROM: '.$senderEmail); //HIDE UNTIL SECURE
    

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

        
    <h2>Thank you, the following message has been sent to <?php echo  $employeeEmail;?></h2>
        
    <br>

    <p>
        <?php 
            echo 'To: '.$employeeEmail.'<br>';
            echo 'From: '.$firstname.' '.$lastname.' ('.$senderEmail.')<br>';
            echo 'Subject: '.$subject.'<br>';
            echo 'Message: '.$message.'<br>';

        ?>
    </p>

    <br>
    <h4><a href="index.php">Go Back</a></h4>

    <main>


    </main>
</div>

</body>
</html>