<?php
//LOAD IN THE VARIABLES FROM index.html
    session_start();
    //BUILD CONNECTION TO DB - localhost means it's on the same server
    require_once('connection.php');




    //potato gun data that needs to be updated with each new potato gun added to the site
    if (empty($_SESSION['potatoGun'])) {
        $_SESSION["potatoGun"] = 0;
    } 
    if (empty($_SESSION['potatoGun2'])) {
        $_SESSION["potatoGun2"] = 0;
    }
    if (empty($_SESSION['potatoGun3'])) {
        $_SESSION["potatoGun3"] = 0;
    }
    if (empty($_SESSION['potatoGun4'])) {
        $_SESSION["potatoGun4"] = 0;
    }//this initializes the SESSION potatoGun variable if the cart is empty
    
    $potatoGun = $_SESSION["potatoGun"];
    $potatoGun2 = $_SESSION["potatoGun2"];
    $potatoGun3 = $_SESSION["potatoGun3"];
    $potatoGun4 = $_SESSION["potatoGun4"];

    //establishes the name of this potato gun
    $PGname = mysqli_query($con, "SELECT name FROM 3790_products WHERE id=1") or die('First Potato Gun name Query Failed');
    $PGname = mysqli_fetch_assoc($PGname);
    $PGname = $PGname['name'];
    //establishes the name of this potato gun
    $PGname2 = mysqli_query($con, "SELECT name FROM 3790_products WHERE id=2") or die('Second Potato Gun name Query Failed');
    $PGname2 = mysqli_fetch_assoc($PGname2);
    $PGname2 = $PGname2['name'];
    //establishes the name of this potato gun
    $PGname3 = mysqli_query($con, "SELECT name FROM 3790_products WHERE id=3") or die('Third Potato Gun name Query Failed');
    $PGname3 = mysqli_fetch_assoc($PGname3);
    $PGname3 = $PGname3['name'];
    //establishes the name of this potato gun
    $PGname4 = mysqli_query($con, "SELECT name FROM 3790_products WHERE id=4") or die('Third Potato Gun name Query Failed');
    $PGname4 = mysqli_fetch_assoc($PGname4);
    $PGname4 = $PGname4['name'];

    //string variable of items ordered
    $quantity = $PGname . ' ('.$potatoGun.'), ' .$PGname2 . ' ('.$potatoGun2.'), ' .$PGname3 . ' ('.$potatoGun3.'), ' .$PGname4. ' ('.$potatoGun4.')';
    $totalCost = $_SESSION['total'];
    //END POTATO GUN ADD-----------------------------------------------------------------


    //Above is session and cart info, below is user purchasing info

    $Bfirstname = $_POST[Bfirstname];
    $Blastname = $_POST[Blastname];
    $Baddress = $_POST[Baddress];
    $Bcity = $_POST[Bcity];
    $Bstate = $_POST[Bstate];
    $Bzip = $_POST[Bzip];

    $billing_info = $Baddress . ', ' .$Bcity. ' ' .$Bstate . ' ' .$Bzip;


    $Sfirstname = $_POST[Sfirstname];
    $Slastname = $_POST[Slastname];
    $Saddress = $_POST[Saddress];
    $Scity = $_POST[Scity];
    $Sstate = $_POST[Sstate];
    $Slastname = $_POST[Slastname];
    $Szip = $_POST[Szip];

    $shipping_info = $Saddress . ', ' .$Scity. ' ' .$Sstate . ' ' .$Szip;



    $is_active_order = $_POST[is_active_order];

    $stripeToken = $_POST[stripeToken];
    $stripeTokenType = $_POST[stripeTokenType];
    $email = $_POST[stripeEmail];



    //BUILD THE QUERY
    $query = "INSERT INTO 3790_orders(Bfirstname, Blastname, billing_address, Sfirstname, Slastname, shipping_address, email, billing_amount, quantity, is_active)".

    "VALUES ('$Bfirstname', '$Blastname', '$billing_info', '$Sfirstname', '$Slastname', '$shipping_info', '$email', '$totalCost', '$quantity', '$is_active_order')"; //no ID because it will auto increment in the DB


    //WORK WITH THE DB
    $result = mysqli_query($con, $query) or die('Query failed!');

    //CLOSE CONNECTION
    mysqli_close($con);



    //Empty the shopping cart
    $_SESSION["potatoGun"] = 0;
    $_SESSION["potatoGun2"] = 0;
    $_SESSION["potatoGun3"] = 0;
    $_SESSION["potatoGun4"] = 0;

?>



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
	    <ul class="nav navbar-nav">
	      <li><a href="index.php">Home</a></li>
	      <li><a href="products.php">Products</a></li>
	      <li><a href="cart.php">Cart</a></li>
	      <li><a href="checkout.php">Checkout</a></li>
	      <li><a href="admin.php">Admin Panel</a></li>
	    </ul>
	  </div>
	</nav>


    <!--MAIN CONTENT-->
    <div class="container">
    	<div class="row">
    		<div class="col-xs-12">
    			<h1>Thank your for your order!</h1>
    			<hr>
    		</div>
    	</div>


    	<div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                
                <h3>You can expect your Potato gun to arrive in the next week. Contact us if you have any questions.</h3>
                
                    <?php
                        echo '<h4>Billing Information:</h4><p>';
                        echo 'First Name: ' . $Bfirstname . '<br>';
                        echo 'Last Name: ' . $Blastname . '<br>';
                        echo 'Billing Address: ' . $billing_info . '<br><br><br>';

                        echo '<h4>Shipping Information:</h4>';
                        echo 'First Name: ' . $Sfirstname . '<br>';
                        echo 'Last Name: ' . $Slastname . '<br>';
                        echo 'Shipping Address: ' . $shipping_info . '<br><br><br><br>';

                        echo 'Email: ' . $email . '<br>';
                        echo 'Potato Guns Ordered: <br>';
                        echo '-'.$PGname.' (' . $potatoGun . ')<br></p>';
                        echo '-'.$PGname2.' (' . $potatoGun2 . ')<br></p>';
                        echo '-'.$PGname3.' (' . $potatoGun3 . ')<br></p>';
                        echo '-'.$PGname4.' (' . $potatoGun4 . ')<br></p>';
                        echo '<br>TOTAL CHARGE: $' . $totalCost . '<br>';

                    ?>

            </div>            
        </div>

        <br><br>


        





    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>