<?php
    //This is to authorize the person accessing the page
    require_once('authorize.php');

    //LOAD IN THE VARIABLES FROM index.html
    require_once('variables.php');

    //BUILD CONNECTION TO DB - localhost means it's on the same server
    $databaseConnect = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME) or die('Could not connect to Database');


    //BUILD THE QUERY - MATCHES FIELDS IN DB
    $query = "SELECT * FROM 06_orders WHERE fulfilled=0 ORDER BY currentDate DESC"; //no ID because it will auto increment in the DB


    //WORK WITH THE DB
    $result = mysqli_query($databaseConnect, $query) or die('Query failed!');


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
        if (mysqli_num_rows($result) == 0) {
            echo '<h2>There are no pending orders.</h2>';
        } else {
            //DISPLAY THE  REMAINING RECORDS
            while($row = mysqli_fetch_array($result)) {
                
                echo '<h2>';
                echo $row['name'];
                echo '</h2>';

                echo '<h3>';
                echo $row['item'] . ' - ' . $row['currentDate'];
                echo '</h3>';

                echo '<p>';
                echo $row['description'];
                echo '</p><br>';

                echo '<h3><a class="fulfill" href="fulfill2.php?id='.$row['id'].'">Fulfill</a> | ';
                echo '<a class="delete" href="delete.php?id='.$row['id'].'">Delete</a>';
                echo '</h3><hr>';
            }
        }    
        //CLOSE CONNECTION
        mysqli_close($databaseConnect);

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