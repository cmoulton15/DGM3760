<?php
//LOAD IN THE VARIABLES FROM index.html

    $bandMember = $_GET['id'];


    //BUILD CONNECTION TO DB - localhost means it's on the same server
    $databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');


    //BUILD THE QUERY - retrieve band member id
    $query = "SELECT * FROM 05_band_simple WHERE id=$bandMember";

    //WORK WITH THE DB
    $result = mysqli_query($databaseConnect, $query) or die('Query failed!');

    //ADD RESULT TO A VARIABLE
    $found = mysqli_fetch_array($result);




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
        <h1>05 - Detail View of Record</h1>

        <?php
            echo '<h3>'.$found['firstname'].' '.$found['lastname'].'</h3>';
            echo '<p>Band: '.$found['band'].'<br>';
            echo 'Instrument: '.$found['instrument'].'</p>';

            echo '<img src="band/'.$found['photo'].'" /></p>';
        ?>

    </header>

        <h2><a href="view.php">View Records</a> | <a href="delete.php">Delete Records</a> | <a href="index.html">Add Records</a></h2>



    <main>


    </main>
</div>

</body>
</html>