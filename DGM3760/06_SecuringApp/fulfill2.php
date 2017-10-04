<?php
    //This is to authorize the person accessing the page
    require_once('authorize.php');


//LOAD IN THE VARIABLES FROM index.html
    $id = $_GET['id'];


    require_once('variables.php');

    //BUILD CONNECTION TO DB - localhost means it's on the same server
    $databaseConnect = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME) or die('Could not connect to Database');


    //BUILD THE QUERY - MATCHES FIELDS IN DB - Changing form value
    $query = "UPDATE 06_orders SET fulfilled=1 WHERE id=$id"; 


    //WORK WITH THE DB
    $result = mysqli_query($databaseConnect, $query) or die('Query failed!');

    mysqli_close($databaseConnect);

    //RETURN TO PREVIOUS PAGE
    header('Location: fulfill.php');

?>
