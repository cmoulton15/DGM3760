
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
        <h1>09 Toolbox | Home Page </h1>

    </header>

    <form method="POST" action="">
    <fieldset>
        <?php
            require_once('variables.php');


            //BUILD CONNECTION TO DB - localhost means it's on the same server---------------------------------------------------
            $databaseConnect = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME) or die('Could not connect to Database');


            //BUILD THE QUERY - MATCHES FIELDS IN DB
            $query = "SELECT * FROM 09_toolbox ORDER BY name ASC"; 

            //WORK WITH THE DB
            $result = mysqli_query($databaseConnect, $query) or die('Query failed!');

            //CREATE A DATE DISPLAY FUNCTION FOR THE MONTH
            function convertMonth($x) {
                switch($x) {
                    case 1: $b = "January"; break;
                    case 2: $b = "February"; break;
                    case 3: $b = "March"; break;
                    case 4: $b = "April"; break;
                    case 5: $b = "May"; break;
                    case 6: $b = "June"; break;
                    case 7: $b = "July"; break;
                    case 8: $b = "August"; break;
                    case 9: $b = "September"; break;
                    case 10: $b = "October"; break;
                    case 11: $b = "November"; break;
                    case 12: $b = "December"; break;
                }

                return $b;
            }


            //DISPLAY THE  REMAINING RECORDS
            while($row = mysqli_fetch_array($result)) {
                
                echo '<h2>'. $row['name'] . '</h2>';

                //substring function = substr($string, start, length)
                $day = substr($row['gradDate'], 3, 2);
                $monthNum = substr($row['gradDate'], 0, 2);
                $monthName = convertMonth($monthNum);
                $year = substr($row['gradDate'], 6, 4);
                echo '<p>GRADUATION: ' . $monthName . ' ' . $day . ', ' . $year;

                echo '<br>STUDIES: ' . $row['studies'] . '<br>';

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