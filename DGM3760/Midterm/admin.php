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
        <h1>Admin Panel</h1>
    </header>

    <?php //Adding in the nav bar
        include_once('navbar.php');
    ?>

    <br>
    <div>
    <a href="add.php"><button class="addButton">Add New Employee</button>
    </a>


        <?php 
            //BUILD CONNECTION TO DB - localhost means it's on the same server
            $databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');


            //BUILD THE QUERY
            $query = "SELECT * FROM employeeDirectory ORDER BY lastname ASC";


            //WORK WITH THE DB
            $result = mysqli_query($databaseConnect, $query) or die('Query failed!');


            //DISPLAY THE  REMAINING RECORDS
            while($row = mysqli_fetch_array($result)) {
                
                echo '<p>';
                echo $row['lastname'] .', '. $row['firstname'] .' - '. $row['expertise'];
                echo '<a href="update.php?id='.$row['id'].'"><button>Update Record</button></a>';
                echo '</a><a href="delete.php?id='.$row['id'].'"><button class="redButton">Delete Record</button></a>';
                echo '</p>';
            }


            //CLOSE CONNECTION
            mysqli_close($databaseConnect);

        ?>

    </div>

    <form method="POST" action="">
        <?php
            // require_once('variables.php');

            // //BUILD CONNECTION TO DB - localhost means it's on the same server---------------------------------------------------
            // $databaseConnect = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME) or die('Could not connect to Database');


            // //BUILD THE QUERY - MATCHES FIELDS IN DB
            // $query = "SELECT * FROM 06_orders WHERE fulfilled=1 ORDER BY currentDate DESC"; 

            // //WORK WITH THE DB
            // $result = mysqli_query($databaseConnect, $query) or die('Query failed!');

            // //DISPLAY THE  REMAINING RECORDS
            // while($row = mysqli_fetch_array($result)) {
                
            //     echo '<h2>';
            //     echo $row['name'];
            //     echo '</h2>';

            //     echo '<h3>';
            //     echo $row['item'] . ' - ' . $row['currentDate'];
            //     echo '</h3>';

            //     echo '<p>';
            //     echo $row['description'];
            //     echo '</p><br><hr>';
            // }


            // //CLOSE CONNECTION
            // mysqli_close($databaseConnect);//--------------------------------------------------------------------------------------

        ?>    
    </form>

    <main>


    </main>
</div>

</body>
</html>