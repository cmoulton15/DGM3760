<?php
//LOAD IN THE VARIABLES FROM index.html

	$firstname = $_POST[firstname];
	$lastname = $_POST[lastname];
	$address = $_POST[address];
	$email = $_POST[from];

	$gender = $_POST[gender];
	$animal = $_POST[spiritAnimal];


//BUILD CONNECTION TO DB - localhost means it's on the same server
$databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');



//BUILD THE QUERY
$query = "INSERT INTO 02_inquiries(firstname, lastname, address, email, gender, animal)".

"VALUES ('$firstname', '$lastname', '$address', '$email', '$gender', '$animal')"; //no ID because it will auto increment in the DB


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
        <h1>02 - Connect to MySQL</h1>
    </header>

    <main>

    <form class="phpForm" action="contact.php" method="POST" enctype="multipart/form-data" name="01form">

        <fieldset>
            <h2>Your Message has been sent!</h2>
        </fieldset>

        
    </form>

    </main>
</div>

</body>
</html>