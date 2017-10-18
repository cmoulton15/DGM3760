<?php
//LOAD IN THE VARIABLES FROM index.html
    //This is to authorize the person accessing the page
    require_once('authorize.php');   
    
    $firstname = $_POST[firstname];
    $lastname = $_POST[lastname];
    $expertise = $_POST[expertise];
    $email = $_POST[email];
    $phone = $_POST[phone];
    $description = $_POST[description];

    
    //make photo path
    $filepath = 'employeePics/';
    $extension = pathinfo($_FILES['newPhoto']['name'], PATHINFO_EXTENSION);

    $filename = $firstname.$lastname.time().'.'.$extension; //adds in server time so no overwrites occur

    //VALIDATE TO SEE IF AN IMAGE HAS BEEN UPLOADED
    $validImage = true;

    
    if ($_FILES['newPhoto']['size'] == 0) {
        echo "An image must be uploaded!";
        $validImage = false;
    }

    //MAKE SURE IMAGE ISN"T TOO LARGE > 150 KB (1024 bytes per KB)
    if ($_FILES['newPhoto']['size'] > 153600) {
        echo "Image is over the 150 KB size limit!";
        $validImage = false;
    }

    //CHECKING FILE TYPE
    if ($_FILES['newPhoto']['type'] == 'image/gif' || 
        $_FILES['newPhoto']['type'] == 'image/jpeg' ||
        $_FILES['newPhoto']['type'] == 'image/pjpeg' ||
        $_FILES['newPhoto']['type'] == 'image/png'){

        //should be the correct format    
    } else {
        echo "You have uploaded a photo that is not the right format!";  
        $validImage = false;      
    }




    //UPLOAD THE FILES AFTER VALIDATION
    if ($validImage == true) {
        //upload code
        $tmp_name = $_FILES['newPhoto']['tmp_name'];
        move_uploaded_file($tmp_name, "$filepath$filename");
        @unlink($_FILES['newPhoto']['tmp_name']); //empties this temp file from the server



        //BUILD CONNECTION TO DB - localhost means it's on the same server
        $databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');


        //BUILD THE QUERY - MATCHES FIELDS IN DB
        $query = "INSERT INTO employeeDirectory(firstname, lastname, expertise, phone, email, description, photo)".

        "VALUES ('$firstname', '$lastname', '$expertise', '$phone', '$email', '$description', '$filename')"; //no ID because it will auto increment in the DB


        //WORK WITH THE DB
        $result = mysqli_query($databaseConnect, $query) or die('Query failed!');

        //CLOSE CONNECTION
        mysqli_close($databaseConnect);

    } else {
        //redirect the user to try again
        echo '<br><a href="add.php">Please try to upload a file that meets the requirements.</a>';
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
<br>
<div class="container">
    <header>
        <h1>New Employee Info</h1>
    </header>

    <?php //Adding in the nav bar
        include_once('navbar.php');
    ?>

    <br>
    <div>

    </div>

    <form method="POST" action="add2.php">
        
        <h2>Information has been added for:</h2>
            <?php
            echo '<p>NAME: '.$lastname.', '.$firstname.'<br>';
            echo '<p>EXPERTISE: '.$expertise.'<br>';
            echo '<p>CONTACT INFO: '.$email.'  |  '.$phone.'<br>';
            echo '<p>DESCRIPTION: '.$description.'<br><br>';
            echo '<img src="'.$filepath.$filename.'" /></p>';
            ?>
        <br>

    </form>

    <h4><a href="add.php">Go Back</a></h4>

    <main>


    </main>
</div>

</body>
</html>