 
<?php
    session_start();


    $updatedAmount = $_POST['changeAmount']; //value of cart item button clicked


    require_once('connection.php');
    //database connection
    $query = "SELECT * FROM 3790_products WHERE is_active=1 ORDER BY name";
    $result= mysqli_query($con, $query) or die('Query Failed');

    //initializes the totalCost variable if it has not yet been initialized
    if (empty($_SESSION['totalCost'])) {
        $_SESSION["totalCost"] = 0;
    } 





    //FOR THE FIRST POTATO GUN LISTED IN THE DATABASE. IF A NEW GUN IS ADDED TO DB, COPY THIS CODE AND APPEND THE # TO VARIABLES
    //POTATO GUN #1-----------------------------------------------------------------------------------------------------------//
    if (empty($_SESSION['potatoGun'])) {
        $_SESSION["potatoGun"] = 0;
    } //this initializes the SESSION potatoGun variable if the cart is empty

    if($_GET['id'] == 1) {
        $_SESSION["potatoGun"] += 1;
    } //this adds 1 to the potatoGun value as the id is pulled from the URL stream

    if($updatedAmount == "Add Product #1") {
        $_SESSION["potatoGun"] += 1;
    }
    if($updatedAmount == "Delete Product #1") {
        $_SESSION["potatoGun"] -= 1;
    }
    if($_SESSION['potatoGun'] < 0) {
        $_SESSION['potatoGun'] = 0;
    }

    //establishes the price of this potato gun
    $PGprice = mysqli_query($con, "SELECT price FROM 3790_products WHERE id=1") or die('First Potato Gun Query Failed');
    $PGprice = mysqli_fetch_assoc($PGprice);
    $PGprice = $PGprice['price'];
    //establishes the name of this potato gun
    $PGname = mysqli_query($con, "SELECT name FROM 3790_products WHERE id=1") or die('First Potato Gun name Query Failed');
    $PGname = mysqli_fetch_assoc($PGname);
    $PGname = $PGname['name'];
    //UPDATE EMPTY CART SECTION AFTER ADDING NEW GUNS
    //-----------------------------------------------------------------------------------------------------------------------//




    //POTATO GUN #2-----------------------------------------------------------------------------------------------------------//
    if (empty($_SESSION['potatoGun2'])) {
        $_SESSION["potatoGun2"] = 0;
    } //this initializes the SESSION potatoGun variable if the cart is empty

    if($_GET['id'] == 2) {
        $_SESSION["potatoGun2"] += 1;
    } //this adds 1 to the potatoGun value as the id is pulled from the URL stream

    if($updatedAmount == "Add Product #2") {
        $_SESSION["potatoGun2"] += 1;
    }
    if($updatedAmount == "Delete Product #2") {
        $_SESSION["potatoGun2"] -= 1;
    }
    if($_SESSION['potatoGun2'] < 0) {
        $_SESSION['potatoGun2'] = 0;
    }

    //establishes the price of this potato gun
    $PGprice2 = mysqli_query($con, "SELECT price FROM 3790_products WHERE id=2") or die('First Potato Gun Query Failed');
    $PGprice2 = mysqli_fetch_assoc($PGprice2);
    $PGprice2 = $PGprice2['price'];
    //establishes the name of this potato gun
    $PGname2 = mysqli_query($con, "SELECT name FROM 3790_products WHERE id=2") or die('First Potato Gun name Query Failed');
    $PGname2 = mysqli_fetch_assoc($PGname2);
    $PGname2 = $PGname2['name'];
    //UPDATE EMPTY CART SECTION AFTER ADDING NEW GUNS
    //-----------------------------------------------------------------------------------------------------------------------//



    //POTATO GUN #3-----------------------------------------------------------------------------------------------------------//
    if (empty($_SESSION['potatoGun3'])) {
        $_SESSION["potatoGun3"] = 0;
    } //this initializes the SESSION potatoGun variable if the cart is empty

    if($_GET['id'] == 3) {
        $_SESSION["potatoGun3"] += 1;
    } //this adds 1 to the potatoGun value as the id is pulled from the URL stream

    if($updatedAmount == "Add Product #3") {
        $_SESSION["potatoGun3"] += 1;
    }
    if($updatedAmount == "Delete Product #3") {
        $_SESSION["potatoGun3"] -= 1;
    }
    if($_SESSION['potatoGun3'] < 0) {
        $_SESSION['potatoGun3'] = 0;
    }

    //establishes the price of this potato gun
    $PGprice3 = mysqli_query($con, "SELECT price FROM 3790_products WHERE id=3") or die('First Potato Gun Query Failed');
    $PGprice3 = mysqli_fetch_assoc($PGprice3);
    $PGprice3 = $PGprice3['price'];
    //establishes the name of this potato gun
    $PGname3 = mysqli_query($con, "SELECT name FROM 3790_products WHERE id=3") or die('First Potato Gun name Query Failed');
    $PGname3 = mysqli_fetch_assoc($PGname3);
    $PGname3 = $PGname3['name'];
    //UPDATE EMPTY CART SECTION AFTER ADDING NEW GUNS
    //-----------------------------------------------------------------------------------------------------------------------//




    //POTATO GUN #4-----------------------------------------------------------------------------------------------------------//
    if (empty($_SESSION['potatoGun4'])) {
        $_SESSION["potatoGun4"] = 0;
    } //this initializes the SESSION potatoGun variable if the cart is empty

    if($_GET['id'] == 4) {
        $_SESSION["potatoGun4"] += 1;
    } //this adds 1 to the potatoGun value as the id is pulled from the URL stream

    if($updatedAmount == "Add Product #4") {
        $_SESSION["potatoGun4"] += 1;
    }
    if($updatedAmount == "Delete Product #4") {
        $_SESSION["potatoGun4"] -= 1;
    }
    if($_SESSION['potatoGun4'] < 0) {
        $_SESSION['potatoGun4'] = 0;
    }

    //establishes the price of this potato gun
    $PGprice4 = mysqli_query($con, "SELECT price FROM 3790_products WHERE id=4") or die('First Potato Gun Query Failed');
    $PGprice4 = mysqli_fetch_assoc($PGprice4);
    $PGprice4 = $PGprice4['price'];
    //establishes the name of this potato gun
    $PGname4 = mysqli_query($con, "SELECT name FROM 3790_products WHERE id=4") or die('First Potato Gun name Query Failed');
    $PGname4 = mysqli_fetch_assoc($PGname4);
    $PGname4 = $PGname4['name'];
    //UPDATE EMPTY CART SECTION AFTER ADDING NEW GUNS
    //-----------------------------------------------------------------------------------------------------------------------//





    //EMPTIES THE SHOPPING CART AND ALL PRODUCTS -- UPDATE NEW GUNS HERE AND IN TOTAL COST SECTION
    if($updatedAmount == "Empty Cart") {
        $_SESSION["potatoGun"] = 0;
        $_SESSION["potatoGun2"]= 0;
        $_SESSION["potatoGun3"]= 0;
        $_SESSION["potatoGun4"]= 0;
    }

    //insert values into array
    //$_SESSION['potatoGunArray'] = array();


    // while($data = mysqli_fetch_array($result)){
    //     $PGarray += array(
    //         array($data[''], )
    //     );

    //     if($updatedAmount == $data['id']) {
    //         //if the loop hits the matching button info, add in array info


    //     }
    // }


    //WHERE THE SHIPPING AND TAX AND TOTAL ARE INITIALIZED
    $shipping = 3;

    //ADD IN NEW GUN TOTAL INFORMATION
    $gunCost = ($PGprice * $_SESSION['potatoGun']) + ($PGprice2 * $_SESSION['potatoGun2']) + ($PGprice3 * $_SESSION['potatoGun3']) + ($PGprice4 * $_SESSION['potatoGun4']);
    $tax = .10 * $gunCost;
    $totalCost = $gunCost + $tax + $shipping;
    $_SESSION['total'] = $totalCost;
    $_SESSION['tax'] = $tax;
    $_SESSION['shipping'] = $shipping;
    //echo $totalCost;



    mysqli_close($con);

?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Shopping Cart</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Main CSS file -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>




  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Spuds R' Us</a>
        </div>
        <?php
            require_once('nav.php');
        ?>
      </div>
    </nav>


    <!--MAIN CONTENT-->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Your Cart</h1>
                <hr>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <form action="cart.php" method="POST" name="cartForm">  

                    <div class="col-xs-4">
                        <?php
                            echo "<p>You have the following potato gun(s) in your cart:<br>";
                                if ($_SESSION["potatoGun"] > 0) {
                                    echo $_SESSION["potatoGun"] . ' '.$PGname.'(s)<br>';
                                }

                                if ($_SESSION["potatoGun2"] > 0) {
                                    echo $_SESSION["potatoGun2"] . ' '.$PGname2.'(s)<br>';
                                }

                                if ($_SESSION["potatoGun3"] > 0) {
                                    echo $_SESSION["potatoGun3"] . ' '.$PGname3.'(s)<br>';
                                }

                                if ($_SESSION["potatoGun4"] > 0) {
                                    echo $_SESSION["potatoGun4"] . ' '.$PGname4.'(s)<br>';
                                }

                            echo '</p>';

                            echo "<p>TOTAL COST: $";
                            print_r($totalCost);
                            echo "</p>";

                            echo "<p>Including $";
                            print_r($tax);
                            echo " for tax (10%) and $";
                            print_r($shipping);
                            echo ".00 for shipping.</p>";
                        ?>                    
                    </div>

                    <div class="col-xs-8">
                        
                        <?php
                            while($data = mysqli_fetch_array($result)){
                                echo '<label>Add or remove '.$data['name'].' ($'.$data['price'].'):';
                                echo '<input type="submit" value="Add Product #'.$data['id'].'" name="changeAmount">';
                                echo '<input type="submit" value="Delete Product #'.$data['id'].'" name="changeAmount">';
                            }
                        ?>

                        <br><br>
                        <input type="submit" value="Empty Cart" name="changeAmount">

                    </div>

                    
                </form>
            </div>            
        </div>

        <br><br>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <a href="checkout.php"><button>Checkout Items</button></a>
            </div>
        </div>

        





    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>