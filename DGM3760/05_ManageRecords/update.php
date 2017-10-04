<!DOCTYPE html>

<?php 
    
    $bandMember_id = $_GET[id];

    //BUILD CONNECTION TO DB - localhost means it's on the same server
    $databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');



    //BUILD THE QUERY
    $query = "SELECT * FROM 05_band_simple WHERE id=$bandMember_id";


    //WORK WITH THE DB
    $result = mysqli_query($databaseConnect, $query) or die('Query failed!');
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
        <h1>05 - Update Records</h1>
    </header>

    <main>

    <form class="phpForm" action="updateDB.php" method="POST" enctype="multipart/form-data" name="01form">

        <fieldset>
            <h2>About You:</h2>
            <label><p>First Name:</p><input name="firstname" type="text" pattern="[a-zA-Z0-9 .]{2,99}" value="<?php echo $found[firstname]; ?>" required> </label>

            <label><p>Last Name:</p><input name="lastname" type="text" pattern="[a-zA-Z0-9 .]{2,99}" value="<?php echo $found[lastname]; ?>" required> </label>
            
            <label><p>Instrument:</p><input name="instrument" type="text" value="<?php echo $found[instrument]; ?>" required> </label>

            <hr>

            <h2>Your Band:</h2>
            <label><p>Select your band:
                <select name="band">
                  <option value="<?php echo $found[band]; ?>"><?php echo $found[band]; ?></option>
                  <option value="">---------------</option>
                  <option value="Foo Fighters">Foo Fighters</option>
                  <option value="RED">RED</option>
                  <option value="Alter Bridge">Alter Bridge</option>
                  <option value="Thrice">Thrice</option>
                </select>
                </p>
            </label>

            <hr>
            
        </fieldset>

        <input type="hidden" name="id" value="<?php echo $found[id]; ?>">

        <br>
        <input class="submit" type="submit" value="Submit">
        
        <h2><a href="view.php">View Records</a> | <a href="delete.php">Delete Records</a> | <a href="index.html">Add Records</a></h2>


    </form>

    </main>
</div>

</body>
</html>