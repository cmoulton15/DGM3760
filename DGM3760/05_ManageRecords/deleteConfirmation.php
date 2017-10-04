<!DOCTYPE html>


<?php
    $bandMember = $_GET['id'];


    //BUILD CONNECTION TO DB - localhost means it's on the same server
    $databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');

    



    //DELETE THE RECORD CHOSEN - ONLY WORKS ON SUBMIT
    if(isset($_POST['submit'])) {
        $query_delete = "DELETE FROM 05_band_simple WHERE id=$_POST[id]";

        $result_delete = mysqli_query($databaseConnect, $query_delete) or die('Delete query failed!');

        @unlink($_POST['photo']); //deletes the photo as well from the directory

        //REDIRECT TO THE CORRECT PAGE
        header("Location: http://uvustuff.thegentsofmusic.com/05_ManageRecords/delete.php");

        exit;//stops the rest of the code after deletion
    }//end if





    //BUILD THE QUERY - retrieve band member id
    $query = "SELECT * FROM 05_band_simple WHERE id=$bandMember";

    //WORK WITH THE DB
    $result = mysqli_query($databaseConnect, $query) or die('Query failed!');

    //ADD RESULT TO A VARIABLE
    $found = mysqli_fetch_array($result);
?>


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
        <h1>05 - Managing Records Deletion Confirmation</h1>

        <form class="phpForm" action="deleteConfirmation.php" method="POST" enctype="multipart/form-data" name="01form">
            <fieldset>
                <h2>Are you sure you want to delete this person?</h2>
                <?php 
                    
                    echo '<h3>'.$found['firstname'].' '.$found['lastname'].'</h3>';
                    echo '<p>Band: '.$found['band'].'<br>';
                    echo 'Instrument: '.$found['instrument'].'</p>';

                ?>

            <input type="hidden" name="id" value="<?php echo $found[id]; ?>" />
            <input type="hidden" name="photo" value="band/<?php echo $found[photo]; ?>" /><!--this will automatically record and send the ID value we need from the GET stream as a POST-->
            

            <a href="delete.php">Cancel</a>    

            </fieldset>
            <br>

            <input class="submit" type="submit" name="submit" value="Delete This Record">
        <h2><a href="view.php">View Records</a> | <a href="delete.php">Delete Records</a> | <a href="index.html">Add Records</a></h2>


        </form>
    </header>

    <main>


    </main>
</div>

</body>
</html>