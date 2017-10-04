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

<div class="container">
    <header>
        <h1>06 - Securing the App | Place an Order</h1>

        

    </header>

    <form method="POST" action="newOrder2.php">
    <fieldset>
        <h2>About You:</h2>
            <label><p>Name:<br><input name="name" type="text" placeholder="first name" pattern="[a-zA-Z0-9 .]{2,99}" value="Hercule Pal" required></p></label>

            <label><p>Select your Item:<br>
                <select name="item">
                  <option value="Potato Gun">Potato Gun</option>
                  <option value="Banana Peel">Banana Peel</option>
                  <option value="Tomato Basil">Tomato Basil</option>
                  <option value="Cucumber Juice">Cucumber Juice</option>
                </select>
                </p>
            </label>  

            <label><p>Describe why you want to order this item:<br>
            <textarea rows="6" name="description" type="text" required></textarea></p></label>


                
    </fieldset>
    <br>
    <input class="submit" type="submit" value="Submit">

    </form>


    <?php //Adding in the nav bar
        include_once('navbar.php');
    ?>


    <main>


    </main>
</div>

</body>
</html>