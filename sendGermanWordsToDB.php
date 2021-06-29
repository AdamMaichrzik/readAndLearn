<?php
    require_once "dbconnect.php";
    //connect to mysqli database (Host/Username/Password)
    $connection = mysqli_connect($host, $user, $password) or die("Error " . mysqli_error());
    //select MySQLi dabatase table
    $db = mysqli_select_db($connection, "serwer69488_Playground") or die("Error " . mysqli_error());  
    $sql = mysqli_query($connection, "SELECT * FROM germanWordsTable");

    //Loop for getting the array from sql ID table
    while($row = mysqli_fetch_array($sql))
    {
        $ID[] = $row['ID'];
    }  
    //Setting the max number of ID's
    $IDCount = count($ID);
    //Setting the variables from HTML input form
    $germanWord = isset($_POST['addGermanWord']) ? $_POST['addGermanWord'] : '';
    $polishWord = isset($_POST['addPolishWord']) ? $_POST['addPolishWord'] : '';

    if(isset($_POST['addWordsButton']))
    {
        if(empty($IDCount and $germanWord and $polishWord))
        {
            echo "Error, please fill all the fields!";
        }
        else
        {
            $sql = $connection -> query ("INSERT INTO germanWordsTable (ID, germanWord, polishWord)
            VALUES ('".$IDCount."', '".$germanWord."', '".$polishWord."')");
        }
    }
?>