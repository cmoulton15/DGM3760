<!DOCTYPE php>
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
        <h1>04 - Deleting Records</h1>
    </header>

    <main>

    <form class="phpForm" action="<?php $SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" name="01form">

        <fieldset>
        <h2>Select information from the Database to delete.</h2>

        <?php 
            //BUILD CONNECTION TO DB - localhost means it's on the same server
            $databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');


            //THE CODE FOR DELETING RECORDS
            if(isset($_POST['submit'])) {
                foreach($_POST['todelete'] as $delete_id) {

                    $query_delete = "DELETE FROM 03_newsletter WHERE id=$delete_id";

                    $result_delete = mysqli_query($databaseConnect, $query_delete) or die('Delete query failed!');

                }//clost foreach loop

            }//end if




            //BUILD THE QUERY
            $query = "SELECT * FROM 03_newsletter";


            //WORK WITH THE DB
            $result = mysqli_query($databaseConnect, $query) or die('Query failed!');


            //DISPLAY THE  REMAINING RECORDS
            while($row = mysqli_fetch_array($result)) {
                
                echo '<label>';
                echo '<input type="checkbox" value="'. $row['id'] .'" name="todelete[]" />';
                echo $row['firstname'] .' '. $row['lastname'] .' - '. $row['email'];
                echo '</label><br>';
            }


            //CLOSE CONNECTION
            mysqli_close($databaseConnect);

        ?>
            
        </fieldset>

        <br>
        <input class="submit" type="submit" value="Delete Records" name="submit">


    </form>

    </main>
</div>

</body>
</html>

