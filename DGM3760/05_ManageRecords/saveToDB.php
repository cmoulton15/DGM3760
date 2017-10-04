<?php
//LOAD IN THE VARIABLES FROM index.html

	$firstname = $_POST[firstname];
	$lastname = $_POST[lastname];
    $instrument = $_POST[instrument];
    $band = $_POST[band];

    //make photo path
    $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

    $filename = $firstname.$lastname.time().'.'.$ext; //adds in server time so no overwrites occur
    $filepath = 'band/';

    //VALIDATE TO SEE IF AN IMAGE HAS BEEN UPLOADED
    $validImage = true;

    if ($_FILES['photo']['size'] == 0) {
        echo "An image must be uploaded!";
        $validImage = false;
    }

    //MAKE SURE IMAGE ISN"T TOO LARGE > 150 KB (1024 bytes per KB)
    if ($_FILES['photo']['size'] > 153600) {
        echo "Image is over the 150 KB size limit!";
        $validImage = false;
    }

    //CHECKING FILE TYPE
    if ($_FILES['photo']['type'] == 'image/gif' || 
        $_FILES['photo']['type'] == 'image/jpeg' ||
        $_FILES['photo']['type'] == 'image/pjpeg' ||
        $_FILES['photo']['type'] == 'image/png'){

        //should be the correct format    
    } else {
        echo "You have uploaded a photo that is not the right format!";  
        $validImage = false;      
    }




    //UPLOAD THE FILES AFTER VALIDATION
    if ($validImage == true) {
        //upload code
        $tmp_name = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tmp_name, "$filepath$filename");
        @unlink($_FILES['photo']['tmp_name']); //empties this temp file from the server



        //BUILD CONNECTION TO DB - localhost means it's on the same server
        $databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');


        //BUILD THE QUERY - MATCHES FIELDS IN DB
        $query = "INSERT INTO 05_band_simple(firstname, lastname, band, instrument, photo)".

        "VALUES ('$firstname', '$lastname', '$band', '$instrument', '$filename')"; //no ID because it will auto increment in the DB


        //WORK WITH THE DB
        $result = mysqli_query($databaseConnect, $query) or die('Query failed!');

        //CLOSE CONNECTION
        mysqli_close($databaseConnect);

    } else {
        //redirect the user to try again
        echo '<br><a href="index.html">Please try to upload a file that meets the requirements.</a>';
    }




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