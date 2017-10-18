<!DOCTYPE html>

<?php
    //This is to authorize the person accessing the page
    require_once('authorize.php');   


    $employeeNumber = $_GET['id'];


    //BUILD CONNECTION TO DB - localhost means it's on the same server
    $databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');

    



    //DELETE THE RECORD CHOSEN - ONLY WORKS ON SUBMIT
    if(isset($_POST['submit'])) {
        $query_delete = "DELETE FROM employeeDirectory WHERE id=$_POST[id]";

        $result_delete = mysqli_query($databaseConnect, $query_delete) or die('Delete query failed!');

        @unlink($_POST['photo']); //deletes the photo as well from the directory

        //REDIRECT TO THE CORRECT PAGE
        header("Location: http://uvustuff.thegentsofmusic.com/Midterm/admin.php");

        exit;//stops the rest of the code after deletion
    }//end if




    //BUILD THE QUERY - MATCHES FIELDS IN DB
    $query = "SELECT * FROM employeeDirectory WHERE id=$employeeNumber"; //no ID because it will auto increment in the DB


    //WORK WITH THE DB
    $result = mysqli_query($databaseConnect, $query) or die('Query failed!');

    $found = mysqli_fetch_array($result);

    //CLOSE CONNECTION
    mysqli_close($databaseConnect);
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
<br>
<div class="container">
    <header>
        <h1>Delete Employee?</h1>
    </header>

    <?php //Adding in the nav bar
        include_once('navbar.php');
    ?>

    <br>
    <div>
        
        <form class="phpForm" action="delete.php" method="POST" enctype="multipart/form-data" name="01form">
            <fieldset>
                <h2>Are you sure you want to delete this person?</h2>
                <?php 
                    
                    echo '<h3>'.$found['firstname'].' '.$found['lastname'].'</h3>';
                    echo '<p>EXPERTISE: '.$found['expertise'].'<br>';
                    echo 'PHONE: <a href="tel:'.$found['phone'].'">'.$found['phone'].'</a><br>';
                    echo 'EMAIL: <a href="mailto:'.$found['email'].'">'.$found['email'].'</a><br>';
                    echo 'DESCRIPTION: '.$found['description'].'</p>';

                    echo '<img src="employeePics/'.$found['photo'].'" /></p>';

                ?>

            <input type="hidden" name="id" value="<?php echo $found[id]; ?>" />
            <input type="hidden" name="photo" value="employeePics/<?php echo $found[photo]; ?>" /><!--this will automatically record and send the ID value we need from the GET stream as a POST-->
            

            <a href="admin.php">Cancel</a>    

            </fieldset>
            <br>

            <input class="submit" type="submit" name="submit" value="Delete This Record">


        </form>
        
        </div>

    <main>


    </main>
</div>

</body>
</html>