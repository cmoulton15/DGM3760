<?php
//LOAD IN THE VARIABLES FROM index.html

    $id = $_POST[id];
	$firstname = $_POST[firstname];
	$lastname = $_POST[lastname];
    $instrument = $_POST[instrument];
    $band = $_POST[band];




        //BUILD CONNECTION TO DB - localhost means it's on the same server
        $databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');


        //BUILD THE QUERY - MATCHES FIELDS IN DB
        $query = "UPDATE 05_band_simple SET firstname='$firstname', lastname='$lastname', band='$band', instrument='$instrument' WHERE id=$id";


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
        <h1>05 - Managing Records Validation Confirmation</h1>

        <?php
            echo '<h2>Information has been added for:</h2>';
            echo '<p>Name: '.$firstname.' '.$lastname.'<br>';
            echo '<p>Band: '.$band.'<br>';
            echo '<p>Instrument: '.$instrument.'<br>';
            echo '<img src="'.$filepath.$filename.'" /></p>';
        ?>

    </header>

        <h2><a href="view.php">View Records</a> | <a href="delete.php">Delete Records</a> | <a href="index.html">Add Records</a></h2>



    <main>


    </main>
</div>

</body>
</html>