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
        <h1>09 Toolbox | Search Page </h1>

    </header>

    <form method="POST" action="">
    <fieldset>
    
          
        <label><p>What field of study are you looking for students in? (separate multiple search terms with a , )<br><input name="studiesSearch" pattern="[a-zA-Z-_., ]{2, 99}" placeholder="Programming etc."></p></label>

                
    </fieldset>
    <br>
    <input class="submit" type="submit" value="Submit" name="submit">
    </form>



    <?php //Adding in the nav bar
        include_once('navbar.php');
        require_once('variables.php');

        if(isset($_POST['submit'])) {
            $studiesSearch = strtolower($_POST['studiesSearch']);

            //REMOVE COMMAS FROM SEARCH INPUT (what is being replaced, what it's being replaced with, what text group)
            $studiesSearchClean = str_replace(',', ' ', $studiesSearch);
            //CREATE AND ARRAY FROM THE LIST OF SEARCH TERMS - every time you see first item, explode
            $studiesSearchTerms = explode( ' ', $studiesSearchClean);

            foreach ($studiesSearchTerms as $temp) {
                //only select actual terms (avoid commas, spaces)
                if(!empty($temp)) {
                    $searchArray[] = $temp;
                }
            } //END FOREACH LOOP

            //THIS WILL PUT THE VARIABLE FOR EACH ARRAY ITEM INTO THE PROPER SEARCH TERMS FOR SQL QUERY
            $whereList = array();
            foreach($searchArray as $temp) {
                $whereList[] = "studies LIKE '%$temp%'";
            } //END THIS SECOND FOREACH
            //THIS CONNECTS EACH ARRAY ITEM WITH OR BETWEEN EACH ONE
            $whereQuery = implode(' OR ', $whereList);


            $databaseConnect = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME) or die('Could not connect to Database');

            //BUILD THE QUERY - MATCHES FIELDS IN DB
            $query = "SELECT * FROM 09_toolbox";
            if(!empty($whereQuery)) {
                $query .= " WHERE $whereQuery";
            }
            //echo $query;
            
            echo '<h2>Search results for "'.$studiesSearchClean.'":</h2>';

            //echo $query;

            //WORK WITH THE DB
            $result = mysqli_query($databaseConnect, $query) or die('Query failed!');

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo '<h2>'.$row['name'].'</h2>';

                    //HIGHLIGHT SEARCH TERMS IN RESULTS
                    $myResults = strtolower($row['studies']);
                    foreach($searchArray as $temp) {
                        $insert = '<***>'.$temp.'</***>';
                        $myResults = str_replace($temp, $insert, $myResults);

                    }//END FOREACH

                    //adding span tags back in - used stars earlier to keep people from adding in "span" text to break the query
                    $myResults = str_replace('***', 'span', $myResults);

                    echo '<p class="highlights">'.$myResults.'</p>';
                }
            }
        }

    ?>


    <main>


    </main>
</div>

</body>
</html>