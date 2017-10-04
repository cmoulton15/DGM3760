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
        <h1>05 - Managing Records Directory</h1>

        <form class="phpForm" action="<?php $SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" name="01form">
            <fieldset>
                <?php 
                    //BUILD CONNECTION TO DB - localhost means it's on the same server
                    $databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');


                    

                    //BUILD THE QUERY
                    $query = "SELECT * FROM 05_band_simple ORDER BY lastname ASC";


                    //WORK WITH THE DB
                    $result = mysqli_query($databaseConnect, $query) or die('Query failed!');


                    //DISPLAY THE  REMAINING RECORDS
                    while($row = mysqli_fetch_array($result)) {
                        
                        echo '<p><a href="viewDetails.php?id='.$row['id'].'">';
                        echo $row['firstname'] .' '. $row['lastname'] .' - '. $row['band'] .', '. $row['instrument'].' - '. $row['photo'];
                        echo '</a><a href="update.php?id='.$row['id'].'"> - Update Record</a>';
                        echo '</p>';
                    }


                    //CLOSE CONNECTION
                    mysqli_close($databaseConnect);

                ?>

    
            </fieldset>
            <br>

        <h2><a href="view.php">View Records</a> | <a href="delete.php">Delete Records</a> | <a href="index.html">Add Records</a></h2>


        </form>
    </header>

    <main>


    </main>
</div>

</body>
</html>