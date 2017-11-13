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
        <h1>08 Table Joins | Search Page </h1>

    </header>

    <form method="POST" action="">
    <fieldset>
    
        <?php
            require_once('variables.php');

            //BUILD CONNECTION TO DB - localhost means it's on the same server---------------------------------------------------
            $databaseConnect = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME) or die('Could not connect to Database');


            //BUILD THE QUERY - MATCHES FIELDS IN DB
            $query = "SELECT * FROM 08_music ORDER BY musicType"; 

            //WORK WITH THE DB
            $result = mysqli_query($databaseConnect, $query) or die('Query failed!');


            echo '<ul class="searchList">';
            //DISPLAY THE  REMAINING RECORDS
            while($row = mysqli_fetch_array($result)) {
                
                echo '<li><a href="index.php?style='.$row['music_id'].'">'.$row['musicType'] .'</a></li>';
                
            }
            echo '</ul>';


            //CLOSE CONNECTION
            mysqli_close($databaseConnect);//--------------------------------------------------------------------------------------

        ?>    
    </fieldset>
    </form>

    <?php //Adding in the nav bar
        include_once('navbar.php');
    ?>


    <main>


    </main>
</div>

</body>
</html>