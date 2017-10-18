<?php
    //This is to authorize the person accessing the page
    require_once('authorize.php');   
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
        <h1>Add New Employee</h1>
    </header>

    <?php //Adding in the nav bar
        include_once('navbar.php');
    ?>

    <br>
    <div>

    </div>

    <form method="POST" action="add2.php" method="POST" enctype="multipart/form-data" name="01form">
        
        <fieldset>
            <h2>Please fill out all of the following information:</h2>
            <label><p>First Name:</p><input name="firstname" type="text" placeholder="first name" pattern="[a-zA-Z0-9 .]{2,99}" value="James" required> </label>

            <label><p>Last Name:</p><input name="lastname" type="text" placeholder="last name" pattern="[a-zA-Z0-9 .]{2,99}" value="Rowling" required> </label>
            
            <label><p>Phone (xxx-xxx-xxxx):</p><input name="phone" type="phone" value="801-555-5555" required> </label>

            <label><p>Email:</p><input name="email" type="email" value="place@here.com" required> </label>

            <hr>

            <h2>Work Information:</h2>
            <label><p>Area of Expertise:
                <select name="expertise">
                  <option value="Programmer">Programmer</option>
                  <option value="Developer">Developer</option>
                  <option value="Software Engineer">Software Engineer</option>
                  <option value="Web Design">Web Design</option>
                </select>
                </p>
            </label>

            <p>Describe what you do:<br>
            <textarea rows="5" name="description"></textarea>
            </p>

            <hr>

            <h2>Upload a Picture of Yourself:</h2>
            <input type="file" name="newPhoto">
            <p>*File must be in .jpg, .png, or .gif format.<br>
            *File must be under 150kb in size.</p>

            
        </fieldset>

        <br>
        <input class="submit" type="submit" value="Submit">
    </form>

    <main>


    </main>
</div>

</body>
</html>