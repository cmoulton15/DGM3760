<?php
//LOAD IN THE VARIABLES FROM index.html
    require_once('variables.php');

    $name = $_POST[name];
    $item = $_POST[item];
    $description = $_POST[description];
    $currentDate = date("m/d/Y");



    //BUILD CONNECTION TO DB - localhost means it's on the same server
    $databaseConnect = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME) or die('Could not connect to Database');


    //BUILD THE QUERY - MATCHES FIELDS IN DB
    $query = "INSERT INTO 06_orders(name, item, description, currentDate)".

    "VALUES ('$name', '$item', '$description', '$currentDate')"; //no ID because it will auto increment in the DB


    //WORK WITH THE DB
    $result = mysqli_query($databaseConnect, $query) or die('Query failed!');

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
        <h1>06 - Secure the App | Confirmation</h1>

        <?php
            echo '<h2>The following order has been placed on '.$currentDate.':</h2>';
            echo '<p>Name: '.$name.'<br>';
            echo '<p>Item: '.$item.'<br>';
            echo '<p>Description: '.$description.'<br>';
        ?>

    </header>

    <?php //Adding in the nav bar
        include_once('navbar.php');
    ?>


    <main>


    </main>
</div>

</body>
</html>