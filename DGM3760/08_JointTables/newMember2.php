<?php
//LOAD IN THE VARIABLES FROM index.html
    require_once('variables.php');

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $style = $_POST['style'];
    // $currentDate = date("m/d/Y");



    //BUILD CONNECTION TO DB - localhost means it's on the same server
    $databaseConnect = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME) or die('Could not connect to Database');


    //BUILD THE QUERY - MATCHES FIELDS IN DB
    $query = "INSERT INTO 08_members(firstname, lastname, gender, style)".

    "VALUES ('$firstname', '$lastname', '$gender', '$style')"; //no ID because it will auto increment in the DB


    //WORK WITH THE DB
    $result = mysqli_query($databaseConnect, $query) or die('Query failed!');


    //UPDATING THE CHECKBOX INFORMATION
    //ID for the user added
    $recent_id = mysqli_insert_id($databaseConnect);

    //Loop through the array of checkbox items
    foreach($_POST['instruments'] as $instrument_id) {
        $query = "INSERT INTO 08_styles(id, instrument_id) VALUES('$recent_id', '$instrument_id')";

        echo $instrument_id;
        echo 'hi how are ya     ';

        $result = mysqli_query($databaseConnect, $query) or die('Checkbox query failed!');
 
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
        <h1>08 Table Joins | Confirmation</h1>
        <fieldset>
        <?php
            echo '<h2>The following order has been placed for '.$firstname.' '.$lastname.':</h2>';
            echo '<p>Gender: '; 

            if($gender == 1) {
                echo 'Male<br>';
            } else{
                echo 'Female<br>';
            }

            echo '<p>Music Style: '.$style.'<br>';
            echo '<p>Recent ID: '.$recent_id.'<br>';
        ?>
        </fieldset>
    </header>

    <?php //Adding in the nav bar
        include_once('navbar.php');
    ?>


    <main>


    </main>
</div>

</body>
</html>