<?php
//LOAD IN THE VARIABLES FROM index.html

    
    $id = $_POST[id];
    $firstname = $_POST[firstname];
    $lastname = $_POST[lastname];
    $expertise = $_POST[expertise];
    $email = $_POST[email];
    $phone = $_POST[phone];
    $description = $_POST[description];



    //BUILD CONNECTION TO DB - localhost means it's on the same server
    $databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');


    //BUILD THE QUERY - MATCHES FIELDS IN DB
    $query = "UPDATE employeeDirectory SET firstname='$firstname', lastname='$lastname', expertise='$expertise', email='$email', phone='$phone',description='$description' WHERE id=$id"; //no ID because it will auto increment in the DB


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
        <h1>Updated Employee Info</h1>
    </header>

    <?php //Adding in the nav bar
        include_once('navbar.php');
    ?>

    <br>
    <div>

    </div>

    <form method="POST" action="add2.php">
        
        <h2>Employee Information has been updated for:</h2>
            <?php
                echo '<p>NAME: '.$firstname.' '.$lastname.'<br>';
                echo '<p>EXPERTISE: '.$expertise.'<br>';
                echo '<p>PHONE: '.$phone.'<br>';
                echo '<p>EMAIL: '.$email.'<br>';
                echo '<p>DESCRIPTION: '.$description.'<br></p>';
            ?>
        <br>

    </form>

    <h4><a href="admin.php">Go Back</a></h4>

    <main>


    </main>
</div>

</body>
</html>