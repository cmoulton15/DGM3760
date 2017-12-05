
<?php
    require_once('security.php');

    //needs to be updated to match ID in DB for each new product
    $itemName1 = $_POST[itemName1];
    $price1 = $_POST[price1];
    $newAmount1 = $_POST[amount1];

    $itemName2 = $_POST[itemName2];
    $price2 = $_POST[price2];
    $newAmount2 = $_POST[amount2];

    $itemName3 = $_POST[itemName3];
    $price3 = $_POST[price3];
    $newAmount3 = $_POST[amount3];

    $itemName4 = $_POST[itemName4];
    $price4 = $_POST[price4];
    $newAmount4 = $_POST[amount4];

    

    //BUILD THE QUERY
    require_once('connection.php');


    //product 1 update
    $query1 = "UPDATE 3790_products SET name='$itemName1', inventory='$newAmount1', price='$price1' WHERE id=1";
    //WORK WITH THE DB
    $result = mysqli_query($con, $query1) or die('Inventory update query 1 failed!');


    //product 2 update
    $query2 = "UPDATE 3790_products SET name='$itemName2', inventory='$newAmount2', price='$price2' WHERE id=2";
    //WORK WITH THE DB
    $result = mysqli_query($con, $query2) or die('Inventory update query 2 failed!');


    //product 3 update
    $query3 = "UPDATE 3790_products SET name='$itemName3', inventory='$newAmount3', price='$price3' WHERE id=3";
    //WORK WITH THE DB
    $result = mysqli_query($con, $query3) or die('Inventory update query 3 failed!');

    //product 4 update
    $query4 = "UPDATE 3790_products SET name='$itemName4', inventory='$newAmount4', price='$price4' WHERE id=4";
    //WORK WITH THE DB
    $result = mysqli_query($con, $query4) or die('Inventory update query 4 failed!');


    //CLOSE CONNECTION
    mysqli_close($con);

    //REDIRECT TO THE CORRECT PAGE
    header("Location: inventory.php");


?>
