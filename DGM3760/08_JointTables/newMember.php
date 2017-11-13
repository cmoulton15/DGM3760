<?php
    //This is to authorize the person accessing the page
    //require_once('authorize.php');

    //LOAD IN THE VARIABLES FROM index.html
    require_once('variables.php');

    //BUILD CONNECTION TO DB - localhost means it's on the same server
    $databaseConnect = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME) or die('Could not connect to Database');


    //BUILD THE FIRST QUERY - MATCHES FIELDS IN DB
    $query = "SELECT * FROM 08_instruments"; //no ID because it will auto increment in the DB\
    //WORK WITH THE DB
    $resultInstrument = mysqli_query($databaseConnect, $query) or die('Query failed!');

    //BUILD THE SECOND QUERY - MATCHES FIELDS IN DB
    $query = "SELECT * FROM 08_music ORDER BY musicType ASC"; //no ID because it will auto increment in the DB\
    //WORK WITH THE DB
    $resultMusic = mysqli_query($databaseConnect, $query) or die('Query failed!');


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
        <h1>08 Table Joins | Add new member</h1>

        

    </header>

    <form method="POST" action="newMember2.php">
    <fieldset>
        <h2>Personal Info:</h2>
            <label><p>First name:<br><input name="firstname" type="text" placeholder="first name" pattern="[a-zA-Z0-9 .]{2,99}" value="Hercule" required></p></label>

            <label><p>Last name:<br><input name="lastname" type="text" placeholder="last name" pattern="[a-zA-Z0-9 .]{2,99}" value="Pal" required></p></label>

            <label><input class="radiobuttons" type="radio" name="gender" value="1"><span>Male</span></label>
            <label><input class="radiobuttons" type="radio" name="gender" value="2"><span>Female</span></label>



            <p>What instrument(s) do you play?:</p>
                  <?php
                    while($row = mysqli_fetch_array($resultInstrument)) {
                            echo '<label><input class="radiobuttons" type="checkbox" value="' . $row['instruments_id'] . '" name="instruments[]">' .$row['instruments_id']. $row['value'] . '</label><br>';
                        }
                  ?>


            <br>
            <label><p>Select your Music Style:<br>
                <select name="style">
                  <option>Please select...</option>

                  <?php
                    while($row = mysqli_fetch_array($resultMusic)) {
                            echo '<option value="' . $row['music_id'] . '">' . $row['musicType'] . '</option>';
                        }
                  ?>
                </select>
                </p>
            </label>  



                
    </fieldset>
    <br>
    <input class="submit" type="submit" value="Submit">

    </form>


    <?php //Adding in the nav bar
        include_once('navbar.php');
    ?>


    <main>


    </main>
</div>

</body>
</html>