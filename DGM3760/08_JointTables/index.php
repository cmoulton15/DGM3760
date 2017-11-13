
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
        <h1>08 Table Joins | Home Page </h1>

    </header>

    <form method="POST" action="">
    <fieldset>
        <?php
            require_once('variables.php');

            $queryAddition = '';
            if (isset($_GET['style'])) {
                $queryAddition = "WHERE style=".$_GET['style'];
            }



            //BUILD CONNECTION TO DB - localhost means it's on the same server---------------------------------------------------
            $databaseConnect = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME) or die('Could not connect to Database');


            //BUILD THE QUERY - MATCHES FIELDS IN DB
            $query = "SELECT * FROM 08_members INNER JOIN 08_music ON (08_members.style = 08_music.music_id) $queryAddition ORDER BY lastname"; 

            //WORK WITH THE DB
            $result = mysqli_query($databaseConnect, $query) or die('Query failed!');


            //IF NOBODY SHOWS UP FROM DB RESULTS
            if (mysqli_num_rows($result) == 0) {
                echo '<h2>There are no people that match the requested search. Totes sorry!</h2>';
            }

            //DISPLAY THE  REMAINING RECORDS
            while($row = mysqli_fetch_array($result)) {
                
                echo '<h2>';
                echo $row['firstname'] .' '. $row['lastname'];
                echo '</h2>';

                echo '<p>';//Ternary operator here will replace an if else
                echo ($row['gender'] == 1 ? 'Mr. ' : 'Ms. ');
                echo $row['lastname'].'\'s preferred musical style: '.$row['musicType'];
                echo '<br>';

                echo ($row['gender'] == 1 ? 'His ' : 'Her ');
                echo 'learned instruments: <br>';



                //to pull instruments from other table, assign ID to a variable
                $currentID = $row['id'];

                $query2 = "SELECT * FROM 08_styles INNER JOIN 08_instruments ON (08_styles.instrument_id = 08_instruments.instruments_id) WHERE id=$currentID"; 
                $result2 = mysqli_query($databaseConnect, $query2) or die('Query 2 failed!');

                // tp cycle through second query
                while($row2 = mysqli_fetch_array($result2)) {
                    echo '<p class="instruments"> -'.$row2['value'] . '</p>';
                }

                echo '</p><br><hr>';
            }


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