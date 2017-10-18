<?php
    //This is to authorize the person accessing the page
    require_once('authorize.php');   

    $employeeNumber = $_GET[id];

    //BUILD CONNECTION TO DB - localhost means it's on the same server
    $databaseConnect = mysqli_connect('localhost', 'studknuc_cody', 'Ns}bdQR.VE#J', 'studknuc_3760test') or die('Could not connect to Database');



    //BUILD THE QUERY
    $query = "SELECT * FROM employeeDirectory WHERE id=$employeeNumber";


    //WORK WITH THE DB
    $result = mysqli_query($databaseConnect, $query) or die('Query failed!');
    $found = mysqli_fetch_array($result);
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
        <h1>Update Employee</h1>
    </header>

    <?php //Adding in the nav bar
        include_once('navbar.php');
    ?>

    <br>
    <div>

    </div>

    <form method="POST" action="update2.php" method="POST" enctype="multipart/form-data" name="01form">
        
        <fieldset>
            <h2>Update the following information:</h2>
            <label><p>First Name:</p><input name="firstname" type="text" placeholder="first name" pattern="[a-zA-Z0-9 .]{2,99}" value="<?php echo $found[firstname]; ?>" required> </label>

            <label><p>Last Name:</p><input name="lastname" type="text" placeholder="last name" pattern="[a-zA-Z0-9 .]{2,99}" value="<?php echo $found[lastname]; ?>" required> </label>
            
            <label><p>Phone (xxx-xxx-xxxx):</p><input name="phone" type="phone" value="<?php echo $found[phone]; ?>" required> </label>

            <label><p>Email:</p><input name="email" type="email" value="<?php echo $found[email]; ?>" required> </label>

            <hr>

            <h2>Work Information:</h2>
            <label><p>Area of Expertise:
                <select name="expertise">
                  <option value="<?php echo $found[expertise]; ?>"><?php echo $found[expertise]; ?></option>
                  <option value="">-----------------</option>
                  <option value="Programmer">Programmer</option>
                  <option value="Developer">Developer</option>
                  <option value="Software Engineer">Software Engineer</option>
                  <option value="Web Design">Web Design</option>
                </select>
                </p>
            </label>

            <p>Describe what you do:<br>
            <textarea rows="5" name="description" value="<?php echo $found[description]; ?>" ></textarea>
            </p>

            <hr>

            <input type="hidden" name="id" value="<?php echo $found[id]; ?>">

        </fieldset>

        <br>
        <input class="submit" type="submit" value="Submit">
    </form>

    <br>
    <a href="admin.php">Cancel</a>    

    <main>


    </main>
</div>

</body>
</html>