<?php
    //This is to authorize the person accessing the page
    //require_once('authorize.php');
    require_once('variables.php');


    //LOAD IN THE VARIABLES FROM index.html
    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $studies = $_POST['studies'];

        $gradDate = $month . '_' . $day . '_' . $year;
        echo $gradDate;

        //BUILD CONNECTION TO DB - localhost means it's on the same server
        $databaseConnect = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME) or die('Could not connect to Database');


        //BUILD THE QUERY - MATCHES FIELDS IN DB
        $query = "INSERT INTO 09_toolbox(name, gradDate, studies)".

        "VALUES ('$name', '$gradDate', '$studies')"; //no ID because it will auto increment in the DB


        //WORK WITH THE DB
        $result = mysqli_query($databaseConnect, $query) or die('Query failed!');

        //CLOSE CONNECTION
        mysqli_close($databaseConnect);
        
        header('Location: index.php');

    }

    
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

<div class="container">
    <header>
        <h1>09 Toolbox | Add Student Info</h1>

        

    </header>

    <form method="POST" action="add.php">
    <fieldset>
        <h2>Personal Info:</h2>
            <label><p>Your Full Name:<br><input name="name" type="text" placeholder="first name" pattern="[a-zA-Z0-9 .]{2,99}" value="Hercule" required></p></label>


            <p>Select your Expected Graduation Day:<br>
            <label>Month:
                <select name="month">
                  <option>01</option>
                  <option>02</option>
                  <option>03</option>
                  <option>04</option>
                  <option>05</option>
                  <option>06</option>
                  <option>07</option>
                  <option>08</option>
                  <option>09</option>
                  <option>10</option>
                  <option>11</option>
                  <option>12</option>     
                </select>
            </label> <br>

            <label>Day:
                <select name="day">
                  <option>01</option>
                  <option>02</option>
                  <option>03</option>
                  <option>04</option>
                  <option>05</option>
                  <option>06</option>
                  <option>07</option>
                  <option>08</option>
                  <option>09</option>
                  <option>10</option>
                  <option>11</option>
                  <option>12</option> 
                  <option>13</option>
                  <option>14</option>
                  <option>15</option>
                  <option>16</option>
                  <option>17</option>
                  <option>18</option>
                  <option>19</option>
                  <option>20</option>
                  <option>21</option>
                  <option>22</option>
                  <option>23</option>
                  <option>24</option>
                  <option>25</option>
                  <option>26</option>
                  <option>27</option>
                  <option>28</option>
                  <option>29</option>
                  <option>30</option>
                  <option>31</option>    
                </select>
            </label> <br>

            <label>Year: <input type="number" name="year" maxlength="4"></label>


            </p>

            <label><p>What have you studied:<br><textarea name="studies" placeholder="ex: Physics, Astronomy, Web Design, Programming etc."></textarea></p></label>

                
    </fieldset>
    <br>
    <input class="submit" type="submit" value="Submit" name="submit">

    </form>


    <?php //Adding in the nav bar
        include_once('navbar.php');
    ?>


    <main>


    </main>
</div>

</body>
</html>