<?php
//LOAD IN THE VARIABLES FROM index.html

	$firstname = $_POST[firstname];
	$lastname = $_POST[lastname];
	$address = $_POST[address];
	$zip = $_POST[zip];
	$email = $_POST[from];

	$gender = $_POST[gender];
	$animal = $_POST[spiritAnimal];
	$message = $_POST[message];


//BUILD THE EMAIL (INSECURE VERSION, JUST FOR LEARNING)
	$to = 'cojamo15@gmail.com';
	$subject = "Message from $firstname $lastname";
	$emailMessage = "$firstname $lastname, whose spirit animal is a $gender $animal, has sent you a message!

		$message

Feel free to contact them at $address, $zip \nOr reply to their message at $email";

	//mail($to, $subject, $emailMessage, 'FROM: '.$email); HIDE UNTIL SECURE

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
        <h1>01 - Send Mail using PHP script</h1>
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